<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $category = Category::first();
        $products = Product::paginate(8);
        return view('index', ['products' => $products, 'category' => $category]);
    }
}
