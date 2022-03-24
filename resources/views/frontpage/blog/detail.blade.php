@extends('layouts.frontend.app2')


@section('content')

<section id="blog-detail">
    <div id="emp-contact_mov" class="separador2" style="background: url(/storage/{{$post->banner}}) center 0 no-repeat; background-size:cover;">
        <div class="container">
            <div class="row banner">
            </div>
        </div>
    </div>

</section>

<section id="blogdetail" class="separador2">
    <div class="container">

        <div class="card sinborder">
            <div class="card-body paddincard ">



                <div class="row justify-content-center">
                    <div class="col-md-3 text-center">
                        <img src="/images/Emblema-blanco.png" class="img-fluid">
                    </div>
                </div>



                    <div class="row justify-content-center">
                        <div class="col-md-12 titlesection text-center">
                            <h2 class="tituloblack">{{@strtoupper($post->titulo)}}</h2>
                          
                           
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-md-4 text-right">
                            <span class="date__post">{{strftime("%h %d, %Y", date (strtotime($post->created_at)) )}}</span>
                        </div>
                    </div>


                <div class="row justify-content-center">
                    <div class="col-md-12 col-12">
                        <div class="card__texto">
                            {!! @$post->contenido !!}
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                   @foreach($articulos as $art)

                    <div class="col-md-4 col-12">
                        <div class="card card__post">
                            <a href="/blog/{{$art['slug']}}" class="post__link" >
                                <div class="card__imagen" style="background:url('/storage/{{$art['card']}}') no-repeat center center; background-size:cover;"> </div>
                                <div class="card__titulo">
                                    {{strtoupper($art['titulo'])}}
                                </div>
                                <div class="card__resumen">
                                    {{@$art['resumen']}}
                                </div>
                                <div class="card__date">
                                    {{@$art['fecha']}}
                                </div>
                            </a>
                        </div>
                    </div>

                   @endforeach
                </div>
                <div class="row justify-content-between">
                    <div class="col-md-4 col-12 mt-5">
                        <a href="{{ url()->previous() }}" class="btn btn__back">Back</a>
                    </div>
                  
                </div>

            </div>
        </div>
    </div>
</section>



@endsection
