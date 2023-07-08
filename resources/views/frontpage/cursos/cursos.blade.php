@extends('layouts.frontend.cursos.app')
@section('content')

      <div class="banner color__banner">
          <div class="container-fluid">
            <div class="row justify-content-between mb-0 pb-0">
              <div class="col-md-4">
                  <div class="breadcrum">
                    <ul>
                      <li><a href="/" class="breadcrum__link chevron"><img src="/images/Emblema-blanco.png" alt=""></a></li>
                      <li><a href="/courses/all" class="breadcrum__link "> Cursos</a></li>
                     
                  </ul>
                  </div>
              </div>
              <div class="col-md-1 text-right">
                  <div class="cart">
                      <ul>
                        <li><a href="/user" class="cart__link"><i class="fa fa-user-circle" aria-hidden="true"></i></a></li>
                        <li><a href="/cart" class="cart__link"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                      </ul>
                  </div>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="banner__titulo">Our Courses</div>
              </div>
            </div>
          </div>
      </div>

      <div class="grilla">
          <div class="container grilla__cursos">
              <div class="row">
                @foreach($cursos as $curso) 
                  <div class="col-md-4">
                      <div class="grilla__cursos__card">
                          <div class="grilla__cursos__card__imagen">
                              <img src="/images/curso1.png" class="img-fluid">
                          </div>
                          <div class="grilla__cursos__card__contenido">
                            <div class="post__nombre">
                                <a href="/course/{{$curso->slug}}">{{$curso->titulo}}</a> 
                            </div>
                            <div class="post__texto">
                              {{$curso->resumen}}
                            </div>
                            <a href="/course/{{$curso->slug}}" class="post__link">${{$curso->precio}} USD</a>
                          </div>
                      </div>
                  </div>                            
                @endforeach     
              </div>     
          </div>
      </div>

@endsection
