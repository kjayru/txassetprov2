
    <div class="form-group @if($errors->first('name')) has-error @endif">
        <label for="name" class="control-label">Exam name</label>
        <input type="text"  name="name" class="form-control" value="{{@$exam->title}}" id="question" placeholder="Question" required>
        <span class="help-block">{{ $errors->first('name') }}</span>
    </div>

    <div class="form-group @if($errors->first('duration')) has-error @endif">
        <label for="duration" class="control-label">Duration</label>
        <input type="number"  name="duration" class="form-control" value="{{@$exam->duration}}" id="duration" placeholder="Duration" required>
        <span class="help-block">{{ $errors->first('duration') }}</span>
    </div>


    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="4" rows="4" class="form-control">{!!@$exam->description!!}</textarea>
    </div>




