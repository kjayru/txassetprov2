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
              window.location.href="/cart/sign";
            }
          }
        });
        

       }else{
        window.location.href="/login";
       }
    }
  });

  //verifica firma redireccina a stripe


  

})