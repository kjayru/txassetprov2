@php
     use App\Models\UserCourseChapter;
     use App\Models\ChapterQuiz;
@endphp

@if($cont['contenidos']['quiz']==true)
<li class="encurso__temas__lista__item__sublista__item {{UserCourseChapter::userQuiz($user_course_id,$cont['contenidos']['capitulo_id'])?'finalizado':''}} {{ChapterQuiz::cursandoQuiz(@$chapter->slug,$cont['contenidos']['capitulo_id'],$quiz)?'active':''}}"  >

    @if(UserCourseChapter::userQuiz($user_course_id,$cont['contenidos']['capitulo_id']))
    <a href="/learn/{{$cont['contenidos']['curso_slug']}}/{{$cont['contenidos']['capitulo_slug']}}/quiz/{{$cont['contenidos']['quiz_content']->chapter_id}}">Question about the chapter</a>
    @else
    <a href="#" >Question about the chapter</a>
   @endif
</li>
@endif
