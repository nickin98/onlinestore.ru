<?php

namespace App\Http\Controllers;

use App\Category;
use App\Customer;
use App\Order;
use App\OrderProduct;
use App\Product;
use Illuminate\Http\Request;
use DB;
use mysql_xdevapi\Exception;

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
        $orders = Order::paginate(10);
        return view('order.index', ['orders' => $orders]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $products = $order->products()->get();
        $order_product = new OrderProduct;
        return view('order.show', ['order' => $order, 'products' => $products, 'order_product' => $order_product]);
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

        $rules = [
            'name' => 'required|max:191|string',
            'street' => 'required|string|max:191',
            'house' => 'required|string|max:191',
            'payment' => 'required|integer|digits_between:1,3',
            'cart' => 'bail|required|json|exist_product',
            'delivery' => 'required|digits_between:1,2',
            'date' => 'bail|required_if:delivery, 2|nullable|date',
            'time' => 'bail|required_if:delivery, 2|nullable|date_format:H:i',
            'flat' => 'nullable|string|max:191',
            'comment' => 'nullable|string|max:500'
        ];

        if (\Auth::guest()) {
            $rules['phone'] = 'required|regex:#\+7\(\d{3}\) \d{3}-\d{2}-\d{2}#';
            $rules['email'] = 'required|email';
        }

        $this->validate($request, $rules);


        try {
            DB::beginTransaction();

            if (\Auth::guest()) {
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
            } else {
                $customerId = \Auth::user()->customer()->first()->id;
            }

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

            $products = json_decode($request->cart, true);

            $totalPrice = 0;
            foreach ($products as $productId => $product) {
                $productPrice = Product::where('id', $productId)->first()->price;
                $totalPrice += $productPrice * $product[3];
            }

            $order->total_price = $totalPrice;

            $order->save();

            $orderId = $order->id;

            $allProductIds = Product::all()->pluck('id')->toArray();

            foreach($products as $productId => $product) {
                if (!array_has($allProductIds, $productId)) {
                    throw new \Exception('Продукта с id=' . $productId. ' нет в базе данных');
                }
                $orderProduct = new OrderProduct();
                $orderProduct->order_id = $orderId;
                $orderProduct->product_id = $productId;
                $orderProduct->amount = $product[3];
                $orderProduct->save();
            }

            $categories = Category::all();

            DB::commit();
        } catch(Exception $e) {
            DB::rollBack();
        }

//        return redirect()->route('index');
        return view('success', ['categories' => $categories]);
    }

    public function unfinishedOrders() {
        $orders = Order::where('status', '=', 1)->orWhere('status', '=', 2)->get();
        return view('order.untreated-orders', ['orders' => $orders]);
    }

    public function changeStatus(Request $request) {
        $request->validate([
            'status' => 'required',
            'id' => 'required',
        ]);

        $orderId = $request->id;
        $orderStatus = $request->status;
        $order = Order::where('id', '=', $orderId)->first();
        $order->status = $orderStatus;
        $order->save();

        return 'Статус обновлен';
    }
}
