<nav class="navbar navbar-expand-lg navbar-dark ">
    <button class="navbar-toggler2 custom-toggler d-block d-sm-none transparente" type="button" >
        <span class="navbar-toggler-icon"></span>
      </button>
    <a class="navbar-brand" href="/"><img src="/images/Logo-TAP.png" class="img-fluid"></a>
    <a href="/contact" class="d-block d-sm-none transparente btnquote"  >
        get a quote
   </a>

    <div class="collapse navbar-collapse hide" id="navpeson">
        <div class="bloquehead d-block d-sm-none">
          <button class="navbar-toggler-close" type="button">
            <span>X</span>
          </button>
          <a class="navbar-brand" href="#"><img src="/images/Logo-TAP.png" class="img-fluid"></a>
        </div>
      <ul class="navbar-nav mr-auto">
        <li class="nav-item {{{ (Request::is('/') ? 'activo' : '') }}}">
          <a class="nav-link outinlink" href="/">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link outinlink" href="/#about" data-section="aboutus">About us</a>
        </li>

        <li class="nav-item has-submenu">
            <a class="nav-link outinlink" href="/#service" data-section="services">Services <i class="fas fa-chevron-down submenu-arrow"></i></a>
            <button class="submenu-toggle" type="button" aria-expanded="false" aria-label="Toggle Services menu">
                <i class="fas fa-chevron-down"></i>
            </button>
            <div class="nav-submenu">
                <div class="nav-submenu__inner">
                    <div class="nav-submenu__col">
                        <span class="nav-submenu__category">Services</span>
                        <ul class="nav-submenu__list">
                            <li><a href="/#service">Why Us</a></li>
                            <li><a href="/#service2">Security Services</a></li>
                        </ul>
                    </div>
                    <div class="nav-submenu__col">
                        <span class="nav-submenu__category">Industries We Serve</span>
                        <ul class="nav-submenu__list">
                            <li><a href="/industry/commercial-security">Commercial Security</a></li>
                            <li><a href="/industry/diplomatic-mission">Diplomatic Mission</a></li>
                            <li><a href="/industry/hospitality-security">Hospitality Security</a></li>
                            <li><a href="/industry/industrial-security">Industrial Security</a></li>
                            <li><a href="/industry/medical-security">Medical Security</a></li>
                            <li><a href="/industry/residential-security">Residential Security</a></li>
                        </ul>
                    </div>
                </div>
            </div>
          </li>

          <li class="nav-item has-submenu {{{ (Request::is('employment') ? 'activo' : '') }}}">
            <a class="nav-link outinlink" href="/employment">Employment <i class="fas fa-chevron-down submenu-arrow"></i></a>
            <button class="submenu-toggle" type="button" aria-expanded="false" aria-label="Toggle Employment menu">
                <i class="fas fa-chevron-down"></i>
            </button>
            <div class="nav-submenu">
                <div class="nav-submenu__inner">
                    <div class="nav-submenu__col">
                        <span class="nav-submenu__category">Employment</span>
                        <ul class="nav-submenu__list">
                            <li><a href="/employment">Apply Form</a></li>
                            <li><a href="/form8850">Form 8850</a></li>
                        </ul>
                    </div>
                </div>
            </div>
          </li>

          <li class="nav-item has-submenu {{{ (Request::is('training-academy') ? 'activo' : '') }}}">
            <a class="nav-link outinlink" href="/training-academy">Training academy <i class="fas fa-chevron-down submenu-arrow"></i></a>
            <button class="submenu-toggle" type="button" aria-expanded="false" aria-label="Toggle Training Academy menu">
                <i class="fas fa-chevron-down"></i>
            </button>
            <div class="nav-submenu">
                <div class="nav-submenu__inner">
                    <div class="nav-submenu__col">
                        <span class="nav-submenu__category">Training Academy</span>
                        <ul class="nav-submenu__list">
                            <li><a href="https://tastecooking.com/features/" target="_blank" rel="noopener">Watch Video</a></li>
                            <li><a href="/courses">Online Courses</a></li>
                            <li><a href="/training-calendar">In-Person Training</a></li>
                        </ul>
                    </div>
                </div>
            </div>
          </li>

          <!--<li class="nav-item">
            <a class="nav-link outinlink" href="https://medium.com/@TAPSecurity" target="_blank">Blog</a>
          </li>-->
          <li class="nav-item {{{ (Request::is('blog*') ? 'activo' : '') }}}">
            <a class="nav-link outinlink" href="/blog" >Blog</a>
          </li>



          <li class="nav-item  acuta">
            <a class="nav-link inclass shadowred" href="/contact" data-section="contact" >Get a Quote</a>
          </li>

          <li class="nav-item flotante-right">
            <a class="nav-link outclass" href="https://tapsecurity.staffr.net" target="_blank">Client login</a>
          </li>

      </ul>
      @mobile
      <ul class=" lista__redes flex-container space-between">
       <li>
         <a href="https://www.facebook.com/tapsecurit/" class="header__face" target="_blank"><i class="fab fa-facebook-f"></i></a>
       </li><li>
         <a href="https://www.instagram.com/tapsecurity/?hl=es-la" class="header__face" target="_blank"><i class="fab fa-instagram"></i></a>
       </li><li>
         <a href="https://www.youtube.com/channel/UC72n6tJvyxseA49zLw5D2sA" class="header__face" target="_blank"><i class="fab fa-youtube"></i></a>
       </li>
     </ul>
      @endmobile

    </div>
</nav>
