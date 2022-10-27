@extends('layouts.app')
         <title>@yield('page_title','Certifications')</title>
@section('content')
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
      <th class="">Published</th>
      <th ></th>
      <th ></th>
    </tr>
  </thead>
  <tbody>
  @foreach ($certificates as $certificate)
    <tr>
      <td >
        <figure class="">
  <blockquote class="blockquote">
    <p>{{$certificate->name}}</p>
  </blockquote>
      @if(isset($certificate->fees))<figcaption class="blockquote-footer">
      {{$certificate->fees}}
  </figcaption>
  </figure>
      </td>
      @endif
      <td>@if($certificate->Is_published == 1)
       <span class="px-4"><i class="fas fa-check-circle " style="color:green" ></i></span>
@else
    <span class="px-4 "><i class="fas fa-check-circle " style="color:gray" ></i></span>
    </td>
@endif
      <td><a href="{{ route('certificates.show',$certificate->id) }}" class="btn btn-info btn-md " ><i class="fas fa-pencil-alt"></i>Edit</a></td>
      
      <td>
      <form method="POST" action="{{ route('certificates.destroy',$certificate->id) }}" >
    @csrf
        @method('DELETE')
      <button type="submit" href="{{ route('certificates.index') }}" class="btn btn-danger delete" value="{{ $certificate->id }}" data-value1="{{ $certificate->name }}" ><i class="far fa-trash-alt"></i>Delete</button> 
</form>
</td>
    </tr>
    @endforeach
  </tbody>
</table>
 @endsection
     
    