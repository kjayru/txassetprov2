
    <div class="form-group @if($errors->first('question')) has-error @endif">
        <label for="question" class="control-label">Question</label>
        <input type="text"  name="question" class="form-control" value="{{ @$question->question}}" id="question" placeholder="Question" required>
        <span class="help-block">{{ $errors->first('question') }}</span>
    </div>

<div class="card">

    <div class="card-header"><a href="#" class="btn btn-xs btn-primary btn-add-option float-right">Add Option</a></div>
    <div class="card-body card-question">

       
 @if($question->chapterQuizOptions)


    @if(count($question->chapterQuizOptions)>0)
        @foreach(@$question->chapterQuizOptions as $opt)
            <div class="form-row">
                <div class="form-group col-md-9">
                    <label for="option1" class="control-label">Option</label>
                    <input type="text" name="option[]" id="option1" class="form-control" value="{{@$opt->option}}">
                </div>
                <div class="form-group col-md-3">
                    <div class="form-check form__pad">
                        <div class="option1 icheck @if(@$opt->estado==1) icheck__active @endif"></div>
                        <input type="hidden" name="result[]"  class="inputoption" value="{{@$opt->estado}}">
                    </div>
                </div>
            </div>
        @endforeach
        @else
            <div class="form-row">
                <div class="form-group  col-md-9">
                    <label for="option2" class="control-label">Option</label>
                    <input type="text" name="option[]" id="option2" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <div class="form-check form__pad">
                        <div class="option2 icheck "></div>
                        <input type="hidden" name="result[]"  class="inputoption" value="{{@$opt->estado}}">
                    </div>
                </div>
            </div>
        @endif


 @else
    <div class="form-row">
        <div class="form-group  col-md-9">
            <label for="option2" class="control-label">Option</label>
            <input type="text" name="option[]" id="option2" class="form-control">
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form__pad">
                <div class="option2 icheck "></div>
                <input type="hidden" name="result[]"  class="inputoption" value="{{@$opt->answer}}">
            </div>
        </div>
    </div>
@endif


    </div>
</div>





