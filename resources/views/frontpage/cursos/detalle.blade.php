

@extends('layouts.frontend.cursos.app')
@section('content')

<div class="banner color__banner">
   <div class="container-fluid">
     <div class="row justify-content-between mb-0 pb-0">
       <div class="col-md-4">
           <div class="breadcrum">
               <ul>
                   <li><a href="/" class="breadcrum__link chevron"><img src="/images/Emblema-blanco.png" alt=""></a></li>
                   <li><a href="/courses/all" class="breadcrum__link chevron"> Courses</a></li>
                   <li><a href="#" class="breadcrum__link "> {{$curso->titulo}}</a></li>
               </ul>
           </div>
       </div>

      @include('layouts.backend.partials.menucurso')
     </div>
   </div>
  
</div>


     <div class="detalle">
          <div class="container">
                    <div class="row">
                              <div class="col-md-8">
                                     <div class="detalle__titulo">
                                     {{$curso->titulo}}
                                     </div>  
                                     <div class="detalle__subtitulo">
                                        {{@$curso->responsable}} 
                                     </div> 

                                     <div class="detalle__video">
                                        <div class="detalle__video__header">
                                                  <a href="#" class="detalle__video__header__link detalle__header__home__course active" data-content="general">Information</a>
                                                  <a href="#contenido" class="detalle__video__header__link detalle__header__home__course" data-content="secciones" data-id="{{$curso->id}}">Content</a>
                                        </div>
                                        <div class="detalle__video__player">
                                          <div class="encurso__video">
                                       
                                             <div class="encurso__video__player">
                                              
                                                 
                   
                                                 <video
                                                    id="my-player"
                                                    class="video-js"
                                                    controls
                                                    preload="auto"
                                                    
                                                    poster="MY_VIDEO_POSTER.jpg"
                                                    data-setup="{}"
                                                 >
                                                    <source src="/storage/{{@$curso->video}}" type="video/mp4" />
                                                    
                                                    <p class="vjs-no-js">
                                                    To view this video please enable JavaScript, and consider upgrading to a
                                                    web browser that
                                                    <a href="https://videojs.com/html5-video-support/" target="_blank"
                                                       >supports HTML5 video</a
                                                    >
                                                    </p>
                                                 </video>
                   
                                              </div>
                                          </div>
                                        </div>

                                     </div>

                                 

                                     <div class="detalle__informacion interlineado">
                                        <strong>Course Information</strong>

                                        {!! $curso->contenido !!}
                                    </div>

                                     <div class="detalle__contenido">
                                      
                                      
                                        <div class="detalle__contenido__capitulo ">
                                                  <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="detalle__contenido__capitulo__titulo">
                                                                    Contents
                                                            </div>                                                           
                                                         </div>
                                                  </div>
                                              
                                                  @foreach($curso->chapters as $k => $chapter)
                                                  <div class="row justify-content-between interlineado">
                                                            <div class="col-md-7">
                                                                      <span>{{$k+1}}</span>  {{$chapter->title}}
                                                            </div>
                                                            <div class="col-md-4">
                                                                     <ul class="capitulos">
                                                                              @if(isset($chapter->video)) <li class="videocap">Chapter video</li>@endif
                                                                              @if($chapter->reading==1) <li class="capitulo">Chapter reading</li>@endif
                                                                              @if($chapter->audio==1)  <li class="audio">Chapter audio</li>@endif
                                                                              @if($chapter->quiz==1)  <li class="question">Questions about the chapter</li>@endif
                                                                      </ul> 
                                                            </div>
                                                  </div>
                                                  @endforeach
                                        </div>
                                       

                                     </div>
                                     <div id="contenido" class="detalle__secciones detalle__contenido">

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
                                                                      <li class="date">Available from  {{ @strftime("%B %d, %Y", date (strtotime(@$curso->disponible )) )}} </li>
                                                                      <li class="capitulo">{{@$curso->capitulos}} chapters</li>
                                                                        @if($curso->audio=="Yes")
                                                                      <li class="audio">Audio:{{@$curso->language}}</li>
                                                                       @else
                                                                       <li class="audio">Audio:No</li>
                                                                      @endif   

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
                                                  Courses you might be interested in

                                        </div>
                              </div>
                    </div>
                    <div class="row">
                    {{-- <div class="col-md-4">
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
                              </div> --}}
                              @foreach ($relacionados as $row )
                                  
                             
                              <div class="col-md-4">
                                        <div class="grilla__cursos__card">
                                                  <div class="grilla__cursos__card__imagen">
                                                            <img src="/storage/{{$row->banner}}" class="img-fluid">
                                                  </div>
                                                  <div class="grilla__cursos__card__contenido">
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
                    </div>
          </div>
      </div>
@endsection