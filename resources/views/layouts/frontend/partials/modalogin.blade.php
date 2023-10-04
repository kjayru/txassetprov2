<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <form id="frm_login" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="loginModalLongTitle">Login</h5>

        </div>
        <div class="modal-body">
          <div class="login__alerta col-md-12" style="display: none;">
            <div class="row">

              <div class="login__alerta_texto col s10">
                Wrong email or password. Please try again.
              </div>
            </div>
          </div>

          @csrf
          <div class="container">
            <div class="row">
              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <input class="form-control" type="text"  name="email" id="email__login" placeholder="E-mail">
                  <span class="error error__email"></span>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <input class="form-control" type="password"  name="password" id="password__login" placeholder="Password">
                  <span class="error error__password"></span>
                </div>
            </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">

            <a href="#" class="btn btn-default btn__registro " id="btn">Not account? sign up</a>

            <button type="button" class="btn fondo__rojo btn__loginsumit ">Login</button>

          </div>

        </div>
      </form>
      </div>
    </div>
  </div>



  <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <form id="frm_login" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="loginModalLongTitle">Register</h5>

        </div>
        <div class="modal-body">
          <div class="register__alerta col-md-12" style="display: none;">
            <div class="row">

              <div class="login__alerta_texto col s10">
                The password does not match, please check
              </div>
            </div>
          </div>

          @csrf
          <div class="container">
            <div class="row">
              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label for="name-register">Name</label>
                  <input class="form-control" type="text"  name="name" id="name-register" placeholder="Name">
                  <span class="error error__name__register"></span>
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <label for="email-register">E-mail</label>
                  <input class="form-control" type="email"  name="email" id="email-register" placeholder="E-mail">
                  <span class="error error__email__register"></span>
                </div>
              </div>
              <div class="col-md-12">

                <div class="form-group ">
                    <label for="password-register">{{ __('Password') }}</label>


                        <input id="password-register" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        <span class="error error__password__register"></span>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                </div>

             </div>

             <div class="col-md-12">

                <div class="form-group ">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>


                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                </div>

             </div>

            </div>
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn fondo__rojo btn__register">Submit</button>
        </div>
      </form>
      </div>
    </div>
  </div>




  <div class="modal fade" id="existeModal" tabindex="-1" role="dialog" aria-labelledby="existeModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <div class="modal-body">
          <div class=" col-md-12" >
            <div class="row">

              <div class="texto__error col s10">
                <p class="mensaje__verify"></p>
                <a href="/user/my-courses" class="btn btn-rojo">My courses</a>
              </div>
            </div>
          </div>



        </div>
        <div class="modal-footer">
        <button type="button" class="btn fondo__rojo btn__loginsumit btn__modal" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
