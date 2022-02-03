
    <div class="form-group @if($errors->first('title')) has-error @endif">
        <label for="title" class="control-label">Title</label>
        <input type="text"  name="title" class="form-control" value="{{ @$content->title}}" id="title" placeholder="Title" required>
        <span class="help-block">{{ $errors->first('title') }}</span>
    </div>


    @if(!@$content->video)
        <div class="form-group @if($errors->first('video')) has-error @endif">
            <label for="video" class="col-sm-2 control-label">Video</label>

                <input type=file name="video"  id="video" class="form-control">
                <span class="help-block">{{ $errors->first('video') }}</span>

                <small id="emailHelp" class="form-text text-muted">Format video mp4</small>
        </div>
    @else
        <div class="form-group">

            <label for="video" class="col-sm-2 control-label">Video</label>


                <div class="thumbnail">
                    {{ @$content->video }}

                    <a href="javascript:void(0)" class="btn-mod btn btn-xs btn-primary">Modificar</a>
                </div>

                <input type=file name="video"  id="video" class=" form-control" style="display: none">
                <span class="help-block">{{ $errors->first('video') }}</span>

                <small id="emailHelp" class="form-text text-muted">Format video mp4</small>

        </div>
    @endif


    <div class="form-group @if($errors->first('description')) has-error @endif">
        <label for="description" class="control-label">Content</label>
        <textarea class="form-control" name="description" id="description"> {{ @$content->contenido }}</textarea>
        <span class="help-block">{{ $errors->first('description') }}</span>
    </div>





