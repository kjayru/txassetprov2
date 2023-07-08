@extends('layouts.frontend.cursos.app')
@section('content')
@php
	 use App\Models\Course;
@endphp
<div class="gracias">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
						
				<div class="gracias__titulo">
					THANK YOU!
				</div>
				<div class="gracias__subtitulo">
					You just finished your purchase
					<span>You have 30 days to finish the course</span>
				</div>
		
			</div>	
		</div>
		@foreach($ids as $col)
		
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="gracias__box">
					<div class="row">
						<div class="col-md-5">
							<img src="/storage/{{Course::info($col)['banner']}}" class="img-fluid">
						</div>
						<div class="col-md-7">
							<div class="gracias__box__info">
								<div class="gracias__box__info__titulo">
									{{@Course::info($col)['titulo']}}
								</div>
								<div class="gracias__box__info__subtitulo">
									{{@Course::info($col)['subtitulo']}}
								</div>
								<div class="gracias__box__info__properties">
									<ul>
										<li class="date">Available from {{@Course::info($col)['disponible']}}</li>
										<li class="capitulo">{{@Course::info($col)['capitulos']}} chapters</li>
										<li class="audio">Audio:{{@Course::info($col)['audio']}}</li>
										<li class="level">Level:{{@Course::info($col)['nivel']}}</li>
										<li class="access">Access:{{@Course::info($col)['tiempovalido']}} days to finish the course</li>
							  </ul>
								</div>
								
								<div class="gracias__box__info__enlace">
									<a href="/learn/{{Course::info($col)['slug']}}" class="btn btn__start">Start course</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
       
@endsection
