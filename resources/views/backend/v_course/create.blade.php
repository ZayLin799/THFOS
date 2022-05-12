@extends('template_backend')
@section('content')
        <div class="row d-flex justify-content-center align-items-center">      
            <div class="col-lg-8 col-xl-6">
              <div class="card rounded-3">
                <div class="card-body">
                  <h3>Create Volunteer Course</h3>
                  <form action="{{route('v_course.store')}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                      <label for="v_course_name" class="form-label">Volunteer Course Name</label>
                      <input type="text" class="form-control" id="v_course_name" name="v_course_name" value="{{old('v_course_name')}}">
                      <span class="help-inline">@error('v_course_name'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3">
                      <label for="subject" class="form-label">Subject</label>
                      <input type="text" class="form-control" id="subject" name="subject" value="{{old('subject')}}">
                      <span class="help-inline">@error('subject'){{$message}}@enderror</span>
                    </div>
                    <div class="d-flex justify-content-around">
                      <a class="btn btn-secondary mb-1 col-4" href="{{url('v_course')}}">Back</a>
                      <button type="submit" class="btn btn-primary mb-1 col-4">Submit</button>
                </div>
                  </form>
                </div>
            </div>
          </div>
        </div>
        <script>
          $(document).ready(function() {
              $(document).on('submit', 'form', function() {
                  $('button').attr('disabled', 'disabled');
              });
          });
          </script>
@endsection