@php
 use App\Models\UserCourse;
 use App\Models\ChapterQuizOption;
 use App\Models\UserChapterQuiz;
 use App\Models\UserChapterQuizOption;
@endphp


<li class="encurso__temas__lista__item {{UserCourse::capituloActivo($curso->id,$cont['contenidos']['capitulo_id'])?'active':''}} {{UserCourse::capitulo($user_course_id,$cont['contenidos']['capitulo_id'])?"active":""}} "><span>{{$k+1}}</span>
    <a href="#">{{@$cont['contenidos']['capitulo_titulo']}}</a>
    
    @if(isset($cont['contenidos']['contenidos']))
        <ul class="encurso__temas__lista__item__sublista {{UserCourse::capituloActivo($curso->id,$cont['contenidos']['capitulo_id'])?'active':''}} {{UserCourse::capitulo($user_course_id,$cont['contenidos']['capitulo_id'])?"active":""}}">
            @foreach($cont['contenidos']['contenidos'] as $c)
                <li class="encurso__temas__lista__item__sublista__item {{UserCourse::contenido($user_course_id,$cont['contenidos']['capitulo_id'],$c['id'])?"finalizado":""}} {{UserCourse::contenidoActivo($curso->id,$cont['contenidos']['capitulo_id'],$c['id'])?'active':''}}">
                    <a href="/learn/{{$cont['contenidos']['curso_slug']}}/{{$cont['contenidos']['capitulo_slug']}}/{{$c['slug']}}"> {{@$c['titulo']}}</a> 
                </li>
            @endforeach	
            @if($cont['contenidos']['quiz']==true)
           
                <li class="encurso__temas__lista__item__sublista__item {{UserChapterQuiz::verificar($user_course_chapter_id,$cont['contenidos']['quiz_content']->chapter_id)?'finalizado':''}}">
                    <a href="/learn/{{$cont['contenidos']['curso_slug']}}/{{$cont['contenidos']['capitulo_slug']}}/quiz/{{$cont['contenidos']['quiz_content']->chapter_id}}">Question about the chapter</a>
                </li>
            @endif
        </ul>
    @endif
</li>