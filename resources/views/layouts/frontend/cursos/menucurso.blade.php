@php
     use App\Models\ChapterQuiz;
@endphp
<ul class="encurso__temas__lista">
										
									
    @if(isset($contents))										
        @foreach($contents as $k => $cont)
            @if($k==0)
                @include('layouts.backend.partials.curso.contenidoactivo')
            @else	
        
        
                @if(ChapterQuiz::pasoQuiz($cont['contenidos']['quiz_id'],$user_course_id,$curso_id,$cont['contenidos']['capitulo_id'])==true)
            
                    @include('layouts.backend.partials.curso.contenidoactivo')
            
                @else
                    @include('layouts.backend.partials.curso.contenido')
                @endif	

        
            @endif

        @endforeach

    @endif		
    
    @if(isset($examen))										
    <li class="encurso__temas__lista__item final__examen"><span>FE</span><a href="/learn/exam/{{$curso->slug}}/{{$examen->id}}">Final Exam</a></li>
    @endif


</ul>