
if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
    AOS.init({ disable: 'mobile', delay: 0, once: true, });
}else{

    AOS.init({

        offset: 350,
        duration: 600,
      easing: 'ease-in-sin',
    });

$('.parallaxie').parallaxie();
}
/*
  var controller = new ScrollMagic.Controller();


  var scen = new ScrollMagic.Scene({triggerElement: "#efecto1"})
    .setVelocity(".marco", {opacity: 1}, {duration: 350})
    .addTo(controller);

    scen.on('start',function(event){ });

    var scen2 = new ScrollMagic.Scene({triggerElement: "#efecto2"})
    .setVelocity(".contexto", {opacity: 1}, {duration: 350})
    .addTo(controller);

    scen2.on('start',function(event){ });

	// build scene
	var scene = new ScrollMagic.Scene({triggerElement: "#trigger"})
    .setVelocity("#sectitle1", {opacity: 1}, {duration: 500})
    .addTo(controller);

    scene.on('start',function(event){
        console.log(event.state);
        console.log(event.scrollDirection);
        if(event.scrollDirection=='REVERSE'){
            console.log("destroy");
           // scene.destroy();
           // $("#sectitle1").css({opacity:1});

        }
    });

    var scene2 = new ScrollMagic.Scene({triggerElement: "#trigger2"})
    .setVelocity("#sec1r1", {opacity: 1}, {duration: 700})
    .addTo(controller);

     scene2.on("start", function (event) {

        $("#sec1r1 .bxylayer").addClass("slide-in-left");
        $("#sec1r1 h3").delay(900).animate({'opacity':'1'});
        $("#sec1r1 p").delay(900).animate({'opacity':'1'});



    });


    var scene3 = new ScrollMagic.Scene({triggerElement: "#trigger2"})
    .setVelocity("#sec1r2", {opacity: 1}, {duration: 700})
    .addTo(controller);

    scene3.on("start", function (event) {

        $("#sec1r2 .bxylayer").addClass("slide-in-top");
        $("#sec1r2 h3").delay(900).animate({'opacity':'1'});
        $("#sec1r2 p").delay(900).animate({'opacity':'1'});
    });


    var scene4 = new ScrollMagic.Scene({triggerElement: "#trigger2"})
    .setVelocity("#sec1r3", {opacity: 1}, {duration: 700})
    .addTo(controller);


    scene4.on("start", function (event) {

        $("#sec1r3 .bxylayer").addClass("slide-in-right");
        $("#sec1r3 h3").delay(900).animate({'opacity':'1'});
        $("#sec1r3 p").delay(900).animate({'opacity':'1'});
    });





    var scene5 = new ScrollMagic.Scene({triggerElement: "#trg1"})
    .setVelocity("#pd1", {opacity: 1}, {duration: 600})
    .addTo(controller);
    scene5.on("start", function (event) {

        $("#pd1 .bxylayer").addClass("slide-in-left");
        $("#pd1 h3").delay(600).animate({'opacity':'1'});
        $("#pd1 ul").delay(600).animate({'opacity':'1'});
    });



    var scene6 = new ScrollMagic.Scene({triggerElement: "#trg2"})
    .setVelocity("#pd2", {opacity: 1}, {duration: 800})
    .addTo(controller);

    scene6.on("start", function (event) {

        $("#pd2 .bxylayer").addClass("slide-in-bottom");

        $("#pd2 img").delay(800).animate({'opacity':'1'});
    });


    var scene7 = new ScrollMagic.Scene({triggerElement: "#trg3"})
    .setVelocity("#pd3", {opacity: 1}, {duration: 1000})
    .addTo(controller);

    scene7.on("start", function (event) {

        $("#pd3 .bxylayer").addClass("slide-in-right");
        $("#pd3 h3").delay(1000).animate({'opacity':'1'});
        $("#pd3 ul").delay(1000).animate({'opacity':'1'});
    });


    var scene8 = new ScrollMagic.Scene({triggerElement: "#trg5"})
    .setVelocity("#pd4", {opacity: 1}, {duration: 1200})
    .addTo(controller);

    scene8.on("start", function (event) {


        $("#pd4 .bxylayer").addClass("slide-in-right");
        $("#pd4 img").delay(1200).animate({'opacity':'1'});


    });



    var scene9 = new ScrollMagic.Scene({triggerElement: "#trg5"})
    .setVelocity("#pd5", {opacity: 1}, {duration: 700})
    .addTo(controller);
    scene9.on("start", function (event) {


        $("#pd5 .bxylayer").addClass("slide-in-left");
        $("#pd5 h3").delay(700).animate({'opacity':'1'});
        $("#pd5 ul").delay(700).animate({'opacity':'1'});

    });



    var scene10 = new ScrollMagic.Scene({triggerElement: "#trg6"})
    .setVelocity("#pd6", {opacity: 1}, {duration: 700})
    .addTo(controller);

    scene10.on("start", function (event) {

        $("#pd6 .bxylayer").addClass("slide-in-right");
        $("#pd6 img").delay(1200).animate({'opacity':'1'});


    });


    var scene11 = new ScrollMagic.Scene({triggerElement: "#taplogos"})
    .setVelocity(".ilogo", {opacity: 1}, {duration: 700})
    .addTo(controller);

    var scene12 = new ScrollMagic.Scene({triggerElement: "#taplogos2"})
    .setVelocity(".ilogo2", {opacity: 1}, {duration: 700})
    .addTo(controller);

    var scene12 = new ScrollMagic.Scene({triggerElement: "#taplogos3"})
    .setVelocity(".ilogo3", {opacity: 1}, {duration: 700})
    .addTo(controller);

     $('.js-parallax').each(function() {
        var tween = TweenMax.to('.js-parallax img', .3, { y: '135%', ease: Linear.easeNone });

        var scene = new ScrollMagic.Scene({
          triggerElement: $(this),
          duration: '400%',
          triggerHook: 1
        })
        .setTween(tween)
        .addTo(controller);
      });


*/

window.addEventListener('scroll', function(e) {
   console.log(e);
  });

$(window).on('scroll',function(){
    console.log($(this).scrollTop());
   if ($(this).scrollTop() > 40) {
      $('header').addClass("fixed-top");

      $('body').css('padding-top', $('.navbar').outerHeight() + 'px');
    }else{
      $('header').removeClass("fixed-top");

      $('body').css('padding-top', '0');
    }
});




$(function() {

    $(".padhome img").fadeIn(700,'swing',function(){
        $(".quote").children("b").fadeIn(700,'swing',function(){

            $(".quote").children("span").fadeIn(700,'swing',function(){

                $(".quote").children("strong").fadeIn(900,'swing');
            });
        });

    });


        $(".videoplay1").on('click',function(e){
            e.preventDefault();
            player.playVideo();
        });

        $(".stopvideo1").on('click',function(e){
            e.preventDefault();
            player.stopVideo();
        });

        $(".videoplay2").on('click',function(e){
            e.preventDefault();
            player2.playVideo();
        });

        $(".stopvideo2").on('click',function(e){
            e.preventDefault();
            player2.stopVideo();
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






});







try {

    function initMap() {
        // The location of Uluru
        var uluru = {lat:29.5453515, lng: -98.4757427};
        // The map, centered at Uluru
        var map = new google.maps.Map(
            document.getElementById('mapa'), {zoom: 16, center: uluru});
        // The marker, positioned at Uluru
        var marker = new google.maps.Marker({position: uluru, map: map});
      }


   var paralelos = document.querySelector(".padhome");

function scrollParallax(){
    var scrollTop = document.documentElement.scrollTop;
    paralelos.style.transform = 'translateY('+scrollTop * -0.5 + 'px)';
    paralelos.style.transform = 'translateY('+scrollTop * -0.5 + 'px)';
}

window.addEventListener('scroll',scrollParallax);

} catch (error) {
    console.log("no inicializado");
}




var player;
var player2;


  function onYouTubeIframeAPIReady() {
    player = new YT.Player('videoPres', {
      height: '360',
      width: '640',
      videoId: 'tUFOdr-mnHI',

      playerVars:  {'autoplay':0,'origin':'https://tapsecurity.test', 'enablejsapi':1,'rel':0,'showinfo':0 },

    });



    player2 = new YT.Player('videoPres2', {
        height: '360',
        width: '640',
        videoId: 'yrEZ0swSwqc',
        playerVars:  {'autoplay':0,'origin':'https://tapsecurity.test','enablejsapi':1, 'rel':0,'showinfo':0 },

      });
    }
