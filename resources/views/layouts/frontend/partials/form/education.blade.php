<div class="form-row">
    <div class="col-md-4">

        <legend class="col-form-label etiqueta">Did you graduate High School? *</legend>

        <div class="form-row">
            <div class="form-check form-check-inline">
                <input id="segundo6" class="form-check-input  @error('graduatehigh') is-invalid @enderror" @if(old('graduatehigh')=="yes") checked  @endif type="radio" name="graduatehigh" value="yes" required>
                <label class="form-check-label" for="segundo6">
                    Yes
                </label>
            </div>
            <div class="form-check  form-check-inline">
                <input  id="segundo6" class="form-check-input  @error('graduatehigh') is-invalid @enderror" @if(old('graduatehigh')=="no") checked  @endif type="radio" name="graduatehigh" value="no" required>
                <label class="form-check-label" for="segundo6">
                    No
                </label>

            </div>
            <label id="graduatehigh-error" class="error" for="graduatehigh"></label>
            @error('graduatehigh')
                <div class="invalid-feedback" role="alert">{{ $message }}</div>
            @enderror
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

        <legend class="col-form-label etiqueta">Did you graduate College? *</legend>
        <div class="form-row">
            <div class="form-check form-check-inline">
                <input id="segundo7" class="form-check-input @error('graduatecollage') is-invalid @enderror" @if(old('graduatecollage')=="yes") checked  @endif type="radio" name="graduatecollage" value="yes" required>
                <label class="form-check-label" for="segundo7">
                    Yes
                </label>
            </div>
            <div class="form-check  form-check-inline">
                <input id="tercero7" class="form-check-input @error('graduatecollage') is-invalid @enderror" @if(old('graduatecollage')=="no") checked  @endif type="radio" name="graduatecollage" value="no">
                <label class="form-check-label" for="tercero7">
                    No
                </label>

            </div>
            <label id="graduatecollage-error" class="error" for="graduatecollage"></label>
            @error('graduatecollage')
                <div class="invalid-feedback" role="alert">{{ $message }}</div>
            @enderror
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

                <input type="text" name="whatmayor" class="form-control" id="whatmayor" placeholder="If yes, what major" required>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <legend class="col-form-label etiqueta">Level completed</legend>
        <div class="form-row">
            <div class="form-group col-md-12 col-12">

                <input type="text" name="completed" class="form-control" id="completed" placeholder="Level completed" required>
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

            </div>
            <label id="activecard-error" class="error" for="activecard"></label>
            @error('activecard')
                <div class="invalid-feedback" role="alert">{{ $message }}</div>
            @enderror
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
                <input class="form-check-input @error('firearm') is-invalid @enderror" @if(old('firearm')=="no") checked  @endif type="radio" name="firearm" id="primero" value="yes" required>
                <label class="form-check-label" for="primero">
                Yes
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input @error('firearm') is-invalid @enderror" @if(old('firearm')=="no") checked  @endif type="radio" name="firearm" id="segundo" value="no" >
                <label class="form-check-label" for="segundo">
                No
                </label>

            </div>
            <label id="firearm-error" class="error" for="firearm"></label>
            @error('firearm')
                <div class="invalid-feedback" role="alert">{{ $message }}</div>
            @enderror
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
