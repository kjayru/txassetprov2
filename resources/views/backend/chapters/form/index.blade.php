
    <div class="form-group @if($errors->first('title')) has-error @endif">
        <label for="title" class="control-label">Title</label>
        <input type="text"  name="title" class="form-control" value="{{ @$chapter->title}}" id="title" placeholder="Title" required>
        <span class="help-block">{{ $errors->first('title') }}</span>
    </div>


    {{-- <div class="form-group">
        <label for="">QUIZ</label>
        <select name="quiz_id" id="quiz_id" class="custom-select">
            <option value="">Seleccione</option>
            @foreach ($quizes as $quiz )
            <option value="{{$quiz->id}}">{{$quiz->title}}</option> 
            @endforeach
        </select>
    </div> --}}

    <div class="form-check">
        <input type="checkbox" name="video"  value="1" class="form-check-input" id="video" {{ @$chapter->video==1?"checked":""}}>
        <label class="form-check-label" for="video">Video</label>
      </div>
    
      <div class="form-check">
        <input type="checkbox" name="audio" value="1"  class="form-check-input" id="audio"  {{ @$chapter->audio==1?"checked":""}}>
        <label class="form-check-label" for="audio">Audio</label>
      </div>

      <div class="form-check">
        <input type="checkbox" name="reading" value="1"  class="form-check-input" id="reading"  {{ @$chapter->reading==1?"checked":""}}>
        <label class="form-check-label" for="reading">Reading</label>
      </div>


