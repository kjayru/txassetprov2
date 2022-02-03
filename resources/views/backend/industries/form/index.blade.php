


    <div class="form-group @if($errors->first('titulo')) has-error @endif">
        <label for="titulo" class="control-label">Title</label>
            <input type="text"  name="titulo" class="form-control" value="{{ @$industry->titulo}}" id="titulo" placeholder="Title" required>
            <span class="help-block">{{ $errors->first('titulo') }}</span>
    </div>

    @if(!@$industry->card)
        <div class="form-group @if($errors->first('card')) has-error @endif">
            <label for="card" class="col-sm-2 control-label">Imagen</label>
                <input type=file name="card"  id="card" class="form-control">
                <span class="help-block">{{ $errors->first('card') }}</span>
        </div>
    @else
        <div class="form-group">
            <label for="card" class="col-sm-2 control-label">Imagen</label>
                <div class="thumbnail">
                    <img src="/storage/{{ @$industry->card }}"  class="img-thumbnail img-responsive" width="100">
                    <a href="javascript:void(0)" class="btn-mod btn btn-xs btn-primary">Change</a>
                </div>
                <input type=file name="card"  id="card" class=" form-control" style="display: none">
                <span class="help-block">{{ $errors->first('card') }}</span>
        </div>
    @endif


    @if(!@$industry->banner)
        <div class="form-group @if($errors->first('banner')) has-error @endif">
            <label for="banner" class="col-sm-2 control-label">Banner</label>
                <input type=file name="banner"  id="banner" class="form-control">
                <span class="help-block">{{ $errors->first('banner') }}</span>
        </div>
    @else
        <div class="form-group">
            <label for="banner" class="col-sm-2 control-label">Banner</label>
                <div class="thumbnail">
                    <img src="/storage/{{ @$industry->banner }}"  class="img-thumbnail img-responsive" width="100">
                    <a href="javascript:void(0)" class="btn-mod btn btn-xs btn-primary">Change</a>
                </div>
                <input type=file name="banner"  id="banner" class=" form-control" style="display: none">
                <span class="help-block">{{ $errors->first('banner') }}</span>
        </div>
    @endif


<div class="form-group">
    <label for="categoria">Category</label>
    <select name="categoria" id="categoria" class="form-control" >
            <option value="">Selected</option>
            @foreach($categories as $cat)
                <option value="{{$cat->id}}" {{$industry->category_id == $cat->id?"selected":""}}>{{ $cat->name}}</option>
            @endforeach
    </select>
</div>

    <div class="form-group @if($errors->first('description')) has-error @endif">
      <label for="description" class="control-label">Description</label>
        <textarea class="form-control" name="description" id="description"> {{ @$industry->contenido }}</textarea>
        <span class="help-block">{{ $errors->first('description') }}</span>

    </div>

