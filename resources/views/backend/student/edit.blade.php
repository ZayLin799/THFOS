@extends('template_backend')
@section('content')
        <div class="row d-flex justify-content-center align-items-center">
          <div class="col-lg-8 col-xl-6">
            <div class="card rounded-3">
                <div class="card-body">
                  <h3> Edit Student Registration</h3>
                  <form action="{{route('student.update',$student->id)}}" method="POST" enctype="multipart/form-data">
                     @csrf
                    @method('PUT')
                    <div class="mb-3">
                      <label for="studentname" class="form-label">Name</label>
                      <input type="text" class="form-control" id="studentname" name="studentname" value="{{$student->studentname}}">
                      <span class="help-inline">@error('studentname'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3">
                      <label for="viberph" class="form-label">Viber Phone</label>
                      <input type="text" class="form-control" id="viberph" name="viberph" value="{{$student->viberph}}">
                      <span class="help-inline">@error('viberph'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label">E-mail</label>
                      <input type="text" class="form-control" id="email" name="email" value="{{$student->email}}">
                      <span class="help-inline">@error('email'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3">
                      <label for="age" class="form-label">Age</label>
                      <input type="number" class="form-control" id="age" name="age" value="{{$student->age}}">
                       <span class="help-inline">@error('age'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3 form-group">
                      
                      <label class="form-label" for="gender">Gender</label>
                      <br>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="gender" id="male" value="male"   {{ ($student->gender=="male")? "checked" : "" }}>
                          <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="gender" id="female" value="female" {{ ($student->gender=="female")? "checked" : "" }}>
                          <label class="form-check-label" for="female">Female</label>
                        </div>
                        <br>
                    
                          <span class="help-inline">@error('gender'){{$message}}@enderror</span>
                    </div>
                      <!-- <div class="mb-3 form-group">
                        <label class="form-label" for="gender">Gender</label>
                            <div class="d-flex justify-content-around" >
                            <label class="radio-inline"><input type="radio" name="gender" id="male" value="male"   {{ ($student->gender=="male")? "checked" : "" }}>Male</label>
                            <label class="radio-inline"><input type="radio" name="gender" id="female" value="female" {{ ($student->gender=="female")? "checked" : "" }}>Female</label>         
                            </div>
                      </div> -->
                    <div class="mb-3">
                      <label for="batch_info_id" class="form-label">Which course do you want to apply?</label>
                      <div class="form-group">
                        <select class="form-control form-control-md" aria-label="Default select example" name="batch_info_id">
                          @foreach ($batch_infos as $batch_info)
                            <option value="{{$batch_info->id}}" selected>
                              {{ $batch_info->course->coursename }}(
                              {{ $batch_info->batch->batch_name }})
                            </option>
                          @endforeach
                        </select>
                         <span class="help-inline">@error('batch_info_id'){{$message}}@enderror</span>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="previous_level" class="form-label">Previous Level</label>
                      <input type="text" class="form-control" id="v" name="previous_level" value="{{$student->previous_level}}">
                      <span class="help-inline">@error('previous_level'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3">
                      <label for="comment" class="form-label">Comment</label>
                      <textarea  type="text" class="form-control" id="comment" name="comment">{{$student->comment}}</textarea>     
                      <span class="help-inline">@error('comment'){{$message}}@enderror</span>
                    </div>
                    <input type="hidden" name="status" value="{{$student->status}}" />
                  <br/>
                  <div class="d-flex justify-content-around">
                    <a href="{{url('student')}}" class="btn btn-secondary mb-1 col-4">Back</a>
                    <button type="submit" class="btn btn-primary mb-1 col-4">Change</button>
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