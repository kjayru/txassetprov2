

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
                                                  <a href="#" class="detalle__video__header__link detalle__header__home__course" data-content="secciones" data-id="{{$curso->id}}">Content</a>
                                        </div>
                                        <div class="detalle__video__player">
                                                  <img src="/storage/{{$curso->banner}}" class="img-fluid">
                                        </div>

                                     </div>

                                     <div  class="detalle__informacion interlineado">
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
                                                            <div class="col-md-4">
                                                                      <span>{{$k+1}}</span>  {{$chapter->title}}
                                                            </div>
                                                            <div class="col-md-4">
                                                                     <ul class="capitulos">
                                                                              @if(isset($chapter->video)) <li class="videocap">Chapter video</li>@endif
                                                                              @if($chapter->reading==1) <li class="capitulo">Chapter reading</li>@endif
                                                                              @if($chapter->audio==1)  <li class="audio">Chapter audio</li>@endif
                                                                              @if($chapter->audio==1)  <li class="question">Questions about the chapter</li>@endif
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
                                                                      <li class="date">Available from   {{@$curso->disponible}}</li>
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