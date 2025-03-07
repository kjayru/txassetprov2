<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Txassetpro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
    {{-- <link href="/vendor/videojs/video-js.css" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="https://unpkg.com/plyr@3.7.8/dist/plyr.css">
    <link rel="stylesheet" href="/css/cursos/app.css?v={{uniqid()}}">

    <style>

.videocurso .modal-dialog {
            max-width: 80%;
            max-height: 60vh;
            margin: 1.75rem auto;
        }
        .videocurso .modal-content {
            background: transparent;
            border: none;
            height: 100%;
        }
         .videocurso .embed-responsive-16by9 {
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
            position: relative;
            display: block;
            width: 100%;
        }
        .videocurso .embed-responsive-16by9 iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    <main class="cursos">
        @include('layouts.frontend.cursos.header')

        @yield('content')
        @include('layouts.frontend.cursos.footer')

    </main>

    @include('layouts.frontend.partials.modalogin')

    @include('layouts.frontend.partials.modalerror')

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    {{-- <script src="/vendor/videojs/video.min.js"></script> --}}
    <script src="https://unpkg.com/plyr@3.7.8/dist/plyr.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.4.1.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
    <script src="/js/process.js?v={{ uniqid() }}"></script>
</body>

</html>
