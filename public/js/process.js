// const { method } = require("lodash");


var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        var player;
        var playerReady = false;

        function onYouTubeIframeAPIReady() {
            player = new YT.Player('player', {
                height: '360',
                width: '640',
                videoId: 'cb7qnKjWEpA',
                events: {
                    'onReady': onPlayerReady,
                    'onStateChange': onPlayerStateChange
                }
            });
        }

        function onPlayerReady(event) {
            playerReady = true;
        }

        function onPlayerStateChange(event) {
            if (event.data == YT.PlayerState.ENDED) {
                $('#videoModal').modal('hide');
            }
        }


            // Cuando se hace clic en el enlace, se abre el modal y se reproduce el video si el reproductor está listo
            $('.video__player__link').on('click', function(event) {
                event.preventDefault();
                $('#videoModal').modal('show');
                $('#videoModal').on('shown.bs.modal', function () {
                    if (playerReady && player && typeof player.playVideo === 'function') {
                        player.playVideo();
                    }
                });
            });

            // Cuando se cierra el modal, se detiene el video
            $('#videoModal').on('hide.bs.modal', function () {
                if (playerReady && player && typeof player.stopVideo === 'function') {
                    player.stopVideo();
                }
            });


$(".detalle__costo__boton__link").on('click',function(e){
    e.preventDefault();
    let id = $(this).data('id');
    let token = $("meta[name=csrf-token]").attr("content");

    $.ajax({
      url:'/cart/process',
      type:'POST',
      dataType:'json',
      data:({'_token':token,'_method':'POST','id':id}),
      success:function(response){
         if(response.rpta=="ok"){
          window.location.href="/cart";
         }else{
          $(".texto__error").html("You can only purchase one course at a time")
          $("#errorModal").modal('show');
         }
      }
    });

});

$(".cart__body__grilla__delete").on('click',function(e){
  e.preventDefault();

  let id = $(this).data('id');
    let token = $("meta[name=csrf-token]").attr("content");

    $.ajax({
      url:'/cart/remove/'+id,
      type:'GET',
      dataType:'json',
      success:function(response){
         if(response.rpta=="ok"){
          window.location.reload();
         }
      }
    });
})


$(".cart__body__foot__link").click(function(e){
  e.preventDefault();
  let token = $("meta[name=csrf-token]").attr("content");
  const sendata = ({'_token':token,'_method':'POST'});
  //verificar si el carrito es vacio
  let course_id = $(this).data('id');
  let user_id = $(this).data('user');
  //verifica inicio de sesion
  $.ajax({
    url:'/cart/checksesion',
    type:'GET',
    dataType:'json',
    success:function(response){
            if(response.estado==true){
              $.ajax({
                url:'/cart-estado',
                type:'GET',
                dataType:'json',
                success:function(response){

                  if(response==false){
                    $(".texto__error").html("You have no courses in your cart")
                    $("#errorModal").modal('show');

                    return false;

                  }else{
                    //Verificar si adquiri el curso
                  let userdata = {'user_id':user_id,'course_id':course_id,'_token':token,'_method':'POST'};
                  $.ajax({
                    url:'/verify-mycourse',
                    type:'POST',
                    dataType:'json',
                    data:userdata,
                    success:function(dresponse){

                    if(dresponse.rpta==true){

                    $("#existeModal").modal('show');
                    $(".mensaje__verify").html(dresponse.mensaje);
                      }else{
                        //verificar firma
                    $.ajax({
                      url:'/cart/checksign',
                      type:'GET',
                      dataType:'json',
                      success:function(response){
                        if(response.estado==true){
                              $.ajax({
                                url:'/cart/process-signed',
                                type:'POST',
                                dataType:'json',
                                data:sendata,
                                success:function(response){
                                    return stripe.redirectToCheckout({ sessionId: response.id });
                                }
                              })

                            }else{

                              window.location.href="/cart/sign";
                            }
                          }
                        })

                      }
                    }
                  })

                  }
                }
              });

            }else{
            $("#loginModal").modal("show");
            }
          }
        });
});




$(".btn__start").on('click',function(e){
  e.preventDefault();

})

$(".btn__loginsumit").on('click',function(){

  const token = $('meta[name="csrf-token"]').attr('content');
  let email = $("#email__login").val();
  let password = $("#password__login").val();

  let sendata = {'_token':token,'_method':'POST','email':email,'password':password};

  $.ajax({
    url:'/loginpop',
    type:'POST',
    dataType:'json',
    data:sendata,
    success:function(response){
      console.log(response.rpta);
      if(response.rpta=="error"){
        $(".login__alerta").show();
      }else{
       window.location.reload();
      }
    }

  }).fail(function(response){
      console.log(response.responseJSON);

      if(response.responseJSON.errors.email){
        $(".error__email").html("Ingrese su email");
      }

      if(response.responseJSON.errors.password){
        $(".error__password").html("Ingrese su clave");
      }
  });

});

$("#email__login").focus(function() {
  $(".error__email").html("");
  $(".login__alerta").hide();
});
$("#password__login").focus(function() {
  $(".error__password").html("");
  $(".login__alerta").hide();
});


try {

    const playermob = new Plyr('#my-homevideo_mobile');
    const videocurso = new Plyr('#video__curso');
    // const player = new Plyr('#my-homevideo', {captions: {active: true}});
    // window.player = player;

    const player2 = new Plyr('#my-video');
    //window.player2 = player2;
    player2.play();


    player2.on('ready', (event) => {
        const instance = event.detail.plyr;

      });

      player2.on('play', event => {
        const instance = event.detail.plyr;

        instance.fullscreen.toggle;
       // instance.pause=false;

      });
      player2.on('ended', event => {

        const instance = event.detail.plyr;

        player2.fullscreen.exit();

            $('html, body').animate({
                scrollTop: $("#learn__footer").offset().top - 200
            }, 360);

        //registro de capitulo completado
        const token = $('meta[name="csrf-token"]').attr('content');
        let usercourseid = $("input[name='user_course_id']").val();
        let usercoursechapterid = $("input[name='user_course_chapter_id']").val();
        let usercoursechaptercontentid= $("input[name='user_course_chapter_content_id']").val();


        let sendata = {
            '_token':token,
            '_method':'post',
            'usercourseid':usercourseid,
            'usercoursechapterid':usercoursechapterid,
            'usercoursechaptercontentid':usercoursechaptercontentid
        };

        $.ajax({
            url:'/user/set-chapter',
            type:'POST',
            dataType:'json',
            data:sendata,
            success:function(response){
            console.log(response);
            $(".encurso__footer__link").removeClass("disabled");
            }
        })



      });

  //var player = videojs('my-player');
//   var player2 = videojs('my-homevideo');
//   var options = {

//   };
  //player.enterFullWindow();

//   var player = videojs('my-player', function onPlayerReady() {

//     this.play();

//     this.on("play", function () {
//         alert("corriendo");
//         isPaused = isHidden = false
//         this.controlBar.hide();
//         this.enterFullWindow();
//      });

//     this.on('ended', function() {
//         this.exitFullWindow();



//         $('html, body').animate({
//             scrollTop: $("#learn__footer").offset().top - 200
//         }, 360);

//       //registro de capitulo completado
//       const token = $('meta[name="csrf-token"]').attr('content');
//       let usercourseid = $("input[name='user_course_id']").val();
//       let usercoursechapterid = $("input[name='user_course_chapter_id']").val();
//       let usercoursechaptercontentid= $("input[name='user_course_chapter_content_id']").val();

//       //alert(usercourseid+' '+usercoursechapterid+' '+usercoursechaptercontentid);

//       let sendata = {
//         '_token':token,
//         '_method':'post',
//         'usercourseid':usercourseid,
//         'usercoursechapterid':usercoursechapterid,
//         'usercoursechaptercontentid':usercoursechaptercontentid
//       };

//       $.ajax({
//         url:'/user/set-chapter',
//         type:'POST',
//         dataType:'json',
//         data:sendata,
//         success:function(response){
//           console.log(response);
//           $(".encurso__footer__link").removeClass("disabled");
//         }
//       })
//     });

//   });


//   var player2 = videojs('my-homevideo', options, function onPlayerReady() {
//     //this.controls(false);
//     this.play();

//    });
//    console.log(player2);

} catch (error) {
  console.log("no inicializado");
}

$(".detalle__header__mycourse").on('click',function(e){
  e.preventDefault();

  $('.detalle__header__mycourse').removeClass("active");
    $(this).addClass("active");

  let valor = $(this).data("content");
  let id=$(this).data('id');
  const token = $('meta[name="csrf-token"]').attr('content');
  switch (valor) {
    case "general":
      $(".detalle__contenido").show();
      $(".detalle__informacion").show();
      $(".detalle__secciones").hide();
    break;

    case "secciones":
      $(".detalle__contenido").hide();
      $(".detalle__informacion").hide();
      $(".detalle__secciones").show();

      let sendata = {'_method':'POST','_token':token,id:id};
      let htm='';
      $.ajax({
        url:'/async/course-content',
        type:'POST',
        dataType:'json',
        data:sendata,
        beforeSend:function(){
          console.log("preparando");
        },
        success:function(response){
          $.each(response.contents, function (i, e) {

              htm+=`<div class="detalle__contenido__capitulo interlineado">
              <div class="row">
                     <div class="col-md-12">
                        <div class="detalle__contenido__capitulo__titulo"> ${e.titulo} </div>
                     </div>
              </div>


              <div class="row justify-content-between">`;
                      $.each(e.contenidos,function(p,q){

                        htm+=`<div class="col-md-12">
                                  <span>${q.order}. </span>
                                  <a href="/course/${e.course_slug}/${e.chapter_slug}/${q.slug}">${q.titulo}</a>
                              </div>`;

                      });
              htm+=`</div> </div>`;
          });

          $(".detalle__secciones").html(htm);
        }
      });
    break;
  }
});


$(".detalle__header__home__course").on('click',function(e){
  e.preventDefault();
  let valor = $(this).data("content");
  let id=$(this).data('id');

    $('.detalle__header__home__course').removeClass("active");
    $(this).addClass("active");

  const token = $('meta[name="csrf-token"]').attr('content');
  switch (valor) {
    case "general":
      $(".detalle__contenido").show();
      $(".detalle__informacion").show();
      $(".detalle__secciones").hide();
    break;

    case "secciones":
      $(".detalle__contenido").hide();
      $(".detalle__informacion").hide();
      $(".detalle__secciones").show();

      let sendata = {'_method':'POST','_token':token,id:id};
      let htm='';
      $.ajax({
        url:'/async/course-content',
        type:'POST',
        dataType:'json',
        data:sendata,
        beforeSend:function(){
          console.log("preparando");
        },
        success:function(response){

          htm+=`<div class="detalle__contenido__capitulo ">

          <div class="row">
                 <div class="col-md-12">
                    <div class="detalle__contenido__capitulo__titulo"> Contents </div>
                 </div>`;
          $.each(response.contents, function (i, e) {




            htm+=` <div class="row justify-content-between interlineado">`;


                        htm+=`<div class="col-md-4">
                                  <span>${i+1} </span>
                                  ${e.titulo}
                              </div>

                              <div class="col-md-4">
                              <ul class="capitulos">`;
                                       if(e.video!=null){
                                        htm+=`<li class="videocap">Chapter video</li>`;
                                      }
                                       if(e.reading!=null){
                                      htm+=` <li class="capitulo">Chapter reading</li>`;
                                       }
                                       if(e.audio!=null){
                                         htm+=`<li class="audio">Chapter audio</li>`;
                                      }
                                       if(e.quiz!=null){
                                       htm+=`<li class="question">Questions about the chapter</li>`;
                                     }
                              htm+=` </ul>
                     </div>`;


              htm+=`</div>`;
          });
          htm+=`</div>`;

          $(".detalle__secciones").html(htm);
          $('html, body').animate({
            scrollTop: $("#contenido").offset().top
        }, 360);
        }
      });
    break;
  }
});



$(".btn__quiz").on('click',function(e){
  e.preventDefault();
    let quizid = $(this).data('quizid');
    let ucc = $(this).data('ucc');

    let input = $(this).parent().children('.card__question__opciones').find('input[name="respuesta"]:checked').val();
    let padre =  $(this).parent();
    let chapter_id =  $('input[name="quiz_chapter_id"]').val();
    let tiempo = $("#tiempoquiz").val();
    let user_course_id = $('input[name="user_course_id"]').val();

    const token = $('meta[name="csrf-token"]').attr('content');

    if(input==undefined){
      $(".texto__error").html("you must check an option");
      $("#errorModal").modal('show');
      return false;
    }


    let sendata = {'_token':token,'_method':'POST',quizid:quizid,optionid:input,'chapter_id':chapter_id,'user_course_chapter_id':ucc,'tiempo':tiempo,'user_course_id':user_course_id};
    $.ajax({
      url:"/learn/set-quiz",
      type:"POST",
      dataType:'json',
      data:sendata,
      success:function(response){

        padre.hide();
        padre.next('.card__question').show();

        if(response.completado==true){

          $(".quiz__preguntas").hide();
          $(".quiz__resultados").show();
          $(".quiz__botones").show();
         var htm = "";
          //endpoint resultados
            $.ajax({
                url:'/get-quiz-result/'+ucc,
                method:'GET',
                dataType:'json',
                success:function(response){
                    let htm='';


                        htm=` <div class="quiz__resultados__titulo">Result</div>
                            <div class="quiz__resultados__respuesta">
                                ${response.nc} of ${response.np} question answer correctly
                            </div>
                            <div class="quiz__resultados__barra">
                                <div class="barra__roja" style="width:${response.porcentaje}%"></div>
                            </div>
                            <div class="quiz__resultados__tiempo">
                                your time: <span>${response.tiempo}</span>
                            </div>
                            <input type="hidden" name="tiempoquiz" id="tiempoquiz">`;

                            $(".quiz__resultados").html(htm).show();
                            $(".preg_correctas").html(response.nc);
                            $(".preg_porcentaje").html(response.porcentaje);

                            $.ajax({
                                url:`/quiz-questions/${response.user_id}/${response.course_id}/${response.chapter_id}`,
                                method:'GET',
                                dataType:'json',
                                success:function(idata){
                                    console.log(idata);
                                    let itm = "";


                                        $.each(idata, function(i, e) {
                                            itm += `<div class="card__question">
                                                        1. ${e.question}
                                                        <div class="card__question__opciones">`;


                                                        $.each(e.options, function(x, y) {
                                                            let checked = "";
                                                            let borderColor = "";
                                                            let clases = "";

                                                            // Condición 1: options[i].estado = 1 y options[i].user_selections.result = 1
                                                            if (y.estado === 1 && y.user_selections.length > 0 && y.user_selections[0].result === 1) {
                                                                checked = "checked";
                                                                borderColor = "border: 2px solid green;";
                                                                clases = "acierto resultuser resulcorrect";
                                                            }
                                                            // Condición 2: options[i].user_selections.result = 0
                                                            else if (y.user_selections.length > 0 && y.user_selections[0].result === 0) {
                                                                checked = "checked";
                                                                borderColor = "border: 2px solid red;";
                                                                clases ="noacierto resultuser";
                                                            }
                                                            // Condición 3: options[i].estado = 1 pero no tiene user_selections
                                                            else if (y.estado === 1 && y.user_selections.length === 0) {
                                                                borderColor = "border: 2px solid yellow;";
                                                                clases = "noacierto resulcorrect";
                                                            }

                                                            itm += `<div class="form-check ${clases}">
                                                                        <label class="form-check-label" for="respuesta${y.id}">
                                                                            ${y.option}
                                                                            <input class="form-check-input" type="radio" name="respuesta${e.id}" value="${y.id}" ${checked}>
                                                                        </label>
                                                                    </div>`;
                                                        });

                                            itm += `</div></div>`;
                                        });



                                    $(".quiz__desarrollado").html(itm);
                                }
                              });

                    if(response.aprobado===true){

                        window.location.reload();
                    }
                }

            })
          //enpoint preguntas con respuesta correctas y de usuario


          clearInterval(refreshIntervalId);
        }

      }
    })
})

$(".btn__view").on('click',function(e){
  e.preventDefault();

  //$(".quiz__resultados").hide();
  $(".quiz__botones").show();
  $(".quiz__desarrollado").show();
});

$(".btn__restart").on('click',function(e){
  e.preventDefault();
  const token = $('meta[name="csrf-token"]').attr('content');
  let id =  $(this).data('id');

  let sendata = {'_token':token,'_method':'POST','user_course_chapter_id':id};
  $.ajax({
    url:"/learn/reset-quiz",
    type:"POST",
    dataType:'json',
    data:sendata,
    success:function(response){

     window.location.reload();

    }
  })

});



// $(".btn__examen").on('click',function(e){
//   e.preventDefault();

//   $(".quiz__timelapse").show();
//   $(".quiz__preguntas").show();
//   $(".quiz__inicio").hide();

//   const SPAN_HOURS = document.getElementById('hora');
//   const SPAN_MINUTES = document.getElementById('minuto');
//   const SPAN_SECONDS = document.getElementById('segundo');

//   const MILLISECONDS_OF_A_SECOND = 1000;
//   const MILLISECONDS_OF_A_MINUTE = MILLISECONDS_OF_A_SECOND * 60;
//   const MILLISECONDS_OF_A_HOUR = MILLISECONDS_OF_A_MINUTE * 60;

//   var segundo=60;
//   var minuto=59;
//   var hora = 1;

//   var contador = 0;
//   var porcentaje=0;
//   var total = 7200;
//   function updateCountdown() {

//     SPAN_HOURS.textContent= hora;
//       contador +=1;
//        segundo -= 1;

//        if(segundo==0){
//         minuto-=1;
//         segundo=60;
//        }



//       if(segundo==60){
//           SPAN_SECONDS.textContent = '00';
//       }else{
//             if(segundo<10){
//               SPAN_SECONDS.textContent = "0"+segundo;
//             }else{

//               SPAN_SECONDS.textContent = segundo;
//             }

//       }

//        if(minuto==60){

//         SPAN_MINUTES.textContent = '00';
//        }else{

//         if(minuto<10){

//             SPAN_MINUTES.textContent = "0"+minuto;


//         }else{

//         SPAN_MINUTES.textContent = minuto;

//         }
//        }

//        if(hora>0 && minuto ==0 ){

//          hora -=1;
//          minuto=59;
//          SPAN_HOURS.textContent = hora;
//        }


//        if(hora==0 && minuto == 0 &&  segundo==1){


//           clearInterval(refreshIntervalId);
//           let user_course_id = $("#user_course_id").val();
//           let exam_id = $("#exam_id").val();
//           let tiempo = $("#tiempo").val();


//           let quizid = $(this).data('quizid');

//           let chapter_id =  $('input[name="chapter_id"]').val();
//           const token = $('meta[name="csrf-token"]').attr('content');

//           let sendata = {'_token':token,'_method':'POST',quizid:quizid,'evento':"excedio",'chapter_id':chapter_id,'exam_id':exam_id,'tiempo':tiempo,'user_course_id':user_course_id};

//           $.ajax({
//             url:"/learn/set-exam",
//             type:"POST",
//             dataType:'json',
//             data:sendata,
//             success:function(response){

//               window.location.reload();


//             }
//           })


//        }

//       $("#tiempo").val(hora+":"+minuto+":"+segundo);

//      porcentaje = (100*contador)/total;
//      document.querySelector(".quiz__timelapse__bar").style.width= parseFloat(porcentaje).toFixed(2)+"%";
//   }
//   updateCountdown();
//   var refreshIntervalId = setInterval(updateCountdown, MILLISECONDS_OF_A_SECOND);
// })

$(".btn__examen").on('click', function (e) {
    e.preventDefault();

    $(".quiz__timelapse").show();
    $(".quiz__preguntas").show();
    $(".quiz__inicio").hide();

    // Definir variables
    const SPAN_HOURS = document.getElementById('hora');
    const SPAN_MINUTES = document.getElementById('minuto');
    const SPAN_SECONDS = document.getElementById('segundo');
    const MILLISECONDS_OF_A_SECOND = 1000;
    const TOTAL_TIME = 7200; // 2 horas en segundos
    let segundosRestantes = TOTAL_TIME; // Total en segundos

    // Función de actualización de cuenta regresiva
    function updateCountdown() {
        // Calcular horas, minutos y segundos
        let horas = Math.floor(segundosRestantes / 3600);
        let minutos = Math.floor((segundosRestantes % 3600) / 60);
        let segundos = segundosRestantes % 60;

        // Mostrar el tiempo en el DOM
        SPAN_HOURS.textContent = horas.toString().padStart(2, '0');
        SPAN_MINUTES.textContent = minutos.toString().padStart(2, '0');
        SPAN_SECONDS.textContent = segundos.toString().padStart(2, '0');

        // Actualizar el input hidden #tiempo con el tiempo actual
        $("#tiempo").val(`${horas.toString().padStart(2, '0')}:${minutos.toString().padStart(2, '0')}:${segundos.toString().padStart(2, '0')}`);

        // Actualizar la barra de progreso
        let porcentaje = (100 * (TOTAL_TIME - segundosRestantes)) / TOTAL_TIME;
        document.querySelector(".quiz__timelapse__bar").style.width = porcentaje.toFixed(2) + "%";

        // Cuando el tiempo llegue a cero
        if (segundosRestantes <= 0) {
            clearInterval(refreshIntervalId);
            handleTimeUp();
        }

        // Decrementar el tiempo restante
        segundosRestantes--;
    }

    // Llamada al final de la cuenta regresiva
    function handleTimeUp() {
        let user_course_id = $("#user_course_id").val();
        let exam_id = $("#exam_id").val();
        let tiempo = $("#tiempo").val(); // Ahora sí tendrá el valor correcto
        let quizid = $(".btn__examen").data('quizid'); // Se toma desde el botón
        let chapter_id = $('input[name="chapter_id"]').val();
        const token = $('meta[name="csrf-token"]').attr('content');

        let sendata = {
            '_token': token,
            '_method': 'POST',
            'quizid': quizid,
            'evento': "excedio",
            'chapter_id': chapter_id,
            'exam_id': exam_id,
            'tiempo': tiempo,
            'user_course_id': user_course_id
        };

        $.ajax({
            url: "/learn/set-exam",
            type: "POST",
            dataType: 'json',
            data: sendata,
            success: function (response) {
                window.location.reload();
            }
        });
    }

    // Iniciar la cuenta regresiva
    updateCountdown();
    var refreshIntervalId = setInterval(updateCountdown, MILLISECONDS_OF_A_SECOND);
});


var urlpath = window.location.href;
if(urlpath.indexOf('quiz')!="-1"){

  const MILLISECONDS_OF_A_SECOND = 1000;
  const MILLISECONDS_OF_A_MINUTE = MILLISECONDS_OF_A_SECOND * 60;
  const MILLISECONDS_OF_A_HOUR = MILLISECONDS_OF_A_MINUTE * 60;

   const conshora = $(".q-hora");
   const consminuto = $(".q-minute");
   const conssegundo = $(".q-segundo");

   let prhora = 0;
   let prminutos = 0;
   let prsegundo = 0;

   var segundo=0;
  var minuto=0;
  var hora = 1;
  var contador = 0;
  var porcentaje=0;
  var total = 7200;
  function updateCountdown2() {
      contador +=1;

       segundo += 1;
       if(segundo==59){
        minuto+=1;
        segundo=0;
       }

       if(segundo==60){

       prsegundo = "00";
       }else{
        if(segundo<10){

          prsegundo = "0"+segundo;
        }else{

          conssegundo.html(segundo);
          prsegundo = segundo;
        }

       }


       if(minuto==60){

        prminuto = "00";
       }else{
        if(minuto<10){

          prminuto = "0"+minuto;
        }else{


        prminuto = minuto;
        }
       }

       let consolidar = `00:${prminuto}:${prsegundo}`;
       $("#tiempoquiz").val(consolidar);

       if(hora==0 && minuto == 0 &&  segundo==1){


          clearInterval(refreshIntervalId)


       }

      // 7200segundos =100%


     //porcentaje= Math.round((total*100)/contador);
     porcentaje = (100*contador)/total;

     //console.log(contador+" "+parseFloat(porcentaje).toFixed(2));

  }

  updateCountdown2();
  var refreshIntervalId = setInterval(updateCountdown2, MILLISECONDS_OF_A_SECOND);
}


$(".btn__exam").on('click',function(e){
  e.preventDefault();
  let user_course_id = $("#user_course_id").val();
  let exam_id = $("#exam_id").val();
  let tiempo = $("#tiempo").val();


  let quizid = $(this).data('quizid');
  let input = $(this).parent().children('.card__question__opciones').find('input[name="respuesta"]:checked').val();
  let padre =  $(this).parent();
  let chapter_id =  $('input[name="chapter_id"]').val();
  const token = $('meta[name="csrf-token"]').attr('content');

  let sendata = {'_token':token,'_method':'POST',quizid:quizid,optionid:input,'chapter_id':chapter_id,'exam_id':exam_id,'tiempo':tiempo,'user_course_id':user_course_id};
  $.ajax({
    url:"/learn/set-exam",
    type:"POST",
    dataType:'json',
    data:sendata,
    success:function(response){

      padre.hide();
      padre.next('.card__question').show();
      if(response.completo==true){
         $(".quiz__preguntas").hide();
         $(".quiz__resultados").show();
          $(".quiz__botones").show();

          //return aprobo no aproboå

       window.location.reload();
     }

    }
  })
})

$(".btn__registro").on('click',function(e){
  e.preventDefault();
  $("#registerModal").modal('show');
  $("#loginModal").modal('hide');
})

$(".btn__register").on('click',function(e){
  e.preventDefault();

  const token = $('meta[name="csrf-token"]').attr('content');
  let email = $("#email-register").val();
  let password = $("#password-register").val();
  let passwordconfirm = $("#password-confirm").val();
  let name = $("#name-register").val();

  if(password===passwordconfirm){
    let sendata = {'_token':token,'_method':'POST','name':name,'email':email,'password':password,'password_confirm':passwordconfirm};

    $.ajax({
      url:'/register-user',
      type:'POST',
      dataType:'json',
      data:sendata,
      success:function(response){
        console.log(response.rpta);
        if(response.rpta=="error"){
          $(".register__alerta").show();
        }else{
        window.location.reload();
        }
      }

    }).fail(function(response){
        console.log(response.responseJSON);

        if(response.responseJSON.errors.email){
          $(".error__email__register").html(response.responseJSON.errors.email[0]);
        }

        if(response.responseJSON.errors.password){
          $(".error__password__register").html("Ingrese su clave");
        }
    });

  }else{
    $(".register__alerta").show();
  }

})

$(".btn__start").on('click',function(e){
  e.preventDefault();
  let path = $(this).attr('href');

    $.ajax({
      url:'/user/exist-profile',
      type:'GET',
      dataType:'json',
      success:function(response){
        if(response===false){
          window.location.href='/user/user-profile';
        }else{
          window.location.href = path;
        }
      }
    })

});

var validaton =  $("#frm-profile").validate();

$(".encurso__temas__lista__item").on('click',function(e){
  //e.preventDefault();
  //$(".encurso__temas__lista__item__sublista").removeClass("active");
  $(this).children("ul").addClass("active");
});

$(".access__login").on('click',function(e){
  e.preventDefault();
  $("#loginModal").modal('show');
});

const playaudio = document.getElementById("audiocontent");
$(".timeline__play").on('click',function(e){
  e.preventDefault();

  playaudio.play();
  playaudio.addEventListener("timeupdate",myFunction);
  $(this).hide();
  $(".timeline__stop").show();
  playaudio.addEventListener('ended',(event)=>{
    console.log("audio terminado");
  })
})

$(".timeline__stop").on('click',function(e){
  e.preventDefault();
  playaudio.pause();
  $(this).hide();
  $(".timeline__play").show();
});

function myFunction(){

	if (playaudio.currentTime >0){
		//const barra = document.getElementById('progress')
		// barra.value = (playaudio.currentTime / playaudio.duration) * 100
		// console.log(barra.value);
		var duracionSegundos= playaudio.duration.toFixed(0);
		dura=secondsToString(duracionSegundos);
		var actualSegundos = playaudio.currentTime.toFixed(0)
		actual=secondsToString(actualSegundos);

		duracion= actual +' / '+ dura
		document.getElementById('timer').innerText=duracion

    valorrange = (playaudio.currentTime / playaudio.duration) * 100;
    $(".timelinebox__solid").css("width",valorrange+"%");

    if(valorrange==100){


      const token = $('meta[name="csrf-token"]').attr('content');
      let usercourseid = $("input[name='user_course_id']").val();
      let usercoursechapterid = $("input[name='user_course_chapter_id']").val();
      let usercoursechaptercontentid= $("input[name='user_course_chapter_content_id']").val();

      //alert(usercourseid+' '+usercoursechapterid+' '+usercoursechaptercontentid);

      let sendata = {
        '_token':token,
        '_method':'post',
        'usercourseid':usercourseid,
        'usercoursechapterid':usercoursechapterid,
        'usercoursechaptercontentid':usercoursechaptercontentid
      };

      $.ajax({
        url:'/user/set-chapter',
        type:'POST',
        dataType:'json',
        data:sendata,
        success:function(response){
          console.log(response);
          $(".encurso__footer__link").removeClass('disabled');
        }
      })


    }
	}

}

function secondsToString(seconds) {
	var hour="";
	if (seconds>3600){
		hour = Math.floor(seconds / 3600);
		hour = (hour < 10)? '0' + hour : hour;
		hour+=":"
	}
   var minute = Math.floor((seconds / 60) % 60);
  minute = (minute < 10)? '0' + minute : minute;
  var second = seconds % 60;
  second = (second < 10)? '0' + second : second;
  return hour  + minute + ':' + second;
}

$(".btn__restart__exam").on('click',function(e){


  e.preventDefault();
  let curso_id = $(this).data("cursoid");
  let usercourseid = $(this).data("usercourseid");
  let usercourseexamid = $(this).data("usercourseexamid");
  let examid = $(this).data("examid");
  const token = $('meta[name="csrf-token"]').attr('content');

  let sendata = {'_token':token,'_method':'POST',curso_id:curso_id,user_course_id:usercourseid,user_course_exam_id:usercourseexamid,'exam_id':examid};

  $.ajax({
    url:'/learn/exam/reset-exam',
    type:'POST',
    dataType:'json',
    data:sendata,
    success:function(response){
      window.location.reload();

    }
  })


})


$(".btn__question__exam").on('click',function(e){
  e.preventDefault();
  let curso_id = $(this).data("cursoid");
  let usercourseid = $(this).data("usercourseid");
  let usercourseexamid = $(this).data("usercourseexamid");
  let examid = $(this).data("examid");
  const token = $('meta[name="csrf-token"]').attr('content');

  let sendata = {'_token':token,'_method':'POST',curso_id:curso_id,user_course_id:usercourseid,user_course_exam_id:usercourseexamid,'exam_id':examid};

  $.ajax({
    url:'/learn/exam/view-exam',
    type:'POST',
    dataType:'json',
    data:sendata,
    async:false,
    success:function(response){
      var htm='';
      $.each(response,function(i,e){

       htm+=` <div class="card__question">
									${i+1}. ${e.question_name}

						<div class="card__question__opciones">`;
									$.each(e.opciones,function(x,y){

                        htm+=`	<div class="form-check   ${y.responde?'resultado':''}   ${y.correcto?'correcto':''} ${y.acierto?'acierto':''} ">
                            <input class="form-check-input " type="radio" name="respuesta${i+1}" value="${x+1}"   id="respuesta${x+1}" data-res="${y.responde}" data-res="${y.correcto}" data-res="${y.acierto}"`;
                                    if(y.responde){
                                        htm+=`checked`;
                                    }
                                    if(y.correcto==true && y.acierto==true){
                                        htm+=`checked`;
                                    }

                            htm+=`>
                            <label class="form-check-label" for="respuesta${x+1}">
                                ${y.name}
                            </label>
                            </div>`;
                    })

        htm+=`</div>

			</div>`;


      })
      console.log(htm);
      $(".quiz__respuestas").html(htm);
    }
  })
})

// $(window).on('load',function(){
//   let activa = $("#activamodal").val();

//   if(activa == 1){
//     $(".texto__error").html("You must pass the quiz with 75% to continue");
//     $("#errorModal").modal('show');
//   }
// })


$(".btn__restart__course").on('click',function(e){
    e.preventDefault();
    let course_id = $(this).data('cursoid');
    let user_id = $(this).data('userid');
    let user_course_id = $(this).data('usercourseid');
    let token = $("meta[name=csrf-token]").attr("content");
    debugger
    $.ajax({
        url:'/learn/restart-course',
        type:'post',
        dataType:'json',
        data:{course_id:course_id,user_id:user_id,'_token':token,'user_course_id':user_course_id,'_method':'POST'},
        success:function(response){
            debugger
            if(response.rpta=='error'){

                    //alert(response.mensaje);

                    $(".texto__error").html(response.mensaje);
                     $("#errorModal").modal('show');
            }else{

            window.location.href= '/user/my-courses';
        }
        }

    })

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


//   $(".cart__body__cupon__form__boton").on('click',function(e){
//     e.preventDefault();
//     let cupon = $(".cart__body__cupon__form__input").val();


//     let token = $("meta[name=csrf-token]").attr("content");

//     $.ajax({
//       url:'/cart/aplicarcupon',
//       type:'POST',
//       dataType:'json',
//       data:({'_token':token,'_method':'POST',cupon:cupon}),
//       success:function(response){
//          if(response.rpta=="ok"){

//           $(".cart__body__foot__total").html(`Total $${response.precio} USD`);
//           $(".cart__body__grilla__precio").html(` $${response.precio} <span>USD<span>`);
//          }else{
//           $(".texto__error").html("Cupon no valid!!")
//           $("#errorModal").modal('show');
//          }

//       }
//     })
// });
$(".cart__body__cupon__form__boton").on('click', function(e) {
  e.preventDefault();
  let cupon = $(".cart__body__cupon__form__input").val();
  let token = $("meta[name=csrf-token]").attr("content");

  $.ajax({
      url: '/cart/aplicarcupon',
      type: 'POST',
      dataType: 'json',
      data: ({'_token': token, '_method': 'POST', cupon: cupon}),
      success: function(response) {
          if (response.rpta == "ok") {
              // Redondear a dos decimales
              let precioRedondeado = parseFloat(response.precio).toFixed(2);

              $(".cart__body__foot__total").html(`Total $${precioRedondeado} USD`);
              $(".cart__body__grilla__precio").html(` $${precioRedondeado} <span>USD<span>`);
          } else {
              $(".texto__error").html("¡Cupón no válido!");
              $("#errorModal").modal('show');
          }
      }
  });
});

$(".cart__body__cupon__form__input").on('focus',function(){
    //verificar si esta sesionado
    $.ajax({
        url: "/user/is-authenticated",
        method: "GET",
        dataType: "json",
        success: function (response) {
            if (!response.authenticated) {
                alert("Debes iniciar sesión para usar cupones.");
                $("#loginModal").modal('show');
            }
        },
        error: function (data) {
           $("#loginModal").modal('show');
        },
    });
})

$(document).ready(function() {
  $('.btn__save__profile').on('click', function(e) {
      e.preventDefault(); // Evita el envío tradicional del formulario

      var form = $('#frm-profile__dash')[0];
    debugger
      // Comprueba si el formulario es válido usando la validación HTML5
      if (!form.checkValidity()) {
          // Si no es válido, forzamos la visualización de los mensajes de validación
          $('<input type="submit">').hide().appendTo(form).click().remove();
          return false;
      }
      debugger
      // Si el formulario es válido, enviamos la información mediante AJAX
      $.ajax({
          url: '/user/user-profile-save', // Asegúrate de que esta ruta esté definida en tus rutas de Laravel
          type: 'POST',
          data: $('#frm-profile__dash').serialize(),
          success: function(response) {
              // Aquí puedes manejar la respuesta exitosa, por ejemplo, mostrar un mensaje al usuario
            
              $("#modalPerfil").modal("hide");
             window.location.reload();
          },
          error: function(xhr, status, error) {
              // Manejo de errores, muestra el mensaje de error correspondiente
              alert('Error al actualizar el perfil: ' + error);
          }
      });
  });
});
