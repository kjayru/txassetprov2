
    <div class="form-group @if($errors->first('title')) has-error @endif">
        <label for="title" class="control-label">Title</label>
        <input type="text"  name="title" class="form-control" value="{{ @$course->titulo}}" id="title" placeholder="Title" required>
        <span class="help-block">{{ $errors->first('title') }}</span>
    </div>

    <div class="form-group @if($errors->first('subtitle')) has-error @endif">
        <label for="subtitle" class="control-label">Subtitle</label>
        <input type="text"  name="subtitle" class="form-control" value="{{ @$course->titulo}}" id="subtitle" placeholder="Subtitle">
        <span class="help-block">{{ $errors->first('subtitle') }}</span>
    </div>


    <div class="form-group @if($errors->first('responsable')) has-error @endif">
        <label for="responsable" class="control-label">Responsible</label>
        <input type="text"  name="responsable" class="form-control" value="{{ @$course->responsable}}" id="responsable" placeholder="Responsible">
        <span class="help-block">{{ $errors->first('responsable') }}</span>
    </div>

   
    <div class="form-group @if($errors->first('price')) has-error @endif">
        <label for="price" class="control-label">Price</label>
        <input type="text"  name="price" class="form-control" value="{{ @$course->precio}}" id="price" placeholder="Price" required>
        <span class="help-block">{{ $errors->first('price') }}</span>
    </div>

@if(!@$course->banner)
    <div class="form-group @if($errors->first('banner')) has-error @endif">
        <label for="banner" class="col-sm-2 control-label">Banner</label>
            <input type=file name="banner"  id="banner" class="form-control">
            <span class="help-block">{{ $errors->first('banner') }}</span>
    </div>
@else
    <div class="form-group">
        <label for="banner" class="col-sm-2 control-label">Banner</label>
            <div class="thumbnail">
                <img src="/storage/{{ @$course->banner }}"  class="img-thumbnail img-responsive" width="100">

                <a href="javascript:void(0)" class="btn-mod btn btn-xs btn-primary">Modify</a>
            </div>
            <input type=file name="banner"  id="banner" class=" form-control" style="display: none">
            <span class="help-block">{{ $errors->first('banner') }}</span>
    </div>
@endif

@if(!isset($course->video))


    <div class="form-group @if($errors->first('video')) has-error @endif">
        <label for="video" class="col-sm-2 control-label">Video</label>
            <input type=file name="video"  id="video" class="form-control">
            <span class="help-block">{{ $errors->first('video') }}</span>
    </div>
@else

    <div class="form-group">
        <label for="video" class="col-sm-2 control-label">Video</label>
            <div class="thumbnail">
                <img src="/storage/{{ @$course->video }}"  class="img-thumbnail img-responsive" width="100">

                <a href="javascript:void(0)" class="btn-mod btn btn-xs btn-primary">Modify</a>
            </div>
            <input type=file name="video"  id="video" class=" form-control" style="display: none">
            <span class="help-block">{{ $errors->first('video') }}</span>
    </div>

@endif


    <div class="form-group">
        <label for="available">Available</label>
        <input type="date" name="available" id="available" value="{{@$course->disponible}}" placeholder="Available" class="form-control">
    </div>

    <div class="form-group">
        <label for="chapters">Chapters</label>
        <select name="chapters" id="chapters" class="custom-select">
            <option value="">Selected</option>
            @for($i=1; $i<20; $i++)
            <option value="{{$i}}" {{$i==@$course->capitulos?'selected':''}}>{{$i}}</option>
            @endfor
        </select>
    </div>

    <div class="form-group">
        <label for="language">Language</label>
        <select name="language" id="language" class="custom-select">
            <option value="">Selected</option>
            <option value="English" {{@$course->language=="English"?'selected':''}} >English</option>
            <option value="Spanish" {{@$course->language=="Spanish"?'selected':''}} >Spanish</option>
        </select>
    </div>

    <div class="form-group">
        <label for="nivel">Nivel</label>
        <select name="nivel" id="nivel" class="custom-select">
            <option value="">Selected</option>
            <option value="Beginner" {{@$course->nivel=="Beginner"?'selected':''}}>Beginner</option>
            <option value="Advanced" {{@$course->nivel=="Advanced"?'selected':''}}>Advanced</option>
        </select>
    </div>

    <div class="form-group">
        <label for="audio">Audio</label>
        <select name="audio" id="audio" class="custom-select">
            <option value="">Selected</option>
            <option value="Yes"  {{@$course->audio=="Yes"?'selected':''}}>Yes</option>
            <option value="No" {{@$course->audio=="No"?'selected':''}}>No</option>
        </select>
    </div>

    <div class="form-group">
        <label for="access">Access</label>
        <input type="number" name="access" id="access" value="{{@$course->tiempovalido}}" placeholder="Access" class="form-control">
    </div>


    <div class="form-group @if($errors->first('excerpt')) has-error @endif">
        <label for="excerpt" class="control-label">Excerpt </label>
        <textarea class="form-control" name="excerpt">{{ @$course->resumen}}</textarea>
        <span class="help-block">{{ $errors->first('excerpt') }}</span>
    </div>

    <div class="form-group @if($errors->first('description')) has-error @endif">
        <label for="description" class="control-label">Description</label>
        <textarea class="form-control" name="description" id="description"> {{ @$course->contenido }}</textarea>
        <span class="help-block">{{ $errors->first('description') }}</span>
    </div>



    







