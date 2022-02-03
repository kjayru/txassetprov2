
    <div class="form-group @if($errors->first('title')) has-error @endif">
        <label for="title" class="control-label">Title</label>
        <input type="text"  name="title" class="form-control" value="{{ @$chapter->title}}" id="title" placeholder="Title" required>
        <span class="help-block">{{ $errors->first('title') }}</span>
    </div>


    <div class="form-group @if($errors->first('description')) has-error @endif">
        <label for="description" class="control-label">Description</label>
        <textarea class="form-control" name="description" id="description"> {{ @$chapter->contenido }}</textarea>
        <span class="help-block">{{ $errors->first('description') }}</span>
    </div>





