
<div class="form-group @if($errors->first('question')) has-error @endif">
    <label for="question" class="control-label">Question</label>
    <input type="text"  name="question" class="form-control" value="{{ @$question->question}}" id="question" placeholder="Question" required>
    <span class="help-block">{{ $errors->first('question') }}</span>
</div>


<div class="card">
<div class="card-header">

    Result Options
</div>
<div class="card-body">
    <div class="form-group @if($errors->first('option_a')) has-error @endif">
        <label for="option" class="control-label">Option A</label>
        <input type="text"  name="option_a" class="form-control" value="{{@$question->quizQuestionOptions[0]->option}}" id="question" placeholder="Option A" required>
        <span class="help-block">{{ $errors->first('option_a') }}</span>
        <input type="hidden" name="quiz_question_option_a" value="{{@$question->quizQuestionOptions[0]->id}}">
    </div>

    <div class="form-group @if($errors->first('option_b')) has-error @endif">
        <label for="option" class="control-label">Option B</label>
        <input type="text"  name="option_b" class="form-control" value="{{@$question->quizQuestionOptions[1]->option}}" id="question" placeholder="Option B" required>
        <span class="help-block">{{ $errors->first('option_b') }}</span>
        <input type="hidden" name="quiz_question_option_b" value="{{@$question->quizQuestionOptions[1]->id}}">
    </div>

    <div class="form-group @if($errors->first('option_c')) has-error @endif">
        <label for="option" class="control-label">Option C</label>
        <input type="text"  name="option_c" class="form-control" value="{{@$question->quizQuestionOptions[2]->option}}" id="question" placeholder="Option C" required>
        <span class="help-block">{{ $errors->first('option_c') }}</span>
        <input type="hidden" name="quiz_question_option_c" value="{{@$question->quizQuestionOptions[2]->id}}">
    </div>

    <div class="form-group @if($errors->first('option_d')) has-error @endif">
        <label for="option" class="control-label">Option D</label>
        <input type="text"  name="option_d" class="form-control" value="{{@$question->quizQuestionOptions[3]->option}}" id="question" placeholder="Option D" required>
        <span class="help-block">{{ $errors->first('option_d') }}</span>
        <input type="hidden" name="quiz_question_option_d" value="{{@$question->quizQuestionOptions[3]->id}}">
    </div>
</div>
</div>



<div class="form-group">
    <label for="">Correct Answer</label>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="answer" value="a" {{@$question->answer=="a"?"checked":""}}>
      <label class="form-check-label">A</label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="answer" value="b"  {{@$question->answer=="b"?"checked":""}}>
      <label class="form-check-label">B</label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="answer"value="c"  {{@$question->answer=="c"?"checked":""}}>
      <label class="form-check-label">C</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio"name="answer"value="d" {{@$question->answer=="d"?"checked":""}}>
        <label class="form-check-label">D</label>
      </div>
  </div>




