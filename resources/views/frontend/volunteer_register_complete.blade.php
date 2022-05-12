@extends('template')
@section('content')

<!-- @empty(!$_POST)
   <div class="alert alert-warning">
        <strong>Sorry!</strong> No Product Found.
   </div>
@endempty -->
        
        
    <!-- //////////////////////Student Registration///////////////////// -->
    <section class="register-page" id="change_nav">
      <div class="container py-5">
        <div class="row d-flex justify-content-center align-items-center">
          <div class="col-lg-8 col-xl-6">
            <div class="card rounded-3">
              <img src="{{asset ('frontend/images/volunteer-header.jpg')}}" class="w-100" style="height: 200px; object-fit: cover; border-top-left-radius: .3rem; border-top-right-radius: .3rem;" alt="Sample photo">
              <div class="card-body p-4 p-md-5">
                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2 text-center">Registration Form is completed</h3>
    
                @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                @endif

                <div class="d-flex justify-content-between">
                    <a href="{{ url()->previous() }}">
                        <i class="fa fa-angle-double-left"></i>
                        Register for another volunteer
                    </a>
                    <a href="/" >
                      <i class="fa fa-home"></i>
                        Back To Home
                    </a>
                  </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    

    <!-- //////////////////////footer///////////////////// -->
    @endsection