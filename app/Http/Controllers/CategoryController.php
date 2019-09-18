<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        $categories = Category::paginate(7);
        return view('category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
            'title' => 'required|max:50',
//            'description' => 'required',
//            'description' => 'required|max:1000',
            'seo_words' => 'required',
//            'seo_words' => 'required|max:100',
            'seo_description' => 'required',
//            'seo_description' => 'required|max:150',
            'availability' => 'boolean'
        ]);

        $category = new Category();
        $category->title = $request->title;
        $category->seo_words = $request->seo_words;
        $category->seo_description = $request->seo_description;
        $category->availability = $request->availability ? $request->availability : 0;
        $category->save();

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('category.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit',['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'title' => 'required|max:50',
//            'description' => 'required',
//            'description' => 'required|max:1000',
            'seo_words' => 'required',
//            'seo_words' => 'required|max:100',
            'seo_description' => 'required',
//            'seo_description' => 'required|max:150',
            'availability' => 'boolean'
        ]);

        $category->title = $request->title;
        $category->seo_words = $request->seo_words;
        $category->seo_description = $request->seo_description;
        $category->availability = $request->availability ? $request->availability : 0;
        $category->save();

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->availability == 1) {
            $category->availability = 0;
        } else {
            $category->availability = 1;
        }

        $category->save();

        return redirect()->back();
    }
}
