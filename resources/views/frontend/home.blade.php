@extends('template')
@section('content')
    <!-- //////////////////////slider///////////////////// -->
    <section class="container-fluid vh-100 slider">
      <div class="row">
        <div class="col-12 col-md-6">
          <div class="outer">
            <div
              id="carouselExampleCaptions"
              class="carousel slide carousel-fade"
              data-bs-ride="carousel"
            >
              <div class="carousel-indicators">
                <button
                  type="button"
                  data-bs-target="#carouselExampleCaptions"
                  data-bs-slide-to="0"
                  class="active"
                  aria-current="true"
                  aria-label="Slide 1"
                ></button>
                <button
                  type="button"
                  data-bs-target="#carouselExampleCaptions"
                  data-bs-slide-to="1"
                  aria-label="Slide 2"
                ></button>
                <button
                  type="button"
                  data-bs-target="#carouselExampleCaptions"
                  data-bs-slide-to="2"
                  aria-label="Slide 3"
                ></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img
                    src="{{asset ('frontend/images/home-head1.jpg')}}"
                    class="d-block w-100"
                    alt="..."
                  />
                  <div class="carousel-caption d-none d-md-block">
                    <!-- <h5>First slide label</h5>
                    <p>
                      Some representative placeholder content for the first
                      slide.
                    </p> -->
                  </div>
                </div>
                <div class="carousel-item">
                  <img 
                    src="{{asset ('frontend/images/home-head2.jpg')}}"
                    class="d-block w-100"
                    alt="..."
                  />
                  <div class="carousel-caption d-none d-md-block">
                    <!-- <h5>Second slide label</h5>
                    <p>
                      Some representative placeholder content for the second
                      slide.
                    </p> -->
                  </div>
                </div>
                <div class="carousel-item">
                  <img
                    src="{{asset ('frontend/images/home-head3.jpg')}}"
                    class="d-block w-100"
                    alt="..."
                  />
                  <div class="carousel-caption d-none d-md-block">
                    <!-- <h5>Third slide label</h5>
                    <p>
                      Some representative placeholder content for the third
                      slide.
                    </p> -->
                  </div>
                </div>
              </div>
              
            </div>
            <div class="cover-box"></div>
            <div class="detail wow animate__fadeIn">
              <h1>Make Today So Awesome.<br>Yesterday Is Jealous.</h1>
              <div class="detail-btn d-flex justify-content-center align-items-center">
                <a href="/student_registration" class="btn btn-success m-2">
                  Register As Student
                </a>
                <a href="/volunteer_registration" class="btn btn-warning m-2">
                  Register As Volunteer
                </a>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </section>
    <!-- //////////////////////Catagory///////////////////// -->
    <div
      class="container-fluid pb-3 catagory"
      id="change_nav"
    >
      <div class="container">
        <div class="text-center p-4">
          <h1>Course Categories</h1>
        </div>
        <div class="row justify-content-center align-items-center row-cols-sm-2 row-cols-md-4">
          @foreach($cate as $category)
          <div class="col-4 col-sm-3 mb-2 d-flex flex-column justify-content-center align-items-center text-center wow animate__fadeInUp" data-wow-delay="0s">
            {{-- <div class="" > --}}
              <div class="cat-circle">
                <i class="fas fa-book-open text-success"></i>
              </div>
              <p class="cat-title">{{$category['course_category_name']}}</p>
            {{-- </div> --}}
          </div>
          @endforeach
        </div>
      </div>
    </div>

    <!-- //////////////////////course preview///////////////////// -->
    <section class="container mb-5">
      <div class="text-center p-4">
        <h1>Latest Courses</h1>
      </div>
      <div class="pre_course">
        <div class="row justify-content-center align-items-center">
            @foreach($batch_infos as $batch_info)
            <div class="col-12 col-md-4 mb-2" id="course">
              <div class="card border-light">
                @if ($batch_info->status == 1)
                        <span class="position-absolute top-0 end-0 badge bg-warning">New</span>
                      @else
                        <span class="position-absolute top-0 end-0 badge bg-danger">Closed</span>
                    @endif
                <img
                  class="card-img-top course-img"
                  src="{{ asset('storage/img/' . $batch_info->course->course_img) }}"
                  alt="Card image"
                  style="width: 100%"
                />
                <div class="card-body">
                  <h4 class="card-title d-flex justify-content-center">
                    {{$batch_info->course->coursename}}
                  </h4>
                  <h6 class="d-flex justify-content-center">{{$batch_info->batch->batch_name}}</h6>
                  <!-- <p class="card-text">Some example text some example text. Grade - 6 is an architect and engineer</p> -->
                  <hr />
                  <div class="d-flex justify-content-center">
                    <a href="{{url('course_detail/'.$batch_info->id) }}" class="btn btn-success">Preview This Courses</a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
                            
          </div>
          

        <div class="d-grid gap-2 col-6 mx-auto mt-5">
          <a href="/courses" class="btn btn-success">
            View All Courses
            <i class="fa fa-angle-double-right"></i>
          </a>
        </div>
      </div>
    </section>

    <!-- //////////////////////Count///////////////////// -->
    <div class="container-fluid text-light count_div">
      <div class="row p-3">
        <div class="col">
          <div class="text-center">
            <i class="fa fa-users mb-3" style="color: #fff"></i>
            <h4 class="cc font-weight-bolder">
                {{182 +$stu_count}}
            </h4>
            <p>Students</p>
          </div>
        </div>
        <div class="col">
          <div class="text-center">
            <i class="fa fa-chalkboard-teacher mb-3" style="color: #fff"></i>
            <h4 class="cc font-weight-bolder">
                  {{22 + $teacher_count}}
            </h4>
            <p>Teachers</p>
          </div>
        </div>
        <div class="col">
          <div class="text-center">
            <i class="fa fa-users-cog mb-3" style="color: #fff"></i>
            <h4 class="cc font-weight-bolder">
              {{29 + $vol_other_count}}
            </h4>
            <p>Volunteers</p>
          </div>
        </div>
      </div>
    </div>

    <!-- //////////////////////Feedback///////////////////// -->
    <section class="container">
      <div class="text-center p-5 pb-3">
        <h1>Student's Feedback</h1>
      </div>
      <div
        class="row
          for_slick_slide
          multiple-items
          justify-content-center
          align-items-center"
      >
        @foreach($feedbacks as $feedback)
          <div class="item col-xs-12 col-sm-12 col-md-12 col-lg-4 col-lg-push-3" id="stu_fb">
            <div class="card">
              <div
                class="
                  card-header
                  d-flex
                  justify-content-between
                  align-items-center
                "
              >
                <div class="d-flex">
                  @if ($feedback->image=='a')
                      <td>
                          <img src=
                          "{{URL::asset('https://i.pinimg.com/564x/f1/da/a7/f1daa70c9e3343cebd66ac2342d5be3f.jpg?fbclid=IwAR05hUtNLlMrn9nKCsA8vSOKLBRKKW9Yuvui3TYItr6kzYiveEv5FbwBygw')}}"
                          width="100px" height="100px" class="rounded-circle" alt=""/>
                      </td>
                  @else
                      <td>
                          <img src="{{ asset('storage/img/'.$feedback->image) }}" width="100px" height="100px"  class="rounded-circle" alt="" />
                      </td>
                  @endif
                  <div class="d-flex flex-column ms-2">
                    <span class="name">{{$feedback->name}}</span>
                    <span class="class">{{$feedback->batch_info->course->coursename}} ( {{$feedback->batch_info->batch->batch_name}} )</span>
                  </div>
                </div>
                {{-- <div class="rating text-success">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </div> --}}
              </div>
              <div class="card-body">
                {!! $feedback->feedback !!}
              </div>
            </div>
            <div class="overlay"></div>
          </div>
        @endforeach
        
      </div>
    </section>

    <!-- Recent Blog Start -->
    <div class="container-fluid pt-3 pb-5 recent_div">
      <div class="text-center p-5 pb-3">
        <h1>Recent Blog</h1>
      </div>
      
      <div class="container recent_blog">
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
              <div class="card-body flex-column">
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
      
      <div class="d-grid gap-2 col-6 mx-auto">
        <a href="/blog" class="btn btn-success">
          View All Blogs
          <i class="fa fa-angle-double-right"></i>
        </a>
      </div>
    </div>
    @endsection