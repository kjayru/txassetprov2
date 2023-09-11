<?php 
namespace App\Http\Controllers\Traits;

trait CourseMenuTrait
{
    public function getContent($capitulos,$curso){


        foreach($capitulos as $cap){
            $menucont=[];
            $menulat=null;
            $quiz=false;

        if(isset($cap->chapterquiz)){
            $quiz = true;
            $quiz_id = $cap->chapterquiz->id;
        }
        
        foreach($cap->chaptercontents as $cont){

                    $menucont[] = [
                        'id'=>$cont->id,
                        'titulo'=>$cont->titulo,
                        'slug'=>$cont->slug,
                    ];
        }

            $menulat = [
                    'capitulo_id'=>$cap->id,
                    'capitulo_titulo'=>$cap->title,
                    'curso_id'=>$curso->id,
                    'curso_titulo'=>$curso->titulo,
                    'curso_slug'=>$curso->slug,
                    'capitulo_slug'=>$cap->slug,
                    'contenidos'=>$menucont,
                    'quiz'=>$quiz,
                    'quiz_id' => $quiz_id,
                    'quiz_content'=>$cap->chapterquiz,
            ];

            $sidelad[] = [
            
                'contenidos' =>$menulat
            ];
               
        }

        return $sidelad;

    }

   
}