@extends('layouts.frontend.cursos.app')
@section('content')
@php
	 use App\Models\Course;
     use Carbon\Carbon;
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

				@include('layouts.backend.partials.menucurso')

		</div>
	</div>

</div>


<div class="gracias">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<div class="gracias__titulo">
					THANK YOU!
				</div>
				<div class="gracias__subtitulo">
					You just finished your purchase
					<span>You have {{@$course->tiempovalido}} days to finish the course</span>
				</div>

			</div>
		</div>
		{{-- @foreach($ids as $col) --}}

		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="gracias__box">
					<div class="row">
						<div class="col-md-5">
							<img src="/storage/{{@$course->banner}}" class="img-fluid">
						</div>
						<div class="col-md-7">
							<div class="gracias__box__info">
								<div class="gracias__box__info__titulo">
									{{@$course->titulo}}
								</div>
								<div class="gracias__box__info__subtitulo">
									{{@$course->responsable}}
								</div>
								<div class="gracias__box__info__properties">
									<ul>
                                        @php
                                        $fecha = new Carbon($course->disponible);
                                    @endphp

										<li class="date">Available from  {{$fecha->format('M d, Y')}} </li>
										<li class="capitulo">{{@$course->capitulos}} chapters</li>
                                        @if(isset($course->audio))
										<li class="audio">Audio: {{@$course->language}}</li>
                                        @endif
										<li class="level">Level: {{@$course->nivel}}</li>
										<li class="access">Access: {{@$course->tiempovalido}} days to finish the course</li>
							  </ul>
								</div>

								<div class="gracias__box__info__enlace">
									<a href="/learn/{{$user_course->id}}/{{@$course->slug}}" class="btn btn__start">Start course</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		{{-- @endforeach --}}
	</div>
</div>

@endsection
