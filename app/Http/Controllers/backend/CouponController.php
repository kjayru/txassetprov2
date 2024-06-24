<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController extends Controller
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
        $cupones = Coupon::orderBy('id','desc')->get();
        return view('backend.cupon.index',['cupones'=>$cupones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.cupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vale = new Coupon();

        //generar cupon
        $codigo = Coupon::generarCupon();
        $vale->cupon = $codigo;
        $vale->monto_descuento = $request->monto;
        $vale->estado = $request->estado;
        $vale->save();

        return redirect()->route('cupon.index')
        ->with('info','Coupon created');

    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cupon = Coupon::find($id);
        return view('backend.cupon.edit',['cupon'=>$cupon]);
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
      
        $cupon = Coupon::find($id);
        $cupon->monto_descuento = $request->monto;
        if(isset($request->estado)){
        $cupon->estado = $request->estado;
        }else{
            $cupon->estado = null;
        }
        $cupon->save();

        return redirect()->route('cupon.index')
        ->with('info','Coupon updated');
    }

    public function destroy(Request $request)
    {

        Coupon::find($request->id)->delete();
        return redirect()->route('cupon.index')
        ->with('info','Coupon deleted');
    }
}
