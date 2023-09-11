@php
 use App\Models\UserCourse;
 use App\Models\ChapterQuiz;
 use App\Models\ChapterQuizOption;
 use App\Models\UserChapterQuizOption;
@endphp
<div class="quiz__desarrollado">

    @foreach ($quizes as $key=> $quiz)

        <div class="card__question">
            {{$key+1}}. {{$quiz->question}}
            <input type="hidden" name="quiz_id" value="{{$quiz->id}}">
            <div class="card__question__opciones">
            @foreach($quiz->chapterquizoptions as $j=>$q)
                    <div class="form-check @if(ChapterQuizOption::isCorrect($q->id,$user_id)==true)  acierto @else noacierto @endif @if(ChapterQuizOption::resultUser($q->id,$user_id)==true) resultuser @endif @if(ChapterQuizOption::getResult($q->id)==$q->id) resulcorrect @endif">	
                    <input class="form-check-input" type="radio" name="respuesta{{$q->id}}" value="{{$q->id}}"  @if(ChapterQuizOption::getResult($q->id)==$q->id) checked @endif id="respuesta{{$j}}">
                    <label class="form-check-label" for="respuesta{{$j}}">
                        {{$q->option}}
                    </label>
                    </div>	
                
            @endforeach
                    
            </div>
        
        </div>
    @endforeach

</div>