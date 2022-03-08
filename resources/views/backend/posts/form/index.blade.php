


    <div class="form-group @if($errors->first('titulo')) has-error @endif">
        <label for="titulo" class="control-label">Title</label>
            <input type="text"  name="titulo" class="form-control" value="{{ @$post->titulo}}" id="titulo" placeholder="Title" required>
            <span class="help-block">{{ $errors->first('titulo') }}</span>
    </div>

    @if(!@$post->card)
    <div class="form-group @if($errors->first('card')) has-error @endif">
        <label for="card" class="col-sm-2 control-label">Card</label>



            <input type=file name="card"  id="card" class="form-control">
            <span class="help-block">{{ $errors->first('card') }}</span>


    </div>
@else
    <div class="form-group">

        <label for="card" class="col-sm-2 control-label">Card</label>


            <div class="thumbnail">
                <img src="/storage/{{ @$post->card }}"  class="img-thumbnail img-responsive" width="100">

                <a href="javascript:void(0)" class="btn-mod btn btn-xs btn-primary">Modificar</a>
            </div>

            <input type=file name="card"  id="card" class=" form-control" style="display: none">
            <span class="help-block">{{ $errors->first('card') }}</span>


    </div>
@endif


@if(!@$post->banner)
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

                <a href="javascript:void(0)" class="btn-mod btn btn-xs btn-primary">Modificar</a>
            </div>

            <input type=file name="banner"  id="banner" class=" form-control" style="display: none">
            <span class="help-block">{{ $errors->first('banner') }}</span>


    </div>
@endif

    <div class="form-group">
        <label for="resumen">Resumen</label>
        <input type="text" name="resumen" class="form-control" value="{{@$post->resumen}}">
    </div>


    <div class="form-group @if($errors->first('description')) has-error @endif">
      <label for="description" class="control-label">Description</label>
        <textarea class="form-control" name="description" id="description"> {{ @$post->contenido }}</textarea>
        <span class="help-block">{{ $errors->first('description') }}</span>

    </div>

