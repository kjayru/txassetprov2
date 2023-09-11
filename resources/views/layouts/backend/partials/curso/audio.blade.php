
<div class="encurso__audio">
    <div class="encurso__audio__titulo">
                Chapter audio
    </div>
    <div class="encurso__audio__timeline">
                    <a href="#" class="timeline__play"><i class="fa fa-play" aria-hidden="true"></i></a>
                    <a href="#" class="timeline__stop" style="display: none"><i class="fa fa-stop" aria-hidden="true"></i></a>
                    <div class="timelinebox">
                            <div class="timelinebox__solid"></div>
                            
                    </div>

                    <audio controls id="audiocontent"  style="display: none;" >
                        
                        <source src="/storage/{{@$content->audio}}"  type="audio/mpeg">
                    Your browser does not support the audio element.
                    </audio>
                    
                    <div class="timer" id="timer">
        </div>
    </div>
</div>