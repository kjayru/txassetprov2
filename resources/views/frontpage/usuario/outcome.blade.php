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
						<li><span>></span><a href="#" class="breadcrum__link ">My courses</a></li>
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
					Course outcome
				</div>
				<div class="todocursos__card__body">
					

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
									<div class="item__mensaje__aprobado aprobado">approved</div>
								</div>

							</div>
						</div>
					</div>


                    <div class="todocursos__card__body__resultado">
                        <div class="icono">
                            <img src="/images/estrella.png" class="img-responsive">
                        </div>
                        
                        @if($estado=="1")  
                            <div class="texto">
                                <p>Congratulations!<br>
                                    you`ve passes the course
                                </p>
                                <p>Your certificate is ready.<br>
                                We appreciate you using our courses.
                                </p>
                            </div>
                            <div class="foot">
                                <a href="#" class="btn__link">Download certificate</a>
                            </div>
                        @endif
                        @if($estado=="2")
                        
                            <div class="texto">
                                <p>Unfortunately you pass are failed due to
                                    the test result
                                </p>
                                <p>You have 15 days from the result to retake the course.<br>
                                    If  you exced 15 days, you will have to pay for the course again.
                                </p>
                            </div>
                            <div class="foot row">
                                <div class="col-md-6">You have 4 days left to take the course again</div>
                                <div class="col-md-6">
                                    <a href="#" class="btn__link">Start the course again</a>
                                </div>
                            </div>

                        @endif

                    </div>

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