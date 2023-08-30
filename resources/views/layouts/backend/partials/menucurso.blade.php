@guest

          <div class="col-md-1 text-right">
                <div class="cart">
                      <ul>
                        <li><a href="/cart" class="cart__link">
                          <b>{{$contador?$contador:'0'}}</b>
                          <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                          <span>Cart</span>
                        </a></li>
                        <li><a href="/login" class="cart__link access__login"><img src="/images/login.svg" alt="">
                          <span>Login</span>
                        </a>
                         
                        </li>
                      </ul>
                </div>
          </div>
        @else
          <div class="col-md-1 text-right">
              <div class="cart">
                  <ul>
                      <li><a href="/user" class="cart__link"><i class="fa fa-user-circle" aria-hidden="true"></i>
                    <span>User</span>
                    </a></li>
                      <li> <a href="/cart" class="cart__link"><b>{{$contador?$contador:'0'}}</b><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <span>Cart</span>
                    </a>
                    
                    </li>
                      <li><a href="#" class="cart__link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><img src="/images/logout.svg" style="with:20px;">
                    <span>Logout</span>
                    </a></li>
                      </ul>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
              </div>
          </div>
        @endguest