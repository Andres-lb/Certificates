@extends('layouts.app')
<head>
         <title>Add Certification</title>
         </head>


@section('content')


<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Certification</p>

                <form class="mx-1 mx-md-4" method="POST" action="/register">
                @csrf


                <!-- Certification name //required -->
                  <div class="align-items-center mb-4">
                    <x-form1.text label="Certification name" type="text" value="{{ old('name')  }}" name="name" class="form-control" required/>
                  </div>





                    <!-- Certification short description//required -->

                  <div class="align-items-center mb-4">
                  
                    <x-form1.text-area label="Certification short description" name="description" content="{{  old('description') }}" class="form-control" required />
                  </div>



                  <!-- Certification Awarding body//required -->
                  
                    <x-form1.drop-down />


                 
                  
                  <!-- is published -->
                   
                  <div class="align-items-center mb-4">
                  <x-form1.switch label="Is Published" name="switch" value="{{  old('switch') }}"   />
                  </div>


                         <!--  Create button -->    

                  <div class="align-items-center mb-4 ">
                    <button type="submit" class="btn btn-primary btn-lg w-100">Add certification</button>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection