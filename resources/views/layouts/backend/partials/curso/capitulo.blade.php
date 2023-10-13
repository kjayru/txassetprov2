<div class="encurso__capitulo">
    @mobile
    <div class="encurso__capitulo__titulo">
              {{$content->titulo}}
    </div>
    @endmobile
    <div class="encurso__capitulo__contenido">
              <div class="encurso__capitulo__contenido__titulo">
                        Chapter reading
              </div>
              <div class="encurso__capitulo__contenido__texto">
                               {!!@$content->contenido!!}
              </div>
    </div>
</div>
