<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::where('main_active', '=', 1)->paginate(12);
        return view('index', ['products' => $products, 'categories' => $categories]);
    }
}
