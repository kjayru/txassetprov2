<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Event;

class TrainingController extends Controller
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
        $lists = Event::orderBy('id','desc')->get();
        return view('backend.trainings.index',['lists'=>$lists]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.trainings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Event();
        $event->title = $request->title;
        $event->slug = Str::slug($request->title, '-');
        $event->price = $request->price;
        $event->duration = $request->duration;
        $event->excerpt = $request->excerpt;
        $event->description = $request->description;

        $event->start_date = $request->start_date;
        $event->start_hour = $request->start_hour;

        $event->save();

        return redirect()->route('training.index',['id' => $event->id ])
        ->with('info','Nota creada satisfactoriamente');

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);

        return view('backend.trainings.edit',['event'=>$event]);
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
        $event = Event::find($id);

        $event->title = $request->title;
        $event->slug = Str::slug($request->title, '-');


        $event->price = $request->price;
        $event->duration = $request->duration;
        $event->excerpt = $request->excerpt;
        $event->description = $request->description;

        $event->start_date = $request->start_date;
        $event->start_hour = $request->start_hour;

        $event->save();

        return redirect()->route('training.index',['id' => $event->id ])
        ->with('info','Event updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        Event::find($request->id)->delete();

        return redirect()->route('training.index')
        ->with('info','Event deleted');
    }
}
