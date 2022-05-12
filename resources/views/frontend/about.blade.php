@extends('template')
@section('content')

    <!-- //////////////////////hero image///////////////////// -->
    <section class="hero-area bg-img bg-overlay" style="background-image: url({{asset ('frontend/images/people-crop.jpg')}});">
        <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="hero-content text-center text-light wow animate__fadeIn">
                <h2>About Us</h2>
                </div>
            </div>
        </div></div>
    </section>

    <!-- //////////////////////Description///////////////////// -->
    <section class=" container"  id="change_nav">
      <div class=" row justify-content-center m-5">
        <div class=" col-12">
                <p class=" text-center wow animate__fadeInUp" >
                  ""<b>THFOS</b> is a <span style="color: #0fa402;">Free Online School</span> which is aimed for the young learners to learn during this difficult days.""
                </p>
          </div>
        </div>
    </section>

    <!-- //////////////////////Teams///////////////////// -->
    <section class=" container mt-5 mb-5">
      <div class=" row justify-content-center m-2">
          <div class=" col-12 text-center wow animate__fadeInUp" data-wow-delay="0.1s">
            <i class="fas fa-users-cog fa-4x mb-3" style="color: #000;"></i>
              <h2 class="">Our Teams</h2>
          </div>
      </div>
      <div class=" row justify-content-center">
        <div class=" col-md-4 mb-2 wow animate__fadeInUp" data-wow-delay="0s" id="team1">
          <div class="card img-fluid" style="width:500px">
            <img class="card-img-top" src="{{asset ('frontend/images/teacher.jpg')}}" alt="Card image" style="width:100%">
            <div class="card-img-overlay d-flex flex-column justify-content-end">
              {{-- <img src="{{asset ('frontend/images/undraw_teacher.svg')}}" alt="" style="width:50%"> --}}
              <h4 class="card-title text-center">Teachers Team</h4>
              <p class="card-text">
                A teacher is responsible for preparing lesson plans and educating students at all levels. Their duties include assigning homework, grading tests, and documenting progress. Teachers must be able to instruct in a variety of subjects and reach students with engaging lesson plans.
              </p>
              <!-- <a href="#" class="btn btn-primary">See Profile</a> -->
            </div>
          </div>
        </div>
          <div class=" col-md-4 mb-2 wow animate__fadeInUp" data-wow-delay="0.3s" id="team1">
            <div class="card img-fluid" style="width:500px">
              <img class="card-img-top" src="{{asset ('frontend/images/staff.jpg')}}" alt="Card image" style="width:100%">
              <div class="card-img-overlay d-flex flex-column justify-content-end">
                <h4 class="card-title text-center">Students Service Team</h4>
                <p class="card-text">
                  Students Service is a service to the organization society. As a member of the society, they have to do certain duties for the organization society. So, there must be understanding and co-operation among the different members of the organization.
                </p>
                <!-- <a href="#" class="btn btn-primary">See Profile</a> -->
              </div>
            </div>
        </div>
      </div>
      <div class=" row mt-2">
          
          <div class=" col-md-4 mb-2 wow animate__fadeInUp" data-wow-delay="0s" id="team1">
            <div class="card img-fluid" style="width:500px">
              <img class="card-img-top" src="{{asset ('frontend/images/gd.jpg')}}" alt="Card image" style="width:100%">
              <div class="card-img-overlay d-flex flex-column justify-content-end">
                <h4 class="card-title text-center">Graphic Team</h4>
                <p class="card-text">
                  Design and advertise courses announment, blogs, events and exam results.
                </p>
                <!-- <a href="#" class="btn btn-primary">See Profile</a> -->
              </div>
            </div>
          </div>
          <div class=" col-md-4 mb-2 wow animate__fadeInUp" data-wow-delay="0.3s" id="team1">
            <div class="card img-fluid" style="width:500px">
              <img class="card-img-top" src="{{asset ('frontend/images/nick-morrison-FHnnjk1Yj7Y-unsplash.jpg')}}" alt="Card image" style="width:100%">
              <div class="card-img-overlay d-flex flex-column justify-content-end">
                <h4 class="card-title text-center">Content Team</h4>
                <p class="card-text">
                  Content Writers are responsible for style and format consistency across all projects and communicating with other team members to create the best content possible.
                </p>
                <!-- <a href="#" class="btn btn-primary">See Profile</a> -->
              </div>
            </div>
          </div>
          <div class=" col-md-4 mb-2 wow animate__fadeInUp" data-wow-delay="0.6s" id="team1">
            <div class="card img-fluid" style="width:500px">
              <img class="card-img-top" src="{{asset ('frontend/images/typing.jpg')}}" alt="Card image" style="width:100%">
              <div class="card-img-overlay d-flex flex-column justify-content-end">
                <h4 class="card-title text-center">Typing Team</h4>
                <p class="card-text">
                  Type exam sheet, course curriculums and other pdf file of our organization.
                </p>
                <!-- <a href="#" class="btn btn-primary">See Profile</a> -->
              </div>
            </div>
          </div>
        
      </div>
      
  </section>

    <!-- //////////////////////footer///////////////////// -->
    @endsection