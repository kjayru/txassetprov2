@php
 use App\Models\UserCourse;
 use App\Models\UserCourseChapter;
@endphp

    <li class="encurso__temas__lista__item__sublista__item {{UserCourse::contenido($user_course_id,$cont['contenidos']['capitulo_id'],$c['id'])?"finalizado":""}} {{UserCourseChapter::cursandoContenido($content_slug,$c['slug'])?'active':''}}">
        @if(UserCourse::contenido($user_course_id,$cont['contenidos']['capitulo_id'],$c['id']))
        <a href="/learn/{{$cont['contenidos']['curso_slug']}}/{{$cont['contenidos']['capitulo_slug']}}/{{$c['slug']}}"> {{@$c['titulo']}}</a>
        @else
        <a href="#"> {{@$c['titulo']}}</a>
        @endif

    </li>

