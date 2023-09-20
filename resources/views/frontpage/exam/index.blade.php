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

							{!! @$examen->description!!}
                        </div>
				@if(!isset($tomo_examen) || $completo_examen==0)

						<div class="quiz__inicio">
							<a href="#" class="btn btn__red btn__examen btn__inline">Final Exam</a>
						</div>
						
				@else
					<div class="quiz__resultado">
						<div class="quiz__resultado__titulo">Result</div>
						<div class="quiz__resultado__sub">{{$total_correctas}} of {{$total_preguntas}} questions answered correctly</div>
						<div class="quiz__resultado__time">Your time: {{$tomo_examen->tiempo}}</div>
						<div class="quiz__resultado__puntaje">
							You have reached {{$total_correctas}} or {{$total_preguntas}} point(s). ({{$porcentaje}}%)
						</div>
						<div class="quiz__resultado__botones">
							<div class="row justify-content-center">
								<div class="col-4"><a href="#" class="btn btn__gray btn__question__exam"   data-usercourseexamid="{{@$tomo_examen->id}}" data-cursoid="{{$curso->id}}" data-examid="{{$examen->id}}" data-usercourseid="{{@$user_course_id}}">View Questions</a></div>
								<div class="col-4"><a href="#" class="btn btn__gray btn__restart__exam" data-usercourseexamid="{{@$tomo_examen->id}}" data-cursoid="{{$curso->id}}" data-examid="{{$examen->id}}" data-usercourseid="{{@$user_course_id}}">Restart test</a></div>
								<div class="col-4">
									@if($porcentaje > 75)
									<a href="/{{$curso->slug}}/congratulation" class="btn btn__red btn__continue">Continue</a>
									@else
									<a href="#" class="btn btn__red btn__continue disabled">Continue</a>
									@endif
								</div>
							</div>
						</div>		
						
					</div>
					<div class="quiz__respuestas">
						
					</div>
				@endif

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

			  <div class="col-md-4">
						<div class="encurso__temas">
								  <div class="encurso__temas__titulo">
											You have {{UserCourse::dayleft($user_course_id)}} days left to finish the course
								  </div>
								  @include('layouts.frontend.cursos.menucurso')
							  </ul>
						</div>
			  </div>

	</div>
</div>
@endsection