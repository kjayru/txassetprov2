@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
    
    
    
    
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

    <div class="form-group">
        <label for="">Audio</label>
        <input type=file name="audio"  id="audio" class="form-control">
    </div>

    <div class="form-group">
        <label for="chapter">Chapter</label>
        <select name="chapter_id" id="chapter_id" class="custom-select">
            <option value="">Selected</option>

            <option value="">1</option>
        </select>
    </div>

<div class="form-group">
    <label for="order">Order</label>
    <input type="number" class="form-control" name="order" placeholder="Order">
</div>

    <div class="form-group @if($errors->first('description')) has-error @endif">
        <label for="description" class="control-label">Content</label>
        <textarea class="form-control" name="description" id="description"> {{ @$content->contenido }}</textarea>
        <span class="help-block">{{ $errors->first('description') }}</span>
    </div>


