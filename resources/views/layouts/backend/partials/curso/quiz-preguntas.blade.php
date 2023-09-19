@php
 use App\Models\UserCourse;
 use App\Models\ChapterQuiz;
 use App\Models\ChapterQuizOption;
 use App\Models\UserChapterQuizOption;
@endphp
<div class="quiz__preguntas" style="display:{{@$completado==false?"block":"none"}}" >
    <input type="hidden" name="quiz_chapter_id" value="{{$quiz_chapter_id}}">
    <input type="hidden" name="user_course_id" value="{{@$user_course_id}}">
    @foreach ($quizes as $key=> $quiz)
    
        <div class="card__question" style="display:{{$key==0?'block':'none'}}">
            {{$key+1}}. {{$quiz->question}}
            <input type="hidden" name="quiz_id" value="{{$quiz->id}}">
            <div class="card__question__opciones">
            @foreach($quiz->chapterquizoptions as $j=>$q)
                
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="respuesta" value="{{$q->id}}" id="respuesta{{$j}}">
                    <label class="form-check-label" for="respuesta{{$j}}">
                        {{$q->option}}
                    </label>
                    </div>

            @endforeach
                    
        </div>
        <a href="#" data-quizid="{{$quiz->id}}" class="btn btn-default btn__quiz" data-ucc="{{@$user_course_chapter_id}}">Next</a>	
        </div>
    @endforeach
</div>