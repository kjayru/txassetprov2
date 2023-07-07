

@extends('layouts.frontend.cursos.app')
@section('content')

     <div class="detalle">
          <div class="container">
                    <div class="row">
                              <div class="col-md-8">
                                     <div class="detalle__titulo">
                                     {{$curso->titulo}}
                                     </div>  
                                     <div class="detalle__subtitulo">
                                        {{$curso->subtitulo}}
                                     </div> 

                                     <div class="detalle__video">
                                        <div class="detalle__video__header">
                                                  <a href="#" class="detalle__video__header__link detalle__header__mycourse active" data-content="general">Information</a>
                                                  <a href="#" class="detalle__video__header__link detalle__header__mycourse" data-content="secciones" data-id="{{$curso->id}}">Content</a>
                                        </div>
                                        <div class="detalle__video__player">
                                                  <img src="/storage/{{$curso->banner}}" class="img-fluid">
                                        </div>

                                     </div>

                                     <div class="detalle__informacion interlineado">
                                        <strong>Course Information</strong>

                                        {!! $curso->contenido !!}
                                    </div>

                                     <div class="detalle__contenido">
                                      @foreach($curso->chapters as $chapter)
                                        <div class="detalle__contenido__capitulo interlineado">
                                                  <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="detalle__contenido__capitulo__titulo">
                                                                      {{$chapter->title}}
                                                            </div>                                                           
                                                         </div>
                                                  </div>
                                              
                                                  
                                                  <div class="row justify-content-between">
                                                            <div class="col-md-4">
                                                                      <span>1</span>Introduccion
                                                            </div>
                                                            <div class="col-md-4">
                                                          
                                                                                                                            
                                                                      <ul class="capitulos">

                                                                              @if(isset($chapter->video)) <li class="videocap">Introduccion</li>@endif
                                                                              @if($chapter->reading==1) <li class="capitulo">Chapter reading</li>@endif
                                                                              @if($chapter->audio==1)  <li class="audio">Chapter audio</li>@endif
                                                                              @if($chapter->audio==1)  <li class="question">Questions about the chapter</li>@endif
                                                                      </ul>
                                                           
                                                            </div>
                                                  </div>
                                        </div>
                                        @endforeach

                                     </div>
                                     <div class="detalle__secciones">

                                     </div>


                              </div>

                              <div class="col-md-4">
                                        <div class="detalle__costo">
                                                  <div class="detalle__costo__precio">
                                                            ${{$curso->precio}} <span>USD</span>
                                                  </div>
                                                  <div class="detalle__costo__boton">
                                                            <a href="/cart" data-id="{{$curso->id}}" class="detalle__costo__boton__link">Buy</a>
                                                  </div>
                                                  <div class="detalle__costo__propiedades">
                                                            <ul>
                                                                      <li class="date">Available from april 21, 2021 {{@$curso->disponible}}</li>
                                                                      <li class="capitulo">{{@$curso->capitulos}} chapters</li>
                                                                      <li class="audio">Audio:{{@$curso->audio}}</li>
                                                                      <li class="level">Level:{{@$curso->nivel}}</li>
                                                                      <li class="access">Access:{{@$curso->tiempovalido}} days to finish the course</li>
                                                            </ul>
                                                  </div>
                                        </div>

                              </div>
                    </div>
          </div>
      </div>

      <div class="relacionados">
          <div class="container">
                    <div class="row">
                              <div class="col-md-6">
                                        <div class="relacionados__titulo">
                                                  Course you might be interested in

                                        </div>
                              </div>
                    </div>
                    <div class="row">
                    <div class="col-md-4">
                                        <div class="grilla__cursos__card">
                                                  <div class="grilla__cursos__card__imagen">
                                                            <img src="/images/curso1.png" class="img-fluid">
                                                  </div>
                                                  <div class="grilla__cursos__card__contenido">
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
                                        <div class="grilla__cursos__card">
                                                  <div class="grilla__cursos__card__imagen">
                                                            <img src="/images/curso1.png" class="img-fluid">
                                                  </div>
                                                  <div class="grilla__cursos__card__contenido">
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
                                        <div class="grilla__cursos__card">
                                                  <div class="grilla__cursos__card__imagen">
                                                            <img src="/images/curso1.png" class="img-fluid">
                                                  </div>
                                                  <div class="grilla__cursos__card__contenido">
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
                    </div>
          </div>
      </div>
@endsection



<div class="detalle__contenido__capitulo interlineado">
   <div class="row">
          <div class="col-md-12">
             <div class="detalle__contenido__capitulo__titulo">
                       Capitulo 1-Editado
             </div>                                                           
          </div>
   </div>

   
   <div class="row justify-content-between">
      <div class="col-md-12">
                       <span>1. </span>
                       Ipsum loren 1
      </div>
       <div class="col-md-12">
                       <span>2. </span>
                       ipsum lorem 2  
      </div>
                    <div class="detalle__contenido__capitulo interlineado">
   <div class="row">
          <div class="col-md-12">
             <div class="detalle__contenido__capitulo__titulo">
                       Capitulo 2
             </div>                                                           
          </div>
   </div>

   
   <div class="row justify-content-between"><div class="col-md-12">
                       <span>1. </span>
                       ipsum lorem 1
                   </div> <div class="detalle__contenido__capitulo interlineado">
   <div class="row">
          <div class="col-md-12">
             <div class="detalle__contenido__capitulo__titulo">
                       Chapter one ipsum lorem
             </div>                                                           
          </div>
   </div>

   
   <div class="row justify-content-between"><div class="col-md-12">
                       <span>2. </span>
                       capitulo course 3
                   </div> <div class="detalle__contenido__capitulo interlineado">
   <div class="row">
          <div class="col-md-12">
             <div class="detalle__contenido__capitulo__titulo">
                       Chapter-San
             </div>                                                           
          </div>
   </div>

   
   <div class="row justify-content-between"> <div class="detalle__contenido__capitulo interlineado">
   <div class="row">
          <div class="col-md-12">
             <div class="detalle__contenido__capitulo__titulo">
                       Capítulo 2-San
             </div>                                                           
          </div>
   </div>

   
   <div class="row justify-content-between"> <div class="detalle__contenido__capitulo interlineado">
   <div class="row">
          <div class="col-md-12">
             <div class="detalle__contenido__capitulo__titulo">
                       Capítulo 3 - San
             </div>                                                           
          </div>
   </div>

   
   <div class="row justify-content-between"> <div class="detalle__contenido__capitulo interlineado">
   <div class="row">
          <div class="col-md-12">
             <div class="detalle__contenido__capitulo__titulo">
                       Capítulo 4 - San
             </div>                                                           
          </div>
   </div>

   
   <div class="row justify-content-between"> <div class="detalle__contenido__capitulo interlineado">
   <div class="row">
          <div class="col-md-12">
             <div class="detalle__contenido__capitulo__titulo">
                       Capítulo 5 - San
             </div>                                                           
          </div>
   </div>

   
   <div class="row justify-content-between"> <div class="detalle__contenido__capitulo interlineado">
   <div class="row">
          <div class="col-md-12">
             <div class="detalle__contenido__capitulo__titulo">
                       Capítulo 6 - San
             </div>                                                           
          </div>
   </div>

   
   <div class="row justify-content-between"> <div class="detalle__contenido__capitulo interlineado">
   <div class="row">
          <div class="col-md-12">
             <div class="detalle__contenido__capitulo__titulo">
                       Capítulo 8 - San
             </div>                                                           
          </div>
   </div>

   
   <div class="row justify-content-between"></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div>