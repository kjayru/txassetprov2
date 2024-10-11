    <!-- JS, Popper.js, and jQuery -->

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="/js/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>


    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
          var tag = document.createElement('script');
            tag.src = "https://www.youtube.com/iframe_api";
            var firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    </script>


    <script src="/vendor/bootstrap-fileinput/js/plugins/piexif.min.js" type="text/javascript"></script>
    <script src="/vendor/bootstrap-fileinput/js/plugins/sortable.min.js" type="text/javascript"></script>
    <script src="/vendor/bootstrap-fileinput/js/fileinput.min.js"></script>
    <script src="/vendor/bootstrap-fileinput/themes/fas/theme.js"></script>
    <script src="/vendor/bootstrap-fileinput/js/locales/us.js"></script>

    <script src="js/parallaxie.js"></script>
    @if(Request::is('contact') )
    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAE_ci_FYTJgZaOx8izqrMxwObPpQwOUnk&callback=initMap">  </script>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/additional-methods.min.js"></script>
    <script src="/js/main.js?v={{uniqid()}}"></script>
    <script src="//cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>

