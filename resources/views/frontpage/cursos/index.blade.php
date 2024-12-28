@extends('layouts.frontend.cursos.app')
@section('content')
<div id="contenido">

          <div id="banner">



            <div class="container-fluid">

              <div class="row justify-content-end menu__carrito mb-0 pb-0">


                @include('layouts.backend.partials.menucurso')
              </div>



                <div class="row">

                  <div class="banner__home d-flex align-items-center">
                  <div class="col-md-2">
                      <div class="logo">
                          <img src="/images/TAP-Academy-Logo-CURSOS.png" alt="" class="img-fluid">
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
                    <video id="video__curso" class="plyr" controls preload="auto" poster="/images/video2024.jpeg">
                        <source src="/video/TAPfinalized7.mp4" type="video/mp4" />
                        <p class="vjs-no-js">
                            To view this video please enable JavaScript, and consider upgrading to a
                            web browser that
                            <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                        </p>
                    </video>
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

                    <div class="col-md-3 col-12 beneficios__contenido__card">
                      <div class="card">
                        <div class="card-container">
                          <h3 class="flexibility">Flexibility</h3>
                          <p>Classes whenever you want, at the time that suits you best, you set your own pace</p>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3 col-12 beneficios__contenido__card">
                      <div class="card">
                        <div class="card-container">
                          <h3 class="learning">Learning with experts</h3>
                          <p>Learn valuable techniques and methods explained by experts</p>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3 col-12 beneficios__contenido__card">
                      <div class="card">
                        <div class="card-container">
                          <h3 class="front">Front row</h3>
                          <p>Comprehensive videos and audios of the highest quality so that you do not miss any details</p>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3 col-12 beneficios__contenido__card">
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
                        @desktop
                                <div class="row">

                                          <div class="col-md-6 col-sm-6 col-lg-6 col-12">
                                                    <div class="learn__titulo">Learn without limits</div>
                                                    <div class="learn__texto">
                                                    Improve your personal development skills with our training
                                                    </div>
                                                    <a href="/courses/all" class="btn__cursos color__azul learn__link">Go to courses</a>
                                          </div>

                                          <div class="col-md-6 col-sm-6 col-lg-6 col-12">

                                          </div>
                                </div>
                        @enddesktop
                        @mobile

                        <div class="row">

                            <div class="col-md-6 col-sm-6 col-lg-6 col-12">
                                      <div class="learn__titulo">Learn without limits</div>
                                      <div class="learn__texto">
                                      Improve your personal development skills with our training
                                      </div>
                                      <a href="/courses/all" class="btn__cursos color__azul learn__link">Go to courses</a>
                            </div>

                            <div class="col-md-6 col-sm-6 col-lg-6 col-12">
                             <img src="/images/banner-training-nuevo-logo-mobile.png" class="img-fluid">
                            </div>
                  </div>


                        @endmobile
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
                                                    @desktop
                                                    <img src="/images/como-funciona.png" class="img-fluid">
                                                    @enddesktop

                                                    @mobile
                                                    <img src="/images/como-funciona-mobile.png" class="img-fluid">
                                                   @endmobile
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
                                          <a href="/courses/all" class="btn__cursos fondo__rojo efecto__boton garantia__link">Explore all courses</a>
                                </div>
                      </div>
            </div>
        </div>



        <div class="modal videocurso fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="embed-responsive embed-responsive-16by9">
                            <div id="player"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
