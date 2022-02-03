<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id','desc')->get();

        return view('backend.categories.index',['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name, '-');
        if($request->hasFile('card')) {
            $card = $request->file('card')->store('card');
            $category->card = $card;
        }

        if($request->hasFile('banner')) {
            $banner = $request->file('banner')->store('banner');
            $category->banner = $banner;
        }

        $category->save();

        return redirect()->route('categories.index',['id' => $category->id ])
        ->with('info','Category create successfull');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $category = Category::find($id);

        return view('backend.categories.edit',['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $category->name = $request->name;
        $category->slug = Str::slug($request->name, '-');
        if($request->hasFile('card')) {
            $card = $request->file('card')->store('card');
            $category->card = $card;
        }

        if($request->hasFile('banner')) {
            $banner = $request->file('banner')->store('banner');
            $category->banner = $banner;
        }
        $category->save();

        return redirect()->route('categories.index',['id' => $category->id ])
        ->with('info','Category updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Category::find($request->id)->delete();

        return redirect()->route('categories.index')
        ->with('info','Category deleted');
    }
}
