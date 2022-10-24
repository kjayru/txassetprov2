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
                .then((response) => response.json())
               
                .then(function(session) {
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
              $("#loginModal").modal("show");
              //alert("login1");
              //window.location.href="/cart/sign";
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

var player = videojs('my-player');

var options = {};

var player = videojs('my-player', options, function onPlayerReady() {
  videojs.log('Your player is ready!');

  // In this context, `this` is the player that was created by Video.js.
  this.play();

  // How about an event listener?
  this.on('ended', function() {
    videojs.log('Awww...over so soon?!');
    alert("contenido terminado, continue con la siguiente leccion");
  });
});