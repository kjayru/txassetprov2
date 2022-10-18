<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use Session;
use Carbon\Carbon;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use App\Models\Order;
use App\Models\UserCourse;
use App\Models\CourseOrder;

use App\Models\Stripe as SP;

use Illuminate\Support\Facades\Mail;
use App\Mail\Order as Orden;
use App\Mail\Notificacion;


class CartController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
   }

   

    public function sign(){
        
        if(Auth::check()==false){
            return redirect('/login');
        }
        return view('frontpage.cart.firma');
    }

    public function signRegister(Request $request){
       
        $user_id = Auth::id();
        $user = User::find($user_id);

        $perfil = Profile::where('user_id',$user_id)->first();
        if(!isset($perfil->signature)){
            $perfil->signature = $request->dataURL;
            $perfil->email = $request->email;
            $perfil->legalname = $request->legalname;
            $perfil->save();
        }

       
        
        $carrito=null;
        
             $carrito = Session::get('cart');
          
         
        $contador = (count($carrito->items));
 
        if($contador>1){
            $titulo="Varios cursos";
            $resumen="";
        }else{
            foreach($carrito->items as $curso){
                $titulo= $curso['curso']->titulo;
                $resumen=$curso['curso']->resumen;
            }
           
        }

        //Stripe

        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $response = array(
            'status' => 0,
            'error' => array(
                'message' => 'invalid Request!'
            )
            );

            $order_id = Carbon::now()->timestamp;

       if(empty($request->checkoutSession)){
           try{
               $session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'product_data' => [
                            'name' => $titulo,
                            'metadata' => [
                                'pro_id' => $order_id
                            ]
                            ],
                            'unit_amount' => $carrito->total*100,
                             'currency' => 'usd',

                        ],
                        'quantity' => $carrito->cantidad,
                        'description' => $resumen,

                ]],
                'mode' => 'payment',
                'success_url' =>    env('HOST_URL').'/cart/success/{CHECKOUT_SESSION_ID}',
                'cancel_url' => env('HOST_URL').'/cart/cancel',
               ]);
           }catch(Exception $e){
               $api_error = $e->getMessage();
           };

           if(empty($api_error) && $session){

            $response = array(
                'status' => 1,
                'message' => 'Checkout session created successfull!',
                'sessionId' => $session['id']
            );

            /*$st = new SP;
            $st->txn_id = $session['id'];
            $st->user_id = $user_id;
            $st->event_id = $request->eventId;

            $st->save();*/
           
            
           }else{
            $response = array(
                'status' => 0,
                'error' => array(
                    'message' => 'checkout session creation failed! '.$api_error
                ),
            );
           };
       }

       return response()->json([ 'id' => $session['id']]);
        

    }


    public function success($seskey){

        $user_id = Auth::id();
        $user = User::where('id',$user_id)->first();

        $ev = SP::where('txn_id',$seskey)->first();

        $carrito = Session::get('cart');


        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        try {
            $checkout_session = \Stripe\Checkout\Session::retrieve($seskey);
        } catch (Exception $e) {
           $api_error = $e->getMessage();
        }

        if(empty($api_error)&& $checkout_session){
            try {
                $intent = \Stripe\PaymentIntent::retrieve($checkout_session->payment_intent);
            } catch (\Stripe\Exception\ApiErrorException $e) {
                $api_error = $e->getMessafe();
            }

            try {
                $customer = \Stripe\Customer::retrieve($checkout_session->customer);
            } catch (\Stripe\Exception\ApiErrorException $e) {
                $api_error = $e->getMessafe();
            }


            if(empty($api_error) && $intent){
                if($intent->status == 'succeeded'){

                    $order_id = Carbon::now()->timestamp;
                  
                    $iname = $user->name;
                    $email = $customer->email;
                    $transactionID = $intent->id;
                    $paidAmount = $intent->amount;
                    $paidAmount = ($paidAmount/100);
                    $paidCurrency = $intent->currency;
                    $paymentStatus = $intent->status;

                    $order = new CourseOrder();
                    $order->name = $iname;
                    $order->email = $email;
                    $order->course = serialize($carrito);
                    $order->price = $carrito->total;
                    $order->amount = $carrito->total;
                    $order->currency = "usd";
                    $order->txn_id = $transactionID;
                    $order->payment_status = $paymentStatus;
                    $order->checkout_session_id = $seskey;
                    $order->user_id = $user_id;
                    $order->order_id = $order_id;
                    $order->save();


                    $cursoid=null;
                    foreach($carrito->items as $item){

                        $curso = new UserCourse();
                        $curso->user_id = $user_id;
                        $curso->course_id = $item['curso']->id;
                        $curso->fecha_inicio = date("Y-m-d");
                        $curso->dias_activo = $item['curso']->tiempovalido;
                        $curso->save();

                        $cursoid[] = ["id"=>$item['curso']->id];
                    }
                }
            }
        }

       // Session::forget('cart');

        //send email



         // $data = ["html" => $product->title];
         //Mail::to($user->email)->send(new Orden($data));


         // Mail::to(env("MAIL_CONTACT"))->send(new Notificacion());

         return view('frontpage.cart.success',['ids'=>$cursoid]);
     }

     public function cancel(Request $request){

        return view('frontpage.cart.cancel');
    }


     public function process(Request $request){
       
        $user_id = Auth::id();

         //carrito
        
         $carrito=null;
         if (Session::get('cart')) {
             $carrito = Session::get('cart');
          
         }
        $contador = (count($carrito->items));
 
        if($contador>1){
            $titulo="Varios cursos";
            $resumen="";
        }else{
            foreach($carrito->items as $curso){
                $titulo= $curso['curso']->titulo;
                $resumen=$curso['curso']->resumen;
            }
           
        }
        $order_id = Carbon::now()->timestamp;
       
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $response = array(
            'status' => 0,
            'error' => array(
                'message' => 'invalid Request!'
            )
            );

       if(empty($request->checkoutSession)){
           try{
               $session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'product_data' => [
                            'name' =>$titulo,
                            'metadata' => [
                                'pro_id' => $order_id
                            ]
                            ],
                            'unit_amount' => $carrito->total*100,
                             'currency' => 'usd',

                        ],
                        'quantity' => $carrito->cantidad,
                        'description' => $resumen,

                ]],
                'mode' => 'payment',
                'success_url' =>    env('HOST_URL').'/cart/success/{CHECKOUT_SESSION_ID}',
                'cancel_url' => env('HOST_URL').'/cart/cancel',
               ]);
           }catch(Exception $e){
               $api_error = $e->getMessage();
           };

           if(empty($api_error) && $session){

            $response = array(
                'status' => 1,
                'message' => 'Checkout session created successfull!',
                'sessionId' => $session['id']
            );

            /*$st = new SP;
            $st->txn_id = $session['id'];
            $st->user_id = $user_id;
            $st->event_id = $request->eventId;

            $st->save();*/

           }else{
            $response = array(
                'status' => 0,
                'error' => array(
                    'message' => 'checkout session creation failed! '.$api_error
                ),
            );
           };
       }

       return response()->json([ 'id' => $session['id']]);

     }

     public function test(){
        return view('frontpage.cart.success');
     }

}
