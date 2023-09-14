<div class="quiz__botones"  style="display:{{$completado==true?"block":"none"}}">
    <div class="row">
        <div class="col-md-4">
            <a href="#" class="btn btn__blue btn__view">View questions</a>
        </div>
        <div class="col-md-4">
            <a href="#" class="btn btn__blue btn__restart" data-id="{{$user_course_chapter_id}}">Restart Test</a>
        </div>
        <div class="col-md-4">
            @if($porcentaje<75)
                <a href="#" class="btn btn__red btn__continue disabled">Continue</a>
            @else	
                @if(!$fin_curso)
                <a href="/learn/{{$url_next}}" class="btn btn__red btn__continue">Continue</a>
                @else
                <a href="/learn/exam/{{$curso->slug}}/{{$examen->id}}" class="btn btn__red btn__continue">Continue Exam</a>
                @endif
            @endif
        </div>
    </div>
</div>