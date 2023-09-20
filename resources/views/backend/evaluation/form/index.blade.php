
    <div class="form-group @if($errors->first('question')) has-error @endif">
        <label for="question" class="control-label">Question</label>
        <input type="text"  name="question" class="form-control" value="{{ @$question->question}}" id="question" placeholder="Question" required>
        <span class="help-block">{{ $errors->first('question') }}</span>
    </div>

<div class="card">

    <div class="card-header"><a href="#" class="btn btn-xs btn-primary btn-add-option float-right">Add Option</a></div>
    <div class="card-body card-question">

       
 @if(isset($question->chapterQuizOptions))


    @if(count($question->chapterQuizOptions)>0)
        @foreach(@$question->chapterQuizOptions as $k=> $opt)
  
            <div class="form-row">
                <div class="form-group col-md-9">
                    <label for="option{{$k+1}}" class="control-label">Option</label>
                    <input type="text" name="option[]" id="option{{$k+1}}" class="form-control" value="{{@$opt->option}}">
                </div>
                <div class="form-check col-md-3">
                    <input type="radio" name="result" id="result{{$k+1}}" class="form-check form-check-inline check__respuesta" value="{{$k+1}}" @if(@$opt->estado==1) checked @endif>
                    <label class="form-check-label" for="result{{$k+1}}">Result</label>
                </div>
            </div>
        @endforeach
  
    @endif


 @else
    <div class="form-row">
        <div class="form-group  col-md-9">
            <label for="option1" class="control-label">Option</label>
            <input type="text" name="option[]" id="option1" class="form-control" required>
        </div>
        <div class="form-check col-md-3">
            <input type="radio" name="result" id="result1" class="form-check form-check-inline check__respuesta" value="1" required>
            <label class="form-check-label" for="result1">Result</label>
        </div>
    </div>
@endif


    </div>
</div>





