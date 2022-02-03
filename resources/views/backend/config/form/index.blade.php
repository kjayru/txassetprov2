


    <div class="form-group @if($errors->first('name')) has-error @endif">
        <label for="name" class="control-label">Email</label>

            <input type="text"  name="meail" class="form-control" value="{{ @$user->email}}" id="name" placeholder="Email" required readonly>
            <span class="help-block">{{ $errors->first('email') }}</span>

    </div>



    <div class="form-group @if($errors->first('password')) has-error @endif">
      <label for="password" class="control-label">Clave anterior</label>


        <input type="password"  name="password" class="form-control" value="" id="password" placeholder="Clave anterior" required>
        <span class="help-block">{{ $errors->first('password') }}</span>

    </div>


    <div class="form-group @if($errors->first('newpassword')) has-error @endif">
        <label for="newpassword" class="control-label">Nueva clave</label>


          <input type="password" name="newpassword" class="form-control" value="" id="newpassword" placeholder="Nueva clave" required>
          <span class="help-block">{{ $errors->first('newpassword') }}</span>

      </div>

      <div class="form-group @if($errors->first('confirmpass')) has-error @endif">
        <label for="confirmpass" class="control-label">Confirme nueva clave</label>


          <input type="password" name="confirmpass" class="form-control" value="" id="confirmpass" placeholder="Confirme clave" required>
          <span class="help-block">{{ $errors->first('confirmpass') }}</span>

      </div>









