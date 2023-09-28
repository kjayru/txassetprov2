@php
 use App\Models\UserCourse;
 use App\Models\ChapterQuiz;
 use App\Models\ChapterQuizOption;
 use App\Models\UserCourseChapterQuiz;
 use App\Models\UserChapterQuizOption;
@endphp
<div class="quiz__desarrollado">

    @foreach ($quizes as $key=> $quiz)

        <div class="card__question">
            {{$key+1}}. {{$quiz->question}}
            <input type="hidden" name="quiz_id" value="{{$quiz->id}}">
            <div class="card__question__opciones">

            @foreach($quiz->chapterquizoptions as $j=>$q)
                    <div class="form-check
                    @if(ChapterQuizOption::isCorrect($q->id)==true)
                      acierto
                    @else
                      noacierto
                    @endif

                      @if(ChapterQuizOption::resultUser($q->id,$user_course_chapter_id)==1)
                        resultuser
                      @elseif(ChapterQuizOption::resultUser($q->id,$user_course_chapter_id)==2)
                        resultuser
                      @else
                        resultfail
                      @endif
                      @if(ChapterQuizOption::getResult($q->id))
                        resulcorrect
                      @endif">




                      @if(ChapterQuizOption::isCorrect($q->id)==true)
                        <input class="form-check-input" type="radio" name="respuesta{{$q->id}}" value="{{$q->id}}"    >
                    @else
                        <input class="form-check-input" type="radio" name="respuesta{{$q->id}}" value="{{$q->id}}"    >
                    @endif
                      @if(ChapterQuizOption::resultUser($q->id,$user_course_chapter_id)==1)
                        <input class="form-check-input" type="radio" name="respuesta{{$q->id}}" value="{{$q->id}}"   checked >
                      @elseif(ChapterQuizOption::resultUser($q->id,$user_course_chapter_id)==2)
                        <input class="form-check-input" type="radio" name="respuesta{{$q->id}}" value="{{$q->id}}"   checked >
                      @else
                        <input class="form-check-input" type="radio" name="respuesta{{$q->id}}" value="{{$q->id}}"  >
                      @endif
                      @if(ChapterQuizOption::getResult($q->id))
                         <input class="form-check-input" type="radio" name="respuesta{{$q->id}}" value="{{$q->id}}" >
                      @endif



                        <label class="form-check-label" for="respuesta{{$j}}">
                            {{$q->option}}
                        </label>
                    </div>

            @endforeach

            </div>

        </div>
    @endforeach

</div>
