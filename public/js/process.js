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


  var player = videojs('my-player');
  var options = {};
  var player = videojs('my-player', options, function onPlayerReady() {


    this.play();

    this.on('ended', function() {

      //registro de capitulo completado
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
          $(".encurso__footer__link").removeClass("disabled");
        }
      })

    });
  });

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

          window.location.reload();
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



$(".btn__examen").on('click',function(e){
  e.preventDefault();

  $(".quiz__timelapse").show();
  $(".quiz__preguntas").show();
  $(".quiz__inicio").hide();

  const SPAN_HOURS = document.getElementById('hora');
  const SPAN_MINUTES = document.getElementById('minuto');
  const SPAN_SECONDS = document.getElementById('segundo');

  const MILLISECONDS_OF_A_SECOND = 1000;
  const MILLISECONDS_OF_A_MINUTE = MILLISECONDS_OF_A_SECOND * 60;
  const MILLISECONDS_OF_A_HOUR = MILLISECONDS_OF_A_MINUTE * 60;

//   var segundo=60;
//   var minuto=59;
//   var hora = 1;

var segundo=60;
var minuto=3;
var hora = 0;

  var contador = 0;
  var porcentaje=0;
  var total = 7200;
  function updateCountdown() {

    SPAN_HOURS.textContent= hora;
      contador +=1;
       segundo -= 1;

       if(segundo==0){
        minuto-=1;
        segundo=60;
       }



      if(segundo==60){
          SPAN_SECONDS.textContent = '00';
      }else{
            if(segundo<10){
              SPAN_SECONDS.textContent = "0"+segundo;
            }else{

              SPAN_SECONDS.textContent = segundo;
            }

      }

       if(minuto==60){

        SPAN_MINUTES.textContent = '00';
       }else{

        if(minuto<10){

            SPAN_MINUTES.textContent = "0"+minuto;
            // if(minuto==0){
            //   SPAN_MINUTES.textContent = "00";

            // }

        }else{

        SPAN_MINUTES.textContent = minuto;

        }
       }

       if(hora>0 && minuto ==0 ){

         hora -=1;
         minuto=59;
         SPAN_HOURS.textContent = hora;
       }


       if(hora==0 && minuto == 0 &&  segundo==1){


          clearInterval(refreshIntervalId);
          let user_course_id = $("#user_course_id").val();
          let exam_id = $("#exam_id").val();
          let tiempo = $("#tiempo").val();


          let quizid = $(this).data('quizid');
          // let input = $(this).parent().children('.card__question__opciones').find('input[name="respuesta"]:checked').val();
          // let padre =  $(this).parent();
          let chapter_id =  $('input[name="chapter_id"]').val();
          const token = $('meta[name="csrf-token"]').attr('content');

          let sendata = {'_token':token,'_method':'POST',quizid:quizid,'evento':"excedio",'chapter_id':chapter_id,'exam_id':exam_id,'tiempo':tiempo,'user_course_id':user_course_id};

          $.ajax({
            url:"/learn/set-exam",
            type:"POST",
            dataType:'json',
            data:sendata,
            success:function(response){

              window.location.reload();


            }
          })


       }

      // 7200segundos =100%

      $("#tiempo").val(hora+":"+minuto+":"+segundo);

     //porcentaje= Math.round((total*100)/contador);
     porcentaje = (100*contador)/total;

     //console.log(contador+" "+parseFloat(porcentaje).toFixed(2));
     document.querySelector(".quiz__timelapse__bar").style.width= parseFloat(porcentaje).toFixed(2)+"%";
  }
  updateCountdown();
  var refreshIntervalId = setInterval(updateCountdown, MILLISECONDS_OF_A_SECOND);
})


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
