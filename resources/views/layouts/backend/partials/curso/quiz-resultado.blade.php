@php
 use App\Models\UserCourse;
 use App\Models\ChapterQuiz;
 use App\Models\ChapterQuizOption;
 use App\Models\UserChapterQuizOption;
@endphp
<div class="quiz__resultados" style="display:{{$completado==true?"block":"none"}}">

    <div class="quiz__resultados__titulo">Result</div>
    <div class="quiz__resultados__respuesta">
        {{$correctas}} of {{$numero_preguntas}} question answer correctly
    </div>
    <div class="quiz__resultados__barra">
        <div class="barra__roja" style="width:{{$porcentaje}}%"></div>
    </div>
    <div class="quiz__resultados__tiempo">
        your time: <span>{{@$tiempoquiz}}</span>
    </div>
    <input type="hidden" name="tiempoquiz" id="tiempoquiz">
</div>