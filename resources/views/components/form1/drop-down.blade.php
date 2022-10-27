@props(['current','label'])

                  <div class="align-items-center mb-4">
                  <label class="form-label m-2 " for="awarding">{{$label}}</label>
                  <div class="form-outline flex-fill mb-0">
<select class="js-example-basic-single @error('awarding') is-invalid @enderror" id="awarding" style="width: 100%" name="awarding" onchange="enable(this)" required>
  <option></option>
 
  @php
$certificates = array("CIPR"=>"2", "CAM"=>"3", "APPR"=>"4","CIM"=>"1");
$current_cert = "$current";

foreach($certificates as $certificate => $value) {
    if($value == $current_cert) {
        echo '<option value='.$value.' selected="selected">'.$certificate.'</option>';
    } else {
        echo '<option value='.$value.'>'.$certificate.'</option>';
    }
}
@endphp 
</select>
                