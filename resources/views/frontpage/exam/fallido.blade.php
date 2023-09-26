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
			<div class="col-md-5">
				<div class="breadcrum">
					<ul>
						<li><a href="/" class="breadcrum__link chevron"><img src="/images/Emblema-blanco.png" alt=""></a></li>
						<li><span>></span><a href="/user/my-courses" class="breadcrum__link "> Courses</a></li>
						<li><span>></span><a href="#" class="breadcrum__link ">{{$curso->titulo}}</a></li>
                        <li><span>></span><a href="#" class="breadcrum__link active">Final Exam</a></li>
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
						<div class="encurso__intro__exam">

								You´ve completed the test

						</div>
                        <div class="encurso__texto__exam">
                            <p>You have reached the testing phase. In this step you will not be able to close the window because you will lose the test. Verify that your internet connection is active</p>
                            <p>The next exam will test your knowledge of the material you have taken. You have 2 hours to complete this exam. You can use the notes you have taken during the lesson. You cannot use the Internet or anyone else to complete this exam.
                            </p>
                            <p>You have 3 attempts to pass this exam before you have to retake the entire course. The pass is 75%.</p>
                            <p>By continuing, you understand and accept the aforementioned instructions.</p>

                            <div class="resultado">
                                   <strong> RESULT<br>
                                25 of 50 questions answered correctly<br></strong>
                                your time: 00:10:33<br><br>

                                <p>you have reached 25 or 50 point(s). (50%)</p>
                            </div>
                        </div>

						<div class="quiz__inicio">
							<a href="#" class="btn btn__red btn__examen btn__inline btn__restart__exam">Restart Test</a>
						</div>


			  </div>

            <div class="col-md-3">
                <div class="encurso__temas">

                        <ul class="encurso__temas__lista">

                                @if(isset($contenidos))
                                    @foreach($contenidos as $k => $cont)
                                            <li class="encurso__temas__lista__item {{UserCourse::capitulo($user_course_id,$cont['capitulo_id'])?"active":""}}"><span>{{$k+1}}</span>
                                                <a href="#">{{@$cont['capitulo_titulo']}}</a>

                                                    <ul class="encurso__temas__lista__item__sublista active">
                                                        @foreach($cont['contenidos'] as $c)
                                                            <li class="encurso__temas__lista__item__sublista__item {{UserCourse::contenido($user_course_id,$cont['capitulo_id'],$c['id'])?"finalizado":""}}">
                                                                <a href="/learn/{{$cont['curso_slug']}}/{{$cont['capitulo_slug']}}/{{$c['slug']}}"> {{@$c['titulo']}}</a>
                                                            </li>
                                                        @endforeach
                                                        @if($cont['quiz']==true)
                                                            <li>
                                                                <a href="/learn/{{$cont['curso_slug']}}/{{$cont['capitulo_slug']}}/quiz/{{$cont['quiz_content']->chapter_id}}">Quiz chapter</a>
                                                            </li>
                                                        @endif
                                                    </ul>
                                            </li>
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
