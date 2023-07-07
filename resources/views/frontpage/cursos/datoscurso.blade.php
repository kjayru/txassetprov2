@extends('layouts.frontend.cursos.app')
@section('content')
@php
 use App\Models\UserCourse;
 use App\Models\ChapterQuizOption;
 use App\Models\UserChapterQuizOption;
@endphp
<div class="banner color__banner">
	<div class="container-fluid">
		<div class="row justify-content-between">
			<div class="col-md-4">
				<div class="breadcrum">
					<ul>
						<li><a href="/" class="breadcrum__link">Home</a></li>
						<li><span>></span><a href="#" class="breadcrum__link "> Cursos</a></li>
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
						<div class="encurso__intro">
							@if($content!=null)
								  1. {{$content->titulo}}
							@else
								Question about the chapter
							@endif
						</div>
						
					@if($content!=null)
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
											
											poster="MY_VIDEO_POSTER.jpg"
											data-setup="{}"
										>
											<source src="/storage/{{@$content->video}}" type="video/mp4" />
											
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
								  <div class="encurso__capitulo__titulo">
											{{$content->titulo}}
								  </div>
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
									<a href="#" class="encurso__footer__link">Continue with questions</a>
							</div>
						@endif
					@else
					<div class="quiz__preguntas" style="display:{{$completado==false?"block":"none"}}" >
						<input type="hidden" name="chapter_id" value="{{$chapter_id}}">
						@foreach ($quizes as $key=> $quiz)
						
							<div class="card__question" style="display:{{$key==0?'block':'none'}}">
								{{$key+1}}. {{$quiz->question}}
								<input type="hidden" name="quiz_id" value="{{$quiz->id}}">
								<div class="card__question__opciones">
								@foreach($quiz->chapterquizoptions as $j=>$q)
									
										<div class="form-check">
										<input class="form-check-input" type="radio" name="respuesta" value="{{$q->id}}" id="respuesta{{$j}}">
										<label class="form-check-label" for="respuesta{{$j}}">
											{{$q->option}}
										</label>
										</div>
				
								@endforeach
										
							  </div>
							  <a href="#" data-quizid="{{$quiz->id}}" class="btn btn-default btn__quiz">Next</a>	
							</div>
						@endforeach
					</div>

						<div class="quiz__resultados" style="display:{{$completado==true?"block":"none"}}">

							<div class="quiz__resultados__titulo">Resultados</div>
							<div class="quiz__resultados__respuesta">
								{{UserChapterQuizOption::aciertos($user_id,$chapter_id)}} question answer correctly
							</div>
							<div class="quiz__resultados__barra">
								<div class="barra__roja" style="width:{{UserChapterQuizOption::porcentaje($user_id,$chapter_id)}}%"></div>
							</div>
							<div class="quiz__resultados__tiempo">
								your time: <span>00:00:20</span>
							</div>
						</div>
						<div class="quiz__desarrollado">

							@foreach ($quizes as $key=> $quiz)
						
								<div class="card__question">
									{{$key+1}}. {{$quiz->question}}
									<input type="hidden" name="quiz_id" value="{{$quiz->id}}">
									<div class="card__question__opciones">
									@foreach($quiz->chapterquizoptions as $j=>$q)
											<div class="form-check @if(ChapterQuizOption::isCorrect($q->id,$user_id)==true)  acierto @else noacierto @endif @if(ChapterQuizOption::resultUser($q->id,$user_id)==true) resultuser @endif @if(ChapterQuizOption::getResult($q->id)==$q->id) resulcorrect @endif">	
											<input class="form-check-input" type="radio" name="respuesta{{$q->id}}" value="{{$q->id}}"  @if(ChapterQuizOption::getResult($q->id)==$q->id) checked @endif id="respuesta{{$j}}">
											<label class="form-check-label" for="respuesta{{$j}}">
												{{$q->option}}
											</label>
											</div>	
										
									@endforeach
											
									</div>
								
								</div>
							@endforeach

						</div>


						<div class="quiz__botones"  style="display:{{$completado==true?"block":"none"}}">
							<div class="row">
								<div class="col-md-4">
									<a href="#" class="btn btn__blue btn__view">View questions</a>
								</div>
								<div class="col-md-4">
									<a href="#" class="btn btn__blue btn__restart">Restart Test</a>
								</div>
								<div class="col-md-4">
									<a href="#" class="btn btn__red btn__continue">Continue</a>
								</div>
							</div>
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
											@foreach($contenidos as $k => $cont)
													<li class="encurso__temas__lista__item {{UserCourse::capitulo($user_course_id,$cont['capitulo_id'])?"active":""}}"><span>{{$k+1}}</span>
														{{@$cont['capitulo_titulo']}}
														
															<ul class="encurso__temas__lista__item__sublista active">
																@foreach($cont['contenidos'] as $c)
																	<li class="encurso__temas__lista__item__sublista__item {{UserCourse::contenido($user_course_id,$cont['capitulo_id'],$c['id'])?"finalizado":""}}">
																		{{@$c['titulo']}}
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