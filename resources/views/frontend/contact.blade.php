@extends('template')
@section('content')

    <!-- //////////////////////hero image///////////////////// -->
    <section
      class="hero-area bg-img bg-overlay"
      style="background-image: url({{asset ('frontend/images/contact-header.jpg')}})"
    >
      <div class="container h-100">
        <div class="row h-100 align-items-center">
          <div class="col-12">
            <div class="hero-content text-center text-light wow animate__fadeIn">
              <h2>Contact Us</h2>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- //////////////////////sample///////////////////// -->
    <section id="contact-us">
      <div class="container mb-2" id="change_nav">

        @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
        @endif


        <form class="row g-3" action={{url('/contact')}} method="POST" enctype="multipart/form-data">
        @csrf

        {{-- <form class="row g-3" action="{{route('contact.store')}}" method="POST">
          @csrf
          <form class="row g-3"> --}}
            <div class="col-12">
              <label for="name" class="form-label">Name</label>
              <input
                type="text"
                class="form-control"
                id="name"
                name="name"
                placeholder = "Enter your name"
                value="{{old('name')}}"
              />
              <span class="help-inline">@error('name'){{$message}}@enderror</span>
            </div>
            <div class="col-md-12">
              <label for="email" class="form-label">Email</label>
              <input
                type="email"
                class="form-control"
                id="email"
                name="email"
                placeholder = "Enter your email"
                value="{{old('email')}}"
              />
              <span class="help-inline">@error('email'){{$message}}@enderror</span>
            </div>
            
            <div class="col-12">
              <label for="subject" class="form-label">Subject / Title</label>
              <input
                type="text"
                class="form-control"
                id="subject"
                name="subject"
                placeholder = "Enter your question's title"
                value="{{old('subject')}}"
              />
              <span class="help-inline">@error('subject'){{$message}}@enderror</span>
            </div>
            <div class="col-12">
              <label for="message" class="form-label"
                >What do you want to know about us?</label
              >
              <textarea
                class="form-control"
                id="message"
                name="message"
                rows="4"
                placeholder = "Enter your question's detail">{{old('message')}}</textarea>
              <span class="help-inline">@error('message'){{$message}}@enderror</span>
            </div>
            
            <div class="d-flex justify-content-around pt-4">
                    <button type="reset" class="btn btn-secondary mb-1 col-4">Reset</button>
                    <button type="submit" class="btn btn-success mb-1 col-4">Submit</button>
                  </div>
          
        </form>
      </div>
    </section>
    <script>

      $(document).ready(function() {
          $(document).on('submit', 'form', function() {
              $('button').attr('disabled', 'disabled');
          });
      });
      </script>

    @endsection