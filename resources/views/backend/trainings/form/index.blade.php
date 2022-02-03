


    <div class="form-group @if($errors->first('title')) has-error @endif">
        <label for="title" class="control-label">Title</label>
            <input type="text"  name="title" class="form-control" value="{{ @$event->title}}" id="title" placeholder="Title" required>
            <span class="help-block">{{ $errors->first('title') }}</span>
    </div>

    <div class="form-group @if($errors->first('price')) has-error @endif">
        <label for="price" class="control-label">Price</label>
            <input type="text"  name="price" class="form-control" value="{{ @$event->price}}" id="price" placeholder="Price" required>
            <span class="help-block">{{ $errors->first('price') }}</span>
    </div>

    <div class="form-group @if($errors->first('duration')) has-error @endif">
        <label for="duration" class="control-label">Duration hours</label>
            <input type="text"  name="duration" class="form-control" value="{{ @$event->duration}}" id="price" placeholder="Duration hours" required>
            <span class="help-block">{{ $errors->first('duration') }}</span>
    </div>




    <div class="form-group @if($errors->first('description')) has-error @endif">
      <label for="description" class="control-label">Description</label>
        <textarea class="form-control" name="description" id="description"> {{ @$event->description }}</textarea>
        <span class="help-block">{{ $errors->first('description') }}</span>

    </div>


    <div class="form-group @if($errors->first('start_date')) has-error @endif">
        <label for="start_date" class="control-label">Event date</label>
            <input type="date"  name="start_date" class="form-control" value="{{ @$event->start_date}}" id="start_date"  placeholder="Event date" required>
            <span class="help-block">{{ $errors->first('start_date') }}</span>
    </div>


    <div class="form-group @if($errors->first('start_hour')) has-error @endif">
        <label for="start_hour" class="control-label">Start time</label>
            <input type="time"  name="start_hour" class="form-control" value="{{ @$event->start_hour}}" id="start_hour"  placeholder="Start time" required>
            <span class="help-block">{{ $errors->first('start_hour') }}</span>
    </div>







