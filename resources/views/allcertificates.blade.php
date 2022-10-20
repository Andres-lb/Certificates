@extends('layouts.app')
<head>
         <title>All Certificates</title>
         </head>

@section('content')
    <head>
      
        
        <title>Certificates</title>
    </head>


<table class="table table-hover ">
  <thead class="bg-info">
    <head><strong>Certificates</strong></head>
    <tr>
      
      <th >Certification name</th>
      <th >Published</th>
      <th ></th>
      <th ></th>
    </tr>
  </thead>
  <tbody>
  @foreach ($certificates as $certificate)
    <tr>
      
      <td>{{$certificate->name}}</td>
      <td>{{$certificate->switch}}</td>
      <td><a href="/allusers/{{$certificate->id}}" class="btn btn-info btn-md " >Edit</a></td>
      <td><a href="/allusers/{{$certificate->id}}" class="btn btn-info btn-md " >Delete</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
    
        @endsection