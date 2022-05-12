@extends('template_backend')
@section('content')
        <div class="row d-flex justify-content-center align-items-center">
          <div class="col-lg-8 col-xl-6">
              <div class="card rounded-3">
                <div class="card-body">
                  <h3>Create<strong>{{ $batch->batch_name }}</strong> Class</h3>
                  <form action="{{route('batch_info.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                      <label for="course_id" class="form-label">Course</label>
                      <div class="form-group">
                        <select class="form-control form-control-md" aria-label="Default select example" name="course_id">
                          <option selected>Choose Course</option>
                          @foreach ($courses as $course)
                            <option value="{{ $course->id }}" {{ old('course_id') == "$course->id" ? 'selected' : '' }}>{{ $course->coursename }}</option>
                          @endforeach 
                        </select>
                        <span class="help-inline">@error('course_id'){{$message}}@enderror</span>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="course_id" class="form-label">Batch</label>
                      <div class="form-group">
                        <select class="form-control form-control-md" aria-label="Default select example" name="batch_id">
                          <option value="{{ $batch->id }}" {{ old('batch_id') == "$batch->id" ? 'selected' : '' }}>{{ $batch->batch_name }}</option>
                        </select>
                        <span class="help-inline">@error('batch_id'){{$message}}@enderror</span>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="avaliable_students" class="form-label">Avaliable Students</label>
                      <input type="number" class="form-control" id="avaliable_student" name="avaliable_student" value="{{old('avaliable_student')}}">
                      <span class="help-inline">@error('avaliable_student'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3">
                      <label for="time_limit" class="form-label">Start Date</label>
                      <input type="date" class="form-control" id="time_limit" name="start" value="{{old('start')}}">
                      <span class="help-inline">@error('start'){{$message}}@enderror</span>
                    </div>
                    <input type="hidden" name="status" value="1" />
                   <div class="d-flex justify-content-around">
                   <a href="{{url('batch_info')}}" class="btn btn-secondary mb-1 col-4">Back</a>
                    <button type="submit" class="btn btn-primary mb-1 col-4">Submit</button>
                  </div>
                  </form>
                </div>
            </div>
          </div>
        </div>
        <script>
          var msg = '{{Session::get('alert')}}';
          var exist = '{{Session::has('alert')}}';
          if(exist){
            alert(msg);
          }
          $(document).ready(function() {
              $(document).on('submit', 'form', function() {
                  $('button').attr('disabled', 'disabled');
              });
          });
          </script>
@endsection