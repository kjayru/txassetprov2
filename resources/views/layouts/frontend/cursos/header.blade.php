@php $fe = rtrim(config('app.frontend_url'), '/'); @endphp
<header>
    <div class="container-fluid px-0">
        <nav class="navbar navbar-expand-lg navbar-dark tap-navbar">
            <button class="navbar-toggler2 custom-toggler d-block d-lg-none transparente" type="button">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand" href="{{ $fe }}/"><img src="/images/Logo-TAP.png" class="img-fluid"></a>

            <a href="{{ $fe }}/contact" class="d-block d-lg-none transparente btnquote">get a quote</a>

            <div class="collapse navbar-collapse hide" id="navpeson">
                <div class="bloquehead d-block d-lg-none">
                    <button class="navbar-toggler-close" type="button"><span>X</span></button>
                    <a class="navbar-brand" href="{{ $fe }}/"><img src="/images/Logo-TAP.png" class="img-fluid"></a>
                </div>

                {{-- Nav items izquierda --}}
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link outinlink" href="{{ $fe }}/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link outinlink" href="{{ $fe }}/about-us">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link outinlink" href="{{ $fe }}/services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link outinlink" href="{{ $fe }}/employment">Employment</a>
                    </li>
                    <li class="nav-item activo">
                        <a class="nav-link outinlink" href="{{ $fe }}/training-academy">Training academy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link outinlink" href="{{ $fe }}/blog">Blog</a>
                    </li>
                </ul>

                {{-- Sección derecha desktop --}}
                <div class="nav-right ml-auto d-none d-lg-flex align-items-center">
                    <a class="nav-link inclass shadowred nav-quote" href="{{ $fe }}/contact">Get a Quote</a>
                    <a class="nav-link outclass nav-login" href="https://tapsecurity.staffr.net" target="_blank" rel="noopener">Client Login</a>
                    <a class="nav-link outclass nav-login" href="/login">Course Login</a>
                    <div class="nav-social d-flex align-items-center">
                        <a href="https://www.facebook.com/tapsecurit/" class="header__face" target="_blank" rel="noopener"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/tapsecurity/?hl=es-la" class="header__face" target="_blank" rel="noopener"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.youtube.com/channel/UC72n6tJvyxseA49zLw5D2sA" class="header__face" target="_blank" rel="noopener"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                {{-- Sección móvil --}}
                <ul class="lista__redes flex-container space-between d-block d-lg-none">
                    <li><a href="https://www.facebook.com/tapsecurit/" class="header__face" target="_blank" rel="noopener"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="https://www.instagram.com/tapsecurity/?hl=es-la" class="header__face" target="_blank" rel="noopener"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="https://www.youtube.com/channel/UC72n6tJvyxseA49zLw5D2sA" class="header__face" target="_blank" rel="noopener"><i class="fab fa-youtube"></i></a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>
