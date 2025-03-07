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

        <li class="nav-item">
            <a class="nav-link outinlink" href="/#service" data-section="services">Services</a>
          </li>

          <li class="nav-item {{{ (Request::is('employment') ? 'activo' : '') }}}">
            <a class="nav-link outinlink" href="/employment">Employment</a>
          </li>

          <li class="nav-item {{{ (Request::is('training-academy') ? 'activo' : '') }}}">
            <a class="nav-link outinlink" href="/training-academy">Training academy</a>
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
