@php
 use App\Models\UserCourse;
 use App\Models\ChapterQuizOption;
 use App\Models\UserChapterQuizOption;
@endphp
<li class="encurso__temas__lista__item {{UserCourse::capitulo($user_course_id,$cont['contenidos']['capitulo_id'])?"active":""}} {{UserCourse::capituloActivo($curso->id,$cont['contenidos']['capitulo_id'])?'active':''}}"><span>{{$k+1}}</span>
    <a href="#">{{@$cont['contenidos']['capitulo_titulo']}}</a>
    
    @if(isset($cont['contenidos']['contenidos']))
        <ul class="encurso__temas__lista__item__sublista {{UserCourse::capituloActivo($curso->id,$cont['contenidos']['capitulo_id'])?'active':''}}">
            @foreach($cont['contenidos']['contenidos'] as $c)
                <li class="encurso__temas__lista__item__sublista__item {{UserCourse::contenido($user_course_id,$cont['contenidos']['capitulo_id'],$c['id'])?"finalizado":""}} {{UserCourse::contenidoActivo($curso->id,$cont['contenidos']['capitulo_id'],$c['id'])?'active':''}}">
                    <a href="#"> {{@$c['titulo']}}</a> 
                </li>
            @endforeach	
            @if($cont['contenidos']['quiz']==true)
                <li class="encurso__temas__lista__item__sublista__item">
                    <a href="#">Question about the chapter</a>
                </li>
            @endif
        </ul>
    @endif
</li>