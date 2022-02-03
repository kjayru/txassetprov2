@extends('layouts.frontend.app2')


@section('content')

<section id="training">
    <div id="emp-contact" class="separador2 parallaxie"  style='background: url("/images/Banner-Quote2-Cambios01.png")'>
        <div class="container">


            <div class="row banner">
                <div class="col-md-3 d-none d-sm-block ">
                    <div class="logo">
                        <img src="/images/Logo-TAP.png" alt="" class="img-fluid">
                    </div>
                </div>
                
            </div>
        </div>
    </div>

</section>

<section id="blogdetail" class="separador2">
    <div class="container">

        <div class="card">
            <div class="card-body paddincard sombra">



                <div class="row justify-content-center">
                    <div class="col-md-3 text-center">
                        <img src="/images/Emblema-blanco.png" class="img-fluid">
                    </div>
                </div>



                    <div class="row justify-content-center">
                        <div class="col-md-12 titlesection text-center">
                            <h2 class="tituloblack">{{@$post->titulo}}</h2>
                            
                        </div>
                    </div>


                <div class="row justify-content-center">
                    <div class="col-md-12 col-12">
                        <div class="card__texto">
                            {!! @$post->contenido !!}
                        </div>
                    </div>
                </div>

                <div class="row justify-content-between">
                    <div class="col-md-4 col-12">
                        <a href="{{ url()->previous() }}" class="btn btn__back">Back</a>
                    </div>
                  
                </div>

            </div>
        </div>
    </div>
</section>



@endsection
