@extends('layouts.frontend.cursos.app')
@section('content')

<div class="banner color__banner">
  <div class="container-fluid">
    <div class="row justify-content-between mb-0 pb-0">
      <div class="col-md-4">
          <div class="breadcrum">
              
          </div>
      </div>

     @include('layouts.backend.partials.menucurso')
    </div>
  </div>
 
</div>

<div class="container">
          <div class="row">
                    <div class="col-md-12">
                              <div class="cart__bread">
                                        <div class="row justify-content-between">
                                                  <div class="col-md-5"><div class="cart__bread__titulo"> Cart ({{@$cart->cantidad}} course)</div></div>
                                                  <div class="col-md-3 text-right"><a href="/courses/all" class="cart__bread__link">Continue shopping</a></div>
                                        </div>
                              </div>

                              <div class="cart__body">
                                        <div class="cart__body__header">
                                                  <div class="row justify-content-end">
                                                            <div class="col-md-3 text-right">
                                                                      <div class="cart__body__header__checkout">Checkout</div>
                                                            </div>
                                                  </div>
                                        </div>
                                      <div class="cart__body__grilla">
                                         
                                        @if($cart!=null)
                                              @foreach($cart->items as $item)
                                            
                                                  <div class="row justify-content-between cart__body__grilla__item">
                                                      <div class="col-md-7 sinpadding__left">            
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <img src="/storage/{{$item['curso']->banner}}" class="img-fluid">
                                                                </div>
                                                                <div class="col-md-7">
                                                                    <div class="cart__body__grilla__titulo">
                                                                      {{$item['curso']->titulo}}
                                                                    </div>
                                                                    <div class="cart__body__grilla__subtitulo">
                                                                      {{$item['curso']->subtitulo}}
                                                                    </div>
                                                                </div>
                                                            </div>            
                                                      </div>
                                                           
                                                      <div class="col-md-2 text-right">
                                                          <div class="cart__body__grilla__precio"> ${{$item['precio']}} <span>USD</span> </div>
                                                          <a href="#" data-id="{{$item['id']}}" class="cart__body__grilla__delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                      </div>      
                                                  </div>

                                              @endforeach
                                        @endif

                                      </div>
                                      <div class="cart__body__foot">
                                          <div class="row justify-content-end">
                                              <div class="col-md-4 text-right">
                                                  <div class="cart__body__foot__total">Total ${{@$cart->total}} USD</div>
                                                  <a href="/cart/sign" class="cart__body__foot__link" data-id="{{@$item['id']}}" data-user="{{@$user_id}}">Proceed to checkout</a>
                                              </div>
                                          </div>
                                      </div>
                                        <div class="cart__body__cupon">
                                                  <div class="row">
                                                            <div class="col-md-5">
                                                                      <div class="cart__body__cupon__titulo">Do you have a coupon?</div>
                                                                      <div class="cart__body__cupon__form">
                                                                                <div class="row">
                                                                                          <div class="col-md-9">
                                                                                                    <input type="text" class="cart__body__cupon__form__input form-control">
                                                                                          </div>
                                                                                          <div class="col-md-3 sinpadding__left">
                                                                                                    <button class="cart__body__cupon__form__boton btn">Apply</button>
                                                                                          </div>
                                                                                </div>
                                                                               
                                                                                
                                                                      </div>
                                                            </div>
                                                  </div>
                                        </div>
                              </div>
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
                      You already have bought the course.<br>
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
      


<script src="//js.stripe.com/v3/"></script>
<script>
  var stripe = Stripe('{{ env('STRIPE_PUBLIC_KEY')}}');
</script>
@endsection
