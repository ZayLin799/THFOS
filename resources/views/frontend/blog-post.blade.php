@extends('template')
@section('content')

    <section id="blog-post">
      <div class="container" id="change_nav">
        <div class="col py-2" id="blog-list">
          <div class="row p-4">
            <div class="col-12 pb-4 d-flex justify-content-center">
              <h2>
              {{ $blogs->blog_title }}
              </h2>
            </div>
            <div class="col-12 pb-4">
              <img class="" src="{{asset('storage/img/'.$blogs->blog_img )}}"/>
            </div>
            <div class="col-12">
              <p>
              {!! $blogs->description !!}
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- blog post end -->
    <div class="container">
      <section id="nex-pev">
        <ul class="pagination justify-content-center">
          <li class="page-item">
          
          @if ($previous)
            <a class="page-link" href="{{ URL::to( 'blog-post/' . $previous->id ) }}" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          @endif
          </li>
          <li class="page-item">
            <a class="page-link" href="#">{{ $blogs->blog_title }}</a>
          </li>
          <li class="page-item">
          @if ($next)
            <a class="page-link" href="{{ URL::to( 'blog-post/' . $next->id ) }}" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          @endif
          </li>
        </ul>
      </section>
    </div>

    <!-- related post start -->
    <div class="container p-4">
      <div class="recent_blog">
      <div class="text-center pt-3 pb-3">
        <h4>Related Blogs</h4>
      </div>
        <div class="row justify-content-center align-items-center">
          @foreach ($blogrels as $blogrel)
          <div class="col-12 col-lg-4 p-4" id="recent-card">
            <div class="card">
              <div class="card-img">
                <img
                  src="{{ asset('storage/img/'.$blogrel->blog_img ) }}"
                  class="card-img-top"
                  alt="..."
                />
              </div>
              <div class="card-body">
              <a href="{{ route('blogDetail',$blogrel->id) }}" id="rec_blog" class="d-flex justify-content-center p-2">
                  <h3 class="card-title">{{ $blogrel->blog_title }}</h3>
                </a>
                <a href="{{ route('blogDetail',$blogrel->id) }}" class="d-flex justify-content-center" style="text-decoration: none;">
                  <button type="button" class="btn btn-outline-success">Read Now</button>
                </a>
              </div>
            </div>
          </div>
        @endforeach
        </div>
      </div>
    </div>
    <!-- related post end -->
    <!-- //////////////////////footer///////////////////// -->
    @endsection
