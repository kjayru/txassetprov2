@extends('layouts.frontend.cursos.app')
@section('content')
<div class="banner color__banner">
	<div class="container-fluid">
		<div class="row justify-content-between">
			<div class="col-md-4">
				<div class="breadcrum">
					<ul>
						<li><a href="/" class="breadcrum__link chevron"><img src="/images/Emblema-blanco.png" alt=""></a></li>
						<li><a class="breadcrum__link ">My profile</a></li>
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
					Account
				</div>
				<div class="todocursos__card__body">
					<table class="todocursos__card__body_table table">
                        <tr>
                            <td class="titulo"><strong>User</strong>  </td>
                            <td>{{@$user->profile->user}}</td>
                        </tr>
                        <tr>
                            <td class="titulo"><strong>Email</strong>  </td>
                            <td>{{@$user->email}}</td>
                        </tr>
                    </table>
				</div>
                <div class="todocursos__card__header">
					About you
				</div>
                <div class="todocursos__card__body">
					<table class="todocursos__card__body_table table">
                        <tr>
                            <td class="titulo"><strong>Name</strong>  </td>
                            <td>{{@$user->profile->firstname}}</td>
                        </tr>
                        <tr>
                            <td class="titulo"><strong>Middle</strong>  </td>
                            <td>{{@$user->profile->middlename}}</td>
                        </tr>
                        <tr>
                            <td class="titulo"><strong>Last name</strong>  </td>
                            <td>{{@$user->profile->lastname}}</td>
                        </tr>

                        <tr>
                            <td class="titulo"><strong>Social Security number</strong>  </td>
                            <td>{{@$user->profile->social_number}}</td>
                        </tr>
                    </table>

					<div class="card__footer">
						<a href="#" class="btn__edit__profile" data-toggle="modal" data-target="#modalPerfil">Edit profile</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-12 order-1 order-sm-2">
			<ul class="nav__usuario">
				<li class="nav__usuario__list">
					<a href="/user" class="nav__usuario__list__item active">My profile</a>
				</li>
				<li class="nav__usuario__list">
					<a href="/user/my-courses" class="nav__usuario__list__item ">My courses</a>
				</li>
			</ul>
		</div>
	</div>
</div>


<div class="modal fade" id="modalPerfil" tabindex="-1" aria-labelledby="modalPerfilLabel" aria-hidden="true">

	<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
	
	  <div class="modal-content">
	
		<div class="modal-header">
		  <h5 class="modal-title" id="modalPerfilLabel">User Profile</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body p-4">
		
			<form method="POST"  id="frm-profile__dash">
				@csrf
					<div class="row justify-content-center">
					<div class="col-md-12">
						<div class="form-group mb-4">
						<label for="firstname">First name*</label>
						<input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{@$user->profile->firstname}}" required  >
						@error('firstname')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
						</div>
					</div>

					<div class="col-md-12">
						<div class="form-group mb-4">
						<label for="middlename">Middle name</label>
						<input id="middlename" type="text" class="form-control @error('middlename') is-invalid @enderror" name="middlename" value="{{@$user->profile->middlename}}"  >
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group mb-4">
						<label for="lastname">Last name*</label>
						<input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ @$user->profile->lastname }}" required  >
						@error('lastname')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group mb-4">
						<label for="gender">Gender*</label>
						<input id="gender" type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ @$user->profile->gender }}" required >
						@error('gender')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group mb-4">
						<label for="birthday">Date of Birth*</label>
						<input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ @$user->profile->birthday }}" required>
						@error('birthday')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group mb-4">
						<label for="ssn">Please enter THE LAST 4 DIGITS of your Social Security Number. (This information is needed in order to issue a certificate when you have completed your course.)*</label>
						<input id="ssn" type="text" class="form-control @error('ssn') is-invalid @enderror" name="ssn" value="{{ @$user->profile->ssn }}" required>
						@error('ssn')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group mb-4">
						<label for="address1">Address line 1*</label>
						<input id="address1" type="text" class="form-control @error('address1') is-invalid @enderror" name="address1" value="{{ @$user->profile->address1 }}" required >
						@error('address1')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
						</div>
					</div>

					<div class="col-md-12">
						<div class="form-group mb-4">
						<label for="address2">Address line 2*</label>
						<input id="address2" type="text" class="form-control @error('address2') is-invalid @enderror" name="address2" value="{{ @$user->profile->address2 }}"  required>
						</div>
					</div>

					<div class="col-md-12">
						<div class="form-group mb-4">
						<label for="city">City*</label>
						<input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ @$user->profile->city }}" required>
						@error('city')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
						</div>
					</div>


					<div class="col-md-12">
						<div class="form-group mb-4">
						<label for="state">State*</label>
						<input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ @$user->profile->state }}" required>
						@error('state')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
						</div>
					</div>


					<div class="col-md-12">
						<div class="form-group mb-4">
						<label for="zipcode">Zip/Postal code*</label>
						<input id="zipcode" type="text" class="form-control @error('zipcode') is-invalid @enderror" name="zipcode" value="{{ @$user->profile->zipcode }}" required>

						@error('zipcode')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
						</div>

					</div>


					<div class="col-md-12">
						<div class="form-group mb-4">
						<label for="drivernumber">Driver License Number*</label>
						<input id="drivernumber" type="text" class="form-control @error('drivernumber') is-invalid @enderror" name="drivernumber" value="{{ @$user->profile->drivernumber }}" required>

						@error('drivernumber')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
						</div>

					</div>


					<div class="col-md-12">
						<div class="form-group mb-4">
						<label for="social_number">Social Security number*</label>
						<input id="social_number" type="text" class="form-control @error('social_number') is-invalid @enderror" name="social_number" value="{{ @$user->profile->social_number }}" required>

						@error('socialnumber')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
						</div>
					</div>

					<div class="col-md-12">
						<div class="form-group mb-4">
						<label for="driverstate">Driver License State*</label>
						<input id="driverstate" type="text" class="form-control @error('driverstate') is-invalid @enderror" name="driverstate" value="{{ @$user->profile->driverstate }}" required>

						@error('driverstate')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
						</div>

					</div>

					<div class="col-md-12">
						<div class="form-group mb-4">
						<label for="phone">Phone Number*</label>
						<input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ @$user->profile->phone }}" required>

						@error('phone')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
						</div>

					</div>

					<div class="col-md-12">
						<div class="form-group mb-4">
						<label for="email">Email</label>
						<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{@$user->email}}" disabled>

						@error('email')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>

				</div>

					<div class="col-md-12">
						<div class="form-group mb-4">
						<label for="organization">Organization</label>
						<input id="organization" type="text" class="form-control @error('organization') is-invalid @enderror" name="organization" value="{{ @$user->profile->organization }}">

						@error('organization')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
						</div>

					</div>




					<div class="col-md-4">
						<div class="form-group mb-4">
						<label for="emergencycontact">Emergency Contact′s Name*</label>
						<input id="emergencycontact" type="text" class="form-control @error('emergencycontact') is-invalid @enderror" name="emergencycontact" value="{{ @$user->profile->emergencycontact }}" required>

						@error('emergencycontact')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
						</div>

					</div>


					<div class="col-md-4">
						<div class="form-group mb-4">
						<label for="emergencyphone">Phone number*</label>
						<input id="emergencyphone" type="text" class="form-control @error('emergencyphone') is-invalid @enderror" name="emergencyphone" value="{{ @$user->profile->emergencyphone }}" required>

						@error('emergencyphone')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
						</div>

					</div>

					<div class="col-md-4">
						<div class="form-group mb-4">
						<label for="relationship">Relationship*</label>
						<input id="relationship" type="text" class="form-control @error('relationship') is-invalid @enderror" name="relationship" value="{{ @$user->profile->relationship }}" required>

						@error('relationship')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
						</div>

					</div>






					<div class="col-md-12">
						<div class="form-group mb-4">
						<label for="handguncaliber">Handgun Caliber (optional)</label>
						<input id="handguncaliber" type="text" class="form-control @error('handguncaliber') is-invalid @enderror" name="handguncaliber" value="{{ @$user->profile->handguncaliber }}">
						</div>

					</div>

					<div class="col-md-12">
						<div class="form-group mb-4">
						<label for="handguntype">Handgun Type (optional)</label>
						<input id="handguntype" type="text" class="form-control @error('handguntype') is-invalid @enderror" name="handguntype" value="{{ @$user->profile->handguntype }}" >
						</div>

					</div>






					<div class="col-md-12">
						<div class="form-group mb-4">
						<label for="handgunrental">Do you need a handgun rental? (optional)</label>
						<input id="handgunrental" type="text" class="form-control @error('handgunrental') is-invalid @enderror" name="handgunrental" value="{{ @$user->profile->handguntype }}">
						</div>

					</div>

					<div class="col-md-12">
						<div class="form-group mb-4">
						<label for="shootingshotgun">Are you shooting shotgun? (optional)</label>
						<input id="shootingshotgun" type="text" class="form-control @error('shootingshotgun') is-invalid @enderror" name="shootingshotgun" value="{{ @$user->profile->handgunrental }}" >
						</div>

					</div>


					<div class="col-md-12">
						<div class="form-group mb-4">
						<label for="shotgungauce">Shotgun Gauge (optional)</label>
						<input id="shotgungauce" type="text" class="form-control @error('shotgungauce') is-invalid @enderror" name="shotgungauce" value="{{ @$user->profile->shotgungauce }}"  >
						</div>

					</div>

					<div class="col-md-12">
						<div class="form-group mb-4">
						<label for="shotgunrental">Do you need a shotgun rental? (optional)</label>
						<input id="shotgunrental" type="text" class="form-control @error('shotgunrental') is-invalid @enderror" name="shotgunrental" value="{{ @$user->profile->shotgunrental }}"  >
						</div>
					</div>

				</div>
				<div class="form-group row mb-1 mt-5 justify-content-end">
					<div class="col-md-3 text-right">
						* Required fields
					</div>
				</div>

				<div class="form-group row mb-1 mt-5 justify-content-center">
					<div class="col-md-6 text-center">
						<input type="hidden" name="user" value="{{@$user->profile->user}}">
					</div>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-danger btn-medium btn__save__profile">
				{{ __('Save profile') }}
			</button>
		</div>
	
	  </div>
	
	</div>

  </div>
@endsection
