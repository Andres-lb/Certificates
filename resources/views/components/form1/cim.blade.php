@props(['label','value'])


</div>
                  </div>
                  <div class="align-items-center mb-4 dd1" id="dd1">
                  <label class="form-label m-2 dd3" for="fees" id="dd3" required>{{$label}}</label>
                  <div class="form-outline flex-fill mb-0">
                  <input type="number" id="fees" name="fees" value="{{$value}}" class="form-control @error('fees') is-invalid @enderror dd2" />
                  @error('fees')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                   </div>
                   </div>