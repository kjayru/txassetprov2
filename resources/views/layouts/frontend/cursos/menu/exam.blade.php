@php
 use App\Models\Exam;

@endphp
@if(isset($examen))

<li class="encurso__temas__lista__item final__examen  {{Exam::cursado($user_course_id,$examen->id)?'active':''}}"><span>FE</span><a href="/learn/exam/{{$curso->slug}}/{{$examen->id}}">Final Exam</a></li>


@endif
