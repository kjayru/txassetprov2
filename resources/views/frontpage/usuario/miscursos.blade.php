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
						<li><a href="/" class="breadcrum__link">Home</a></li>
						<li><span>></span><a href="#" class="breadcrum__link ">Mis cursos</a></li>
					</ul>
				</div>

				
			</div>
			<div class="col-md-1 text-right">
				<div class="cart">
					<ul>
					  <li><a href="/user" class="cart__link"><i class="fa fa-user-circle" aria-hidden="true"></i></a></li>
					  <li><a href="/cart" class="cart__link"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
					</ul>
				</div>
			</div>   
		</div>
	</div>
   
</div>

<!--contenido-->
<div class="todocursos">
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
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
									<img src="{{$curso->course->banner}}" class="img-fluid">
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
										<div class="linea_avance" style="width:{{UserCourseChapter::completeChapter($user->id,$curso->course->id)}}%"></div>
									</div>
									<span class="status">{{UserCourse::completeChapter($curso->course->id,$user->id)}} complemete chapter</span>
								</div>
								<div class="todocursos__card__body__item__estado">
									<a href="/learn/{{$curso->course->slug}}" class="item__link">Go to course</a>

									<div class="item__mensaje__time">You have {{UserCourse::leftdays($curso->course->id,$user->id)}} days left to finish the course</div>
								</div>

							</div>
						</div>
					</div>
					@endforeach
					<!--<div class="todocursos__card__body__item">
						<div class="row">
							<div class="col-md-4">
								<div class="todocursos__card__body__item__imagen">
									<img src="/images/curso1.png" class="img-fluid">
								</div>
							</div>
							<div class="col-md-8">
								<div class="todocursos__card__body__item__titulo">
									OC Pepper
								</div>
								<div class="todocursos__card__body__item__subtitulo">
									A course with
								</div>
								<div class="todocursos__card__body__item__timeline">
									<div class="line"></div>
									<span class="status">3 complemete chapter</span>
								</div>
								<div class="todocursos__card__body__item__estado todocursos__card__body__item__only">
									<div class="item__mensaje__aprobado aprobado">approved</div>
								</div>

							</div>
						</div>
					</div>


					<div class="todocursos__card__body__item">
						<div class="row">
							<div class="col-md-4">
								<div class="todocursos__card__body__item__imagen">
									<img src="/images/curso1.png" class="img-fluid">
								</div>
							</div>
							<div class="col-md-8">
								<div class="todocursos__card__body__item__titulo">
									OC Pepper
								</div>
								<div class="todocursos__card__body__item__subtitulo">
									A course with
								</div>
								<div class="todocursos__card__body__item__timeline">
									<div class="line"></div>
									<span class="status">3 complemete chapter</span>
								</div>
								<div class="todocursos__card__body__item__estado todocursos__card__body__item__only">
									<div class="item__mensaje__failed desaprobado">Failed</div>
								</div>

							</div>
						</div>
					</div>-->


				</div>
			</div>
		</div>
		<div class="col-md-4">
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