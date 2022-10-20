@props(['name','content','label'])

<label class="form-label m-2" for="{{$name}}">{{ $label }}</label>
<div class="form-outline flex-fill mb-0">
          <textarea class="form-control @error($name) is-invalid @enderror"  autocomplete="{{$name}}" id="{{$name}}" name="{{$name}}" rows="3" >{{ $content }}</textarea>
          
          @error($name)
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
</div>
      