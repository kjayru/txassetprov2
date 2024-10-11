<div class="form-row">

    <div class="col-md-9">
        <legend class="col-form-label">FULL NAME *</legend>
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

                <input type="text" name="mi" class="form-control @error('mi') is-invalid @enderror" id="mi" value="{{ old('mi') }}"  placeholder="M.I." required>
                @error('mi')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>


    <div class="col-md-3">
        <legend class="col-form-label">DATE*</legend>
        <div class="form-row">
            <div class="form-group col col-12">

                <input type="date" name="date" class="form-control  @error('date') is-invalid @enderror"  value="{{ old('date') }}" required  id="date" placeholder="Date">
                @error('date')
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

        <legend class="col-form-label">ADDRESS*</legend>
        <div class="form-row">

                <div class="form-group col-md-8 col-12">

                    <input type="text" name="address" class="form-control  @error('address') is-invalid @enderror"  value="{{ old('address') }}" required   id="address" placeholder="Street Address">
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>




                <div class="form-group col-md-4 col-12">

                    <input type="text" name="apartment" class="form-control  @error('apartment') is-invalid @enderror"  value="{{ old('apartment') }}"    id="apartment" placeholder="Apartment/Unit # (Optional)">
                    @error('apartment')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

        </div>


        <div class="form-row">

            <div class="form-group col-md-5 col-12">

                <input type="text" name="city" class="form-control  @error('city') is-invalid @enderror"  value="{{ old('city') }}" required   id="city" placeholder="City">
                @error('city')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>



            <div class="form-group col-md-5 col-12">

                <input type="text" name="state" class="form-control  @error('state') is-invalid @enderror"  value="{{ old('state') }}" required  id="state" placeholder="State">
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

            <legend class="col-form-label">PHONE *</legend>
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

                    <input type="text" name="email" class="form-control  @error('email') is-invalid @enderror"  value="{{ old('email') }}" required  id="email" placeholder="Email">
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
        <legend class="col-form-label etiqueta">DATE OF BIRTH *</legend>
        <div class="form-row">
            <div class="form-group col">

                <input type="date" name="birthday"  class="form-control  @error('birthday') is-invalid @enderror"  value="{{ old('birthday') }}" required   id="birthday" placeholder="Date of birth">
                @error('birthday')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>


    <div class="col-md-4">
        <legend class="col-form-label etiqueta">Social Security No. *</legend>
        <div class="form-row">
            <div class="form-group col">

                <input type="text" name="socialnumber" class="form-control  @error('socialnumber') is-invalid @enderror"  value="{{ old('socialnumber') }}" required   id="socialnumber" placeholder="Social Security No.">
                @error('socialnumber')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>


    <div class="col-md-4">
        <legend class="col-form-label etiqueta">Place of Birth *</legend>
        <div class="form-row">
            <div class="form-group col">

                <input type="text" name="placebirth" class="form-control  @error('placebirth') is-invalid @enderror"  value="{{ old('placebirth') }}" required   id="placebirth" placeholder="Place of Birth">
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
        <legend class="col-form-label etiqueta">Position Applied for and desired pay *</legend>
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

        <legend class="col-form-label etiqueta">Which days are you available? *</legend>

        <div class="forms">
            <div class="form-check pb-2">
                <input class="form-check-input week" type="checkbox" name="days[]" id="sunday" value="1" >
                <label class="form-check-label" for="sunday">Sunday</label>
            </div>

            <div class="form-check  pb-2">
                <input class="form-check-input week" type="checkbox" name="days[]" id="monday" value="2">
                <label class="form-check-label" for="monday">Monday</label>
            </div>
            <div class="form-check  pb-2">
                <input class="form-check-input week" type="checkbox" name="days[]" id="tuesday" value="3">
                <label class="form-check-label" for="tuesday">Tuesday</label>
            </div>


            <div class="form-check  pb-2">
                <input class="form-check-input week" type="checkbox" name="days[]" id="wednesday" value="4">
                <label class="form-check-label" for="wednesday">Wednesday</label>
            </div>
            <div class="form-check  pb-2">
                <input class="form-check-input week" type="checkbox" name="days[]" id="thursday" value="5">
                <label class="form-check-label" for="thursday">Thursday</label>
            </div>
            <div class="form-check  pb-2">
                <input class="form-check-input week" type="checkbox" name="days[]" id="friday" value="6">
                <label class="form-check-label" for="friday">Friday</label>
            </div>

            <div class="form-check pb-2">
                <input class="form-check-input week" type="checkbox" name="days[]" id="saturday" value="7">
                <label class="form-check-label" for="saturday">Saturday</label>
            </div>
        </div>
        <label id="days-error" class="error" for="days[]" style="display:none;">Please select at least one day.</label>
    </div>

</div>


<div class="form-row">
    <div class="col-md-5">

        <legend class="col-form-label etiqueta">Are you a citizen of the United States? *</legend>
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
            </div>
            <label id="citizen-error" class="error" for="citizen"></label>
            @error('citizen')
            <div class="invalid-feedback" role="alert">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-7">
        <legend class="col-form-label etiqueta">If no, are you authorized to work in the U.S.? *</legend>
        <div class="form-row">
            <div class="form-check form-check-inline">
                <input id="segundo2" class="form-check-input @error('authorized') is-invalid @enderror" @if(old('authorized')=="yes") checked  @endif type="radio" name="authorized" value="yes" required>
                <label class="form-check-label" for="segundo2">
                    Yes
                </label>
            </div>
            <div class="form-check  form-check-inline">
                <input id="tercero2" class="form-check-input @error('authorized') is-invalid @enderror" @if(old('authorized')=="no") checked  @endif type="radio" name="authorized" value="no">
                <label class="form-check-label" for="tercero2">
                    No
                </label>

            </div>
            <label id="authorized-error" class="error" for="authorized"></label>
            @error('authorized')
                <div class="invalid-feedback" role="alert">{{ $message }}</div>
            @enderror

        </div>
    </div>
</div>

<div class="form-row">
    <div class="col-md-5">
        <legend class="col-form-label etiqueta">Have you ever worked for this company? *</legend>
        <div class="form-row">
            <div class="form-check form-check-inline">
                <input id="segundo3" class="form-check-input @error('worked') is-invalid @enderror" @if(old('worked')=="yes") checked  @endif type="radio" name="worked" value="yes" required>
                <label class="form-check-label" for="segundo3">
                    Yes
                </label>
            </div>
            <div class="form-check  form-check-inline">
                <input id="tercero3" class="form-check-input @error('worked') is-invalid @enderror" @if(old('worked')=="no") checked  @endif type="radio" name="worked" value="no" >
                <label class="form-check-label" for="tercero3">
                    No
                </label>

            </div>
            <label id="worked-error" class="error" for="worked"></label>
            @error('worked')
            <div class="invalid-feedback" role="alert">{{ $message }}</div>
            @enderror
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
        <legend class="col-form-label etiqueta">Have you ever been convicted of a felony? *</legend>

        <div class="form-row">
            <div class="form-check form-check-inline">
                <input id="segundo4" class="form-check-input @error('convicted') is-invalid @enderror" @if(old('convicted')=="yes") checked  @endif type="radio" name="convicted" value="yes" required>
                <label class="form-check-label" for="segundo4">
                    Yes
                </label>
            </div>
            <div class="form-check  form-check-inline">
                <input id="tercero4" class="form-check-input @error('convicted') is-invalid @enderror" @if(old('convicted')=="no") checked  @endif type="radio" name="convicted" value="no">
                <label class="form-check-label" for="tercero4">
                    No
                </label>

            </div>
            <label id="convicted-error" class="error" for="convicted"></label>
            @error('convicted')
            <div class="invalid-feedback" role="alert">{{ $message }}</div>
            @enderror
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
        <legend class="col-form-label etiqueta">Are you currently under indictment for a crime? *</legend>
        <div class="form-row">
            <div class="form-check form-check-inline">
                <input id="segundo5" class="form-check-input @error('indictment') is-invalid @enderror" @if(old('indictment')=="yes") checked  @endif type="radio" name="indictment" value="yes" required>
                <label class="form-check-label" for="segundo5">
                    Yes
                </label>
            </div>
            <div class="form-check  form-check-inline">
                <input id="tercero5" class="form-check-input @error('indictment') is-invalid @enderror" @if(old('indictment')=="no") checked  @endif type="radio" name="indictment" value="no">
                <label class="form-check-label" for="tercero5">
                    No
                </label>

            </div>
            <label id="indictment-error" class="error" for="indictment"></label>
            @error('indictment')
            <div class="invalid-feedback" role="alert">{{ $message }}</div>
            @enderror
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
