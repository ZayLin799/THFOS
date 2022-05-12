@extends('template')
@section('content')
    <!-- //////////////////////header///////////////////// -->
    

    <!-- //////////////////////hero image///////////////////// -->
    <section class="hero-area bg-img bg-overlay" style="background-image: url({{asset('frontend/images/courses-header.jpg')}});">
        <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="hero-content text-center text-light wow animate__fadeIn">
                <h2>Courses</h2>
                </div>
            </div>
        </div></div>
    </section>

    <!-- //////////////////////main///////////////////// -->
    <section class=" container mb-5"  id="change_nav">
      <div id="sb">
        <!-- //////////////////////side bar///////////////////// -->
        <div id="mySidepanel" class="sidepanel">
            
            <div class="flex-shrink-0 bg-white" id="sidebar">
            
            <div class=" d-flex justify-content-between border-bottom sidebar-header" >
                <a href="#" class="d-flex align-items-center pb-1 mb-2 link-dark text-decoration-none">
                    <svg class="bi me-2" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
                    <span class="fw-semibold">Course Category</span>
                </a>  
                <a href="javascript:void(0)" class="closebtn text-decoration-none" onclick="closeNav()">
                  <i class="fas fa-times fa-2x"></i>
                </a> 
            </div>
            <ul class="list-unstyled ps-0 mt-2">
            <li class="mb-1">
                <a class="btn btn-all align-items-center rounded" onclick="return toggle('all')">
                All Courses
                </a>
                
            </li>            
            
            @foreach($cate as $category)

            <li class="border-top my-3"></li>
            <li class="mb-1">
                <a class="btn btn-cat align-items-center rounded" onclick="return toggle(`category{{$category['id']}}`)">
                {{$category['course_category_name']}}
                </a>
            </li>
            @endforeach
            </ul>
            </div>
        </div> 
        <!-- //////////////////////left content///////////////////// -->
        <div class=" container" id="pg-content">
          <!-- //////////////////////all courses (First Page)///////////////////// -->
            <div id="all" class="pg-content">
              <div class=" d-flex pt-2 pb-2">
                <button class="openbtn" onclick="openNav()"><i class="fas fa-book-open fs-sm"></i></button>
                <h2 class="m-3">All Courses</h2>
              </div>
              
              <div class="row justify-content-center align-items-center mt-2">
                @foreach($batch_infos as $batch_info)
                <div class="col-12 col-md-4 mb-2" id="page_course">
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
            </div>
            @foreach($cate as $category)
            <div id="category{{$category['id']}}" class="pg-content"> 
              <div class=" d-flex pt-2 pb-2">
                <button class="openbtn" onclick="openNav()"><i class="fas fa-book-open fs-sm"></i></button>
                <h2 class="m-3">{{$category['course_category_name']}}</h2>
              </div>
              {{-- <button class="openbtn" onclick="openNav()">&#9776; Courses</button>
              <h2 class="mt-2 mb-4"> {{$category['course_category_name']}} </h2>  --}}
              
              <div class="row justify-content-center align-items-center mt-2">
                @foreach($batch_infos as $batch_info)
                  @foreach ($category->courses as $course) 
                  
                    @if($course->course_category_id == $category->id && $batch_info->course_id == $course->id)
                      <div class="col-12 col-md-4 mb-2" id="page_course">
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
                    @endif
                  @endforeach
                @endforeach
                
                
              </div>
            </div>
            @endforeach
        </div>
        
    </div>
    </section>

    @endsection


    <!-- //////////////////////footer///////////////////// -->
