
    <div class="col-md-6">
        <div class="form-group @if($errors->first('monto')) has-error @endif">
            <label for="monto" class="control-label">Discount mount %</label>
            <input type="text"  name="monto" class="form-control" value="{{ @$cupon->monto_descuento}}" id="monto" placeholder="Discount" required>
            <span class="help-block">{{ $errors->first('monto') }}</span>
        </div>
    </div>

    <div class="form-group @if($errors->first('estado')) has-error @endif">
        <label for="destacado" class="col-sm-2 control-label">Active</label>
  
        <div class="col-sm-10">
                <div class="checkbox">
                        <label>
                          <input type="checkbox" name="estado" id="estado" value="1" {{ @$cupon->estado? 'checked' : '' }}>
                        </label>
                </div>
          <span class="help-block">{{ $errors->first('estado') }}</span>
      </div>
  </div>
  



    







