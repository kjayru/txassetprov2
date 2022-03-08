@extends('layouts.frontend.appinterna')


@section('content')
    <section id="training">
        <div id="trainingInicio" class="separador2 parallaxie"
            style='background: url("/images/Banner-Calendar-Cambios01.png")'>
            <div class="container">


                <div class="row banner">
                    <div class="col-md-3 d-none d-sm-block">
                        <div class="logo">
                            <img src="/images/Logo-TAP.png" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <p><span>TRAINING</span><BR>ACADEMY</p>
                    </div>
                </div>

            </div>
        </div>
    </section>



    <section id="section2">
        <div id="academy" class="separador">
            <div class="container">
                <div class="row">
                    <div id="trigger" class="spacer s0"></div>
                    <div class="col-md-12" id="sectitle1">
                        <h2 class="titulo"> </h2>

                            <p class="tap2" data-aos="fade-down">​​

                                The TAP Security Academy is approved and licensed by the Texas Department of Public Safety
                                Regulatory Services Division Private Security Program (PSP). Our instructors have over 20
                                years of military, law enforcement and security experience. In TAP Security Academy our goal
                                is to provide security professionals with the knowledge and tools they need to succeed in
                                the security Industry.</p>
                    </div>
                </div>
                <div class="row columnas">
                    <div class="col-md-12">
                        <div id="video2start" class="spacer s0"></div>

                        <div id="video1" class="parallaxie"
                            style='background: url("/images/imagen-video-presentacion-02.jpg")'>

                            <div class="player">
                                <a href="#" class="btnplay videoplayTraining" data-toggle="modal"
                                    data-target="#trainingModal"><img src="/images/play-circle-icono.png"
                                        class="img-fluid"></a>
                            </div>
                        </div>

                        <div id="video1end" class="spacer s0"></div>
                    </div>

                    <div class="col-md-12 text-center">
                        <a href="#" class="btn btn-danger btn-medium shadowred btn-course">Online course</a>
                        <a href="/training-calendar" class="btn btn-danger btn-medium shadowred btn-course2">Training
                            calendar</a>
                    </div>

                </div>


            </div>
        </div>

    </section>






    <div class="modal fade" id="trainingModal" tabindex="-1" role="dialog" aria-labelledby="trainingModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <button type="button" class="close closevideo stopvideo3" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div id="videoTraining"></div>
                </div>

            </div>
        </div>
    </div>


    <script src="js/parallaxie.js"></script>

    <script>
        $(document).ready(function() {
            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {

                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    defaultDate: '{{ date('Y-m-d') }}',
                    buttonIcons: true,
                    weekNumbers: false,
                    editable: true,
                    eventLimit: true,
                    contentHeight: 430,
                    events: [
                        @foreach ($events as $evt)
                            {
                            url: '/training-calendar/{{ $evt->slug }}',
                            title: '',
                        
                            start: '{{ $evt->start_date }}',
                            color:"#ffffff",
                            textColor: '#ffffff'
                        
                            },
                        @endforeach
                    ],
                    eventRender: function(event, element) {
                        console.log(event);

                        element.find(".fc-title").prepend(
                            '<div class="iconcalendario"><img src="/images/iconoFecha.png" width="22"</div>'
                        );


                    }

                });

            } else {



                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    defaultDate: '{{ date('Y-m-d') }}',
                    buttonIcons: true,
                    weekNumbers: false,
                    editable: true,
                    eventLimit: true,
                    contentHeight: 430,
                    events: [
                        @foreach ($events as $evt)
                            {
                            url: '/training-calendar/{{ $evt->slug }}',
                            title: '{{ $evt->title }}',
                        
                            start: '{{ $evt->start_date }}',
                            color: '#e01f26',
                            textColor: '#ffffff',
                            },
                        @endforeach
                    ],



                });
                $('.parallaxie').parallaxie();
            }





            if ($(window).width() > 992) {
                $(window).scroll(function() {
                    if ($(this).scrollTop() > 40) {
                        $('header').addClass("fixed-top");
                        // add padding top to show content behind navbar
                        $('body').css('padding-top', $('.navbar').outerHeight() + 'px');
                    } else {
                        $('header').removeClass("fixed-top");
                        // remove padding top from body
                        $('body').css('padding-top', '0');
                    }
                });
            }
        });


        $(".navbar-toggler2").on('click', function(e) {
            e.preventDefault();

            $("#navpeson").addClass("show-slide");
            $(".navbar-toggler2").hide();
            $("header").stop().animate({
                "height": "0"
            }, 200);
            $(".btnquote").animate({
                "opacity": "0"
            }, 200);
        });


        $(".navbar-toggler-close").on('click', function(e) {
            e.preventDefault();
            $("#navpeson").removeClass('show-slide');
            $("header").stop().animate({
                "height": "66px"
            }, 200, function() {
                $(".navbar-toggler2").show();
                $(".btnquote").animate({
                    "opacity": "1"
                }, 200);
            });
        });
    </script>
@endsection
