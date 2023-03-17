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
						<li><a href="/" class="breadcrum__link">Home</a></li>
						<li><span>></span><a href="#" class="breadcrum__link "> Cursos</a></li>
						<li><span>></span><a href="#" class="breadcrum__link ">OC Pepper Spray/Conflict Resolution</a></li>
                        <li><span>></span><a href="#" class="breadcrum__link active">Final Exam</a></li>
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
					
                <div class="exam__exito">
                    <div class="exam__exito__titulo">
                        CONGRATULATIONS!<br>
                        You`ve passes the course
                        <span class="subtitulo"> Your certificate is ready. we appreciate yoyu using our courses.</span>
                    </div>
                    <div class="exam__exito__contenido">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="/images/cursoplayer.png" class="img-fluid">
                            </div>
                            <div class="col-md-8">
                                <div class="exam__exito__contenido__titulo">
                                OC PEPPER SPRAY/ CONF
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-md-4 text-end">
                               <img src="/images/Logo-TAP.png" width="80px">
                            </div>
                        </div>
                    </div>

                    
                </div>

                <div class="exam__blue">
                    <div class="row justify-content-between">
                        <div class="col-md-7">
                            You´re eardned a certificate
                        </div>
                        <div class="col-md-5 text-end">
                            <a href="#" class="btn btn__red btn__descarga">Download certificate</a>
                        </div>
                    </div>
                </div>
						
					
                <div class="exam__course__content">


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
</div>
@endsection