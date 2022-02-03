<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use App\Models\Order;
use App\Models\Event;
use App\Models\Stripe as SP;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\Order as Orden;
use App\Mail\Notificacion;

class CheckoutController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
   }

     public function index($slug){

        $course = Event::where('slug',$slug)->first();


        return view('frontpage.checkout',['course'=>$course]);
     }

     public function success($seskey){

        $user_id = Auth::id();
        $user = User::where('id',$user_id)->first();

        $ev = SP::where('txn_id',$seskey)->first();

        $product = Event::where('id',$ev->event_id)->first();

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

                    $iname = $user->name;
                    $email = $customer->email;
                    $transactionID = $intent->id;
                    $paidAmount = $intent->amount;
                    $paidAmount = ($paidAmount/100);
                    $paidCurrency = $intent->currency;
                    $paymentStatus = $intent->status;

                    $order =  new Order();
                    $order->name = $iname;
                    $order->email = $email;
                    $order->item_name = $product->title;
                    $order->item_number =  $product->id;
                    $order->item_price =   $product->price;
                    $order->item_price_currency = "usd";
                    $order->paid_amount = $paidAmount;
                    $order->paid_amount_currency = $paidCurrency;
                    $order->txn_id = $transactionID;
                    $order->payment_status =$paymentStatus;
                    $order->checkout_session_id = $seskey;
                    $order->user_id = $user_id;
                    $order->save();

                }
            }
        }



        //send email



          $data = ["html" => $product->title];
          Mail::to($user->email)->send(new Orden($data));


          Mail::to(env("MAIL_CONTACT"))->send(new Notificacion());

         return view('frontpage.success',['event'=>$product]);
     }

     public function cancel(Request $request){

        return view('frontpage.cancel');
    }


     public function process(Request $request){
       
        $user_id = Auth::id();
        $event = Event::where('id',$request->eventId)->first();


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
                            'name' => $event->title,
                            'metadata' => [
                                'pro_id' => $event->id
                            ]
                            ],
                            'unit_amount' => $event->price*100,
                             'currency' => 'usd',

                        ],
                        'quantity' => 1,
                        'description' => $event->excerpt,

                ]],
                'mode' => 'payment',
                'success_url' =>    env('HOST_URL').'/success/{CHECKOUT_SESSION_ID}',
                'cancel_url' => env('HOST_URL').'/cancel',
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

            $st = new SP;
            $st->txn_id = $session['id'];
            $st->user_id = $user_id;
            $st->event_id = $request->eventId;

            $st->save();

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




}

