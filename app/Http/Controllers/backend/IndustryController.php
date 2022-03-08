<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Industry;
use App\Models\Category;

class IndustryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $industries = Industry::orderBy("id","desc")->get();

        return view('backend.industries.index',['industries'=>$industries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.industries.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $industry = new Industry();
        $industry->titulo = $request->titulo;
        $industry->slug = Str::slug($request->titulo, '-');

        $industry->category_id = $request-> categoria;
        if($request->hasFile('banner')) {
            $banner = $request->file('banner')->store('banner');
            $industry->banner = $banner;
        }
        if($request->hasFile('card')) {
            $card = $request->file('card')->store('card');
            $industry->card = $card;
        }

        $industry->orden = $request->orden;

        $industry->contenido = $request->description;

        $industry->save();

        return redirect()->route('industries.index',['id' => $industry->id ])
        ->with('info','Industry satisfactoriamente');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $industry = Industry::find($id);
        $categories = Category::all();

        return view('backend.industries.edit',['industry'=>$industry,'categories'=>$categories]);
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



        $industry = Industry::find($id);

        $industry->category_id = $request-> categoria;
        $industry->titulo = $request->titulo;
        $industry->slug = Str::slug($request->titulo, '-');

        if($request->hasFile('banner')) {
            $banner = $request->file('banner')->store('banner');
            $industry->banner = $banner;
        }
        if($request->hasFile('card')) {
            $card = $request->file('card')->store('card');
            $industry->card = $card;
        }
        $industry->category_id = $request->categoria;

        $industry->orden = $request->orden;
        $industry->contenido = $request->description;


        $industry->save();

        return redirect()->route('industries.index',['id' => $industry->id ])
        ->with('info','Industry updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Industry::find($request->id)->delete();

        return redirect()->route('industries.index')
        ->with('info','Industry deleted');
    }
}
