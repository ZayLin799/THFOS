@extends('template')
@section('content')
  
    <!-- //////////////////////hero image///////////////////// -->
    <section
      class="hero-area bg-img bg-overlay"
      style="background-image: url({{asset ('frontend/images/blog-head.jpg')}})"
    >
      <div class="container h-100">
        <div class="row h-100 align-items-center">
          <div class="col-12">
            <div class="hero-content text-center text-light wow animate__fadeIn">
              <h2>Blog</h2>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- //////////////////////blog list start///////////////////// -->
    <div class="container p-4" id="change_nav">
      <div class="recent_blog">
        <div class="row justify-content-center align-items-center">
        @foreach ($blogs as $blog)
          <div class="col-12 col-lg-4 p-4" id="recent-card">
            <div class="card">
              <div class="card-img">
                <img
                  src="{{ asset('storage/img/'.$blog->blog_img ) }}"
                  class="card-img-top"
                  alt="..."
                />
              </div>
              <div class="card-body">
                <a href="{{ route('blogDetail',$blog->id) }}" id="rec_blog" class="d-flex justify-content-center p-2">
                  <h3 class="card-title">{{ $blog->blog_title }}</h3>
                </a>
                <a href="{{ route('blogDetail',$blog->id) }}" class="d-flex justify-content-center" style="text-decoration: none;">
                  <button type="button" class="btn btn-outline-success">Read Now</button>
                </a>
              </div>
            </div>
          </div>
        @endforeach
        </div>
      </div>
    </div>
    {{ $blogs->links('layouts.paginationlinks') }}

    <!-- //////////////////////footer///////////////////// -->
    @endsection
