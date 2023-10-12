@extends('layouts.frontend.cursos.app')
@section('content')
@php
	use App\Models\UserCourse;
	use App\Models\UserCourseChapter;
@endphp
<div class="banner color__banner">
	<div class="container-fluid">
		<div class="row justify-content-between">
			<div class="col-md-4">
				<div class="breadcrum">
					<ul>
						<li><a href="/" class="breadcrum__link chevron"><img src="/images/Emblema-blanco.png" alt=""></a></li>
						<li><a  class="breadcrum__link ">My courses</a></li>
					</ul>
				</div>


			</div>
			@include('layouts.backend.partials.menucurso')
		</div>
	</div>

</div>

<!--contenido-->
<div class="todocursos">
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8 col-12 order-2 order-sm-1 canva">
			<div class="todocursos__card">
				<div class="todocursos__card__header">
					All my courses
				</div>
				<div class="todocursos__card__body">

					@foreach($cursos as $curso)

					<div class="todocursos__card__body__item">
						<div class="row">
							<div class="col-md-4">
								<div class="todocursos__card__body__item__imagen">
									<img src="/storage/{{$curso->course->banner}}" class="img-fluid">
								</div>
							</div>
							<div class="col-md-8">
								<div class="todocursos__card__body__item__titulo">
									{{$curso->course->titulo}}
								</div>
								<div class="todocursos__card__body__item__subtitulo">
									{{$curso->course->subtitulo}}
								</div>
								<div class="todocursos__card__body__item__timeline">

									<div class="line">
										<div class="linea_avance" style="width:{{UserCourseChapter::completeChapter($user->id,$curso->course->id,$curso->id)}}%"></div>
									</div>

									@if(UserCourse::complete($curso->course->id,$user->id,$curso->id))
									    <span class="status">completed  </span>
									@else
									    <span class="status">{{UserCourseChapter::completeChapter($user->id,$curso->course->id,$curso->id)}}% completed course </span>
									@endif
								</div>
								<div class="todocursos__card__body__item__estado">

                                    @if($curso->aprobado==0  && $curso->caducado==0 && $curso->finalizado==1)
                                    {{-- curso fallido --}}
									<a href="/learn/exam/{{$curso->id}}/fail" class="item__link">Go to course</a>
                                    <div class="course__desaprobado">
                                        Failed
                                    </div>
                                    @endif
                                    @if($curso->aprobado==1  && $curso->caducado==0 && $curso->finalizado==1)
                                    {{-- curso aprobado --}}
                                    <a href="/learn/exam/{{$curso->id}}/congratulation" class="item__link">Go to result</a>
                                    <div class="course__aprobado">
                                        Approved
                                    </div>
                                    @endif
                                    @if($curso->aprobado==0 && $curso->caducado==1  && $curso->finalizado==1)
                                    {{-- curso caducado --}}
                                    <a href="/learn/exam/{{$curso->id}}/expired" class="item__link">Go to result</a>
                                    <div class="course__desaprobado">
                                        Expired

                                    </div>
                                    @endif
                                    @if($curso->aprobado==0  && $curso->caducado==0 && $curso->finalizado==0)
                                    {{-- curso en curso --}}

                                    <a href="/learn/{{$curso->id}}/{{$curso->course->slug}}" class="item__link">  Go to course</a>
                                    <div class="item__mensaje__time">You have {{UserCourse::dayleft($curso->id)}} days left to finish the course</div>
                                    @endif


								</div>

							</div>
						</div>
					</div>
					@endforeach

				</div>
			</div>
		</div>
		<div class="col-md-4 order-1 order-sm-2">
			<ul class="nav__usuario">
				<li class="nav__usuario__list">
					<a href="/user" class="nav__usuario__list__item">My profile</a>
				</li>
				<li class="nav__usuario__list">
					<a href="/user/my-courses" class="nav__usuario__list__item active">My courses</a>
				</li>
			</ul>
		</div>
	</div>
</div>
@endsection
