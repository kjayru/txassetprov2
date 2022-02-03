@extends('layouts.frontend.appinterna')


@section('content')
<section>
<div id="gracias">


    <div class="container">
        <div class="card">
            <div class="card-body paddincard">
                <div class="row justify-content-center">
                    <div class="col-md-9 text-center">
                        <h1>Thank you!</h1>
                        <p>Your pay has been sent successfully</p>

                    </div>
                    <div class="col-md-9 text-center">
                        <h1>{{ $event->title }}</h1>
                        <p>You will receive your receipt and instructions to your email</p>

                    </div>
                    <div class="col-md-9 text-center">
                        <a href="/training-calendar" class="btn btn-danger btn-medium">Schedule another training</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</section>

@endsection
