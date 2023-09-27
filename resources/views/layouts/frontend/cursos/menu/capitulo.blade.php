@php
 use App\Models\UserCourse;
 use App\Models\UserCourseChapter;
@endphp
<li class="encurso__temas__lista__item  {{UserCourseChapter::capituloCursado($cont['contenidos']['capitulo_id'],$user_course_id)?'active':''}}"><span>{{$k+1}}</span>
    <div class="alink"> {{@$cont['contenidos']['capitulo_titulo']}}

    @if(isset($cont['contenidos']['contenidos']))

    <ul class="encurso__temas__lista__item__sublista open {{UserCourse::capituloActivo($curso->id,$cont['contenidos']['capitulo_id'])?'active':''}} {{UserCourseChapter::capituloCursado($cont['contenidos']['capitulo_id'],$user_course_id)?'active':''}}" >


        @foreach($cont['contenidos']['contenidos'] as $c)
            @include('layouts.frontend.cursos.menu.content')
        @endforeach

        @include('layouts.frontend.cursos.menu.quiz')
    </ul>
</div>
    @endif


</li>
