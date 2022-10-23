@extends('layouts.frontend.cursos.app')
@section('content')

<div class="container">
          <div class="row">
                    <div class="col-md-12">
                              <div class="cart__bread">
                                        <div class="row justify-content-between">
                                                  <div class="col-md-5"><div class="cart__bread__titulo"> Cart ({{@$cart->cantidad}} course)</div></div>
                                                  <div class="col-md-3 text-right"><a href="#" class="cart__bread__link">Continue shopping</a></div>
                                        </div>
                              </div>

                              <div class="cart__body">
                                        <div class="cart__body__header">
                                                  <div class="row justify-content-end">
                                                            <div class="col-md-3 text-right">
                                                                      <a href="#" class="cart__body__header__checkout">Checkout</a>
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
                                                                              <img src="/images/cursoplayer.png" class="img-fluid">
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
                                                                     <div class="cart__body__grilla__precio"> ${{$item['precio']}}<span>USD</span> </div>

                                                                      <a href="#" data-id="{{$item['id']}}" class="cart__body__grilla__delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                            </div>
                                                            
                                                  </div>


                                                  @endforeach
                                        @endif
                                        </div>
                                        <div class="cart__body__foot">
                                                  <div class="row justify-content-end">
                                                            <div class="col-md-4 text-right">
                                                                       <div class="cart__body__foot__total">Total ${{@$cart->total}}USD</div>

                                                                      <a href="/cart/sign" class="cart__body__foot__link">Proceed to checkout</a>
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

        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <form id="frm_login" method="POST">
              <div class="modal-header">
                <h5 class="modal-title" id="loginModalLongTitle">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="login__alerta col-md-12" style="display: none;">
                  <div class="row">
                    
                    <div class="login__alerta_texto col s10">
                      Correo electrónico o contraseña incorrecta. Por favor, vuelve a intentarlo nuevamente.
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
                <button type="button" class="btn btn-primary btn__loginsumit">Submit</button>
              </div>
            </form>
            </div>
          </div>
        </div>
<script src="//js.stripe.com/v3/"></script>
<script>
  var stripe = Stripe('{{ env('STRIPE_PUBLIC_KEY')}}');
</script>
@endsection
