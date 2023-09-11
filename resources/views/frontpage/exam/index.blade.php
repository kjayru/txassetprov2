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
						<li><a href="/" class="breadcrum__link chevron"><img src="/images/Emblema-blanco.png" alt=""></a></li>
						<li><span>></span><a href="/user/my-courses" class="breadcrum__link "> Courses</a></li>
						<li><span>></span><a href="#" class="breadcrum__link active">{{$curso->titulo}}</a></li>
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
						<div class="encurso__subtitulo">{{@$curso->subtitulo}}</div>
						<div class="encurso__intro">
						
								FINAL EXAM
							
						</div>
                        <div class="encurso__texto__exam">
                            <p>You have reached the testing phase. In this step you will not be able to close the window because you will lose the test. Verify that your internet connection is active</p>
                            <p>The next exam will test your knowledge of the material you have taken. You have 2 hours to complete this exam. You can use the notes you have taken during the lesson. You cannot use the Internet or anyone else to complete this exam.
                            </p>
                            <p>You have 3 attempts to pass this exam before you have to retake the entire course. The pass is 75%.</p>
                            <p>By continuing, you understand and accept the aforementioned instructions.</p>
                        </div>
					
						<div class="quiz__inicio">
							<a href="#" class="btn btn__red btn__examen btn__inline">Final Exam</a>
						</div>


					<div class="quiz__timelapse">
						<div class="quiz__timelapse__titulo">Time limit: <span id="hora">01</span>:<span id="minuto">59</span>:<span id="segundo">00</span></div>
						<div class="quiz__timelapse__box">
							<div class="quiz__timelapse__bar"></div>
						</div>
					</div>
					
					<div class="quiz__preguntas">

					<input type="hidden" name="user_course_id" id="user_course_id" value="{{@$user_course_id}}">
					<input type="hidden" name="exam_id" id="exam_id" value="{{@$examen->id}}">
					<input type="hidden" name="tiempo" id="tiempo">

						@foreach($examen->examquestions as $key => $question)

							<div class="card__question" style="display:{{$key==0?'block':'none'}}">
								{{$key+1}}.  {{$question->question}}
								<input type="hidden" name="quiz_id" value="{{$question->id}}">
								<div class="card__question__opciones">
								
									@foreach($question->examquestionoptions as $option)
										<div class="form-check">
										<input class="form-check-input" type="radio" name="respuesta" value="{{$option->id}}" id="respuesta">
										<label class="form-check-label" for="respuesta">
											{{$option->opcion}}
										</label>
										</div>
									@endforeach
								
										
							  </div>
							  <a href="#" data-quizid="{{$question->id}}" class="btn btn-default btn__exam">Next</a>	
							</div>

						@endforeach
					</div>

						
					

			  </div>

			  <div class="col-md-3">
						<div class="encurso__temas">
								  <div class="encurso__temas__titulo">
											You have {{@$curso->tiempovalido}} days left to finish the course
								  </div>
								  <ul class="encurso__temas__lista">
										
									
									@if(isset($contents))										
										@foreach($contents as $k => $cont)

									
										@if($k==0)
											@include('layouts.backend.partials.curso.contenidoactivo')
										@else	
										
										
												@if(ChapterQuiz::pasoQuiz($cont['contenidos']['quiz_id'],$user_course_id,$curso_id,$cont['contenidos']['capitulo_id'])==true)
											
													@include('layouts.backend.partials.curso.contenidoactivo')
											
												@else
													@include('layouts.backend.partials.curso.contenido')
												@endif	

										
										@endif
										@endforeach
									@endif		
									
									@if(isset($examen))										
									<li class="encurso__temas__lista__item"><a href="/learn/exam/{{$curso->slug}}/{{$examen->id}}">Final Exam</a></li>
									@endif
							  </ul>
						</div>
			  </div>

	</div>
</div>
@endsection