@extends('layouts.frontend.app2')


@section('content')

<section id="training">
    <div id="emp-contact" class="separador2 parallaxie" style="background: url(/images/Banner-Quote2-Cambios01.png) center 0 no-repeat; background-size:cover;">
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

<section id="contacto" class="separador2">
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
                            <h2 class="tituloblack">BLOG</h2>
                            
                        </div>
                    </div>


                <div class="row justify-content-center">
                   
                        @foreach($posts as $post)
                            <div class="col-md-4 col-12">
                                <div class="card card__post">
                                    <a href="/blog/{{$post['slug']}}" class="post__link" >
                                        <div class="card__imagen" style="background:url('storage/{{$post['card']}}') no-repeat center center; background-size:cover;"> </div>
                                        <div class="card__titulo">
                                            {{strtoupper($post['titulo'])}}
                                        </div>
                                        <div class="card__resumen">
                                            {{@$post['resumen']}}
                                        </div>
                                        <div class="card__date">
                                            {{@$post['fecha']}}
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    
                </div>


            </div>
        </div>
    </div>
</section>



@endsection
