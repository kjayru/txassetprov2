<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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

    <title>TAP SECURITY</title>

   <!-- CSS only -->
<link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600&subset=latin,greek,latin-ext,vietnamese' rel='stylesheet' type='text/css'>

<link href="//fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.2/fullcalendar.min.css">
<link rel="stylesheet" href="/css/main.css?v={{ uniqid() }}">

<script src="//code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


<script src="/js/moment.min.js"></script>
<script src="/js/fullcalendar.min.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-180121021-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-180121021-1');
</script>



</head>
<body>
<header>
<div class="container-fluid ">
    <div class="row justify-content-center">
        @include("layouts.frontend.partials.navinternal")
    </div>

    @guest

    @else
         @include("layouts.frontend.subnav")
    @endguest

</div>
</header>
        <main>
            @yield('content')
        </main>



<footer>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-12 order-2 order-sm-1">
                <p> admin@txassetpro.com<br>
                Tel: (210) 399-1116</p>
                <p>
                11503 Jones Maltsberger Rd, Ste 1101<br>
                San Antonio, TX 78216</p>
                <p>
                    {{ date("Y")}}  All Rights Reserved for Texas Asset Protection, LLC ©
               </p>
               <p><a href="http://www.cobos.com.mx" class="little" target="_blank"> Design by: Cobo′s</a></p>
            </div>
            <div class="col-md-4 text-center signo order-1 order-sm-2">
               <figure> <img src="/images/Logo-TAP.png" class="img-fluid"></figure>
                <p>PSP Lic: F11634201 </p>
            </div>
            <div class="col-md-4 text-right d-none d-sm-block order-sm-3">
                <ul class="lisfoot">
                    <li><a href="/" class="footer-link">Home</a></li>
                    <li><a href="/#about"  class="footer-link">About  us</a></li>
                    <li><a href="/#service"   class="footer-link">Services</a></li>
                    <li><a href="/employment" class="footer-link">Employment</a></li>
                    <li><a href="/training-calendar" class="footer-link">Training calendar</a></li>
                    <li><a href="#" class="footer-link">Blog</a></li>
                    <li><a href="/contact" class="footer-link">Contact</a></li>
                    <li><a href="/" data-section="contact" class="btn btn-quote btq-foot inclass shadowred">GET A QUOTE</a></li>
            </ul>
            </div>
        </div>
    </div>
</footer>

@include("layouts.frontend.partials.modal")
<script>


$(".navbar-toggler2").on('click',function(e){
            e.preventDefault();

            $("#navpeson").addClass("show-slide");
            $(".navbar-toggler2").hide();
            $("header").stop().animate({"height":"0"},200);
            $(".btnquote").animate({"opacity":"0"},200);
          });


          $(".navbar-toggler-close").on('click',function(e){
            e.preventDefault();
            $("#navpeson").removeClass('show-slide');
            $("header").stop().animate({"height":"66px"},200,function(){
                $(".navbar-toggler2").show();
                $(".btnquote").animate({"opacity":"1"},200);
            });
          });
</script>
</body>
</html>
