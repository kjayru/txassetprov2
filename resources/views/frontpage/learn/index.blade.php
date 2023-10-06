@extends('layouts.frontend.cursos.app')
@section('content')
@php
 use App\Models\UserCourse;
 use App\Models\ChapterQuiz;
 use App\Models\ChapterQuizOption;
 use App\Models\UserChapterQuizOption;
@endphp
<div class="banner color__banner">
	<div class="container-fluid">
		<div class="row justify-content-between">
			<div class="col-md-4">
				<div class="breadcrum">
					<ul>
						<li><a href="/" class="breadcrum__link "><img src="/images/Emblema-blanco.png" alt=""></a></li>
						<li><span>></span><a href="/user/my-courses" class="breadcrum__link "> Courses</a></li>
						<li><span>></span><a href="#" class="breadcrum__link active">{{@$curso->titulo}}</a></li>
					</ul>
				</div>
			</div>

			@include('layouts.backend.partials.menucurso')
		</div>
	</div>

</div>

<!--contenido-->
<div class="encurso">
<div class="container">
	<div class="row justify-content-between">

			  <div class="col-md-8 mb-5">
						<div class="encurso__titulo">{{@$curso->titulo}}</div>
						<div class="encurso__subtitulo">A course with {{@$curso->responsable}}</div>
						<div class="encurso__intro">
							@if($content!=null)
								   {{$content->titulo}}
							@else
								Question about the chapter
							@endif
						</div>

					@if($content!=null)
						<input type="hidden" name="user_course_id" value="{{$user_course_id}}">
						<input type="hidden" name="user_course_chapter_id" value="{{$content->chapter->id}}">
						<input type="hidden" name="user_course_chapter_content_id" value="{{$content->id}}">
					@endif
					@if($content!=null)
						@include('layouts.backend.partials.curso.video')
						@include('layouts.backend.partials.curso.capitulo')

						@if(@isset($content->audio))
							@include('layouts.backend.partials.curso.audio')
						@endif

						@if($url_next_quiz!=null)
							<div class="encurso__footer">

								<a href="/learn/{{$user_course_id}}/{{$url_next_quiz}}/{{$chapter->id}}" class="btn encurso__footer__link {{UserCourse::capitulo($user_course_id,$content->chapter->id)?"":"disabled"}} " role="button" aria-disabled="true">Continue with questions</a>
							</div>
						@else
							<div class="encurso__footer">
								<a href="/learn/{{@$url_next}}" class="btn encurso__footer__link disabled" role="button" aria-disabled="true">Continue </a>
							</div>
						@endif
					@else


					<!--quiz question-->
						@include('layouts.backend.partials.curso.quiz-preguntas')
					<!--end quiz question-->
						@include('layouts.backend.partials.curso.quiz-resultado')

						@include('layouts.backend.partials.curso.quiz-botones')
                        @include('layouts.backend.partials.curso.quiz-desarrollado')
					@endif



					<p class="mb-5 advertencia">To continue to the next chapter, you need to pass the quiz for the chapter you are taking.</p>
			  </div>


			  <div class="col-md-4">
						<div class="encurso__temas">
								  <div class="encurso__temas__titulo">
										You have {{UserCourse::dayleft($user_course_id)}} days left to finish the course
								  </div>


								  @include('layouts.frontend.cursos.menucurso')

						</div>
			  </div>

	</div>
</div>
@endsection
