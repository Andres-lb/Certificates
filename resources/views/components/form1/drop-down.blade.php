<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
                  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                  <script>
                  function enable(select){
                   console.log(select.value);
                   if(select.value == 1){
                   document.getElementById('fees').classList.remove('dd2');
                   document.getElementById('dd1').classList.remove('dd1');
                   document.getElementById('dd3').classList.remove('dd3');
                   }else{
                   document.getElementById('fees').classList.add('dd2');
                   document.getElementById('dd1').classList.add('dd1');
                   document.getElementById('dd3').classList.add('dd3');
                   }
                     };

                  $(document).ready(function() {
                  $('.js-example-basic-single').select2({
      
      
                  tokenSeparators: [',', ' '],
                  placeholder:'Select Awarding '
                 });
                 });

                  </script>
                  <style>
                 .dd2{
                  display:none;
                 }
                 .dd1{
                  display:none;
                 }
                 .dd3{
                  display:none;
                 }
                 </style>


                  <div class="align-items-center mb-4">
                  <label class="form-label m-2 " for="select">Certification Awarding body</label>
                  <div class="form-outline flex-fill mb-0">
<select class="js-example-basic-single" id="select" style="width: 100%" name="select" onchange="enable(this)" required>
  <option ></option>
  <option value="1" >CIM</option>
  <option value="2" >CIPR</option>
  <option value="3" >CAM</option>
  <option value="4" >APPR</option>
</select>
                </div>
                  </div>
                  



                  <div class="align-items-center mb-4 dd1" id="dd1">
                  <label class="form-label m-2 dd3" for="fees" id="dd3" required> CIM registration fees</label>
                  <div class="form-outline flex-fill mb-0">
                  <input type="number" id="fees" name="fees" value=" CIM registration fees" class="form-control dd2" />
                  @error('fees')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                   </div>
                   </div>