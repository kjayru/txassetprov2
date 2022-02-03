@extends('layouts.frontend.appinterna')


@section('content')


<section id="contacto" class="separador2">
    <div class="container">

        <div class="card">
            <div class="card-body paddincard">



                <div class="row justify-content-center">
                    <div class="col-md-3 text-center">
                        <img src="/images/Emblema-blanco.png" class="img-fluid">
                    </div>
                </div>



                <div class="row justify-content-center">
                    <div class="col-md-12 titlesection text-center">
                        <h2 class="tituloblack">Checkout </h2>

                    </div>
                </div>

                <div class="row justify-content-center" id="checkout">
                    <div class="col-md-6 text-center">
                        <div class="title">{{ $course->title}}</div>
                        <div class="price">${{ $course->price}}</div>
                        <figure> <img src="/images/Logo-TAP.png" class="img-fluid"></figure>
                        <div class="legal">
                            Power by Stripe <a href="#">Terms privacy</a>
                         </div>
                    </div>
                    <div class="col-md-6">

                        <div id="paymentResponse"></div>
                        <button class="stripe-button" id="payButton">Buy Now</button>


                    </div>
                </div>




            </div>
        </div>
    </div>
</section>



@endsection
