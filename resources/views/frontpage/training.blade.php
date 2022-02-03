@extends('layouts.frontend.appinterna')


@section('content')


<section id="training">
    <div id="trainingInicio" class="separador2 parallaxie"  style='background: url("/images/Recruitment_Video.gif")'  >
        <div class="container">


            <div class="row banner">
                <div class="col-md-3 d-none d-sm-block">
                    <div class="logo">
                        <img src="/images/Logo-TAP.png" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-4">
                    <p><span>TRAINING</span><BR>CALENDAR</p>
                </div>
            </div>

        </div>
    </div>
</section>



<section id="section2">
    <div id="about" class="separador">
        <div class="container">
            <div class="row">
                <div id="trigger" class="spacer s0"></div>
                <div class="col-md-12" id="sectitle1">
                    <h2 class="titulo">BRIEF DESCRIPTION</h2>

                    <p class="tap2"  data-aos="fade-down">​​We are a veteran owned and operated business, dedicated to achieving excellence for our clients and their customers. Our clients depend on us
                         to perform to challenging standards. Anything less is not an option. We pride ourselves in our reliability, promptness, professionalism, and staying active while on site. We excel at what we do and what we do sets us apart from our competitors. </p>
                </div>
            </div>
            <div class="row columnas">
                <div class="col-md-12">
                    <div id="video1start" class="spacer s0"></div>

                    <div id="video1"   class="parallaxie" style='background: url("/images/imagen-video-presentacion-02.jpg")'>

                        <div class="player">
                            <a href="#" class="btnplay videoplay1" data-toggle="modal" data-target="#exampleModal"><img src="/images/play-circle-icono.png" class="img-fluid"></a>
                        </div>
                    </div>

                    <div id="video1end" class="spacer s0"></div>
                </div>

                <div class="col-md-12 text-center">
                    <a href="#" class="btn btn-danger btn-medium shadowred btn-course">Online course</a>
                    <a href="#" class="btn btn-danger btn-medium shadowred btn-course2">Training calendar</a>
                </div>

            </div>


        </div>
    </div>

</section>



<section id="calendario">
    <div class="container">
        <div class="row justify-content-center pt-5">
            <div class="col-md-3 text-center">
                <img src="/images/Emblema-gris.png" class="img-fluid">
            </div>
        </div>

        <div class="row calendar">

            <div id="calendar"></div>
        </div>
    </div>
</section>


<script src="js/parallaxie.js"></script>
<script>
 $(document).ready(function() {
if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){

    $('#calendar').fullCalendar({
            header: {
                left: 'prev,next',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultDate: '{{ date("Y-m-d")}}',
            buttonIcons: true,
            weekNumbers: false,
            editable: true,
            eventLimit: true,
            contentHeight:430,
            events: [
            @foreach($events as $evt)
                            {
                                url: '/training-calendar/{{ $evt->slug}}',
                                title: '',

                                start: '{{ $evt->start_date}}',
                               color:"#ffffff",
                                textColor: '#ffffff'

                            },
            @endforeach
              ],
              eventRender: function(event, element) {
              console.log(event);

                    element.find(".fc-title").prepend('<div class="iconcalendario"><img src="/images/iconoFecha.png" width="22"</div>');


            }

        });

}else{



    $('#calendar').fullCalendar({
            header: {
                left: 'prev,next',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultDate: '{{ date("Y-m-d")}}',
            buttonIcons: true,
            weekNumbers: false,
            editable: true,
            eventLimit: true,
            contentHeight:430,
            events: [
            @foreach($events as $evt)
                            {
                                url: '/training-calendar/{{ $evt->slug}}',
                                title: '{{$evt->title}}',

                                start: '{{ $evt->start_date}}',
                                color: '#e01f26',
                                textColor: '#ffffff',
                            },
            @endforeach
                        ],



        });
        $('.parallaxie').parallaxie();
}





        if ($(window).width() > 992) {
    $(window).scroll(function(){
       if ($(this).scrollTop() > 40) {
          $('header').addClass("fixed-top");
          // add padding top to show content behind navbar
          $('body').css('padding-top', $('.navbar').outerHeight() + 'px');
        }else{
          $('header').removeClass("fixed-top");
           // remove padding top from body
          $('body').css('padding-top', '0');
        }
    });
  }
    });


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
@endsection
