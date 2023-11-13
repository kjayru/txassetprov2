@extends('layouts.frontend.cursos.app')
@section('content')

<div class="container form__profile__user">
    <div class="row">
        <div class="col-md-12">
            <div class="banner__titulo">Register Profile</div>
          </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10 pt-5">
            <div class="card p-5">
                <div class="card-body ">

                    <form method="POST" action="{{ route('profile.store') }}" id="frm-profile">
                        @csrf


                            <div class="row justify-content-center">




                            <div class="col-md-12">
                                <div class="form-group mb-4">
                                <label for="firstname">First name*</label>
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ @$user->name?$user->name:old('firstname') }}" required  >

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
                                <input id="middlename" type="text" class="form-control @error('middlename') is-invalid @enderror" name="middlename" value="{{ old('middlename') }}"  >


                                </div>

                            </div>

                            <div class="col-md-12">
                                <div class="form-group mb-4">
                                <label for="lastname">Last name*</label>
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required  >

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
                                <input id="gender" type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" required >

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
                                <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ old('birthday') }}" required>

                                @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                            </div>


                            <div class="col-md-12">
                                <div class="form-group mb-4">
                                <label for="ssn">Please enter THE LAST 6 DIGITS of your Social Security Number. (This information is needed in order to issue a certificate when you have completed your course.)*</label>
                                <input id="ssn" type="text" class="form-control @error('ssn') is-invalid @enderror" name="ssn" value="{{ old('ssn') }}" required>

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
                                <input id="address1" type="text" class="form-control @error('address1') is-invalid @enderror" name="address1" value="{{ old('address1') }}" required >

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
                                <input id="address2" type="text" class="form-control @error('address2') is-invalid @enderror" name="address2" value="{{ old('address2') }}"  required>


                                </div>

                            </div>


                            <div class="col-md-12">
                                <div class="form-group mb-4">
                                <label for="city">City*</label>
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required>

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
                                <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ old('state') }}" required>

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
                                <input id="zipcode" type="text" class="form-control @error('zipcode') is-invalid @enderror" name="zipcode" value="{{ old('zipcode') }}" required>

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
                                <input id="drivernumber" type="text" class="form-control @error('drivernumber') is-invalid @enderror" name="drivernumber" value="{{ old('drivernumber') }}" required>

                                @error('drivernumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                            </div>


                            <div class="col-md-12">
                                <div class="form-group mb-4">
                                <label for="socialnumber">Social Security number*</label>
                                <input id="socialnumber" type="text" class="form-control @error('socialnumber') is-invalid @enderror" name="socialnumber" value="{{ old('socialnumber') }}" required>

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
                                <input id="driverstate" type="text" class="form-control @error('driverstate') is-invalid @enderror" name="driverstate" value="{{ old('driverstate') }}" required>

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
                                <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required>

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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{@$user->email?$user->email:old('email') }}" required>

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
                                <input id="organization" type="text" class="form-control @error('organization') is-invalid @enderror" name="organization" value="{{ old('organization') }}">

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
                                <input id="emergencycontact" type="text" class="form-control @error('emergencycontact') is-invalid @enderror" name="emergencycontact" value="{{ old('emergencycontact') }}" required>

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
                                <input id="emergencyphone" type="text" class="form-control @error('emergencyphone') is-invalid @enderror" name="emergencyphone" value="{{ old('emergencyphone') }}" required>

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
                                <input id="relationship" type="text" class="form-control @error('relationship') is-invalid @enderror" name="relationship" value="{{ old('relationship') }}" required>

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
                                <input id="handguncaliber" type="text" class="form-control @error('handguncaliber') is-invalid @enderror" name="handguncaliber" value="{{ old('handguncaliber') }}">
                                </div>

                            </div>

                            <div class="col-md-12">
                                <div class="form-group mb-4">
                                <label for="handguntype">Handgun Type (optional)</label>
                                <input id="handguntype" type="text" class="form-control @error('handguntype') is-invalid @enderror" name="handguntype" value="{{ old('handguntype') }}" >
                                </div>

                            </div>






                            <div class="col-md-12">
                                <div class="form-group mb-4">
                                <label for="handgunrental">Do you need a handgun rental? (optional)</label>
                                <input id="handgunrental" type="text" class="form-control @error('handgunrental') is-invalid @enderror" name="handgunrental" value="{{ old('handgunrental') }}">
                                </div>

                            </div>

                            <div class="col-md-12">
                                <div class="form-group mb-4">
                                <label for="shootingshotgun">Are you shooting shotgun? (optional)</label>
                                <input id="shootingshotgun" type="text" class="form-control @error('shootingshotgun') is-invalid @enderror" name="shootingshotgun" value="{{ old('shootingshotgun') }}" >
                                </div>

                            </div>


                            <div class="col-md-12">
                                <div class="form-group mb-4">
                                <label for="shotgungauce">Shotgun Gauge (optional)</label>
                                <input id="shotgungauce" type="text" class="form-control @error('shotgungauce') is-invalid @enderror" name="shotgungauce" value="{{ old('shotgungauce') }}"  >
                                </div>

                            </div>

                            <div class="col-md-12">
                                <div class="form-group mb-4">
                                <label for="shotgunrental">Do you need a shotgun rental? (optional)</label>
                                <input id="shotgunrental" type="text" class="form-control @error('shotgunrental') is-invalid @enderror" name="shotgunrental" value="{{ old('shotgunrental') }}"  >
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
                                <button type="submit" class="btn btn-danger btn-medium">
                                    {{ __('Save profile') }}
                                </button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
