var wrapper = document.getElementById("signature-pad");
var clearButton = wrapper.querySelector("[data-action=clear]");
var changeColorButton = wrapper.querySelector("[data-action=change-color]");
var undoButton = wrapper.querySelector("[data-action=undo]");
var savePNGButton = wrapper.querySelector("[data-action=save-png]");
var saveJPGButton = wrapper.querySelector("[data-action=save-jpg]");
var saveSVGButton = wrapper.querySelector("[data-action=save-svg]");
var contoken = document.querySelector("meta[name=csrf-token]");

var canvas = wrapper.querySelector("canvas");

var token = contoken.getAttribute("content");

var btnClick = document.querySelector(".btn__form__sign");

var signaturePad = new SignaturePad(canvas, {
  // It's Necessary to use an opaque color when saving image as JPEG;
  // this option can be omitted if only saving as PNG or SVG
  backgroundColor: 'rgb(255, 255, 255)'
});

function download(dataURL, filename) {
          var blob = dataURLToBlob(dataURL);
          var url = window.URL.createObjectURL(blob);
        
          var a = document.createElement("a");
          a.style = "display: none";
          a.href = url;
          a.download = filename;
        
          document.body.appendChild(a);
          a.click();
        
          window.URL.revokeObjectURL(url);
        }
        
        // One could simply use Canvas#toBlob method instead, but it's just to show
        // that it can be done using result of SignaturePad#toDataURL.
        function dataURLToBlob(dataURL) {
          // Code taken from https://github.com/ebidel/filer.js
          var parts = dataURL.split(';base64,');
          var contentType = parts[0].split(":")[1];
          var raw = window.atob(parts[1]);
          var rawLength = raw.length;
          var uInt8Array = new Uint8Array(rawLength);
        
          for (var i = 0; i < rawLength; ++i) {
            uInt8Array[i] = raw.charCodeAt(i);
          }
        
          return new Blob([uInt8Array], { type: contentType });
        }
      

        
        var responseContainer = document.getElementById('paymentResponse');
       
        btnClick.addEventListener('click',function(event){
          event.preventDefault();
          var legalname = document.querySelector("[name='legalname']").value;
          var email = document.querySelector('[name="email"]').value;
          
          if (signaturePad.isEmpty()) {
          alert("Please provide a signature first.");
          } else {
          var dataURL = signaturePad.toDataURL('image/svg+xml');
          
          }

              const sendata = ({'_token':token,'_method':'POST',legalname:legalname,email:email,dataURL:dataURL});

              fetch('/cart/sign-register',{
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
          
        });
      