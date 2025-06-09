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
use App\Models\UserSign;
use App\Models\Coupon;
use App\Mail\Sign;
use App\Models\Stripe as SP;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use App\Mail\Order as Orden;
use App\Mail\Notificacion;
use App\Mail\Compra;
use Illuminate\Support\Facades\Log;


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

    // public function signRegister(Request $request){

    //     $user_id = Auth::id();
    //     $user = User::find($user_id);

    //     $carrito=null;
    //     $titulo_curso = null;
    //     $carrito = Session::get('cart');

    //     $contador = (count($carrito->items));

    //     if($contador>1){
    //         $titulo="Varios cursos";
    //         $resumen="";
    //     }else{
    //         foreach($carrito->items as $curso){
    //             $titulo= $curso['curso']->titulo;
    //             $resumen=$curso['curso']->resumen;
    //             $titulo_curso = $curso['curso']->titulo;
    //         }

    //     }




    //     $perfil = UserSign::where('user_id',$user_id)->count();
    //     $code = Carbon::now()->timestamp;

    //     if($perfil == 0){
    //         $firma =new UserSign();
    //         $firma->firma = $request->dataURL;
    //         $firma->email = $request->email;
    //         $firma->legalname = $request->legalname;
    //         $firma->user_id = $user_id;

    //         $firma->fullname = $request->fullname;
    //         $firma->initial = $request->initial;
    //         $firma->code = $code;
    //         $firma->save();

    //         //sendmail
    //         $seguridad = Crypt::encryptString($user_id);


    //         $data = ["seguridad"=>$seguridad,'name'=>$user->name,'titulo'=>$titulo_curso,'code'=>$code];


    //         Mail::to($user->email)->send(new Sign($data));

    //     }else{
    //         return false;
    //     }


    //     $unit_amount_cents = (int) round($carrito->total * 100); // valor original
    //     $quantity = max(1, intval($carrito->cantidad)); // nunca 0


    //     //aplica cupon 
    //     if (session()->get('cupon')) {
    //         $cupon = session()->get('cupon');
    //         $result = Coupon::where('cupon', $cupon)->where('estado', '1')->first();
        
    //         if ($result) {
    //             $descuento = $unit_amount_cents * $result->monto_descuento / 100;
    //             $unit_amount_cents = (int) round($unit_amount_cents - $descuento);
    //         }
    //     }

    //     $total_amount = $unit_amount_cents * $quantity;

    //     if ($total_amount < 50) {
    //         return response()->json([
    //             'status' => 0,
    //             'error' => ['message' => 'El monto total a pagar debe ser al menos $0.50 USD después del cupón.']
    //         ]);
    //     }

    //     //Stripe

    //     Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

    //     $response = array(
    //         'status' => 0,
    //         'error' => array(
    //             'message' => 'invalid Request!'
    //         )
    //         );

    //         $order_id = Carbon::now()->timestamp;

    //    if(empty($request->checkoutSession)){
    //        try{
              

    //            $session = \Stripe\Checkout\Session::create([
    //             'payment_method_types' => ['card'],
    //             'line_items' => [[
    //                 'price_data' => [
    //                     'product_data' => [
    //                         'name' => $titulo,
    //                         'metadata' => ['pro_id' => $order_id]
    //                     ],
    //                     'unit_amount' => $unit_amount_cents,
    //                     'currency' => 'usd',
    //                 ],
    //                 'quantity' => $quantity,
    //                 'description' => $resumen,
    //             ]],
    //             'mode' => 'payment',
    //             'success_url' => env('HOST_URL') . '/cart/success/{CHECKOUT_SESSION_ID}',
    //             'cancel_url' => env('HOST_URL') . '/cart/cancel',
    //         ]);

    //         CourseOrder::create([
    //             'user_id' => $user_id,
    //             'name' => $user->name,
    //             'email' => $user->email,
    //             'course' => serialize($carrito),
    //             'price' => number_format($carrito->total, 2, '.', ''),
    //             'order_id' => $order_id,
    //             'currency' => 'usd',
    //             'amount' => number_format($total_amount / 100, 2, '.', ''), // en dólares
    //             'txn_id' => null, // se actualizará en el webhook
    //             'checkout_session_id' => $session->id,
    //             'payment_status' => 'pending',
    //             'cupon' => $cupon ?? null,
    //             'cupon_mount' => isset($descuento) ? number_format($descuento / 100, 2, '.', '') : null,
    //         ]);

    //        }catch(Exception $e){
    //            $api_error = $e->getMessage();
    //        };

    //        if(empty($api_error) && $session){

    //         $response = array(
    //             'status' => 1,
    //             'message' => 'Checkout session created successfull!',
    //             'sessionId' => $session['id']
    //         );

    //        }else{
    //         $response = array(
    //             'status' => 0,
    //             'error' => array(
    //                 'message' => 'checkout session creation failed! '.$api_error
    //             ),
    //         );
    //        };
    //    }

    //    return response()->json([ 'id' => $session['id']]);


    // }


public function signRegister(Request $request)
{

    /* ───────────────────────────────────
     * 1. Validaciones básicas
     * ─────────────────────────────────── */
    $user_id = Auth::id();
    if (!$user_id) {
        return response()->json([
            'status' => 0,
            'error'  => ['message' => 'Usuario no autenticado']
        ]);
    }

    $user = User::findOrFail($user_id);

    $carrito = Session::get('cart');
    if (!$carrito || empty($carrito->items)) {
        return response()->json([
            'status' => 0,
            'error'  => ['message' => 'Carrito vacío']
        ]);
    }

    /* ───────────────────────────────────
     * 2. Datos del/los curso(s) en el carrito
     * ─────────────────────────────────── */
    $titulo   = 'Varios cursos';
    $resumen  = '';
    $titulo_curso = null;

    if (count($carrito->items) === 1) {
        $firstItem   = reset($carrito->items);
        $titulo      = $firstItem['curso']->titulo;
        $resumen     = $firstItem['curso']->resumen;
        $titulo_curso = $firstItem['curso']->titulo;
    }

    /* ───────────────────────────────────
     * 3. Registro de firma del usuario
     * ─────────────────────────────────── */
    $perfil     = UserSign::where('user_id', $user_id)->count();
    $timestamp  = Carbon::now()->timestamp;

    if ($perfil === 0) {
        $firma               = new UserSign();
        $firma->firma        = $request->dataURL;
        $firma->email        = $request->email;
        $firma->legalname    = $request->legalname;
        $firma->user_id      = $user_id;
        $firma->fullname     = $request->fullname;
        $firma->initial      = $request->initial;
        $firma->code         = $timestamp;
        $firma->save();

        // Enviar correo de confirmación de firma
        $tokenSeguridad = Crypt::encryptString($user_id);
        $dataMail       = [
            'seguridad' => $tokenSeguridad,
            'name'      => $user->name,
            'titulo'    => $titulo_curso,
            'code'      => $timestamp
        ];
        Mail::to($user->email)->send(new Sign($dataMail));
    } else {
        return response()->json([
            'status' => 0,
            'error'  => ['message' => 'La firma ya fue registrada anteriormente']
        ]);
    }

    /* ───────────────────────────────────
     * 4. Cálculo del importe (con descuento si existe)
     * ─────────────────────────────────── */
    $precioConDescuento = $carrito->total_con_descuento ?? $carrito->total;
    $unit_amount_cents  = (int) round($precioConDescuento * 100);
    $quantity           = max(1, (int) $carrito->cantidad);
    $total_amount       = $unit_amount_cents * $quantity;

 
    if ($total_amount < 50) { // Stripe ≥ 0.50 USD
        return response()->json([
            'status' => 0,
            'error'  => ['message' => 'El monto total a pagar debe ser al menos $0.50 USD después del cupón.']
        ]);
    }

    /* ───────────────────────────────────
     * 5. Creación de la sesión de Checkout en Stripe
     * ─────────────────────────────────── */
    Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
    $order_id   = Carbon::now()->timestamp;
    $session    = null;
    $api_error  = null;

    try {
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'product_data' => [
                        'name'     => $titulo,
                        'metadata' => ['pro_id' => $order_id],
                    ],
                    'unit_amount' => $unit_amount_cents,
                    'currency'    => 'usd',
                ],
                'quantity'    => $quantity,
                'description' => $resumen,
            ]],
            'mode'         => 'payment',
            'success_url'  => env('HOST_URL') . '/cart/success/{CHECKOUT_SESSION_ID}',
            'cancel_url'   => env('HOST_URL') . '/cart/cancel',
        ]);
    } catch (Exception $e) {
        $api_error = $e->getMessage();
    }

    if (!$session) {
        return response()->json([
            'status' => 0,
            'error'  => ['message' => 'Error al crear la sesión de pago: ' . $api_error]
        ]);
    }

    /* ───────────────────────────────────
     * 6. Guardar la orden preliminar en base de datos
     * ─────────────────────────────────── */
    $montoDescuento = $carrito->total - $precioConDescuento;

    CourseOrder::create([
        'user_id'            => $user_id,
        'name'               => $user->name,
        'email'              => $user->email,
        'course'             => serialize($carrito),
        'price'              => number_format($carrito->total, 2, '.', ''),               // precio original
        'order_id'           => $order_id,
        'currency'           => 'usd',
        'amount'             => number_format($precioConDescuento, 2, '.', ''),           // precio final con descuento
        'txn_id'             => null,                                                    // se actualizará en el webhook
        'checkout_session_id'=> $session->id,
        'payment_status'     => 'pending',
        'cupon'              => $carrito->cupon ?? null,
        'cupon_mount'        => $montoDescuento > 0 ? number_format($montoDescuento, 2, '.', '') : null,
    ]);

    /* ───────────────────────────────────
     * 7. Respuesta al frontend
     * ─────────────────────────────────── */
    return response()->json([
        'status'    => 1,
        'message'   => 'Checkout session creada exitosamente',
        'sessionId' => $session->id
    ]);
}


     public function cancel(Request $request){

        return view('frontpage.cart.cancel');
    }


    //  public function process(Request $request){
        
    //     $user_id = Auth::id();

    //    $verificacion= UserSign::where('user_id',$user_id)->count();


    //     if($verificacion== 0){
    //         return response()->json(['firmado'=>false]);
    //     }

    //      //carrito

    //      $carrito=null;
    //      if (Session::get('cart')) {
    //          $carrito = Session::get('cart');

    //      }
    //     $contador = (count($carrito->items));

    //     if($contador>1){
         
    //         $titulo="Varios cursos";
    //         $resumen="";
    //     }else{
    //         foreach($carrito->items as $curso){
    //             $titulo= $curso['curso']->titulo;
    //             $resumen=$curso['curso']->resumen;
    //         }

    //     }
    //     $order_id = Carbon::now()->timestamp;

    //     //aplicar cupon

    //     if(session()->get('cupon')){

    //         $cupon=session()->get('cupon');
    //         $result = Coupon::where('cupon',$cupon)->where('estado','1')->first();
    //         $monto_cupon = $result->monto_descuento;
    //         $descuento = $carrito->total*$monto_cupon/100;
    //         $nuevo_precio = $carrito->total - $descuento;

    //         $carrito->total = $nuevo_precio;
    //     }

    //     Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

    //     $response = array(
    //         'status' => 0,
    //         'error' => array(
    //             'message' => 'invalid Request!'
    //         )
    //         );


    //    if(empty($request->checkoutSession)){
    //        try{
    //            $session = \Stripe\Checkout\Session::create([
    //             'payment_method_types' => ['card'],
    //             'line_items' => [[
    //                 'price_data' => [
    //                     'product_data' => [
    //                         'name' =>$titulo,
    //                         'metadata' => [
    //                             'pro_id' => $order_id
    //                         ]
    //                         ],
    //                        'unit_amount' => (int) round($carrito->total * 100),
    //                          'currency' => 'usd',

    //                     ],
    //                     'quantity' => $carrito->cantidad,
    //                     'description' => $resumen,

    //             ]],
    //             'mode' => 'payment',
    //             'success_url' =>    env('HOST_URL').'/cart/success/{CHECKOUT_SESSION_ID}',
    //             'cancel_url' => env('HOST_URL').'/cart/cancel',
    //            ]);
    //        }catch(Exception $e){
    //            $api_error = $e->getMessage();
    //        };

    //        if(empty($api_error) && $session){

    //         $response = array(
    //             'status' => 1,
    //             'message' => 'Checkout session created successfull!',
    //             'sessionId' => $session['id']
    //         );

    //         $st = new SP;
    //         $st->txn_id = $session['id'];
    //         $st->user_id = $user_id;
    //         $st->event_id = $request->eventId;

    //         $st->save();

    //        }else{
    //         $response = array(
    //             'status' => 0,
    //             'error' => array(
    //                 'message' => 'checkout session creation failed! '.$api_error
    //             ),
    //         );
    //        };
    //    }

    //    return response()->json([ 'id' => $session['id']]);

    //  }

    // public function process(Request $request)
    // {
    
    //     $user_id = Auth::id();
    //     $user = User::where('id',$user_id)->first();
    //     $verificacion = UserSign::where('user_id', $user_id)->count();

    //     Log::channel('stripe_webhooks')->info('Inicio proceso', [
    //         'user_id'    => $user_id,
    //     ]);

    //     if ($verificacion == 0) {
    //         return response()->json(['firmado' => false]);
    //     }

    //     // Recupera el carrito de la sesión
    //     $carrito = Session::get('cart');

    //     // Verificación y armado del título y resumen de cursos
    //     $contador = count($carrito->items);
    //     if ($contador > 1) {
    //         $titulo = "Varios cursos";
    //         $resumen = "";
    //     } else {
    //         foreach ($carrito->items as $curso) {
    //             $titulo = $curso['curso']->titulo;
    //             $resumen = $curso['curso']->resumen;
    //         }
    //     }
        
    //     // Asignar un identificador para la orden
    //     $order_id = Carbon::now()->timestamp;

    //     // Aplicar cupón si existe
    //     if (session()->get('cupon')) {
    //         $cupon = session()->get('cupon');
    //         $result = Coupon::where('cupon', $cupon)->where('estado', '1')->first();
    //         $monto_cupon = $result->monto_descuento;
    //         $descuento = $carrito->total * $monto_cupon / 100;
    //         $nuevo_precio = $carrito->total - $descuento;
    //         $carrito->total = $nuevo_precio;
    //     }

    //     // Configura Stripe
    //     Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

    //     try {
    //         $sessionStripe = \Stripe\Checkout\Session::create([
    //             'payment_method_types' => ['card'],
    //             'line_items' => [[
    //                 'price_data' => [
    //                     'product_data' => [
    //                         'name' => $titulo,
    //                         'metadata' => [
    //                             'pro_id' => $order_id
    //                         ]
    //                     ],
    //                     // Convierte a entero en centavos y redondea
    //                     'unit_amount' => (int) round($carrito->total * 100),
    //                     'currency' => 'usd',
    //                 ],
    //                 'quantity' => $carrito->cantidad,
    //                 'description' => $resumen,
    //             ]],
    //             'mode' => 'payment',
    //             'success_url' => env('HOST_URL') . '/cart/success/{CHECKOUT_SESSION_ID}',
    //             'cancel_url' => env('HOST_URL') . '/cart/cancel',
    //         ]);
    //     } catch(Exception $e) {
    //         $api_error = $e->getMessage();
    //         Log::channel('stripe_webhooks')->info('prueba logica', [
    //             'api_error'    => $api_error,
    //             'sessionStripe' => $sessionStripe
    //         ]);
    //     }

    //     Log::channel('stripe_webhooks')->info('prueba logica', [
    //         'api_error'    => empty($api_error),
    //         'sessionStripe' => $sessionStripe
    //     ]);

    //     if (empty($api_error) && $sessionStripe) {
       

          
    //         $iname = $user->name;
    //         $email = $user->email;

    //         $order = new CourseOrder();
    //         $order->name = $iname;
    //         $order->email = $email;
    //         $order->course = serialize($carrito);
            
    //             $order->price = $carrito->total;
    //             $order->amount = $carrito->total;
               
    //         $order->currency = "usd";
           
    //         $order->payment_status = 'pending';
    //         $order->checkout_session_id = $sessionStripe['id'];
    //         $order->user_id = $user_id;
    //         $order->order_id = $order_id;
    //         if (session()->get('cupon')) {
    //         $order->cupon = $cupon;
    //         $order->cupon_mount = $nuevo_precio;
    //         }
    //         $order->save();

    //         Log::channel('stripe_webhooks')->info('prueba logica', [
    //             'carrito'    => serialize($carrito),
    //             'order' => $order
    //         ]);

        

         
    //         $response = [
    //             'status' => 1,
    //             'message' => 'Checkout session created successfully!',
    //             'sessionId' => $sessionStripe['id']
    //         ];
    //     } else {
    //         $response = [
    //             'status' => 0,
    //             'error' => ['message' => 'Checkout session creation failed! ' . $api_error],
    //         ];
    //         Log::channel('stripe_webhooks')->info('prueba logica', [
    //             'error'    => "error",
    //             'response' => $response
    //         ]);
    //     }

    //     return response()->json([ 'id' => $sessionStripe['id'] ]);
    // }

    public function process(Request $request)
    {
        $user_id = Auth::id();
        $user = User::findOrFail($user_id);
        $verificacion = UserSign::where('user_id', $user_id)->count();

        Log::channel('stripe_webhooks')->info('Inicio proceso', [
            'user_id' => $user_id,
        ]);

        if ($verificacion == 0) {
            return response()->json(['firmado' => false]);
        }

        $carrito = Session::get('cart');

        if (!$carrito || empty($carrito->items)) {
            return response()->json([
                'status' => 0,
                'error' => ['message' => 'Carrito vacío']
            ]);
        }

        // Armar título y resumen
        if (count($carrito->items) > 1) {
            $titulo = "Varios cursos";
            $resumen = "";
        } else {
            foreach ($carrito->items as $curso) {
                $titulo = $curso['curso']->titulo;
                $resumen = $curso['curso']->resumen;
            }
        }

        // Asignar identificador único para la orden
        $order_id = Carbon::now()->timestamp;

        // Obtener monto con descuento si aplica
        $precioConDescuento = $carrito->total_con_descuento ?? $carrito->total;
        $unit_amount_cents = (int) round($precioConDescuento * 100);
        $quantity = max(1, (int) $carrito->cantidad);
        $total_amount = $unit_amount_cents * $quantity;

        if ($total_amount < 50) {
            return response()->json([
                'status' => 0,
                'error' => ['message' => 'El monto total a pagar debe ser al menos $0.50 USD después del cupón.']
            ]);
        }

        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $sessionStripe = null;
        $api_error = null;

        try {
            $sessionStripe = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'product_data' => [
                            'name' => $titulo,
                            'metadata' => ['pro_id' => $order_id]
                        ],
                        'unit_amount' => $unit_amount_cents,
                        'currency' => 'usd',
                    ],
                    'quantity' => $quantity,
                    'description' => $resumen,
                ]],
                'mode' => 'payment',
                'success_url' => env('HOST_URL') . '/cart/success/{CHECKOUT_SESSION_ID}',
                'cancel_url' => env('HOST_URL') . '/cart/cancel',
            ]);
        } catch (Exception $e) {
            $api_error = $e->getMessage();
            Log::channel('stripe_webhooks')->error('Stripe error', [
                'error' => $api_error
            ]);
        }

        if (!$sessionStripe) {
            return response()->json([
                'status' => 0,
                'error' => ['message' => 'Fallo al crear sesión de pago: ' . $api_error]
            ]);
        }

        // Calcular monto de descuento
        $montoDescuento = $carrito->total - $precioConDescuento;

        // Guardar orden
        $order = new CourseOrder();
        $order->name = $user->name;
        $order->email = $user->email;
        $order->course = serialize($carrito);
        $order->price = number_format($carrito->total, 2, '.', ''); // original
        $order->amount = number_format($precioConDescuento, 2, '.', ''); // con descuento
        $order->currency = "usd";
        $order->payment_status = 'pending';
        $order->checkout_session_id = $sessionStripe['id'];
        $order->user_id = $user_id;
        $order->order_id = $order_id;
        $order->cupon = $carrito->cupon ?? null;
        $order->cupon_mount = $montoDescuento > 0 ? number_format($montoDescuento, 2, '.', '') : null;
        $order->save();

        Log::channel('stripe_webhooks')->info('Orden guardada', [
            'order_id' => $order->id,
            'user_id' => $user_id
        ]);

        return response()->json([
            'status' => 1,
            'message' => 'Checkout session created successfully!',
            'sessionId' => $sessionStripe['id']
        ]);
    }



    //  public function success($seskey){

    //     $user_id = Auth::id();
    //     $user = User::where('id',$user_id)->first();

    //     $ev = SP::where('txn_id',$seskey)->first();
    //     $carrito = Session::get('cart');

    //     $curso = null;
    //     $cursoid=null;

    //     Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
    //     try {
    //         $checkout_session = \Stripe\Checkout\Session::retrieve($seskey);
    //     } catch (Exception $e) {
    //        $api_error = $e->getMessage();
    //     }

    //     if(empty($api_error)&& $checkout_session){
    //         try {
    //             $intent = \Stripe\PaymentIntent::retrieve($checkout_session->payment_intent);
    //         } catch (\Stripe\Exception\ApiErrorException $e) {
    //             $api_error = $e->getMessage();
    //         }

    //         try {
    //             $customer = \Stripe\Customer::retrieve($checkout_session->customer);
    //         } catch (\Stripe\Exception\ApiErrorException $e) {
    //             $api_error = $e->getMessage();
    //         }


    //         if(empty($api_error) && $intent){
    //             if($intent->status == 'succeeded'){

    //                 $coupon = null;
    //                 $montofinal = null;
    //                 $nuevo_precio = null;
                   
    //                 $order_id = Carbon::now()->timestamp;

    //                 $iname = $user->name;
    //                 $email = $customer->email;
    //                 $transactionID = $intent->id;
    //                 $paidAmount = $intent->amount;
    //                 $paidAmount = ($paidAmount/100);
    //                 $paidCurrency = $intent->currency;
    //                 $paymentStatus = $intent->status;

    //                 $order = new CourseOrder();
    //                 $order->name = $iname;
    //                 $order->email = $email;
    //                 $order->course = serialize($carrito);
                   
    //                     $order->price = @$carrito->total;
    //                     $order->amount = @$carrito->total;
                    
    //                 $order->currency = "usd";
    //                 $order->txn_id = $transactionID;
    //                 $order->payment_status = $paymentStatus;
    //                 $order->checkout_session_id = $seskey;
    //                 $order->user_id = $user_id;
    //                 $order->order_id = $order_id;
    //                 $order->cupon = $coupon;
    //                 $order->cupon_mount = $montofinal;
    //                 $order->save();


    //                 foreach($carrito->items as $item){
    //                     $curso = new UserCourse();
    //                     $curso->user_id = $user_id;
    //                     $curso->course_id = $item['curso']->id;
    //                     $curso->fecha_inicio = date("Y-m-d");
    //                     $curso->dias_activo = $item['curso']->tiempovalido;
    //                     $curso->save();

    //                     $cursoid = $item['curso']->id;
    //                 }
    //             }
    //         }
    //     }
    //     $user_course_id = $curso->id;
    //     $curso = Course::find($cursoid);
    //     $data = ['nombre' => $user->name,'curso'=>$curso];

    //     Mail::to(env("MAIL_CONTACT"))->send(new Compra($data));

    //    Session::forget('cart');
    //    Session::forget('cupon');

    //    $course = Course::find($cursoid);


    //      return view('frontpage.cart.success',['course'=>$course,'user_course'=>$curso,'user_course_id'=>$user_course_id]);
    //  }

    public function success($seskey)
    {
        // Obtiene el usuario autenticado
        $user_id = Auth::id();
        $user = User::find($user_id);

        // Recupera la orden previamente registrada a partir del checkout_session_id
        $order = CourseOrder::where('checkout_session_id', $seskey)->first();

        $curso = (unserialize($order->course));

        $primerItem = reset($curso->items); 
     
        $curso_id = $primerItem['id'];

        $course = Course::find($curso_id);

        if (!$order) {
            // Redirige a una página de error si no se encuentra la orden
            return redirect()->route('cart.error')->with('error', 'No se encontró la orden.');
        }

        // Configura Stripe para realizar una verificación opcional de la sesión
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        try {
            $checkout_session = \Stripe\Checkout\Session::retrieve($seskey);
        } catch (Exception $e) {
            // Si ocurre un error, redirige a la página de error
            return redirect()->route('cart.error')->with('error', 'Error al recuperar la sesión de Stripe.');
        }

        // Nota: La lógica crítica (actualización del estado, asignación de cursos y envío de correo)
        // se realiza en el webhook, por lo que aquí solo mostramos una confirmación al usuario.

        // Limpia la sesión del carrito y del cupón, si aún están activos
        Session::forget('cart');
        Session::forget('cupon');

        // Opcional: Puede mostrar mensajes según el estado de la orden o realizar alguna verificación extra
        // Por ejemplo, si el pago aún está pendiente, se puede informar al usuario.
        // En este ejemplo, asumimos que la orden ha sido actualizada a 'succeeded' a través del webhook.

        $usercourse = UserCourse::where('user_id',$user_id)->orderBy('id','desc')->first();

        return view('frontpage.cart.success', [
            'order' => $order,
            'user'  => $user,
            'course'=>$course,
            'user_course_id'=>$usercourse->id
        ]);
    }

     public function test(){
        return view('frontpage.cart.success');
     }

}
