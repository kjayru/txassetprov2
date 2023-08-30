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