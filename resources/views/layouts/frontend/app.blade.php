<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="Cache-control" content="public">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">


    <title>TAP SECURITY</title>


    <meta name="description" content="TAP Security omits these behaviors by providing reliable and professional services, integrated with innovative technologies to keep us moving, accountable, and our clients informed." />

    <link rel="canonical" href="https//wwww.txassetpro.com" />

    <!-- Facebook  -->
    <meta property="fb:admins" content="100002348994943" />
    <meta property="fb:app_id" content="2613846985498810" />
    <meta property="og:site_name" content="TAP Securiy" />
    <meta property="og:title" content="Texas Asset Protection LLC" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://www.txassetpro.com" />
    <meta property="og:image" content="https://www.txassetpro.com/images/imagen-video-presentacion-02.jpg" />
    <meta property="og:description" content="TAP Security omits these behaviors by providing reliable and professional services, integrated with innovative technologies to keep us moving, accountable, and our clients informed." />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="https://www.txassetpro.com" />
    <meta name="twitter:title" content="TAP Securiy" />
    <meta name="twitter:description" content="TAP Security omits these behaviors by providing reliable and professional services, integrated with innovative technologies to keep us moving, accountable, and our clients informed." />
    <meta name="twitter:image" content="https://www.txassetpro.com/images/imagen-video-presentacion-02.jpg">


    <!-- favico-->
    <link rel="apple-touch-icon" sizes="57x57" href="/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">




   <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600&subset=latin,greek,latin-ext,vietnamese' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="/backend/plugins/fontawesome-free/css/all.min.css">

<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.2/fullcalendar.min.css">
<link rel="stylesheet" href="/css/position.css">
<link rel="stylesheet" href="/css/aos.css">
<link rel="stylesheet" href="/css/main.css?v={{ uniqid() }}">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-180121021-1"></script>



<!-- Global site tag (gtag.js) - Google Ads: 679147291 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-679147291"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-679147291');
</script>

</head>
<body>
<header>
<div class="container-fluid">
    <div class="row justify-content-center">
        @include("layouts.frontend.partials.navhome")
    </div>

    @guest

    @else
         @include("layouts.frontend.subnav")
    @endguest
</div>
@desktop
<ul class=" lista__redes">
  <li>
    <a href="https://www.facebook.com/tapsecurit/" class="header__face" target="_blank"><i class="fab fa-facebook-f"></i></a>
    <a href="https://www.instagram.com/tapsecurity/?hl=es-la" class="header__face" target="_blank"><i class="fab fa-instagram"></i></a>
    <a href="https://www.youtube.com/channel/UC72n6tJvyxseA49zLw5D2sA" class="header__face" target="_blank"><i class="fab fa-youtube"></i></a>
  </li>
</ul>
@enddesktop
</header>
        <main>
            @yield('content')
        </main>


        @include("layouts.frontend.partials.modal")

        @include("layouts.frontend.partials.scriptDefault")



        <script>
          window.addEventListener('load', function(){
            if(window.location.pathname.includes('/contact-gracias')){
              gtag('event', 'conversion', {'send_to': 'AW-679147291/Kgj3CILEhrMDEJvu68MC'});
            }
            if(window.location.pathname.includes('/success')){
              gtag('event', 'conversion', {'send_to': 'AW-679147291/Kgj3CILEhrMDEJvu68MC'});
            }
          });
        </script>
</body>
</html>
