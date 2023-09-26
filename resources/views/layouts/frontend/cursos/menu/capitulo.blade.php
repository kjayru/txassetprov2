@php
 use App\Models\UserCourse;
 use App\Models\UserCourseChapter;
@endphp
<li class="encurso__temas__lista__item {{UserCourse::capitulo($user_course_id,$cont['contenidos']['capitulo_id'])?"active":""}} {{UserCourseChapter::capituloCursado($cont['contenidos']['capitulo_id'],$user_course_id)?'active':''}}"><span>{{$k+1}}</span>
    <a href="#">{{@$cont['contenidos']['capitulo_titulo']}}</a>

    @if(isset($cont['contenidos']['contenidos']))

    <ul class="encurso__temas__lista__item__sublista {{UserCourse::capituloActivo($curso->id,$cont['contenidos']['capitulo_id'])?'active':''}} {{UserCourseChapter::capituloCursado($cont['contenidos']['capitulo_id'],$user_course_id)?'active':''}}" >

        @foreach($cont['contenidos']['contenidos'] as $c)
            @include('layouts.frontend.cursos.menu.content')
        @endforeach

        @include('layouts.frontend.cursos.menu.quiz')
    </ul>
    @endif


</li>
