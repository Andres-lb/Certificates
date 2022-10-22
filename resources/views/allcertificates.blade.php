@extends('layouts.app')
<head>
         <title>All Certificates</title>
         </head>
      

@section('content')
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form method="POST" action="{{ url('allcertificates/') }}" >
    @csrf
        @method('DELETE')
      <div class="modal-header" style="background:red;">
        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Delete Certificate</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="certificate_delete_id" id="certificate_id">
        <h5>Are You Sure you Want to Delete : <strong id="id_name"></strong> ?</h5> 
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        
        <button type="submit" class="btn btn-danger">Yes</button>
        
      </div>
</form>
    </div>
  </div>
</div>


<table class="table table-hover ">
@if(session()->has('success'))

<div x-data="{ show: true}"
x-init="setTimeout(() => show = false,4000)"
x-show="show"

 class="fixed  alert alert-secondary py-2 px-4 rounded-xl bottom-3 right-3 text-sm" role="alert">
{{session('success')}}
</div>
@endif
  <thead class="bg-info">
    
    <tr>
      
      <th >Certification name</th>
      <th class="d-flex justify-content-center">Published</th>
      <th ></th>
      <th ></th>
    </tr>
  </thead>
  <tbody>
    
  @foreach ($certificates as $certificate)
    <tr>
      
      <td ><figure class="">
  <blockquote class="blockquote">
    <p>{{$certificate->name}}</p>
  </blockquote>
  

      @if(isset($certificate->fees))<figcaption class="blockquote-footer">
      {{$certificate->fees}}
  </figcaption>
  </figure>
  
      </td>
      @endif

      <td>@if($certificate->switch == 1)
       <span class="d-flex justify-content-center"><i class="fas fa-check-circle " style="color:green" ></i></span>
@else
    <span class="d-flex justify-content-center"><i class="fas fa-check-circle " style="color:gray" ></i></span>

@endif</td>
      <td><a href="/allcertificates/{{$certificate->id}}" class="btn btn-info btn-md " ><i class="fas fa-pencil-alt"></i>Edit</a></td>
      
      <td>
    
      <button type="button" class="btn btn-danger delete" value="{{ $certificate->id }}" data-value1="{{ $certificate->name }}" ><i class="far fa-trash-alt"></i>Delete</button>
      
      
</td>
    </tr>
   
    @endforeach
  </tbody>
</table>

<script>
 

$(document).ready(function (){
  $('.delete').click(function (e){
    e.preventDefault();
    var certificate_id = $(this).val();
    var name_id = $(this).attr('data-value1');
    $('#certificate_id').val(certificate_id);
    document.getElementById("id_name").innerHTML = name_id;
    $('#deleteModal').modal('show');
  });
});
const myModal = document.getElementById('myModal')
const myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', () => {
  myInput.focus()
})
  </script>

        @endsection
     
    