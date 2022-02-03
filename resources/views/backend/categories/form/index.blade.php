
    <div class="form-group @if($errors->first('name')) has-error @endif">
        <label for="name" class="control-label">Name</label>
            <input type="text"  name="name" class="form-control" value="{{ @$category->name}}" id="name" placeholder="Name" required>
            <span class="help-block">{{ $errors->first('name') }}</span>
    </div>

@if(!@$category->card)
    <div class="form-group @if($errors->first('card')) has-error @endif">
        <label for="card" class="col-sm-2 control-label">Image</label>
            <input type=file name="card"  id="card" class="form-control">
            <span class="help-block">{{ $errors->first('card') }}</span>
    </div>
@else
    <div class="form-group">
        <label for="card" class="col-sm-2 control-label">Image</label>
            <div class="thumbnail">
                <img src="/storage/{{ @$category->card }}"  class="img-thumbnail img-responsive" width="100">
                <a href="javascript:void(0)" class="btn-mod btn btn-xs btn-primary">Change</a>
            </div>
            <input type=file name="card"  id="card" class=" form-control" style="display: none">
            <span class="help-block">{{ $errors->first('card') }}</span>
    </div>
@endif

@if(!@$category->banner)
    <div class="form-group @if($errors->first('banner')) has-error @endif">
        <label for="banner" class="col-sm-2 control-label">Banner</label>
            <input type=file name="banner"  id="banner" class="form-control">
            <span class="help-block">{{ $errors->first('banner') }}</span>
    </div>
@else
    <div class="form-group">
        <label for="banner" class="col-sm-2 control-label">Banner</label>
            <div class="thumbnail">
                <img src="/storage/{{ @$category->banner }}"  class="img-thumbnail img-responsive" width="100">
                <a href="javascript:void(0)" class="btn-mod btn btn-xs btn-primary">Change</a>
            </div>
            <input type=file name="banner"  id="banner" class=" form-control" style="display: none">
            <span class="help-block">{{ $errors->first('banner') }}</span>
    </div>
@endif








