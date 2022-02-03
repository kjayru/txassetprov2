


    <div class="form-group @if($errors->first('titulo')) has-error @endif">
        <label for="titulo" class="control-label">Titulo</label>

            <input type="text"  name="titulo" class="form-control" value="{{ @$post->titulo}}" id="name" placeholder="Titulo" required>
            <span class="help-block">{{ $errors->first('titulo') }}</span>

    </div>



    <!--imagen-->
    @if(!@$post->imagen)
        <div class="form-group @if($errors->first('banner')) has-error @endif">
            <label for="banner" class="col-sm-2 control-label">Banner</label>



                <input type=file name="banner"  id="banner" class="form-control">
                <span class="help-block">{{ $errors->first('banner') }}</span>


        </div>
    @else
        <div class="form-group">

            <label for="banner" class="col-sm-2 control-label">Banner</label>


                <div class="thumbnail">
                    <img src="/storage/{{ @$post->banner }}"  class="img-thumbnail img-responsive" width="100">

                    <a href="#" class="btn-modificar-banner btn btn-xs btn-primary">Modificar</a>
                </div>

                <input type=file name="banner"  id="banner" class=" form-control" style="display: none">
                <span class="help-block">{{ $errors->first('banner') }}</span>


        </div>
    @endif



    <div class="form-group @if($errors->first('resumen')) has-error @endif">
      <label for="price" class="control-label">Resumen</label>

        <textarea class="form-control" name="resumen" id="resumen"> {{ @$post->resumen }}</textarea>
        <span class="help-block">{{ $errors->first('resumen') }}</span>

    </div>


    <div class="form-group @if($errors->first('contenido')) has-error @endif">
      <label for="price" class="control-label">contenido</label>

        <textarea class="form-control" name="contenido" id="contenido"> {{ @$post->contenido }}</textarea>
        <span class="help-block">{{ $errors->first('contenido') }}</span>

    </div>



    

    <div class="form-group @if($errors->first('destacado')) has-error @endif">
      <label for="destacado" class="col-sm-2 control-label">Destacado</label>

      <div class="col-sm-10">
              <div class="checkbox">
                      <label>
                        <input type="checkbox" name="destacado" id="destacado" value="1" {{ @$post->destacado ? 'checked' : '' }}>
                      </label>
              </div>
        <span class="help-block">{{ $errors->first('destacado') }}</span>
    </div>
</div>






    <div class="row">
        <div class="col-sm-6">
          <!-- select -->
          <div class="form-group">
            <label>Tipo</label>
            <select name="post_type_id" class="form-control" required>
                <option value="">Seleccione</option>
                @foreach($tipos as $key => $tipo)
                
                <option value="{{$tipo->id}}" >{{$tipo->nombre}}</option>
               
                @endforeach
            </select>
          </div>
        </div>

      </div>


  







