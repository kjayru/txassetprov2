@extends('layouts.frontend.cursos.appsign')
@section('content')

<main class="firma">
        <div class="firma__header">
            <div class="row justify-content-center">
				<div class="col-md-3">
					<div class="firma__header__picture">
						<img src="/images/Logo-TAP.png" class="img-fluid">
					</div>
				</div>
            </div>
        </div>
        <div class="firma__body">
			<form action="{{route('sign.register')}}" method="POST">
				@csrf
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="firma__body__titulo">
								Enrollment agreement and eligibility notification
							</div>
						</div>
						<div class="col-md-12">
							<div class="firma__body__contenido ">

								<p>I.  <input type="text" name="fullname" id="fullname" placeholder="Full name" class="mb-2 form-control">  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam volutpat vulputate magna, ac placerat nisi vehicula sagittis. Nullam vitae fermentum nisl. Sed posuere eu justo ac sodales. Suspendisse at neque in tellus viverra iaculis. Vivamus tincidunt neque lorem, quis lacinia tellus venenatis quis. Cras dapibus est enim, a maximus mauris condimentum ac. Vivamus imperdiet erat id arcu faucibus, a varius urna ultricies. In in tellus eget est sodales consectetur. Aenean in scelerisque diam. Vestibulum convallis dictum aliquam. <input type="text" name="initial" id="initial" placeholder="Inital here" class="form-control"></p>
								<p>Morbi eu arcu non dolor commodo commodo. Donec ullamcorper, magna hendrerit pellentesque aliquam, arcu turpis bibendum lorem, eget venenatis erat eros sed magna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Proin vulputate purus risus, id lacinia dolor euismod eget. Ut scelerisque arcu nec quam tempus ultricies. Praesent accumsan, mauris sed fermentum tempor, ante risus ultrices urna, ac semper dui tortor nec lorem. Praesent a urna sed tortor semper cursus.</p>
								<p>Praesent dictum elit sit amet eros porta, non ullamcorper elit placerat. Proin tristique odio ac nibh condimentum ullamcorper. Morbi lobortis bibendum tellus, dignissim interdum quam sollicitudin vel. Maecenas in sodales sem. Sed porta laoreet dictum. Aliquam placerat nulla non commodo tempor. Etiam porttitor vel diam non finibus. Praesent at ultrices orci. Sed molestie egestas viverra. Nam tempus diam vitae eros elementum, in mollis urna fringilla. Vestibulum vitae est non diam scelerisque efficitur id vitae lectus. Sed nunc justo, fermentum a malesuada sed, dignissim a neque. In fringilla turpis vitae tristique maximus. Pellentesque ullamcorper consequat tellus, ut fringilla dui bibendum a.</p>


							</div>
						</div>
					</div>
				</div>
              	<div class="container">
					<div class="row">
						<div class="col-md-4 text-left">
							<div class="firma__body__form">
								<div class="form">
									<div class="form-group">
										<input type="text"  name="legalname" placeholder="Your legal name" class="form-control">
									</div>
									<div class="form-group">
										<input type="text" name="email" placeholder="Your email address" class="form-control">
									</div>
								</div>
								<div class="firma__body__form__sign">
									<div id="signature-pad" class="signature-pad">
										<div class="signature-pad--body">
										<canvas></canvas>
										</div>
										<div class="signature-pad--footer">
											<div class="boton__sign"><img src="/images/firma.png" class="img-fluid"><br>Sign here</div>
										</div>
									</div>            
								</div>
							</div>	
						</div>
					</div>
					<div class="row justify-content-end">
						<div class="col-md-3 text-right">
							<a href="#" class="color__rojo btn__form__sign">Agree & Sign</a>
						</div>
					</div>
              	</div>
			</form>
        </div>
</main>
@endsection