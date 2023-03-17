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

//verifica inicio de sesion
  $.ajax({
    url:'/cart/checksesion',
    type:'GET',
    dataType:'json',
    success:function(response){
     
       if(response.estado==true){
      
        //verificar firma

        $.ajax({
          url:'/cart/checksign',
          type:'GET',
          dataType:'json',
          success:function(response){
            
            if(response.estado==true){
              
              

              fetch('/cart/process-signed',{
                method:'POST',
                headers:{
                  'Content-Type':'application/json',
                },

                    body:JSON.stringify(sendata),
      
                    })
                .then((response) => {
                  debugger;
                  response.json();
                })
               
                .then(function(session) {
                  debugger;
                  return stripe.redirectToCheckout({ sessionId: session.id });
                })
                .then(function(result) {
      
                  if (result.error) {
                    console("errro "+result.error.message);
                  }
                })
                .catch(function(error) {
                  console.error('Error:', error);
                });
              

            }else{
              
              //$("#loginModal").modal("show");
              //alert("login1");
              window.location.href="/cart/sign";
            }
          }
        });
        

       }else{
       
        //window.location.href="/login";
        $("#loginModal").modal("show");
       }
    }
  });

  //verifica firma redireccina a stripe


  

});


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
  videojs.log('Your player is ready!');
  // In this context, `this` is the player that was created by Video.js.
  this.play();
  // How about an event listener?
  this.on('ended', function() {
    videojs.log('Awww...over so soon?!');
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
      }
    })

  });
});

} catch (error) {
  console.log("no inicializado");
}

$(".detalle__video__header__link").on('click',function(e){
  e.preventDefault();
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

              htm+=` <div class="detalle__contenido__capitulo interlineado">
              <div class="row">
                     <div class="col-md-12">
                        <div class="detalle__contenido__capitulo__titulo">
                                  ${e.titulo}
                        </div>                                                           
                     </div>
              </div>
          
              
              <div class="row justify-content-between">`;
                      $.each(e.contenidos,function(p,q){
                        htm+=`<div class="col-md-12">
                                  <span>${q.order}. </span>
                                  <a href="/course/${e.course_slug}/${e.chapter_slug}/${q.slug}">${q.titulo}</a>
                              </div>`;
                      });
              `</div>`;
          });

          $(".detalle__secciones").html(htm);
        }
      });
    break;
  }
});


$(".btn__quiz").on('click',function(e){
  e.preventDefault();
  let quizid = $(this).data('quizid');
  let input = $(this).parent().children('.card__question__opciones').find('input[name="respuesta"]:checked').val();
  let padre =  $(this).parent();
  let chapter_id =  $('input[name="chapter_id"]').val();
  const token = $('meta[name="csrf-token"]').attr('content');

  let sendata = {'_token':token,'_method':'POST',quizid:quizid,optionid:input,'chapter_id':chapter_id};
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
      }
      
    }
  })
})

$(".btn__view").on('click',function(e){
  e.preventDefault();

  $(".quiz__resultados").hide();
  $(".quiz__botones").show();
  $(".quiz__desarrollado").show();
});

$(".btn__restart").on('click',function(e){
  e.preventDefault();
  const token = $('meta[name="csrf-token"]').attr('content');
  let chapter_id =  $('input[name="chapter_id"]').val();

  let sendata = {'_token':token,'_method':'POST','chapter_id':chapter_id};
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

document.addEventListener('DOMContentLoaded', () => { 

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
 
  var segundo=60;
  var minuto=59;
  var hora = 1;
  var contador = 0;
  var porcentaje=0;
  var total = 7200;
  function updateCountdown() {

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
        }else{

        SPAN_MINUTES.textContent = minuto;
        }
       }

       

       if(hora==0 && minuto == 0 &&  segundo==1){
         
          clearInterval(refreshIntervalId);
       }
       
      // 7200segundos =100%
      

     //porcentaje= Math.round((total*100)/contador);
     porcentaje = (100*contador)/total;

     //console.log(contador+" "+parseFloat(porcentaje).toFixed(2));
     document.querySelector(".quiz__timelapse__bar").style.width= parseFloat(porcentaje).toFixed(2)+"%";
  }

  updateCountdown();

  var refreshIntervalId = setInterval(updateCountdown, MILLISECONDS_OF_A_SECOND);

})


$(".btn__exam").on('click',function(e){
  e.preventDefault();
  let quizid = $(this).data('quizid');
  let input = $(this).parent().children('.card__question__opciones').find('input[name="respuesta"]:checked').val();
  let padre =  $(this).parent();
  let chapter_id =  $('input[name="chapter_id"]').val();
  const token = $('meta[name="csrf-token"]').attr('content');

  let sendata = {'_token':token,'_method':'POST',quizid:quizid,optionid:input,'chapter_id':chapter_id};
  /*$.ajax({
    url:"/learn/set-exam",
    type:"POST",
    dataType:'json',
    data:sendata,
    success:function(response){*/
     
      padre.hide();
      padre.next('.card__question').show();
      //if(response.completado==true){
        // $(".quiz__preguntas").hide();
        // $(".quiz__resultados").show();
        //  $(".quiz__botones").show();

        //  window.location.reload();
    /*  }
      
    }
  })*/
})