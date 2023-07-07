
    <div class="form-group @if($errors->first('name')) has-error @endif">
        <label for="name" class="control-label">Exam name</label>
        <input type="text"  name="name" class="form-control" value="{{@$quiz->title}}" id="question" placeholder="Question" required>
        <span class="help-block">{{ $errors->first('name') }}</span>
    </div>

    <div class="form-group @if($errors->first('duration')) has-error @endif">
        <label for="duration" class="control-label">Duration</label>
        <input type="text"  name="duration" class="form-control" value="{{@$quiz->duration}}" id="duration" placeholder="Duration" required>
        <span class="help-block">{{ $errors->first('duration') }}</span>
    </div>

    <div class="form-group @if($errors->first('name')) has-error @endif">
        <label for="name" class="control-label">Course assign</label>
        <select name="course_id" id="course" class="custom-select">
            <option value="">Selected</option>
            @foreach($cursos as $curso)
            <option value="{{$curso->id}}"  {{$curso->id==@$quiz->course->id?"selected":""}} >{{$curso->titulo}}</option>
            @endforeach
        </select>
    </div>




