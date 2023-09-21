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
						<li><a class="breadcrum__link ">My courses</a></li>
					</ul>
				</div>

				
			</div>
			<div class="col-md-1 text-right">
				<div class="cart">
					<ul>
					  <li><a href="/user" class="cart__link"><i class="fa fa-user-circle" aria-hidden="true"></i></a></li>
					  <li><a href="/cart" class="cart__link"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
					  <li><a href="#" class="cart__link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><img src="/images/logout.svg" style="with:20px;"></a></li>
                    </ul>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
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
									<img src="/storage/{{$user_course->course->banner}}" class="img-fluid">
								</div>
							</div>
							<div class="col-md-8">
								
								<div class="todocursos__card__body__item__titulo">
									{{$user_course->course->titulo}}
								</div>
								<div class="todocursos__card__body__item__subtitulo">
									{{$user_course->course->subtitulo}}
								</div>
								<div class="todocursos__card__body__item__timeline">
									<div class="line">
										<div class="linea_avance" style="width:100%"></div>
									</div>
									<span class="status">Course completed</span>
								</div>
								<div class="todocursos__card__body__item__estado todocursos__card__body__item__only">
									@switch($resultado)
										@case("1")
										<div class="item__mensaje__aprobado aprobado">Approved</div>
											@break
										@case("2")
										<div class="item__mensaje__aprobado desaprobado">Failed</div>
											@break
											@case("3")
											<div class="item__mensaje__aprobado desaprobado">Failed</div>
												@break
												@case("4")
												<div class="item__mensaje__aprobado desaprobado">Failed</div>
													@break
										
											
									@endswitch
									
								</div>

							</div>
						</div>
					</div>


                    <div class="todocursos__card__body__resultado">
                        
                        
                        @if($resultado=="1")  
							<div class="icono">
								<img src="/images/curso-passes.svg" class="img-responsive">
							</div>

                            <div class="texto">
                                <p>Congratulations!<br>
                                   <span> you`ve passes the course</span>
                                </p>
                                <p>Your certificate is ready.<br>
                                We appreciate you using our courses.
                                </p>
                            </div>
                            <div class="foot">
                                <a href="#" class="btn__link">Download certificate</a>
                            </div>
                        @endif
                        @if($resultado=="2")
                        
                            <div class="texto">
                                <p><span>Unfortunately you pass are failed due<br> to
                                    the test result</span>
                                </p>
                                <p>You have 15 days from the result to retake the course.<br>
                                    If  you exced 15 days, you will have to pay for the course again.
                                </p>
                            </div>
                            <div class="foot row">
                                <div class="col-md-6">
									<p class="respuesta">
									You have {{@$dias}} days left to take the course again
									</p>
								</div>
                                <div class="col-md-6">
                                    <a href="#" class="btn__link">Start the course again</a>
									<form action="{{route('course.again')}}" action="POST">
										@csrf
										<input type="hidden" name="user_id" value="">
										<input type="hidden" name="course_id" value="">
									</form>
                                </div>
                            </div>

                        @endif


						@if($resultado=="3")
                        
                            <div class="texto">
                                <p><span>Unfortunately you pass are failed due to
                                    the test result</span>
                                </p>
                                <p>You have 15 days from the result to retake the course.<br>
                                    If  you exced 15 days, you will have to pay for the course again.
                                </p>
                            </div>
                            <div class="foot row">
                                <div class="col-md-6">
									<p class="respuesta">
									You exceeded the time limit to take the course again
									</p>
								</div>
                                <div class="col-md-6">
                                    <a href="/courses/all" class="btn__link">Buy the course again</a>
                                </div>
                            </div>

                        @endif

						@if($resultado=="4")
                        
                            <div class="texto">
                                <p><span>Unfortunately you pass are failed due to
                                    the test result</span>
                                </p>
                                <p>More than 15 days have passed, you must buy the course again and pass the evaluation.
                                </p>
                            </div>
                            <div class="foot row">
                                <div class="col-md-6">
									<p class="respuesta">
									You exceeded the time limit to take the course again
									</p>
								</div>
                                <div class="col-md-6">
                                    <a href="/courses/all" class="btn__link">Buy the course again</a>
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