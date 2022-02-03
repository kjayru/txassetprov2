@extends('layouts.frontend.app2')


@section('content')

<section id="employment">
    <div id="emp-inicio" class="separador2 parallaxie"  style='background: url("/images/Banner-Employment-Cambios01.png")' >
        <div class="container">


            <div class="row banner">
                    <div class="col-md-3 d-none d-sm-block">
                        <div class="logo">
                            <img src="/images/Logo-TAP.png" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <p>JOIN THE<BR><span>TAP</span> TEAM</p>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <div class="sectiongray separador2">
       <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 class="titulosimbolo">simbolo</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>We are a fast growing business and always accepting applications.</h2>
                <p>Feel free to come by the office at 11503 Jones Maltsberger Rd, Ste. 1101 or email Alicia Morales your resume at  admin@txassetpro.com</p>

                <a href="#frm-contenido" class="btn btn-danger btn-medium shadowred">APPLY NOW</a>
            </div>
        </div>
       </div>
    </div>
</section>
<section id="frm-contenido" class="separador2">
    <div class="container application">
        <div class="card">

                <div class="card-body appliend sombra">


                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="linebox">
                                <h1>APPLICANT INFORMATION</h1>
                            </div>
                        </div>

                    </div>

            <form class="form" action="{{route('front.thanks')}}" method="POST"  id="form-employment" enctype="multipart/form-data">
                        @csrf
                <div class="lienzo">
                    <div class="form-row">

                        <div class="col-md-9">
                            <legend class="col-form-label">FULL NAME</legend>
                            <div class="form-row">
                                <div class="form-group col-md-4 col-12">

                                    <input type="text" name="lastname" class="form-control @error('firstname') is-invalid @enderror" id="lastname" value="{{ old('lastname') }}" required placeholder="Last" >

                                    @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4 col-12">

                                    <input type="text" name="firstname" class="form-control @error('firstname') is-invalid @enderror" id="firstname" value="{{ old('firstname') }}" required placeholder="First" autofocus>
                                    @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4 col-12">

                                    <input type="text" name="mi" class="form-control @error('mi') is-invalid @enderror" id="mi" value="{{ old('mi') }}"  placeholder="M.I." >
                                    @error('mi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="col-md-3">
                            <legend class="col-form-label">DATE</legend>
                            <div class="form-row">
                                <div class="form-group col col-12">

                                    <input type="date" name="date" class="form-control  @error('mi') is-invalid @enderror" id="mi" value="{{ old('mi') }}" required  autofocus id="date" placeholder="Date">
                                    @error('mi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="col-md-12">

                            <legend class="col-form-label">ADDRESS</legend>
                            <div class="form-row">

                                    <div class="form-group col-md-8 col-12">

                                        <input type="text" name="address" class="form-control  @error('address') is-invalid @enderror"  value="{{ old('address') }}" required  autofocus id="address" placeholder="Street Address">
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>




                                    <div class="form-group col-md-4 col-12">

                                        <input type="text" name="apartment" class="form-control  @error('apartment') is-invalid @enderror"  value="{{ old('apartment') }}"   autofocus id="apartment" placeholder="Apartment/Unit # (Optional)">
                                        @error('apartment')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                            </div>


                            <div class="form-row">

                                <div class="form-group col-md-5 col-12">

                                    <input type="text" name="city" class="form-control  @error('city') is-invalid @enderror"  value="{{ old('city') }}" required  autofocus id="city" placeholder="City">
                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>



                                <div class="form-group col-md-5 col-12">

                                    <input type="text" name="state" class="form-control  @error('state') is-invalid @enderror"  value="{{ old('state') }}" required  autofocus id="state" placeholder="State">
                                    @error('state')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group col-md-2 col-12">

                                    <input type="text" name="zipcode" class="form-control  @error('zipcode') is-invalid @enderror"  value="{{ old('zipcode') }}" required  autofocus id="zipcode" placeholder="Zip code">
                                    @error('zipcode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">

                            <div class="col-md-6">

                                <legend class="col-form-label">PHONE</legend>
                                <div class="form-row">


                                    <div class="form-group col-md-12 col-12">

                                        <input type="text" name="phone" class="form-control  @error('phone') is-invalid @enderror"  value="{{ old('phone') }}" required  autofocus id="phone" placeholder="Phone">
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <legend class="col-form-label">EMAIL</legend>
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-12" >

                                        <input type="text" name="email" class="form-control  @error('phone') is-invalid @enderror"  value="{{ old('phone') }}" required  autofocus id="email" placeholder="Email">
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                    </div>


                    <div class="form-row">
                        <div class="col-md-4">
                            <legend class="col-form-label etiqueta">DATE OF BIRTH</legend>
                            <div class="form-row">
                                <div class="form-group col">

                                    <input type="date" name="birthday"  class="form-control  @error('birthday') is-invalid @enderror"  value="{{ old('birthday') }}" required  autofocus id="birthday" placeholder="Date of birth">
                                    @error('birthday')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <legend class="col-form-label etiqueta">Social Security No.</legend>
                            <div class="form-row">
                                <div class="form-group col">

                                    <input type="text" name="socialnumber" class="form-control  @error('socialnumber') is-invalid @enderror"  value="{{ old('socialnumber') }}" required  autofocus id="socialnumber" placeholder="Social Security No.">
                                    @error('socialnumber')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <legend class="col-form-label etiqueta">Place of Birth</legend>
                            <div class="form-row">
                                <div class="form-group col">

                                    <input type="text" name="placebirth" class="form-control  @error('placebirth') is-invalid @enderror"  value="{{ old('placebirth') }}" required  autofocus id="placebirth" placeholder="Place of Birth">
                                    @error('placebirth')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="col-md-7">
                            <legend class="col-form-label etiqueta">Position Applied for and desired pay</legend>
                            <div class="form-row">
                                <div class="form-group col">

                                    <input type="text" name="appliedpay" class="form-control  @error('appliedpay') is-invalid @enderror"  value="{{ old('appliedpay') }}" required  autofocus id="appliedpay" placeholder="Position Applied for and desired pay">
                                    @error('appliedpay')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>



                        <div class="col-md-5">
                            <legend class="col-form-label etiqueta">Which shift are you applying for?</legend>

                            <div class="form-row">

                                    <div class="form-check col-12 col-sm-3  form-check-inline">
                                        <input id="primero" class="form-check-input @error('appliedpay') is-invalid @enderror" @if(old('appliedpay')=="1st Shift") checked  @endif type="radio" name="whichshift" id="primero" value="1st Shift" required>
                                        <label class="form-check-label" for="primero">
                                            1st Shift
                                        </label>
                                    </div>
                                    <div class="form-check col-12 col-sm-3  form-check-inline">
                                        <input id="segundo" class="form-check-input @error('appliedpay') is-invalid @enderror" @if(old('appliedpay')=="2nd Shift") checked  @endif type="radio" name="whichshift" id="segundo" value="2nd Shift" required>
                                        <label class="form-check-label" for="segundo">
                                            2nd Shift
                                        </label>
                                    </div>
                                    <div class="form-check col-12 col-sm-3  form-check-inline">
                                        <input id="tercero" class="form-check-input @error('appliedpay') is-invalid @enderror" @if(old('appliedpay')=="3rd Shift") checked  @endif type="radio" name="whichshift" id="tercero" value="3rd Shift" required>
                                        <label class="form-check-label" for="tercero">
                                            3rd Shift
                                        </label>
                                        @error('appliedpay')
                                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div>

                    <div class="form-row">


                        <div class="col-md-10">

                            <legend class="col-form-label etiqueta">Which days are you available?</legend>

                            <div class="form-row">
                                <div class="form-check form-check-inline ">
                                    <input class="form-check-input week" type="checkbox" name="sunday" id="sunday" value="1" >
                                    <label class="form-check-label" for="sunday">Sunday</label>
                                </div>

                                <div class="form-check form-check-inline ">
                                    <input class="form-check-input week" type="checkbox" name="monday" id="monday" value="2">
                                    <label class="form-check-label" for="monday">Monday</label>
                                </div>
                                <div class="form-check form-check-inline ">
                                    <input class="form-check-input week" type="checkbox" name="tuesday" id="tuesday" value="3">
                                    <label class="form-check-label" for="tuesday">Tuesday</label>
                                </div>


                                <div class="form-check form-check-inline ">
                                    <input class="form-check-input week" type="checkbox" name="wednesday" id="wednesday" value="4">
                                    <label class="form-check-label" for="wednesday">Wednesday</label>
                                </div>
                                <div class="form-check form-check-inline ">
                                    <input class="form-check-input week" type="checkbox" name="thursday" id="thursday" value="5">
                                    <label class="form-check-label" for="thursday">Thursday</label>
                                </div>
                                <div class="form-check form-check-inline ">
                                    <input class="form-check-input week" type="checkbox" name="friday" id="friday" value="6">
                                    <label class="form-check-label" for="friday">Friday</label>
                                </div>

                                <div class="form-check form-check-inline ">
                                    <input class="form-check-input week" type="checkbox" name="saturday" id="saturday" value="7">
                                    <label class="form-check-label" for="saturday">Saturday</label>
                                </div>
                            </div>

                        </div>

                    </div>


                    <div class="form-row">

                        <div class="col-md-5">

                            <legend class="col-form-label etiqueta">Are you a citizen of the United States?</legend>
                            <div class="form-row">

                                    <div class="form-check form-check-inline">
                                    <input  id="segundo1" class="form-check-input @error('citizen')  is-invalid @enderror" @if(old('citizen')=="yes") checked  @endif type="radio" name="citizen" value="yes" required>
                                    <label class="form-check-label" for="segundo1">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check  form-check-inline">
                                    <input id="tercero1" class="form-check-input @error('citizen') is-invalid @enderror" @if(old('citizen')=="no") checked  @endif type="radio" name="citizen" value="no" required>
                                    <label class="form-check-label" for="tercero1">
                                        No
                                    </label>
                                    @error('citizen')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="col-md-7">
                            <legend class="col-form-label etiqueta">If no, are you authorized to work in the U.S.?</legend>
                            <div class="form-row">
                                <div class="form-check form-check-inline">
                                    <input id="segundo2" class="form-check-input @error('authorized') is-invalid @enderror" @if(old('authorized')=="yes") checked  @endif type="radio" name="authorized" value="yes">
                                    <label class="form-check-label" for="segundo2">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check  form-check-inline">
                                    <input id="tercero2" class="form-check-input @error('authorized') is-invalid @enderror" @if(old('authorized')=="no") checked  @endif type="radio" name="authorized" value="no">
                                    <label class="form-check-label" for="tercero2">
                                        No
                                    </label>
                                    @error('authorized')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-5">
                            <legend class="col-form-label etiqueta">Have you ever worked for this company?</legend>
                            <div class="form-row">
                                <div class="form-check form-check-inline">
                                    <input id="segundo3" class="form-check-input @error('worked') is-invalid @enderror" @if(old('worked')=="yes") checked  @endif type="radio" name="worked" value="yes" required>
                                    <label class="form-check-label" for="segundo3">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check  form-check-inline">
                                    <input id="tercero3" class="form-check-input @error('worked') is-invalid @enderror" @if(old('worked')=="no") checked  @endif type="radio" name="worked" value="no" required>
                                    <label class="form-check-label" for="tercero3">
                                        No
                                    </label>
                                    @error('worked')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-7">

                            <legend class="col-form-label etiqueta">If yes, when?</legend>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-12">

                                    <input type="text" name="when" class="form-control" id="when" placeholder="If yes, when?">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="col-md-5">
                            <legend class="col-form-label etiqueta">Have you ever been convicted of a felony?</legend>

                            <div class="form-row">
                                <div class="form-check form-check-inline">
                                    <input id="segundo4" class="form-check-input @error('convicted') is-invalid @enderror" @if(old('convicted')=="yes") checked  @endif type="radio" name="convicted" value="yes">
                                    <label class="form-check-label" for="segundo4">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check  form-check-inline">
                                    <input id="tercero4" class="form-check-input @error('convicted') is-invalid @enderror" @if(old('convicted')=="no") checked  @endif type="radio" name="convicted" value="no">
                                    <label class="form-check-label" for="tercero4">
                                        No
                                    </label>
                                    @error('convicted')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-7">
                            <legend class="col-form-label etiqueta">If yes, explain</legend>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-12">

                                    <input type="text" name="explain1" class="form-control" id="explain1" placeholder="If yes, explain">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-5">
                            <legend class="col-form-label etiqueta">Are you currently under indictment for a crime?</legend>
                            <div class="form-row">
                                <div class="form-check form-check-inline">
                                    <input id="segundo5" class="form-check-input @error('indictment') is-invalid @enderror" @if(old('indictment')=="yes") checked  @endif type="radio" name="indictment" value="yes">
                                    <label class="form-check-label" for="segundo5">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check  form-check-inline">
                                    <input id="tercero5" class="form-check-input @error('indictment') is-invalid @enderror" @if(old('indictment')=="no") checked  @endif type="radio" name="indictment" value="no">
                                    <label class="form-check-label" for="tercero5">
                                        No
                                    </label>
                                    @error('indictment')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                        </div>
                        </div>

                        <div class="col-md-7">
                            <legend class="col-form-label etiqueta">If yes, explain</legend>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-12">

                                    <input type="text" name="explain2" class="form-control" id="explain2" placeholder="If yes, explain">
                                </div>
                            </div>
                        </div>

                    </div>

                </div>



                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="linebox">
                            <h1>Education and Training</h1>
                            </div>
                        </div>
                    </div>

                <!--start-->

                    <div class="lienzo">


                        <div class="form-row">
                            <div class="col-md-4">

                                <legend class="col-form-label etiqueta">Did you graduate High School?</legend>

                                <div class="form-row">
                                    <div class="form-check form-check-inline">
                                        <input id="segundo6" class="form-check-input  @error('graduatehigh') is-invalid @enderror" @if(old('graduatehigh')=="yes") checked  @endif type="radio" name="graduatehigh" value="yes" required>
                                        <label class="form-check-label" for="segundo6">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check  form-check-inline">
                                        <input  id="segundo6" class="form-check-input  @error('graduatehigh') is-invalid @enderror" @if(old('graduatehigh')=="no") checked  @endif type="radio" name="graduatehigh" value="no" required>
                                        <label class="form-check-label" for="tercero6">
                                            No
                                        </label>
                                        @error('graduatehigh')
                                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-2">
                                <legend class="col-form-label etiqueta">From</legend>
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-12">

                                        <input type="date" name="highfrom" class="form-control" id="from1" placeholder="From" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">

                                <legend class="col-form-label etiqueta">to</legend>
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-12">

                                        <input type="date" name="hightto" class="form-control" id="to1" placeholder="To"  required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">

                                <legend class="col-form-label etiqueta">High school name</legend>
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-12">

                                        <input type="text" name="hightschool" class="form-control" id="hight" placeholder="High school name" required>
                                    </div>
                                </div>
                            </div>

                        </div>



                        <div class="form-row">



                            <div class="col-md-4">

                                <legend class="col-form-label etiqueta">Did you graduate College?</legend>
                                <div class="form-row">
                                    <div class="form-check form-check-inline">
                                        <input id="segundo7" class="form-check-input @error('graduatecollage') is-invalid @enderror" @if(old('graduatecollage')=="yes") checked  @endif type="radio" name="graduatecollage" value="yes">
                                        <label class="form-check-label" for="segundo7">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check  form-check-inline">
                                        <input id="tercero7" class="form-check-input @error('graduatecollage') is-invalid @enderror" @if(old('graduatecollage')=="no") checked  @endif type="radio" name="graduatecollage" value="no">
                                        <label class="form-check-label" for="tercero7">
                                            No
                                        </label>
                                        @error('graduatecollage')
                                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <legend class="col-form-label etiqueta">From</legend>
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-12">

                                        <input type="date" name="collagefrom" class="form-control" id="collagefrom" placeholder="From">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <legend class="col-form-label etiqueta">to</legend>
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-12">

                                        <input type="date" name="collageto" class="form-control" id="collageto" placeholder="To">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">

                                <legend class="col-form-label etiqueta"> College name:</legend>
                                <div class="form-row">

                                    <div class="form-group col-md-12 col-12">

                                        <input type="text" name="collaganame" class="form-control" id="collaganame" placeholder="College name">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <legend class="col-form-label etiqueta">If yes, what major</legend>
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-12">

                                        <input type="text" name="whatmayor" class="form-control" id="whatmayor" placeholder="If yes, what major">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <legend class="col-form-label etiqueta">Level completed</legend>
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-12">

                                        <input type="text" name="completed" class="form-control" id="completed" placeholder="Level completed">
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="form-row">

                            <div class="col-md-6">
                                <legend class="col-form-label etiqueta"> Do you have an active Security Registration Card?</legend>
                                <div class="form-row">

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('activecard') is-invalid @enderror" @if(old('activecard')=="yes") checked  @endif type="radio" name="activecard" id="primero" value="yes"  required>
                                        <label class="form-check-label" for="primero">
                                        Yes
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('activecard') is-invalid @enderror" @if(old('activecard')=="no") checked  @endif type="radio" name="activecard" id="segundo" value="no" required>
                                        <label class="form-check-label" for="segundo">
                                        No
                                        </label>
                                        @error('activecard')
                                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>

                            </div>


                            <div class="col-md-6">

                                <legend class="col-form-label etiqueta"> If yes, what level Security Officer are you?</legend>
                                <div class="form-row">

                                    <div class="form-check form-check-inline">
                                        <input id="primero8" class="form-check-input @error('officer') is-invalid @enderror" @if(old('officer')=="2") checked  @endif type="radio" name="officer" id="primero" value="2"  >
                                        <label class="form-check-label" for="primero8">
                                        2
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input id="segundo8" class="form-check-input @error('officer') is-invalid @enderror" @if(old('officer')=="3") checked  @endif type="radio" name="officer" id="segundo" value="3" >
                                        <label class="form-check-label" for="segundo8">
                                        3
                                        </label>
                                    </div>
                                    <div class="form-check  form-check-inline">
                                        <input id="tercero8" class="form-check-input @error('officer') is-invalid @enderror" @if(old('officer')=="4") checked  @endif type="radio" name="officer" id="tercero" value="4" >
                                        <label class="form-check-label" for="tercero8">
                                        4
                                        </label>
                                        @error('officer')
                                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="form-row">

                            <div class="col-md-6">

                                <legend class="col-form-label etiqueta"> If Level 3, do you currently have a firearm?</legend>
                                <div class="form-row">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('firearm') is-invalid @enderror" @if(old('firearm')=="no") checked  @endif type="radio" name="firearm" id="primero" value="yes"  >
                                        <label class="form-check-label" for="primero">
                                        Yes
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('firearm') is-invalid @enderror" @if(old('firearm')=="no") checked  @endif type="radio" name="firearm" id="segundo" value="no" >
                                        <label class="form-check-label" for="segundo">
                                        No
                                        </label>
                                        @error('firearm')
                                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">

                                <legend class="col-form-label etiqueta"> If yes, what level holster are you currently using?</legend>
                                <div class="form-row">
                                    <div class="form-check form-check-inline">
                                        <input id="primero9" class="form-check-input @error('holster') is-invalid @enderror" @if(old('holster')=="1") checked  @endif type="radio" name="holster" id="primero" value="1"  >
                                        <label class="form-check-label" for="primero9">
                                        1
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input id="segundo9" class="form-check-input @error('holster') is-invalid @enderror" @if(old('holster')=="2") checked  @endif type="radio" name="holster" id="segundo" value="2" >
                                        <label class="form-check-label" for="segundo9">
                                        2
                                        </label>
                                    </div>
                                    <div class="form-check  form-check-inline">
                                        <input id="tercero9" class="form-check-input @error('holster') is-invalid @enderror" @if(old('holster')=="3") checked  @endif type="radio" name="holster" id="tercero" value="3" >
                                        <label class="form-check-label" for="tercero9">
                                        3
                                        </label>
                                        @error('holster')
                                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="col-md-6">

                                <legend class="col-form-label etiqueta"> any other certifications: </legend>
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-12">

                                        <input type="text" name="others" id="others" placeholder="Any other certifications" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--end-->



                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="linebox">
                            <h1>References</h1>
                            </div>
                        </div>
                    </div>

                <div class="lienzo">
                    <div class="row">
                            <div class="col-md-12">
                                <div class="form">
                                    <p>Please list three professional references.  </p>
                                </div>
                            </div>

                    </div>

                    <legend>REFERENCE #1</legend>
                    <div class="form-row">
                        <div class="col-md-6">
                            <legend class="col-form-label etiqueta"> Full name </legend>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-12">

                                    <input type="text" id="fullname" name="fullname[]" class="form-control" placeholder="Full name">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <legend class="col-form-label etiqueta"> Relationship </legend>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-12">

                                    <input type="text"  name="relationship[]" class="form-control" placeholder="Relationship">
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="form-row">

                        <div class="col-md-6">
                            <legend class="col-form-label etiqueta"> Company </legend>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-12">

                                    <input type="text" id="company" name="companyref[]" class="form-control" placeholder="Company">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <legend class="col-form-label etiqueta"> Phone </legend>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-12">

                                    <input type="text" id="phone" name="phoneref[]" class="form-control" placeholder="Phone">
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="form-row">
                        <div class="col-md-12">
                            <legend class="col-form-label etiqueta"> Address </legend>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-12">

                                    <input type="text" id="addressreference1" name="addressreference[]" class="form-control" placeholder="Address">
                                </div>
                            </div>
                        </div>

                    </div>


                    <legend>REFERENCE #2</legend>
                    <div class="form-row">

                        <div class="col-md-6">
                            <legend class="col-form-label etiqueta"> Full name </legend>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-12">

                                    <input type="text" id="fullname2" name="fullname[]" class="form-control" placeholder="Full name">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <legend class="col-form-label etiqueta"> Relationship </legend>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-12">

                                    <input type="text" id="relationship2" name="relationship[]" class="form-control" placeholder="Relationship">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="col-md-6">
                            <legend class="col-form-label etiqueta"> Company </legend>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-12">

                                    <input type="text"  name="companyref[]" class="form-control" placeholder="Company">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <legend class="col-form-label etiqueta"> Phone </legend>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-12">

                                    <input type="text" id="phone2" name="phoneref[]" class="form-control" placeholder="Phone">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="col-md-12">
                            <legend class="col-form-label etiqueta"> Address </legend>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-12">
                                    <input type="text" id="addressreference2" name="addressreference[]" class="form-control" placeholder="Address">
                                </div>
                            </div>
                        </div>

                    </div>

                    <legend>REFERENCE #3</legend>
                    <div class="form-row">
                        <div class="col-md-6">
                             <legend class="col-form-label etiqueta"> Full name </legend>
                             <div class="form-row">
                                <div class="form-group col-md-12 col-12">

                                    <input type="text" id="fullname3" name="fullname[]" class="form-control" placeholder="Full name">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <legend class="col-form-label etiqueta"> Relationship </legend>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-12">

                                    <input type="text" id="relationship3" name="relationship[]" class="form-control" placeholder="Relationship">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-row">
                            <div class="col-md-6">
                                <legend class="col-form-label etiqueta"> Company </legend>
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-12">

                                        <input type="text" id="company3" name="companyref[]" class="form-control" placeholder="Company">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <legend class="col-form-label etiqueta"> Phone </legend>
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-12">

                                        <input type="text" id="phone4" name="phoneref[]" class="form-control" placeholder="Phone">
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="form-row">
                            <div class="col-md-12">
                                 <legend class="col-form-label etiqueta"> Address </legend>
                                 <div class="form-row">
                                    <div class="form-group col-md-12 col-12">

                                        <input type="text" id="addressreference3" name="addressreference[]" class="form-control" placeholder="Address">
                                    </div>
                                </div>
                            </div>
                    </div>



                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="linebox">
                            <h1>Previous Employment</h1>
                            </div>
                        </div>
                    </div>

                    <div class="lienzo">
                        <div class="form-row">
                        <div class="col-md-6">
                             <legend class="col-form-label etiqueta"> Company </legend>
                             <div class="form-row">
                                <div class="form-group col-md-12 col-12">

                                    <input type="text" name="companyprev[]" id="company" class="form-control" placeholder="Company" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                             <legend class="col-form-label etiqueta"> Phone </legend>
                             <div class="form-row">
                                <div class="form-group col-md-12 col-12">

                                    <input type="text" name="phoneemp[]" id="phone" class="form-control" placeholder="Phone" required>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                             <legend class="col-form-label etiqueta"> Address </legend>
                             <div class="form-row">
                                <div class="form-group col-md-12 col-12">

                                    <input type="text" name="addressempl[]" id="addressempl" class="form-control" placeholder="Address" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                             <legend class="col-form-label etiqueta"> Supervisor </legend>
                             <div class="form-row">
                                <div class="form-group col-md-12 col-12">

                                    <input type="text" name="supervisor[]" id="supervisor" class="form-control" placeholder="Supervisor" required>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="form-row">
                        <div class="col-md-4">
                            <legend class="col-form-label etiqueta"> Job Title </legend>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-12">

                                    <input type="text" name="jobtitle[]" id="jobtitle" class="form-control" placeholder="Job Title" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <legend class="col-form-label etiqueta"> Starting Salary </legend>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-12">

                                    <input type="text" name="starting[]" id="starting" class="form-control" placeholder="Starting Salary" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <legend class="col-form-label etiqueta"> Ending Salary </legend>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-12">

                                    <input type="text" name="ending[]" id="ending" class="form-control" placeholder="Ending Salary" required>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="form-row">

                        <div class="col-md-3">
                            <legend class="col-form-label etiqueta"> From </legend>
                             <div class="form-row">

                                <div class="form-group col-md-12 col-12">

                                    <input type="date" name="from[]" id="from" class="form-control" placeholder="From" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <legend class="col-form-label etiqueta"> To </legend>
                             <div class="form-row">

                                <div class="form-group col-md-12 col-12">

                                    <input type="date" name="to[]" id="to" class="form-control" placeholder="To" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <legend class="col-form-label etiqueta"> Reason for Leaving</legend>
                             <div class="form-row">

                                <div class="form-group col-md-12 col-12">

                                    <input type="text" name="reason[]" id="reason" class="form-control" placeholder="Reason for Leaving" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-12">
                            <legend class="col-form-label etiqueta"> May we contact your previous supervisor for a reference?</legend>
                             <div class="form-row">



                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="references1" id="sp1" value="yes" required>
                                    <label class="form-check-label" for="sp1">
                                    Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="references1" id="sp2" value="no" required>
                                    <label class="form-check-label" for="sp2">
                                    No
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                        <!--bloque2-->

                    <div class="form-row">
                        <div class="col-md-6">
                            <legend class="col-form-label etiqueta">Company</legend>

                            <div class="form-row">
                                <div class="form-group col-md-12 col-12">

                                    <input type="text" name="companyprev[]" id="company2" class="form-control" placeholder="Company">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <legend class="col-form-label etiqueta"> Phone</legend>

                            <div class="form-row">
                                <div class="form-group col-md-12 col-12">

                                    <input type="text" name="phoneemp[]" id="phone2" class="form-control" placeholder="Phone">
                                </div>
                            </div>
                       </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <legend class="col-form-label etiqueta"> Address</legend>

                            <div class="form-row">
                                <div class="form-group col-md-12 col-12">

                                    <input type="text" name="addressempl[]" id="address2" class="form-control" placeholder="Address">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <legend class="col-form-label etiqueta"> Supervisor</legend>

                            <div class="form-row">
                                <div class="form-group col-md-12 col-12">

                                    <input type="text" name="supervisor[]" id="supervisor2" class="form-control" placeholder="Supervisor">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4">
                            <legend class="col-form-label etiqueta"> Job Title</legend>

                            <div class="form-row">
                                <div class="form-group col-md-12 col-12">

                                    <input type="text" name="jobtitle[]" id="jobtitle2" class="form-control" placeholder="Job Title">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <legend class="col-form-label etiqueta"> Starting Salary</legend>

                            <div class="form-row">
                                <div class="form-group col-md-12 col-12">

                                    <input type="text" name="starting[]" id="starting2" class="form-control" placeholder="Starting Salary">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <legend class="col-form-label etiqueta"> Ending Salary</legend>

                            <div class="form-row">
                                <div class="form-group col-md-12 col-12">

                                    <input type="text" name="ending[]" id="ending2" class="form-control" placeholder="Ending Salary">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3">
                            <legend class="col-form-label etiqueta">From</legend>

                            <div class="form-row">
                                <div class="form-group col-md-12 col-12">

                                    <input type="date" name="from[]" id="from2" class="form-control" placeholder="From">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <legend class="col-form-label etiqueta"> To</legend>

                            <div class="form-row">
                                <div class="form-group col-md-12 col-12">

                                    <input type="date" name="to[]" id="to2" class="form-control" placeholder="To">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <legend class="col-form-label etiqueta"> Reason for Leaving</legend>

                            <div class="form-row">
                                <div class="form-group col-md-12 col-12">

                                    <input type="text" name="reason[]" id="reason2" class="form-control" placeholder="Reason for Leaving">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <legend class="col-form-label etiqueta"> May we contact your previous supervisor for a reference?</legend>

                            <div class="form-row">


                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="references2" id="sp3" value="yes">
                                    <label class="form-check-label" for="sp3">
                                    Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="references2" id="sp4" value="no">
                                    <label class="form-check-label" for="sp4">
                                    No
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>

                 <!--bloque3-->
                    <div class="form-row">
                        <div class="col-md-6">
                             <legend class="col-form-label etiqueta"> Company</legend>
                             <div class="form-row">
                            <div class="form-group col-md-12 col-12">


                                <input type="text" name="companyprev[]" id="company3" class="form-control" placeholder="Company">
                            </div>
                        </div>
                        </div>

                        <div class="col-md-6">
                             <legend class="col-form-label etiqueta"> Phone</legend>
                             <div class="form-row">
                            <div class="form-group col-md-12 col-12">

                                <input type="text" name="phoneemp[]" id="phone3" class="form-control" placeholder="Phone">
                            </div>
                        </div>
                       </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                             <legend class="col-form-label etiqueta"> Address</legend>
                             <div class="form-row">
                            <div class="form-group col-md-12 col-12">

                                <input type="text" name="addressempl[]" id="address3" class="form-control" placeholder="Address">
                            </div>
                        </div>
                        </div>

                        <div class="col-md-6">
                             <legend class="col-form-label etiqueta"> Supervisor</legend>
                             <div class="form-row">
                            <div class="form-group col-md-12 col-12">

                                <input type="text" name="supervisor[]" id="supervisor3" class="form-control" placeholder="Supervisor">
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                             <legend class="col-form-label etiqueta"> Job Title</legend>
                             <div class="form-row">
                            <div class="form-group col-md-12 col-12">

                                <input type="text" name="jobtitle[]" id="jobtitle3" class="form-control" placeholder="Job Title">
                            </div>
                        </div>
                        </div>

                        <div class="col-md-4">
                             <legend class="col-form-label etiqueta">Starting Salary</legend>
                             <div class="form-row">
                            <div class="form-group col-md-12 col-12">

                                <input type="text" name="starting[]" id="starting3" class="form-control" placeholder="Starting Salary">
                            </div>
                        </div>
                        </div>
                        <div class="col-md-4">
                             <legend class="col-form-label etiqueta"> Ending Salary</legend>
                             <div class="form-row">
                            <div class="form-group col-md-12 col-12">

                                <input type="text" name="ending[]" id="ending3" class="form-control" placeholder="Ending Salary">
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3">
                             <legend class="col-form-label etiqueta">From</legend>
                             <div class="form-row">
                            <div class="form-group col-md-12 col-12">

                                <input type="date" name="from[]" id="from3" class="form-control" placeholder="From">
                            </div>
                        </div>
                        </div>

                        <div class="col-md-3">
                             <legend class="col-form-label etiqueta"> To</legend>
                             <div class="form-row">
                            <div class="form-group col-md-12 col-12">

                                <input type="date" name="to[]" id="to3" class="form-control" placeholder="To">
                            </div>
                        </div>
                        </div>

                        <div class="col-md-3">
                             <legend class="col-form-label etiqueta"> Reason for Leaving</legend>
                             <div class="form-row">
                                <div class="form-group col-md-12 col-12">

                                    <input type="text" name="reason[]" id="reason3" class="form-control" placeholder="Reason for Leaving">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                             <legend class="col-form-label etiqueta"> May we contact your previous supervisor for a reference?</legend>
                             <div class="form-row">


                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="references3" id="sp5" value="yes">
                                    <label class="form-check-label" for="sp5">
                                    Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="references3" id="sp6" value="no">
                                    <label class="form-check-label" for="sp6">
                                    No
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>



                </div>


                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="linebox">
                            <h1>Military Service</h1>
                        </div>
                    </div>
                </div>

                <div class="lienzo">

                    <div class="form-row">
                        <div class="col-md-6">
                            <legend class="col-form-label etiqueta"> Branch</legend>
                            <div class="form-row">
                            <div class="form-group col-md-12 col-12">

                                <input type="text" name="branch" id="branch" class="form-control" placeholder="Branch">
                            </div>
                        </div>
                        </div>
                        <div class="col-md-3">
                            <legend class="col-form-label etiqueta"> To</legend>
                            <div class="form-row">
                            <div class="form-group col-md-12 col-12">

                                <input type="date" name="tomilitary" id="tomilitary" class="form-control" placeholder="To">
                            </div>
                        </div>
                        </div>

                        <div class="col-md-3">
                            <legend class="col-form-label etiqueta"> From</legend>
                            <div class="form-row">
                            <div class="form-group col-md-12 col-12">

                                <input type="date" name="frommilitary" id="frommilitary" class="form-control" placeholder="From">
                            </div>
                        </div>
                       </div>
                    </div>
                    <div class="form-row">

                        <div class="col-md-6">
                            <legend class="col-form-label etiqueta"> Rank at Discharge</legend>
                            <div class="form-row">
                            <div class="form-group col-md-12 col-12">

                                <input type="text" name="rank" id="rank" class="form-control" placeholder="Rank at Discharge">
                            </div>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <legend class="col-form-label etiqueta"> Type of Discharge</legend>
                            <div class="form-row">
                            <div class="form-group col-md-12 col-12">

                                <input type="text" name="type" id="type" class="form-control" placeholder="Type of Discharge">
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <legend class="col-form-label etiqueta"> If other than honorable, explain</legend>
                            <div class="form-row">
                            <div class="form-group col-md-12 col-12">

                                <input type="text" name="explain" id="explain" class="form-control" placeholder="If other than honorable, explain:">
                            </div>
                        </div>
                        </div>
                    </div>

                </div>



                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="linebox">
                                <h1>Disclaimer and Signature</h1>
                            </div>
                        </div>
                    </div>

                    <div class="lienzo mb-5">


                        <div class="col-md-12">
                        <p>I certify that my answers are true and complete to the best of my knowledge. If this application leads to employment, I understand that false or misleading information in my application or interview may result in my release.</p>
                        </div>
                        <div class="form-row">

                            <div class="col-md-12">
                                <legend class="col-form-label etiqueta"> Attach Id</legend>
                                <input id="fileid" name="fileid[]" type="file" multiple>


                            </div>
                            <div class="col-md-4">
                                 <legend class="col-form-label etiqueta"> Signature</legend>
                                 <div class="form-row">
                                <div class="form-group col-md-12 col-12">

                                    <input type="text" name="signature" id="signature" class="form-control" placeholder="Signature">
                                </div>
                            </div>
                            </div>


                            <div class="col-md-4">

                                 <div class="form-row">


                                <!--<div class="custom-file col-md-12 col-12">

                                    <input type="file" class="custom-file-input"  name="fileid" id="fileid" >
                                    <label class="custom-file-label" for="afile">ATTACH ID</label>
                                    <span class="file-upload"></span>


                                </div>-->
                            </div>
                            </div>


                            <div class="col-md-4">
                                 <legend class="col-form-label etiqueta"> Date</legend>
                                 <div class="form-row">
                                <div class="form-group col-md-12 col-12">

                                    <input type="date" name="datedisclamer" id="datedisclamer" class="form-control" placeholder="Date">
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="text-center recap @error('g-recaptcha-response') is-invalid @enderror" autofocus>
                            <div class="g-recaptcha" data-sitekey="6LcOpMUZAAAAAGIG8SjEzAET7tYCq5RrjX_2Hhcz"></div>
                        </div>
                    </div>


                    <div class="row justify-content-center">
                        <div class="col-md-4 text-center">
                            <button type="submit" onclick="this.form.submit();this.disabled = true;" class="btn btn-danger btn-medium btn-employment-submit" >SUBMIT</button>
                        </div>
                    </div>
                   </form>
                </div>

        </div>
    </div>
</section>
@endsection
