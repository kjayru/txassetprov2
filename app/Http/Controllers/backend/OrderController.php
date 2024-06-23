<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\CourseOrder;

class OrderController extends Controller
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
        $orders = CourseOrder::orderBy('id','desc')->get();
        return view('backend.orders.index',['orders'=>$orders]);
    }




    public function show($id)
    {
        $order = CourseOrder::find($id);
        return view('backend.orders.show',['order'=>$order]);
    }


}
