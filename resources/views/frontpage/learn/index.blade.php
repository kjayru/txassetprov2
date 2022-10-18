@extends('layouts.frontend.cursos.app')
@section('content')
<div class="banner color__banner">
	<div class="container-fluid">
		<div class="row justify-content-between">
			<div class="col-md-4">
				<div class="breadcrum">
					<ul>
						<li><a href="/" class="breadcrum__link">Home</a></li>
						<li><span>></span><a href="#" class="breadcrum__link "> Cursos</a></li>
						<li><span>></span><a href="#" class="breadcrum__link active">OC Pepper Spray/Conflict Resolution</a></li>
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
			  <div class="col-md-8">
						<div class="encurso__titulo">OC Pepper Spray/ Conflict Resolution</div>
						<div class="encurso__subtitulo">A course with Oscar Gonzalez, Founder & President</div>
						<div class="encurso__intro">
								  1. Introduction
						</div>
						<div class="encurso__video">
								  <div class="encurso__video__titulo">
											Video introduction
								  </div>
								  <div class="encurso__video__player">
											<img src="/images/learn_play.png" class="img-fluid">
								  </div>
						</div>

						<div class="encurso__capitulo">
								  <div class="encurso__capitulo__titulo">
											Chapter 01
								  </div>
								  <div class="encurso__capitulo__contenido">
											<div class="encurso__capitulo__contenido__titulo">
													  Chapter reading
											</div>
											<div class="encurso__capitulo__contenido__texto">
													  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur turpis sapien, tempus ut dictum et, vehicula ac nisi. Duis dui neque, cursus vitae maximus ut, rhoncus sed elit. Quisque eget metus malesuada, posuere nulla ut, accumsan eros. Nam sollicitudin congue laoreet. Suspendisse tempus ligula purus, sed cursus odio accumsan ut. Nulla facilisi. Pellentesque non consequat enim.</p>

													  <p>Nullam et dolor felis. Nam dapibus ex ut feugiat dictum. Praesent nibh nisi, malesuada non leo sed, tempus tempus nisl. Aliquam mattis ultricies arcu ut finibus. Morbi cursus odio tellus, a feugiat augue dignissim eget. Aenean sed fermentum odio, vitae ornare erat. Nullam a elit vitae ligula faucibus maximus ac id felis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis eget ligula mollis consectetur. Sed vel nisl a orci pellentesque luctus. Nam urna dolor, lobortis vitae tempus a, condimentum sed metus. In bibendum suscipit imperdiet. Morbi venenatis, augue sit amet ornare viverra, libero lorem dictum sapien, faucibus sagittis lorem risus eget odio. Suspendisse id cursus arcu.</p>

													  <p>Donec scelerisque euismod lorem, at viverra velit molestie lobortis. Aliquam nunc risus, imperdiet eu aliquam a, tincidunt id lectus. Proin a tellus et enim efficitur malesuada id fermentum mi. Praesent tempus nulla rhoncus vehicula pretium. In porttitor magna ligula, a interdum metus malesuada ut. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas ligula risus, molestie a arcu ac, porta malesuada elit.</p>

													  <p>Aliquam risus nisl, convallis at pretium quis, dapibus eu nulla. Maecenas ac laoreet turpis. Ut ac ligula hendrerit, dapibus elit eget, accumsan metus. Suspendisse potenti. Ut commodo arcu eget erat posuere, in egestas augue facilisis. Nullam varius ligula ac arcu fringilla iaculis. Nam nec molestie arcu. Curabitur ullamcorper, quam eget ultrices eleifend, nulla elit fermentum nunc, at hendrerit arcu nunc a justo. Nunc velit risus, efficitur in odio in, tincidunt sodales mauris. Nulla convallis ante eu nibh ornare hendrerit.</p>

													  <p>Donec bibendum, nibh vitae aliquam facilisis, lacus leo suscipit tellus, sit amet venenatis erat mauris eget ex. Donec pretium euismod urna sed euismod. Donec maximus ornare dui pretium placerat. Aliquam vitae tristique orci. Nam tincidunt egestas erat, at congue augue aliquet ac. Cras blandit egestas leo et vestibulum. Nulla blandit, justo vulputate scelerisque laoreet, leo diam ultrices sem, a porta neque lacus eu ipsum. Sed rutrum consequat ex, sed lacinia neque fringilla vitae. Etiam laoreet faucibus quam quis porta. Curabitur auctor nisi ultricies massa sollicitudin, ut mollis dui mollis.</p>
											</div>
								  </div>
						</div>

						<div class="encurso__audio">
								  <div class="encurso__audio__titulo">
											Chapter audio
								  </div>
								  <div class="encurso__audio__timeline">
											<a href="#" class="timeline__play"><i class="fa fa-play" aria-hidden="true"></i></a>
											<div class="timelinebox">
													  <div class="timelinebox__solid"></div>
											</div>
								  </div>
						</div>
						 <div class="encurso__footer">
								   <a href="#" class="encurso__footer__link">Continue with questions</a>
						</div>
					   
			  </div>


			  <div class="col-md-3">
						<div class="encurso__temas">
								  <div class="encurso__temas__titulo">
											You have 27 days left to finish the course
								  </div>
								  <ul class="encurso__temas__lista">
											<li class="encurso__temas__lista__item"><span>1</span>Intro
													  <ul class="encurso__temas__lista__item__sublista active">
																<li class="encurso__temas__lista__item__sublista__item">
																		  Informacion
																</li>
																<li class="encurso__temas__lista__item__sublista__item">
																		  Chapter 1
																</li>
																<li class="encurso__temas__lista__item__sublista__item">
																		  Chapter reading
																</li>
																<li class="encurso__temas__lista__item__sublista__item">
																		  chapter audio
																</li>
													  </ul>
											</li>

											<li class="encurso__temas__lista__item"><span>2</span>Chapter 1
													  <ul class="encurso__temas__lista__item__sublista">
																<li class="encurso__temas__lista__item__sublista__item">
																		  Informacion
																</li>
																<li class="encurso__temas__lista__item__sublista__item">
																		  Chapter 1
																</li>
																<li class="encurso__temas__lista__item__sublista__item">
																		  Chapter reading
																</li>
																<li class="encurso__temas__lista__item__sublista__item">
																		  chapter audio
																</li>
													  </ul>
											</li>
								  </ul>
						</div>
			  </div>

	</div>
</div>
@endsection