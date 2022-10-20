@props(['value','name','label'])
                  <div class="form-check form-switch">

 <input type = "hidden" name = "{{$name}}" value = "0">
  <input class = "form-check-input" type = "checkbox" id = "{{$name}}" name = "{{$name}}"  value = "1"  {{$value == 1 ? 'checked' : '' }}/>
  <label class = "form-check-label" for = "{{$name}}">
   {{$label}}
  </label>
          
        
        
                  </div>