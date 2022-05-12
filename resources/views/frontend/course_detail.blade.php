@extends('template')
@section('content')
    <!-- //////////////////////Course Details///////////////////// -->
    <section class=" container-fluid pb-3" id="change_nav" style="background-color: #f8f9fa;">
        <div class=" container" >
          <div class=" row pt-2 ps-4 border-bottom">
            {{-- @foreach($batch_infos as $batch_info) --}}
            <div class=" col-12">
              <h2>{{ $courses->coursename }} <span style="font-size: 16px;">{{ $batches->batch_name }}</span></h2>
            </div>
            {{-- @endforeach --}}
          </div>
        <div class=" row pt-4 justify-content-around">
          <div class="col-md-4 mb-4">
            <a class="venobox" data-gall="next" href="{{ asset('storage/img/' . $courses->course_img) }}">
              <img
                  src="{{ asset('storage/img/' . $courses->course_img) }}"
                  alt="Course image"
                  style="width: 100%"
              />
            </a>
          </div>
          <div class="col-md-4 mb-4">
            <h4>Outline</h4>
            <div class="ps-4">
              {!! $courses->description !!}
            </div>
            

            <h4>Teaching Method</h4>
            <ul class="outline-subject">
              <li class="m-0 p-0">
                <p class="m-0"><i class="fas fa-circle fa-sm mr-4 grey ps-0 p-3 text-success rounded-circle" aria-hidden="true"></i>Zoom</p>
              </li>
              <li class="m-0 p-0">
                <p class="m-0"><i class="fas fa-circle fa-sm mr-4 grey ps-0 p-3 text-success rounded-circle" aria-hidden="true"></i>Google Classroom</p>
              </li>
          </ul>
        </div>
        <div class="col-md-4 mb-4">
          
          <div class="card">
            <div class="card-body justify-content-center align-items-center">
              <div class="list-group-flush">
                <div class="list-group-item p-3 d-flex justify-content-between">
                  <p class="row"><span class="col-12"> Date: </span><span id="course-input" class="col-12 fw-bold">{{$batch_infos->start}}</span></p>
                  <i class="fas fa-calendar-alt fa-2x mr-4 grey white-text rounded-circle " aria-hidden="true"></i>
                </div>
                <div class="list-group-item p-3 d-flex justify-content-between">
                  <p class="row"><span class="col-12"> Duration: </span> <span id="course-input" class="col-12 fw-bold">{{ $courses->duration }}</span></p>
                  <i class="fas fa-clock fa-2x mr-4 grey white-text rounded-circle " aria-hidden="true"></i>
                </div>
                <div class="list-group-item p-3 d-flex justify-content-between">
                  <p class="row"><span class="col-12"> Level Must Have: </span> <span id="course-input" class="col-12 fw-bold">{{ $courses->level }}</span></p>
                  <i class="fas fa-chart-line fa-2x mr-4 grey white-text rounded-circle " aria-hidden="true"></i>
                </div>
              </div>
              
              <div class="d-grid gap-2 col-10 mx-auto mt-3">
                @if ($batch_infos->status == 1)
                  <a href="{{url('course_registration/'.$batch_infos->id) }}" class="btn btn-success" type="button">Register Now</a>
                @else
                  <span class="help-inline d-flex justify-content-center">This course isn't avaliable now!</span>
                  <button disabled="disabled" class="btn btn-success" type="button">
                    Register Now
                  </button>
                @endif
              </div>
              
            </div>
          </div>

        </div>
      </div>
        </div>
    </section>


    <!-- //////////////////////footer///////////////////// -->
    @endsection