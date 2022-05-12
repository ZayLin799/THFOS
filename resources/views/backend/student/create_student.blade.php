@extends('template_backend')
@section('content')
        <div class="row d-flex justify-content-center align-items-center">
          <div class="col-lg-8 col-xl-6">
            <div class="card rounded-3">
                <div class="card-body">
                  <h3> Student Registration</h3>
                  <form action="{{url('student/store_student')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                      <label for="studentname" class="form-label">Name</label>
                      <input type="text" class="form-control" id="studentname" name="studentname" value="{{old('studentname')}}">
                    <span class="help-inline">@error('studentname'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3">
                      <label for="viberph" class="form-label">Viber Phone</label>
                      <input type="text" class="form-control" id="viberph" name="viberph" value="{{old('viberph')}}">
                      <span class="help-inline">@error('viberph'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label">E-mail</label>
                      <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}">
                      <span class="help-inline">@error('email'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3">
                      <label for="age" class="form-label">Age</label>
                      <input type="number" class="form-control" id="age" name="age" value="{{old('age')}}">
                      <span class="help-inline">@error('age'){{$message}}@enderror</span>
                    </div>
                      <div class="mb-3 form-group">
                      
                      <label class="form-label" for="gender">Gender</label>
                      <br>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="gender" id="male" value="male" {{ (old('gender') == 'male') ? 'checked' : ''}}>
                          <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="gender" id="female" value="female" {{ (old('gender') == 'female') ? 'checked' : ''}}>
                          <label class="form-check-label" for="female">Female</label>
                        </div>
                        <br>
                    
                          <span class="help-inline">@error('gender'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3">
                      <label for="batch_info_id" class="form-label">Which course do you want to apply?</label>
                      <div class="form-group">
                        <select class="form-control form-control-md" id="batch_info_id" aria-label="Default select example" name="batch_info_id">
                          <option selected value="0">Choose Class</option>
                          @foreach ($batch_infos as $batch_info)
                            @if ($batch_info->status == 1)
                                <option value="{{$batch_info->id}}" {{ old('batch_info_id') == "$batch_info->id" ? 'selected' : '' }}>
                                  {{ $batch_info->course->coursename }} (
                                  {{ $batch_info->batch->batch_name }})
                                </option>                            
                            @else
                                <option value="{{$batch_info->id}}" style=" display:none;">{{ $batch_info->course->coursename }}
                                  <span style="font-size: 16px;"> {{ $batch_info->batch->batch_name }}</span>
                                </option>
                            @endif
                          @endforeach
                          {{-- @foreach ($batch_infos as $batch_info)
                            <option value="{{$batch_info->id}}"  {{ old('batch_info_id') == "$batch_info->id" ? 'selected' : '' }}>
                              {{ $batch_info->course->coursename }} (
                              {{ $batch_info->batch->batch_name }})
                            </option>
                          @endforeach  --}}
                        </select>
                        <span class="help-inline">@error('batch_info_id'){{$message}}@enderror</span>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="previous_level" class="form-label">Previous Level</label>
                      <input type="text" class="form-control" id="previous_level" name="previous_level" value="{{old('previous_level')}}">
                      <span class="help-inline">@error('previous_level'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3">
                      <label for="comment" class="form-label">Comment</label>
                      <textarea  type="text" class="form-control" id="comment" name="comment">{{old('comment')}}</textarea>
                      <span class="help-inline">@error('comment'){{$message}}@enderror</span>
                    </div>
                  <input type="hidden" name="status" value="0" />
                  <br/>
                  <div class="d-flex justify-content-around">
                    <a href="{{url('student')}}" class="btn btn-secondary mb-1 col-4">Back</a>
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