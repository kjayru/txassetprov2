@extends('layouts.frontend.appinterna')


@section('content')
<section id="section">
    <div id="detallecard">

        <div class="container">

            <div class="card">
                <div class="card-body paddincard sombra">
                    <div class="row justify-content-center">
                        <div class="col-md-12 text-center rowtitle">
                            <img src="/images/Emblema-gris.png" class="img-fluid">
                            <h2 class="titulo3">{{ $event->title}}</h2>
                        </div>
                    </div>

                <div class="row">
                    <div class="col-md-12 contenido">
                        <p><strong>Price:</strong> ${{ $event->price}}<br>
                            <strong>Duration:</strong> {{ $event->duration}} hours
                        </p>
                        <p><strong>Description:</strong>

                            {!! $event->description !!}

                        </p>

                    </div>

                    <div class="col-md-3">
                        <div class="tiempos">
                            DATE: {{ $event->start_date}}<br>
                            HOUR: {{ $event->start_hour}}
                        </div>

                    </div>
                    <div class="col-md-4 col-12 accessbtn">
                        @guest
                        <a href="/login" class="btn btn-danger btn-rojo">LOGIN OR REGISTER</a>
                        @else
                        <a href="#" class="btn btn-danger btn-rojo" id="payButton">PAY NOW</a>
                        @endguest
                    </div>
                    <div class="col-md-5 col-12 accessbtn">
                        <a href="/training-calendar" class="btn btn-primary float-right btn-azul">BACK TO CALENDAR</a>
                    </div>
                </div>


            </div>
        </div>

</div>

    </div>
</section>
@guest 

@else
<script src="//js.stripe.com/v3/"></script>

<script>
var stripe = Stripe('{{ env('STRIPE_PUBLIC_KEY')}}');

    var responseContainer = document.getElementById('paymentResponse');

    var checkoutButton = document.getElementById('payButton');

checkoutButton.addEventListener('click', function() {

    let token = $("meta[name=csrf-token]").attr("content");
    var data = {eventId: {{$event->id}},_token:token};

  fetch('/process', {
    method: 'POST',
    body: JSON.stringify(data),
    headers:{
        'Content-Type': 'application/json'
    }
  })
  .then(function(response) {
    return response.json();
  })
  .then(function(session) {
    return stripe.redirectToCheckout({ sessionId: session.id });
  })
  .then(function(result) {

    if (result.error) {
      console("errro "+result.error.message);
    }
  })
  .catch(function(error) {
    console.error('Error:', error);
  });
});
</script>
@endguest
@endsection
