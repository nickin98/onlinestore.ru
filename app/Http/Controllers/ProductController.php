<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products= Product::paginate(12);
//        $products = Product::all();
        return view('product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create',['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:50',
            'description' => 'required',
            'price' => 'required|integer',
            'image' => 'image|mimes:jpeg,jpg,png,gif,svg|required|max:2048',
            'availability' => 'boolean',
            'category' => 'required'
        ]);

        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->availability = $request->availability;
        $product->category_id = Category::getCategoryIdByTitle($request->category);

        $path = $product->saveImage($request);

        $parts_path = preg_split("#[//\\\]#", $path);
        $product->image = array_pop($parts_path);

        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $categoryTitle = Category::where('id', $product->category_id)->first()->title;
        $image = asset('storage/images/' . $product->image);
        return view('product.show',['product' => $product, 'image' => $image, 'categoryTitle' => $categoryTitle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $image = asset('storage/images/' . $product->image);
        $categories = Category::all();
        return view('product.edit',['product' => $product, 'categories' => $categories, 'image' => $image]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'title' => 'required|max:50',
            'description' => 'required',
            'price' => 'required|integer',
            'image' => 'image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'availability' => 'boolean',
            'category' => 'required'
        ]);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->availability = $request->availability ? $request->availability : 0;
        $product->category_id = Category::getCategoryIdByTitle($request->category);

        if (!empty($request->image) and isset($request->image)) {
            $path = $product->saveImage($request);

            $parts_path = preg_split("#[//\\\]#", $path);
            $product->image = array_pop($parts_path);
        }

        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->availability == 1) {
            $product->availability = 0;
        } else {
            $product->availability = 1;
        }

        $product->save();

        return redirect()->back();
    }
}
