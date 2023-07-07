

@extends('layouts.frontend.cursos.app')
@section('content')

     <div class="detalle">
          <div class="container">
                    <div class="row">
                              <div class="col-md-8">
                                     <div class="detalle__titulo">
                                     {{@$curso->titulo}}
                                     </div>  
                                     <div class="detalle__subtitulo">
                                        {{@$curso->subtitulo}}
                                     </div> 

                                     <div class="detalle__video">
                                        <div class="detalle__video__header">
                                                  <a href="#" class="detalle__video__header__link active" data-content="general">Information</a>
                                                  <a href="#" class="detalle__video__header__link " data-content="secciones" data-id="{{@$curso->id}}">Content</a>
                                        </div>
                                        <div class="detalle__video__player">
                                                  <img src="/storage/{{@$curso->banner}}" class="img-fluid">
                                        </div>

                                     </div>

                                     <div class="detalle__informacion interlineado">
                                        <strong>Course Information</strong>

                                        {!! @$curso->contenido !!}
                                    </div>

                                     <div class="detalle__contenido">
                                        @if(isset($curso))
                                      @foreach($curso->chapters as $chapter)
                                        <div class="detalle__contenido__capitulo interlineado">
                                                  <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="detalle__contenido__capitulo__titulo">
                                                                      {{@$chapter->title}}
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
                                                                              @if(@$chapter->reading==1) <li class="capitulo">Chapter reading</li>@endif
                                                                              @if(@$chapter->audio==1)  <li class="audio">Chapter audio</li>@endif
                                                                              @if(@$chapter->audio==1)  <li class="question">Questions about the chapter</li>@endif
                                                                      </ul>
                                                           
                                                            </div>
                                                  </div>
                                        </div>
                                        @endforeach
                                        @endif
                                     </div>
                                     <div class="detalle__secciones">

                                     </div>


                              </div>

                              <div class="col-md-4">
                                        <div class="detalle__costo">
                                                  <div class="detalle__costo__precio">
                                                            ${{@$curso->precio}} <span>USD</span>
                                                  </div>
                                                  <div class="detalle__costo__boton">
                                                            <a href="/cart" data-id="{{@$curso->id}}" class="detalle__costo__boton__link">Buy</a>
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

      
@endsection