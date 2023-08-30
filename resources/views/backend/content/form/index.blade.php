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
        <input type="text"  name="title" class="form-control" value="{{ @$content->titulo}}" id="title" placeholder="Title" required>
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
                    <video controls="false" style="width:100px;">
                        <source src="/storage/{{ @$content->video}}" type="video/mp4">
                       
                        Your browser does not support the video tag.
                      </video>

                    <a href="javascript:void(0)" class="btn-mod btn btn-xs btn-primary">Modificar</a>
                </div>

                <input type=file name="video"  id="video" class=" form-control" style="display: none">
                <span class="help-block">{{ $errors->first('video') }}</span>

                <small id="emailHelp" class="form-text text-muted">Format video mp4</small>

        </div>
    @endif

    @if(!@$content->audio)
    
    <div class="form-group">
        <label for="">Audio</label>
        <input type=file name="audio"  id="audio" class="form-control">
    </div>

    @else
    <div class="form-group">

        <label for="video" class="col-sm-2 control-label">Audio</label>


            <div class="thumbnail">
                {{ @$content->audio }}

                <a href="javascript:void(0)" class="btn-mod btn btn-xs btn-primary">Modificar</a>
            </div>

            <input type=file name="video"  id="video" class=" form-control" style="display: none">
            <span class="help-block">{{ $errors->first('video') }}</span>

            <small id="emailHelp" class="form-text text-muted">Format video mp4</small>

    </div>
@endif

    {{-- <div class="form-group">
        <label for="chapter">Chapter</label>
        <select name="chapter_id" id="chapter_id" class="custom-select">
            <option value="">Selected</option>
            @foreach ($chapters as $chapter)
            <option value="{{$chapter->id}}"  @if($content->chapter_id==$chapter->id)  selected @endif>{{$chapter->title}}</option>
            @endforeach
           
        </select>
    </div> --}}
  
    <input type="hidden" name="chapter_id" value="{{@$chapter->id}}">

<div class="form-group">
    <label for="order">Order</label>
    <input type="number" class="form-control" name="order" value="{{@$content->order}}" placeholder="Order">
</div>

    <div class="form-group @if($errors->first('description')) has-error @endif">
        <label for="description" class="control-label">Content</label>
        <textarea class="form-control" name="description" id="description"> {{ @$content->contenido }}</textarea>
        <span class="help-block">{{ $errors->first('description') }}</span>
    </div>


