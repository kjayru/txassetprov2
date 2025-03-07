@extends('layouts.frontend.cursos.app')
@section('content')
@php
 use App\Models\UserCourse;
@endphp
<div class="banner color__banner">
	<div class="container-fluid">
		<div class="row justify-content-between">
			<div class="col-md-4">
				<div class="breadcrum">
					<ul>
						<li><a href="/" class="breadcrum__link">Home</a></li>
						<li><span>></span><a href="/user/my-courses" class="breadcrum__link "> Courses</a></li>
						<li><span>></span><a href="#" class="breadcrum__link active">OC Pepper Spray/Conflict Resolution</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

</div>

<!--contenido-->
<div class="encurso">
<div class="container">
	<div class="row justify-content-between">

			  <div class="col-md-8 mb-5">
						<div class="encurso__titulo">{{@$curso->titulo}}</div>
						<div class="encurso__subtitulo">{{@$curso->subtitulo}}</div>
						@desktop
                        <div class="encurso__intro">
								  1. {{$content->titulo}}
						</div>
                        @enddesktop

						<div class="encurso__video">
								  <div class="encurso__video__titulo">
											Video introduction
								  </div>
								  <div class="encurso__video__player">



										<video
											id="my-player"
											class="video-js"
											controls
											preload="auto"
                                            vjs-fluid
											poster="/storage/{{@$content->banner}}"
											data-setup="{}"
										>
											<source src="/storage/{{@$content->video}}"  type="video/mp4" />

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

						<div class="encurso__capitulo">
                            @mobile
								  <div class="encurso__capitulo__titulo">
											{{$content->titulo}}
								  </div>
                            @endmobile
								  <div class="encurso__capitulo__contenido">
											<div class="encurso__capitulo__contenido__titulo">
													  Chapter reading
											</div>
											<div class="encurso__capitulo__contenido__texto">
													 		{!!@$content->contenido!!}
											</div>
								  </div>
						</div>

					@if(@$capitulo->audio==1)

						<div class="encurso__audio">
								  <div class="encurso__audio__titulo">
											Chapter audio
								  </div>
								  <div class="encurso__audio__timeline">
											<a href="#" class="timeline__play"><i class="fa fa-play" aria-hidden="true"></i></a>
											<div class="timelinebox">
													  <div class="timelinebox__solid"></div>
											</div>
								  </div>
						</div>
					@endif
					@if(isset($capitulo->quiz_id))
						 <div class="encurso__footer">
								   <a href="#" class="encurso__footer__link disabled"  >Continue with questions</a>
						</div>
					@endif
			  </div>

			  <div class="col-md-3">
						<div class="encurso__temas">
								  <div class="encurso__temas__titulo">
											You have {{@$curso->tiempovalido}} days left to finish the course
								  </div>
								  <ul class="encurso__temas__lista">
									@if(isset($contenidos))

									@foreach($contenidos as $cont)

											<li class="encurso__temas__lista__item {{UserCourse::capitulo($curso->id,$cont['capitulo_id'])?"active":""}}"><span>1</span>
												<a href="#">{{@$cont['capitulo_titulo']}}</a>

													  <ul class="encurso__temas__lista__item__sublista active">
														@foreach($cont['contenidos'] as $c)
																<li class="encurso__temas__lista__item__sublista__item {{UserCourse::contenido($curso->id,$cont['capitulo_id'],$c['id'])?"finalizado":""}}">
																		 <a href="/course/{{$cont['curso_slug']}}/{{$cont['capitulo_slug']}}/{{$c['slug']}}"> {{@$c['titulo']}}</a>
																</li>

														@endforeach
													  </ul>
											</li>
									@endforeach
									@endif

								  </ul>
						</div>
			  </div>

	</div>
</div>
@endsection
