@php $fe = rtrim(config('app.frontend_url'), '/'); @endphp
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
            <li class="nav-item has-submenu">
                <a class="nav-link outinlink" href="{{ $fe }}/services">Services <i class="fas fa-chevron-down submenu-arrow"></i></a>
                <button class="submenu-toggle" type="button" aria-expanded="false" aria-label="Toggle Services menu">
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="nav-submenu">
                    <div class="nav-submenu__inner">
                        <div class="nav-submenu__col">
                            <span class="nav-submenu__category">Services</span>
                            <ul class="nav-submenu__list">
                                <li><a href="{{ $fe }}/services">Why Us</a></li>
                                <li><a href="{{ $fe }}/services#industries">Industries We Serve</a></li>
                            </ul>
                        </div>
                        <div class="nav-submenu__col">
                            <span class="nav-submenu__category">Industries We Serve</span>
                            <ul class="nav-submenu__list">
                                <li><a href="{{ $fe }}/industry/commercial-security">Commercial Security</a></li>
                                <li><a href="{{ $fe }}/industry/diplomatic-mission">Diplomatic Mission</a></li>
                                <li><a href="{{ $fe }}/industry/hospitality-security">Hospitality Security</a></li>
                                <li><a href="{{ $fe }}/industry/industrial-security">Industrial Security</a></li>
                                <li><a href="{{ $fe }}/industry/medical-security">Medical Security</a></li>
                                <li><a href="{{ $fe }}/industry/residential-security">Residential Security</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item has-submenu">
                <a class="nav-link outinlink" href="{{ $fe }}/employment">Employment <i class="fas fa-chevron-down submenu-arrow"></i></a>
                <button class="submenu-toggle" type="button" aria-expanded="false" aria-label="Toggle Employment menu">
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="nav-submenu">
                    <div class="nav-submenu__inner">
                        <div class="nav-submenu__col">
                            <span class="nav-submenu__category">Employment</span>
                            <ul class="nav-submenu__list">
                                <li><a href="{{ $fe }}/employment">Apply Form</a></li>
                                <li><a href="{{ $fe }}/form8850">Form 8850</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item has-submenu">
                <a class="nav-link outinlink" href="{{ $fe }}/training-academy">Training academy <i class="fas fa-chevron-down submenu-arrow"></i></a>
                <button class="submenu-toggle" type="button" aria-expanded="false" aria-label="Toggle Training Academy menu">
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="nav-submenu">
                    <div class="nav-submenu__inner">
                        <div class="nav-submenu__col">
                            <span class="nav-submenu__category">Training Academy</span>
                            <ul class="nav-submenu__list">
                                <li><a href="{{ $fe }}/training-academy">Watch Video</a></li>
                                <li><a href="{{ $fe }}/courses">Online Courses</a></li>
                                <li><a href="{{ $fe }}/training-calendar">In-Person Training</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
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

        {{-- Sección móvil: botón y logins --}}
        @mobile
        <div class="text-center py-3">
            <a href="{{ $fe }}/contact" class="nav-link inclass shadowred" style="display:inline-block;width:80%;margin:0 auto;">GET A QUOTE</a>
        </div>
        <div class="text-center pb-3 d-flex justify-content-center" style="gap:1rem;">
            <a class="nav-link outclass" href="https://tapsecurity.staffr.net" target="_blank" rel="noopener">Client Login</a>
            <a class="nav-link outclass" href="/login">Course Login</a>
        </div>
        <ul class="lista__redes flex-container space-between">
            <li><a href="https://www.facebook.com/tapsecurit/" class="header__face" target="_blank" rel="noopener"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="https://www.instagram.com/tapsecurity/?hl=es-la" class="header__face" target="_blank" rel="noopener"><i class="fab fa-instagram"></i></a></li>
            <li><a href="https://www.youtube.com/channel/UC72n6tJvyxseA49zLw5D2sA" class="header__face" target="_blank" rel="noopener"><i class="fab fa-youtube"></i></a></li>
        </ul>
        @endmobile
    </div>
</nav>
