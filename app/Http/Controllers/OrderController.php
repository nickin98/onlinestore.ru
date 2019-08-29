<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\OrderProduct;
use Illuminate\Http\Request;
use DB;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('register');

        $this->middleware('admin')->except('register');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate(10);;
        return view('order.index', ['categories' => $orders]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('order.show', ['category' => $order]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Order $order)
    {
        $order->status = $request->status;
        $order->save();

        return redirect()->back();
    }

    public function register(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:50|string',
            'phone' => 'required',
            'street' => 'required|string|max:100',
            'house' => 'required',
            'payment' => 'required|integer',
            'email' => 'required|email',
            'cart' => 'required|json',
            'delivery' => 'required',
            'date' => 'bail|required_if:delivery, 2|nullable|date',
            'time' => 'bail|required_if:delivery, 2|nullable|date_format:H:i',
            'flat' => 'nullable',
        ]);


        try {
            DB::beginTransaction();

            $phone = $request->phone;
            $email = $request->email;

            $customer = Customer::where([
                ['phone', '=', $phone],
                ['email', '=', $email]
            ])->first();

            if ($customer == null) {
                $customer = new Customer();
                $customer->phone = $request->phone;
                $customer->email = $request->email;
                $customer->save();
            }

            $customerId = $customer->id;

            $order = new Order();
            $order->customer_name = $request->name;
            $order->street = $request->street;
            $order->house = $request->house;
            $order->flat = $request->flat;
            $order->form_payment = $request->payment;
            $order->comment = $request->comment;
            $order->customer_id = $customerId;
            $order->status = 1;

            $time_delivery = $request->delivery;

            if ($time_delivery == 1) {
                $order->near_time_delivery = 1;
            } else {
                $order->exact_delivery_time = $request->date . $request->time;
            }

            $order->status = 1;
            $order->save();

            $orderId = $order->id;

            $products = json_decode($request->cart, true);

            foreach($products as $productId => $product) {
                $orderProduct = new OrderProduct();
                $orderProduct->order_id = $orderId;
                $orderProduct->product_id = $productId;
                $orderProduct->amount = $product[3];
                $orderProduct->save();
            }

            DB::commit();
        } catch(Exception $e) {
            DB::rollBack();
        }

        return redirect()->route('index');
    }
}
