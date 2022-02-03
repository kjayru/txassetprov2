@extends('layouts.frontend.app2')


@section('content')

<section id="industries">
    <div  class=" industry__banner" >
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="row justify-content-between">
                        <div class="col-md-4 col-6">
                            <h2 class="titulo ">Industries we server</h2>
                        </div>
                    </div>
                    
                    <div class="categoria">{{@$category->name}}</div>
                </div>
                <div class="col-md-6">
                    <img src="/storage/{{@$category->banner}}" class="img-fluid">
                </div>
            </div>
           
            
        </div>
    </div>

</section>

<section id="industries__content" class="separador2">
    <div class="container">
        <div class="row ">
            <div class="col-md-4 order-sm-1 order-2">
                    <div class="categorias__side">
                        Discover all the industries we serve
                    </div>
                   
                    <ul class="categorias__lista">
                        @foreach($categories as $cat)
                        <li class="lista__item">
                            <a href="/industry/{{$cat->slug}}" class="list__link  {{{ (Request::is("industry/".$cat->slug."*") ? 'active' : '') }}}">{{$cat->name}}</a>
                        </li>
                        @endforeach
                    </ul>
            </div>
            <div class="col-md-8 order-sm-2 order-1">
                <div class="row">
                    @foreach($industries as $ind)
                    <div class="col-md-6">
                        <a href="/industry/{{$category->slug}}/{{$ind->slug}}">
                        <div class="tarjeta" style="background:url('/storage/{{$ind->banner}}') no-repeat center -75px; background-size:cover;">
                            <p class="titulo__industria">
                                {{$ind->titulo}}
                            </p>
                        </div>
                        </a>
                    </div>
                   @endforeach 
                </div>
            </div>
        </div>
      
    </div>
</section>


@endsection
