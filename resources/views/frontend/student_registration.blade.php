@extends('template')
@section('content')

        
        
    <!-- //////////////////////Student Registration///////////////////// -->
    <section class="register-page" id="change_nav">
      <div class="container py-5">
        <div class="row d-flex justify-content-center align-items-center">
          <div class="col-lg-8 col-xl-6">
            <div class="card rounded-3">
              <img src="{{asset ('frontend/images/stu-reg.jpg')}}" class="w-100" style="height: 200px; object-fit: cover; border-top-left-radius: .3rem; border-top-right-radius: .3rem;" alt="Sample photo">
              <div class="card-body p-4 p-md-5">
                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2 text-center">Registration Form For Student</h3>
    
                
                
                <form class="px-md-2" action={{url('/student_register_complete')}} method="POST" enctype="multipart/form-data">
                @csrf
                
                  <div class="mb-3 form-group">
                    <label for="studentname" class="form-label">Name<span class="help-inline">*</span></label>
                    <input type="text" class="form-control" id="studentname" name="studentname" value="{{old('studentname')}}">
                    <span class="help-inline">@error('studentname'){{$message}}@enderror</span>
                    
                  </div>
                  <div class="mb-3 form-group">
                    <label for="viberph" class="form-label">Viber Phone<span class="help-inline">*</span></label>
                    <input type="text" class="form-control" id="viberph" name="viberph" value="{{old('viberph')}}">
                    <span class="help-inline">@error('viberph'){{$message}}@enderror</span>
                  </div>
                  <div class="mb-3 form-group">
                    <label for="email" class="form-label">E-mail<span class="help-inline">*</span></label>
                    <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}">
                    <span class="help-inline">@error('email'){{$message}}@enderror</span>
                  </div>
                  <div class="mb-3 form-group">
                    <label for="age" class="form-label">Age<span class="help-inline">*</span></label>
                    <input type="number" class="form-control" id="age" name="age" value="{{old('age')}}">
                    <span class="help-inline">@error('age'){{$message}}@enderror</span>
                  </div>
                  
                  <div class="mb-3 form-group">
                      
                    <label class="form-label" for="gender">Gender<span class="help-inline">*</span></label>
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
                        {{-- <div class="row">
                        <label class=" col-4"><input type="radio" name="gender" id="male" value="male" {{ (old('gender') == 'male') ? 'checked' : ''}}>Male</label>
                        <label class=" col-4"><input type="radio" name="gender" id="female" value="female" {{ (old('gender') == 'female') ? 'checked' : ''}}>Female</label>         
                        </div> --}}
                        <span class="help-inline">@error('gender'){{$message}}@enderror</span>
                  </div>
                  
                  <div class="mb-3 form-group">
                    <label for="course" class="form-label">Which course do you want to apply?<span class="help-inline">*</span></label>
                      <div class="form-group">
                        <select class="form-select" aria-label="Default select example" id="course" name="course">
                          <option value="">Choose Course</option>
                         
                          @foreach ($batch_infos as $batch_info)
                            @if ($batch_info->status == 1)
                             
                                <option value="{{$batch_info->id}}" {{ old('course') == "$batch_info->id" ? 'selected' : '' }}>
                                  {{ $batch_info->course->coursename }}
                                  <span style="font-size: 16px;"> ({{ $batch_info->batch->batch_name }})</span>
                                </option>
                              
                            @else
                                <option value="{{$batch_info->id}}" style=" display:none;">{{ $batch_info->course->coursename }}
                                  <span style="font-size: 16px;"> {{ $batch_info->batch->batch_name }}</span>
                                </option>
                            @endif
                          @endforeach
                          {{-- @endforeach
                          @endforeach --}}
                        </select>
                        <span class="help-inline">@error('course'){{$message}}@enderror</span>
                      </div>
                  </div>
                  
                  <div class="mb-3 form-group">
                    <label for="previous_level" class="form-label">Previous Level<span class="help-inline">*</span></label>
                    <input type="text" class="form-control" id="previous_level" name="previous_level" value="{{old('previous_level')}}">
                    <span class="help-inline">@error('previous_level'){{$message}}@enderror</span>
                  </div>
                  
                  <div class="mb-3 form-group">
                    <label for="comment" class="form-label">Comment<span class="help-inline">*</span></label>
                    <textarea  type="text" class="form-control" id="comment" name="comment">{{old('comment')}}</textarea>
                    <span class="help-inline">@error('comment'){{$message}}@enderror</span>
                  </div>

                  <div class="mb-3 form-group">
                    <input class="form-check-input" type="checkbox" id="agree" name="agree" required 
                    {{ (old('agree')) ? 'checked' : ''}}/>
                      <label class="form-check-label" for="agree">
                        Agree terms & conditions of THFOS
                      </label>
                  </div>
                  <br/>
                  <div class="d-flex justify-content-around">
                    <button type="reset" class="btn btn-secondary mb-1 col-4">Reset</button>
                    <button type="submit" class="btn btn-success mb-1 col-4 submit">Submit</button>
                  </div>
    
                </form>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script>
      $(document).ready(function() {
          $(document).on('submit', 'form', function() {
              $('button').attr('disabled', 'disabled');
          });
          var agree = document.getElementsByName("agree");
          $(agree).change(function () {
              $('.submit').prop("disabled", !this.checked);
          }).change();
      });
      </script>

    <!-- //////////////////////footer///////////////////// -->
    @endsection