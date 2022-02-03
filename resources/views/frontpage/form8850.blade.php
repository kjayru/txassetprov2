@extends('layouts.frontend.app')

@section('content')


<section id="employment">

    <div class="sectiongray separador2">
       <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h2 class="titulosimbolo">simbolo</h2>
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
                                <h1>FORM 8850</h1>
                            </div>

                            <h4> Pre-Screening Notice and Certification Request for  the Work Opportunity Credit</h4>
                            <p>  Information about Form 8850 and its separate instructions is at www.irs.gov/form8850</p>

                            <hr>
                            <p>Job applicant: Fill in the lines below and check any boxes that apply. Complete only this side.</p>
                        </div>

                    </div>

                    <form class="form" action="{{route('front.thanks2')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                <div class="lienzo" id="form__8855">


                    <div class="form-row">
                        <div class="col-md-8">
                            <legend class="col-form-label">YOUR NAME</legend>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-12">
                                    <input type="text" name="yourname" class="form-control @error('socialnumber') is-invalid @enderror" id="yourname" value="{{ old('yourname') }}" required placeholder="" >
                                    @error('yourname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <legend class="col-form-label">SOCIAL SECURITY NUMBER</legend>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-12">

                                    <input type="text" name="socialnumber" class="form-control @error('socialnumber') is-invalid @enderror" id="socialnumber" value="{{ old('socialnumber') }}" required placeholder="" >

                                    @error('socialnumber')
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

                            <legend class="col-form-label">STREET ADDRESS WHERE YOU LIVE</legend>
                            <div class="form-row">

                                    <div class="form-group col-md-12 col-12">

                                        <input type="text" name="address" class="form-control  @error('address') is-invalid @enderror"  value="{{ old('address') }}" required  autofocus id="address" placeholder="">
                                        @error('address')
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

                            <legend class="col-form-label"> CITY OR TOWN, STATE, AND ZIP CODE</legend>
                            <div class="form-row">

                                    <div class="form-group col-md-12 col-12">

                                        <input type="text" name="citystate" class="form-control  @error('citystate') is-invalid @enderror"  value="{{ old('citystate') }}" required  autofocus id="citystate" placeholder="">
                                        @error('citystate')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                            </div>

                        </div>
                    </div>



                    <div class="form-row">
                        <div class="col-md-8">
                            <legend class="col-form-label">COUNTRY</legend>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-12">
                                    <input type="text" name="country" class="form-control @error('country') is-invalid @enderror" id="country" value="{{ old('country') }}" required placeholder="" >
                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <legend class="col-form-label">TELEPHONE NUMBER</legend>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-12">

                                    <input type="text" name="telephone" class="form-control @error('telephone') is-invalid @enderror" id="telephone" value="{{ old('telephone') }}" required placeholder="" >

                                    @error('telephone')
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

                            <legend class="col-form-label uppercase"> If you are under age 40, enter your date of birth (month, day, year)</legend>
                            <div class="form-row">

                                    <div class="form-group col-md-4 col-12">

                                        <input type="text" name="birthday" class="form-control  @error('birthday') is-invalid @enderror"  value="{{ old('birthday') }}" required  autofocus id="birthday" placeholder="">
                                        @error('birthday')
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


                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="condicional[]" value="1" id="opcion1">
                                <label class="form-check-label" for="opcion1">
                                    Check here if you received a conditional certification from the state workforce agency (SWA) or a participating local agency
                                    for the work opportunity credit.
                                </label>
                            </div>


                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="condicional[]" value="2" id="opcion2" >

                                    Check here if any of the following statements apply to you.
                                    <label class="form-check-label" for="opcion2">
                                    <ul>
                                     <li>
                                         I am a member of a family that has received assistance from Temporary Assistance for Needy Families (TANF) for any 9
                                        months during the past 18 months.
                                        </li><li>
                                        I am a veteran and a member of a family that received Supplemental Nutrition Assistance Program (SNAP) benefits (food
                                        stamps) for at least a 3-month period during the past 15 months.
                                        </li><li>
                                        I was referred here by a rehabilitation agency approved by the state, an employment network under the Ticket to Work
                                        program, or the Department of Veterans Affairs.
                                        </li><li>
                                        I am at least age 18 but not age 40 or older and I am a member of a family that:<br>
                                        a. Received SNAP benefits (food stamps) for the past 6 months; or<br>
                                        b. Received SNAP benefits (food stamps) for at least 3 of the past 5 months, but is no longer eligible to receive them.
                                        </li><li>
                                        During the past year, I was convicted of a felony or released from prison for a felony.
                                        </li><li>
                                        I received supplemental security income (SSI) benefits for any month ending during the past 60 days.
                                        </li><li>
                                        I am a veteran and I was unemployed for a period or periods totaling at least 4 weeks but less than 6 months during the
                                        past year.
                                        </li>

                                    </ul>
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="condicional[]" value="3" id="opcion3">
                                <label class="form-check-label" for="opcion3">
                                    Check here if you are a veteran and you were unemployed for a period or periods totaling at least 6 months during the past
year.
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="condicional[]" value="4" id="opcion4">
                                <label class="form-check-label" for="opcion4">
                                    Check here if you are a veteran entitled to compensation for a service-connected disability and you were discharged or
                                    released from active duty in the U.S. Armed Forces during the past year.
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="condicional[]" value="5" id="opcion5">
                                <label class="form-check-label" for="opcion5">
                                    Check here if you are a veteran entitled to compensation for a service-connected disability and you were unemployed for a
period or periods totaling at least 6 months during the past year.
                                </label>
                            </div>






                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="condicional[]" value="7" id="opcion7">
                                <label class="form-check-label" for="opcion7">
                                    Check here if you are a member of a family that:
                                    <ul>
                                        <li>
                                    •Received TANF payments for at least the past 18 months; or
                                </li><li>
                                     Received TANF payments for any 18 months beginning after August 5, 1997, and the earliest 18-month period beginning
                                    after August 5, 1997, ended during the past 2 years; or
                                </li><li>
                                     Stopped being eligible for TANF payments during the past 2 years because federal or state law limited the maximum time
                                    those payments could be made.
                                </li>
                                    </ul>
                                </label>
                            </div>



                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="condicional[]" value="8" id="opcion8">
                                <label class="form-check-label" for="opcion8">
                                    Check here if you are in a period of unemployment that is at least 27 consecutive weeks and for all or part of that period
you received unemployment compensation.
                                </label>
                            </div>

                        </div>
                    </div>

                    <hr>

                    <div class="row justify-content-center">

                        <div class="col-md-12 text-center">
                        <h4>Signature—All Applicants Must Sign</h4>

                        <p class="subtext">
                            Under penalties of perjury, I declare that I gave the above information to the employer on or before the day I was offered a job, and it is, to the best of my knowledge, true,
correct, and complete.
                        </p>
                        </div>
                    </div>


                   <!-- <div class="form-row">
                        <div class="col-md-8">
                            <legend class="col-form-label uppercase">Job applicant’s signature</legend>


                            <div class="sigcanvas col-md-12">


                                <div id="signature-pad" class="signature-pad">
                                    <div class="signature-pad--body">
                                    <canvas></canvas>
                                    </div>
                                    <div class="signature-pad--footer">
                                    <div class="description">Sign above</div>

                                    <div class="signature-pad--actions">
                                        <div>
                                        <button type="button" class="button clear" data-action="clear">Clear</button>
                                        <button type="button" class="button" data-action="change-color">Change color</button>
                                        <button type="button" class="button" data-action="undo">Undo</button>

                                        </div>
                                        <div>
                                        <button type="button" class="button save" data-action="save-png">Save as PNG</button>
                                        <button type="button" class="button save" data-action="save-jpg">Save as JPG</button>
                                        <button type="button" class="button save" data-action="save-svg">Save as SVG</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>

                            </div>


                        </div>
                        <div class="col-md-4">
                            <legend class="col-form-label uppercase">Date</legend>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-12">

                                    <input type="text" name="telephone" class="form-control @error('telephone') is-invalid @enderror" id="telephone" value="{{ old('telephone') }}" required placeholder="" >

                                    @error('telephone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                -->

                <div class="col-md-12">
                    <div class="text-center recap @error('g-recaptcha-response') is-invalid @enderror" autofocus>
                        <div class="g-recaptcha" data-sitekey="6LcOpMUZAAAAAGIG8SjEzAET7tYCq5RrjX_2Hhcz"></div>
                    </div>
                </div>

                    <div class="row justify-content-center">
                        <div class="col-md-4 text-center">
                            <button class="btn btn-danger btn-medium" type="submit">SUBMIT</button>
                        </div>
                    </div>



                   </form>
                </div>


        </div>
    </div>
</section>




@endsection
