
@props(['label','type','name','value','class'])

<label class="form-label m-2" for="{{$name}}">{{ $label }}</label>
                    <div class="form-outline flex-fill mb-0">
                    
                      <input type="{{$type}}" id="{{$name}}" name="{{$name}}" value="{{$value}}" class="{{$class}} @error($name) is-invalid @enderror" />
                      @error($name)
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
                      
                    </div>