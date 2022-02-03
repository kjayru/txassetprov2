



        <div class="form-group ">
        <label for="firstname">First name</label>
        <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{$profile->firstname}}" required autocomplete="First name" autofocus>

        @error('firstname')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>




        <div class="form-group ">
        <label for="middlename">Middle name</label>
        <input id="middlename" type="text" class="form-control @error('middlename') is-invalid @enderror" name="middlename" value="{{$profile->middlename}}"  autocomplete="Middle name" autofocus>


        </div>




        <div class="form-group">
        <label for="lastname">Last name</label>
        <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{$profile->lastname}}" required autocomplete="Last name" autofocus>

        @error('lastname')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>





            <div class="form-group ">
            <label for="email">Email</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$profile->email}}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>




        <div class="form-group ">
        <label for="gender">Gender</label>
        <input id="lastname" type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{$profile->gender}}" required autocomplete="Gender" autofocus>

        @error('gender')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>


        <div class="form-group ">
        <label for="birthday">Date of Birth</label>
        <input id="birthday" type="text" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{$profile->birthday}}" required autocomplete="Date of Birth" autofocus>

        @error('birthday')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>


        <div class="form-group ">
        <label for="ssn">Last 6 of SSN</label>
        <input id="ssn" type="text" class="form-control @error('ssn') is-invalid @enderror" name="ssn" value="{{$profile->ssn}}" required autocomplete="Last 6 of SSN" autofocus>

        @error('ssn')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>


        <div class="form-group ">
        <label for="address1">Address line 1</label>
        <input id="address1" type="text" class="form-control @error('address1') is-invalid @enderror" name="address1" value="{{$profile->address1}}" required autocomplete="Address line 1" autofocus>

        @error('address1')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>


        <div class="form-group ">
        <label for="address2">Address line 2</label>
        <input id="address2" type="text" class="form-control @error('address2') is-invalid @enderror" name="address2" value="{{$profile->address2}}"  autocomplete="Address line 2" autofocus>


        </div>


        <div class="form-group ">
        <label for="city">City</label>
        <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{$profile->city}}" required autocomplete="City" autofocus>

        @error('city')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>


        <div class="form-group ">
        <label for="state">State</label>
        <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{$profile->state}}" required autocomplete="State" autofocus>

        @error('state')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>


        <div class="form-group ">
        <label for="zipcode">Zip/Postal code</label>
        <input id="zipcode" type="text" class="form-control @error('zipcode') is-invalid @enderror" name="zipcode" value="{{$profile->zipcode}}" required autocomplete="Zip/Postal code" autofocus>

        @error('zipcode')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>

        <div class="form-group ">
        <label for="drivernumber">Driver License Number</label>
        <input id="drivernumber" type="text" class="form-control @error('drivernumber') is-invalid @enderror" name="drivernumber" value="{{$profile->drivernumber}}" required autocomplete="Driver License Number" autofocus>

        @error('drivernumber')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>


        <div class="form-group ">
        <label for="driverstate">Driver License State</label>
        <input id="driverstate" type="text" class="form-control @error('driverstate') is-invalid @enderror" name="driverstate" value="{{$profile->driverstate}}" required autocomplete="Driver License State" autofocus>

        @error('driverstate')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>


        <div class="form-group ">
        <label for="phone">Phone Number</label>
        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{$profile->phone}}" required autocomplete="Phone Number" autofocus>

        @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>


        <div class="form-group ">
        <label for="organization">Organization</label>
        <input id="organization" type="text" class="form-control @error('organization') is-invalid @enderror" name="organization" value="{{$profile->organization}}" required autocomplete="Organization" autofocus>

        @error('organization')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>


        <div class="form-group ">
        <label for="emergencycontact">Emergency Contact′s Name</label>
        <input id="emergencycontact" type="text" class="form-control @error('emergencycontact') is-invalid @enderror" name="emergencycontact" value="{{$profile->emergencycontact}}" required autocomplete="Emergency Contact′s Name" autofocus>

        @error('emergencycontact')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>


        <div class="form-group ">
        <label for="emergencyphone">Phone contact</label>
        <input id="emergencyphone" type="text" class="form-control @error('emergencyphone') is-invalid @enderror" name="emergencyphone" value="{{$profile->emergencyphone}}" required autocomplete="Phone contact" autofocus>

        @error('emergencyphone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>


        <div class="form-group ">
        <label for="relationship">Relationship</label>
        <input id="relationship" type="text" class="form-control @error('relationship') is-invalid @enderror" name="relationship" value="{{$profile->relationship}}" required autocomplete="Relationship" autofocus>

        @error('relationship')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>


        <div class="form-group ">
        <label for="handguncaliber">Handgun Caliber (optional)</label>
        <input id="handguncaliber" type="text" class="form-control @error('handguncaliber') is-invalid @enderror" name="handguncaliber" value="{{$profile->handguncaliber}}"  autocomplete="Handgun Caliber (optional)" autofocus>
        </div>


        <div class="form-group ">
        <label for="handguntype">Handgun Type (optional)</label>
        <input id="handguntype" type="text" class="form-control @error('handguntype') is-invalid @enderror" name="handguntype" value="{{$profile->handguntype}}"  autocomplete="Handgun Type (optional)" autofocus>
        </div>


        <div class="form-group ">
        <label for="handgunrental">Do you need a handgun rental? (optional)</label>
        <input id="handgunrental" type="text" class="form-control @error('handgunrental') is-invalid @enderror" name="handgunrental" value="{{$profile->handgunrental}}"  autocomplete="Do you need a handgun rental? (optional)" autofocus>
        </div>


        <div class="form-group ">
        <label for="shootingshotgun">Are you shooting shotgun? (optional)</label>
        <input id="shootingshotgun" type="text" class="form-control @error('shootingshotgun') is-invalid @enderror" name="shootingshotgun" value="{{$profile->shootingshotgun}}"  autocomplete="Are you shooting shotgun? (optional)" autofocus>
        </div>


        <div class="form-group ">
        <label for="shotgungauce">Shotgun Gauge (optional)</label>
        <input id="shotgungauce" type="text" class="form-control @error('shotgungauce') is-invalid @enderror" name="shotgungauce" value="{{$profile->shotgungauce}}"  autocomplete="Shotgun Gauge (optional)" autofocus>
        </div>


        <div class="form-group ">
        <label for="shotgunrental">Do you need a shotgun rental? (optional)</label>
        <input id="shotgunrental" type="text" class="form-control @error('shotgunrental') is-invalid @enderror" name="shotgunrental" value="{{$profile->shotgunrental}}"  autocomplete="Do you need a shotgun rental? (optional)" autofocus>
        </div>




















