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

      




<script src="//js.stripe.com/v3/"></script>
<script>
  var stripe = Stripe('{{ env('STRIPE_PUBLIC_KEY')}}');
</script>
@endsection
