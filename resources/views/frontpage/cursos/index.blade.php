@extends('layouts.frontend.cursos.app')
@section('content')
<div id="contenido">

          <div id="banner">


            
            <div class="container-fluid">
             
              <div class="row justify-content-end menu__carrito mb-0 pb-0">
                
               
                <div class="col-md-1 text-right">
                    <div class="cart">
                        <ul>
                          <li><a href="/user" class="cart__link"><i class="fa fa-user-circle" aria-hidden="true"></i></a></li>
                          <li><a href="/cart" class="cart__link"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
              </div>


               
                <div class="row">

                  <div class="banner__home d-flex align-items-center">
                  <div class="col-md-2">
                      <div class="logo">
                          <img src="/images/Logo-TAP.png" alt="" class="img-fluid">
                      </div>
                  </div>
                  <div class="col-md-4">
                      <p><span>ONLINE</span><br>CERTIFICATION</p>
                  </div>
                </div>

              </div>


             
            </div>
          </div>
          <div class="cursos__titulo">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-md-9 text-center">
                  <h2>Receive training remotely</h2>
                  <p>The training method that allows you to take classes whenever you want</p>
                </div>
              </div>
            </div>
          </div>
  
          <div class="video">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-md-7">
                  <div class="video__player">
                    <a href="#" class="video__player__link"></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
  
          <div class="beneficios">
            <div class="beneficios__titulo">
              <div class="container">
                <div class="row justify-content-center">
                 
                  <div class="col-md-9 text-center">
                    <h2>Benefits of online classes</h2>
                  </div>
               
                </div>
              </div>
            </div>
            <div class="beneficios__contenido">
              <div class="container">
                <div class="row justify-content-center">
                    
                    <div class="col-md-3">
                      <div class="card">
                        <div class="card-container">
                          <h3 class="flexibility">Flexibility</h3>
                          <p>Classes whenever you want, at the time that suits you best, you set your own pace</p>
                        </div>
                      </div>
                    </div>
  
                    <div class="col-md-3">
                      <div class="card">
                        <div class="card-container">
                          <h3 class="learning">Learning with experts</h3>
                          <p>Learn valuable techniques and methods explained by experts</p>
                        </div>
                      </div>
                    </div>
  
                    <div class="col-md-3">
                      <div class="card">
                        <div class="card-container">
                          <h3 class="front">Front row</h3>
                          <p>Comprehensive videos and audios of the highest quality so that you do not miss any details</p>
                        </div>
                      </div>
                    </div>
  
                    <div class="col-md-3">
                      <div class="card">
                        <div class="card-container">
                          <h3 class="certificate">Certificate</h3>
                          <p>Set yourself apart with an accredited certificate signed by TAP Security Academy</p>
                        </div>
                      </div>
                    </div>
  
  
                </div>
              </div>
            </div>
            <div class="beneficios__boton">
                      <div class="container">
                                <div class="row justify-content-center">
                                          <div class="col-md-6 text-center">
                                                    <a href="/courses/all" class="btn btn__cursos color__rojo beneficios__boton">Explore courses</a>
                                          </div>
                                </div>
                      </div>
            </div>
          </div>
  
          <div class="learn">
            <div class="learn__bloque">
                      <div class="container-fluid">
                                <div class="row">
                                          <div class="col-md-5">
                                                    <div class="learn__titulo">Learn without limits</div>
                                                    <div class="learn__texto">
                                                    Improve your personal development skills with our training
                                                    </div>
                                                    <a href="/courses/all" class="btn__cursos color__azul learn__link">Go to courses</a>
                                          </div>
                                </div>
                      </div>
            </div>
          </div>
  
          <div class="work">
            <div class="container">
                      <div class="row">
                                <div class="col-md-12">
                                          <div class="work__titulo">How do the courses work?</div>
                                          <div class="work__subtitulo">Simple and easy to access</div>
                                          <div class="work__picture text-center">
                                                    <img src="/images/pasos.png" class="img-fluid">
                                          </div>
                                </div>
                      </div>
            </div>
          </div>
  
        </div>
  
        <div class="satisfaccion">
            <div class="container">
                                <div class="row">
                                          <div class="col-md-12 text-center">
                                                    <div class="satisfaccion__titulo">
                                                              100% satisfaction guarantee
                                                    </div>
                                          </div>
                                </div>
                      </div>
            </div>
        <div class="garantia">
           
            <div class="container garantia__grilla">
                      <div class="row">
                                <div class=" col-md-12">
                                          <div class="garantia__grilla__titulo text-center">
                                                    <h2>Newest courses</h2>
                                          </div>
                                </div>
                      </div>
            
                      <div class="row">

                        @foreach ($cursos as $row)
                          
                       
                                <div class="col-md-4">
                                          <div class="garantia__card">
                                                    <div class="garantia__card__imagen">
                                                              <img src="/storage/{{@$row->banner}}" class="img-fluid">
                                                    </div>
                                                    <div class="garantia__card__contenido">
                                                              <div class="post__nombre">
                                                             {{$row->titulo}}
                                                              </div>
                                                              <div class="post__texto">
                                                              {{$row->resumen}}
                                                              </div>
                                                              <a href="/course/{{$row->slug}}" class="post__link">${{$row->precio}} USD</a>
                                                    </div>
                                          </div>
                                </div>

                          @endforeach


                                {{-- <div class="col-md-4">
                                          <div class="garantia__card">
                                                    <div class="garantia__card__imagen">
                                                              <img src="/images/curso1.png" class="img-fluid">
                                                    </div>
                                                    <div class="garantia__card__contenido">
                                                              <div class="post__nombre">
                                                              OC Pepper Spray/ Conflict Resolution
                                                              </div>
                                                              <div class="post__texto">
                                                              Descripción breve del video. Descripción breve del video. Descripción breve del video. Descripción breve del video.
                                                              </div>
                                                              <a href="#" class="post__link">$150 USD</a>
                                                    </div>
                                          </div>
                                </div>
                                <div class="col-md-4">
                                          <div class="garantia__card">
                                                    <div class="garantia__card__imagen">
                                                              <img src="/images/curso1.png" class="img-fluid">
                                                    </div>
                                                    <div class="garantia__card__contenido">
                                                              <div class="post__nombre">
                                                              OC Pepper Spray/ Conflict Resolution
                                                              </div>
                                                              <div class="post__texto">
                                                              Descripción breve del video. Descripción breve del video. Descripción breve del video. Descripción breve del video.
                                                              </div>
                                                              <a href="#" class="post__link">$150 USD</a>
                                                    </div>
                                          </div>
                                
                                </div> --}}
                      </div>
  
                      <div class="row justify-content-center">
                                <div class="col-md-5">
                                          <a href="/courses/all" class="btn__cursos color__rojo garantia__link">Explore all courses</a>
                                </div>
                      </div>
            </div>
        </div>
@endsection