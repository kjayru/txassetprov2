@extends('layouts.frontend.app2')


@section('content')

<section id="industries">
    <div  class=" industry__banner" >
        <div class="container">
            <div class="row">
                
                <div class="col-md-6 order-sm-1 order-2">
                    <img src="/storage/{{@$industry->banner}}" class="img-fluid">
                </div>

                <div class="col-md-6 order-sm-2 order-1">
                    <div class="row justify-content-between">
                        <div class="col-md-6 col-6">
                            <h2 class="titulo__industria ">{{$category->name}}</h2>
                        </div>
                    </div>
                    
                    <div class="categoria">{{@$industry->titulo}}</div>
                </div>
            </div>
           
            
        </div>
    </div>

</section>

<section id="industries__content" class="separador2">
    <div class="container">
        <div class="row ">
           
            <div class="col-md-4  order-sm-1 order-2">
                    <div class="categorias__side">
                        Discover all the industries we serve
                    </div>
                    <ul class="categorias__lista">
                        @foreach($categories as $cat)
                        <li class="lista__item">
                            <a href="/industry/{{$cat->slug}}" class="list__link {{{ (Request::is("industry/".$cat->slug."*") ? 'active' : '') }}}">{{$cat->name}}</a>
                        </li>
                        @endforeach
                    </ul>
            </div>
            <div class="col-md-8  order-sm-2 order-1">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card card__industry">
                            <div class="card__titulo">{{@$industry->titulo}}</div>
                            {!! @$industry->contenido !!}
                        </div>
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="col-md-4 col-12">
                        <a href="{{ url()->previous() }}" class="btn btn__back">Back</a>
                    </div>
                    <div class="col-md-4 col-12 text-right">
                        <a href="/" data-section="contact" class="btn btn-quote  btq-foot inclass shadowred">Get quote</a>
                    </div>
                </div>
            </div>
           
           
        </div>
      
    </div>
</section>


@endsection
