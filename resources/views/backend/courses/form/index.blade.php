
    <div class="form-group @if($errors->first('title')) has-error @endif">
        <label for="title" class="control-label">Title</label>
        <input type="text"  name="title" class="form-control" value="{{ @$course->titulo}}" id="title" placeholder="Title" required>
        <span class="help-block">{{ $errors->first('title') }}</span>
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

    <div class="form-group @if($errors->first('price')) has-error @endif">
        <label for="price" class="control-label">Price</label>
        <input type="text"  name="price" class="form-control" value="{{ @$course->precio}}" id="price" placeholder="Price" required>
        <span class="help-block">{{ $errors->first('price') }}</span>
    </div>




