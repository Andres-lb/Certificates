@extends('layouts.app')
<head>
         <title>All Certificates</title>
         </head>

@section('content')
    <head>
      
        
        
    </head>


<table class="table table-hover ">
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
      
      <td><form method="POST" action="/allcertificates/{{$certificate->id}}">
        @csrf
        @method('DELETE')<button class="btn btn-info btn-md " ><i class="far fa-trash-alt"></i>Delete</button></form></td>

    </tr>
    @endforeach
  </tbody>
</table>
    
        @endsection