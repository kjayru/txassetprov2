@extends('layouts.frontend.cursos.app')
@section('content')
@php
 use App\Models\UserCourse;
 use App\Models\ChapterQuizOption;
 use App\Models\UserChapterQuizOption;
 use Carbon\Carbon;
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

                <div class="exam__exito">
                    <div class="exam__exito__titulo">
                        CONGRATULATIONS!<br>
                        You´ve passes the course
                        <span class="subtitulo"> Your certificate is ready. We appreciate you using our courses.</span>
                    </div>
                    <div class="exam__exito__contenido">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="/storage/{{$curso->banner}}" class="img-fluid">
                            </div>
                            <div class="col-md-8">
                                <div class="exam__exito__contenido__titulo">
                                    {{$curso->titulo}}
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
                            <p class="icon_start">You´re earned a certificate</p>
                        </div>
                        <div class="col-md-5 text-end">
                            <a href="/learn/certificade/{{$curso->id}}" class="btn btn__red btn__descarga">Download certificate</a>
                        </div>
                    </div>
                </div>

                <div class="exam__timeline">
                    <div class="barra">
                        <div class="box"></div><span>100% COMPLETE</span>
                    </div>
                    @php
                        $fecha = new Carbon($user_course->updated_at);
                    @endphp
                    <div class="texto">Last activity on {{$fecha->format('M d, Y h:i A')}}  <span>COMPLETE</span></div>
                </div>

                <div class="exam__course__content">
                        <div class="encurso__temas">
                            <div class="title">Course Content</div>
                            <ul class="encurso__temas__lista">

                                @if(isset($contenidos))
                                    @foreach($contenidos as $k => $cont)
                                            <li class="encurso__temas__lista__item {{UserCourse::capitulo($user_course_id,$cont['capitulo_id'])?"active":""}}"><span>{{$k+1}}</span>
                                                <div class="alink">{{@$cont['capitulo_titulo']}}

                                                    <ul class="encurso__temas__lista__item__sublista active">
                                                        @foreach($cont['contenidos'] as $c)
                                                            <li class="encurso__temas__lista__item__sublista__item {{UserCourse::contenido($user_course_id,$cont['capitulo_id'],$c['id'])?"finalizado":""}}">
                                                                <a href="#"> {{@$c['titulo']}}</a>
                                                            </li>
                                                        @endforeach
                                                        @if($cont['quiz']==true)
                                                            <li class="encurso__temas__lista__item__sublista__item finalizado">
                                                                <a href="#">Question about the chapter</a>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </li>
                                    @endforeach
                                @endif


                                <li class="encurso__temas__lista__item final__examen  active"><span>FE</span><a href="#">Final Exam</a></li>

                            </ul>
                        </div>

                </div>

			  </div>



	</div>
</div>
@endsection
