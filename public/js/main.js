var player;
var player2;
var playerTraining;

try {


  function onYouTubeIframeAPIReady() {
    player = new YT.Player('videoPres', {
      height: '360',
      width: '640',
      videoId: 'tUFOdr-mnHI',

      playerVars:  {'autoplay':0,'origin':'https://www.txassetpro.com', 'enablejsapi':1,'rel':0,'showinfo':0 },

    });



    player2 = new YT.Player('videoPres2', {
        height: '360',
        width: '640',
        videoId: 'yrEZ0swSwqc',
        playerVars:  {'autoplay':0,'origin':'https://www.txassetpro.com','enablejsapi':1, 'rel':0,'showinfo':0 },

      });

      playerTraining = new YT.Player('videoTraining', {
        height: '360',
        width: '640',
        videoId: 'yrEZ0swSwqc',
        playerVars:  {'autoplay':0,'origin':'https://www.txassetpro.com', 'enablejsapi':1,'rel':0,'showinfo':0 },

    });


    }

} catch (error) {
    console.log("no inicializado");
}

var btnactive = false;

if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
    AOS.init({ disable: 'mobile', delay: 0, once: true, });
    $(document.body).on('touchmove', onScroll);
    $(window).on('scroll', onScroll);
    function onScroll(){
        console.log($(this).scrollTop());
        if ($(this).scrollTop() > 40) {
            $('header').addClass("fixed-top");

            $('body').css('padding-top', $('.navbar').outerHeight() + 'px');
          }else{
            $('header').removeClass("fixed-top");

            $('body').css('padding-top', '0');
          }
    }
}else{

    AOS.init({

        offset: 350,
        duration: 600,
      easing: 'ease-in-sin',
    });

    try {
        $('.parallaxie').parallaxie();
    } catch (error) {
       console.log("no inicializado");
    }

}




$(window).on('scroll',function(){

   if ($(this).scrollTop() > 40) {
      $('header').addClass("fixed-top");

      $('body').css('padding-top', $('.navbar').outerHeight() + 'px');
    }else{
      $('header').removeClass("fixed-top");

      $('body').css('padding-top', '0');
    }
});

window.onload = function() {
    var hash = location.hash;

    if(hash=="#about"){

        $(".nav-item").removeClass("activo");
        $(".link-about").parent("li").addClass("activo");
       }
       if(hash=="#service"){
        $(".nav-item").removeClass("activo");
        $(".link-service").parent("li").addClass("activo");
       }
  };


$(function() {


    $('#fileid').on('change',function(){

        var fileName = $(this).val();

        $('.file-upload').html(fileName);
    })



    $(".internav").on('click',function(e){
        e.preventDefault();
       $(".nav-item").removeClass("activo");



       let ruta = $(this).data("route");
        let nreuta = "#"+ruta;
       let stack1 = $(nreuta).position().top;

       let link = ".link-"+ruta;
       $(link).parent("li").addClass("activo");
       $("html, body").animate({ scrollTop: stack1-40 }, 600,"swing");

       $(".navbar-toggler-close").trigger("click");


    });
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

        $(".videoplayTraining").click(function(e){
            e.preventDefault();
            console.log(playerTraining);
            playerTraining.playVideo();
        });

        $(".stopvideo3").on('click',function(e){
            e.preventDefault();
            playerTraining.stopVideo();
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
   var patrulla = document.getElementById("patrulla");

function scrollParallax(){
    var scrollTop = document.documentElement.scrollTop;
    if(paralelos)
    {
    paralelos.style.transform = 'translateY('+scrollTop * -0.5 + 'px)';
    paralelos.style.transform = 'translateY('+scrollTop * -0.5 + 'px)';
    }

    if(patrulla)
    {
    patrulla.style.transform = 'translateX('+scrollTop * -0.1 + 'px)';
    patrulla.style.transform = 'translateX('+scrollTop * -0.1 + 'px)';
    }
}

window.addEventListener('scroll',scrollParallax);


$("#fileid").fileinput({
    theme: 'fas',
    language: 'us',
    showUpload: false,
    fileType: "any",
    previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
});

} catch (error) {
    console.log("no inicializado");
}





    // const btnEmployment = document.getElementById("form-employment");
    // btnEmployment.addEventListener('click',(e)=>{
    //     grecaptcha.enterprise.ready(async () => {
    //         const token = await grecaptcha.enterprise.execute('6LcKnVwqAAAAAK_b4UEI30V2GEoYqeh2_pdQwPQW', {action: 'LOGIN'});
    //       });
    // })

    // $.validator.addMethod("atLeastOneChecked", function(value, element) {
    //     return $('.week:checked').length > 0;
    // }, "Please select at least one day.");

    var validator = $( "#form-employment" ).validate({
        rules: {
            'days[]': {
                required: true,
                minlength: 1
            }
        },
        messages: {
            'days[]': {
                required: "Please select at least one day."
            }
        },
        errorPlacement: function(error, element) {
            if (element.attr("name") == "days[]") {
                error.insertAfter("#days-error");
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function(element, errorClass, validClass) {
            if (element.name == "days[]") {
                $("#days-error").show();
            } else {
                $(element).addClass(errorClass).removeClass(validClass);
            }
        },
        unhighlight: function(element, errorClass, validClass) {
            if (element.name == "days[]") {
                $("#days-error").hide();
            } else {
                $(element).removeClass(errorClass).addClass(validClass);
            }
        }
    });


// $(".btn-employment-submit").on('click',function(e){
//     e.preventDefault();
//     if(validator.form()){
//                alert("enviado")
//             }else{
//              alert("complete los campos");
//             }
// });

    function onSubmit(token){
        if(validator.form()){
            document.getElementById("form-employment").submit();
        }else{
         alert("complete los campos");
        }
    }

    var validatorForm = $("#form-form8850").validate();
    function onForm8850(token){
        if(validatorForm.form()){
            document.getElementById("form-form8850").submit();
        }else{
            alert("complete los campos");
        }
    }

    var validateHome = $("#form_home").validate();
    function onFormHome(token){
        if(validateHome.form()){
            document.getElementById("form_home").submit();
        }else{
            alert("complete los campos");
        }
    }



    var validateContact = $("#form__contact").validate();
    function onFormContact(token){
        if(validateContact.form()){
            document.getElementById("form__contact").submit();
        }else{
            alert("complete los campos");
        }
    }

