@extends('template')
@section('content')

        
        
    <!-- //////////////////////Volunteer Registration///////////////////// -->
    <section class="register-page" id="change_nav">
        <div class="container py-5">
          <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-8 col-xl-6">
              <div class="card rounded-3">
                <img src="{{asset ('frontend/images/volunteer-header.jpg')}}" class="w-100" style="height: 200px; object-fit: cover; border-top-left-radius: .3rem; border-top-right-radius: .3rem;" alt="Sample photo">
                <div class="card-body p-4 p-md-5">
                  <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2 text-center">Registration Form For Volunteer</h3>
      
                  
                  <form class="px-md-2" action="" method="POST">
                  @csrf
                  
                    <div class="mb-3 form-group">
                      <label for="volunteername" class="form-label">Name<span class="help-inline">*</span></label>
                      <input type="text" class="form-control" id="volunteername" name="volunteername" value="{{old('volunteername')}}">
                      <span class="help-inline">@error('volunteername'){{$message}}@enderror</span>
                      
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
                          <label for="skill" class="form-label">Skills<span class="help-inline">*</span></label>
                          <input type="text" class="form-control" id="skill" name="skill" value="{{old('skill')}}">
                          <span class="help-inline">@error('skill'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3 form-group">
                          <label for="education" class="form-label">Background Education<span class="help-inline">*</span></label>
                          <input type="text" class="form-control" id="education" name="education" value="{{old('education')}}">
                          <span class="help-inline">@error('education'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3 form-group">
                          <label for="experience" class="form-label">Experience<span class="help-inline">*</span></label>
                          <input type="text" class="form-control" id="experience" name="experience" value="{{old('experience')}}">
                          <span class="help-inline">@error('experience'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3 form-group">
                          <label for="tele_name" class="form-label">Telegram Nickname<span class="help-inline">*</span></label>
                          <input type="text" class="form-control" id="tele_name" name="tele_name" value="{{old('tele_name')}}">
                          <span class="help-inline">@error('tele_name'){{$message}}@enderror</span>
                    </div>
  
                    <div class="mb-3 form-group">
                      
                      <label class="form-label" for="pos">Which option do you want to apply?<span class="help-inline">*</span></label>
                      <br>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="pos" id="teacher" value="teacher" {{ (old('pos') == 'teacher') ? 'checked' : ''}}>
                          <label class="form-check-label" for="teacher">Teacher</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="pos" id="other" value="other" {{ (old('pos') == 'other') ? 'checked' : ''}}>
                          <label class="form-check-label" for="other">Other</label>
                        </div>
                        <br>
                          <span class="help-inline">@error('pos'){{$message}}@enderror</span>
                    </div>
                    {{-- <div class="mb-3 form-group">
                      <label class="form-label" for="pos">Which position do you want to apply?<span class="help-inline">*</span></label>
                          <div class="d-flex justify-content-around">
                          <label class="radio-inline"><input type="radio" name="pos" id="teacher" value="teacher" {{ (old('pos') == 'teacher') ? 'checked' : ''}}>Teacher</label>
                          <label class="radio-inline"><input type="radio" name="pos" id="other" value="other" {{ (old('pos') == 'other') ? 'checked' : ''}}>Other</label>         
                          </div>
                          <span class="help-inline">@error('pos'){{$message}}@enderror</span>
                    </div> --}}

                    
                    <div class=" collapse {{ (old('pos') == 'teacher') ? 'show' : ''}} chosen_hiden chosen_teacher">

                        <div class="mb-3 form-group">
                          <label for="teacher_role" class="form-label">Which teacher role do you want to apply?<span class="help-inline">*</span></label>
                            <div class="form-group">
                              <select class="form-select" aria-label="Default select example" id="teacher_role" name="teacher_role">
                                <option value="">Choose teacher role</option>
                                @foreach ($positions as $position)
                                  @if ( $position->role == 1)
                                    <option value="{{ $position->id }}" {{ old('teacher_role') == "$position->id" ? 'selected' : '' }}>
                                      {{ $position->positionname }}
                                    </option>
                                  @endif
                                @endforeach
                              </select>
                              <span class="help-inline teacher-error">@error('teacher_role'){{$message}}@enderror</span>
                            </div>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="v_course_id" class="form-label">Which course do you want to teach?<span class="help-inline">*</span></label>
                          <div class="form-group">
                            <select class="form-select" aria-label="Default select example" id="v_course_id" name="v_course_id" data-dependent="subject">
     
                                <option value="">Choose course</option>
                              @foreach ($v_courses as $v_course)
                                <option value="{{ $v_course->id }}" {{ old('v_course_id') == "$v_course->id" ? 'selected' : '' }}>
                                  {{ $v_course->v_course_name }}
                                </option>
                              @endforeach
                            </select>
                            <span class="help-inline teacher-error">@error('v_course_id'){{$message}}@enderror</span>
                          </div>
                        </div>

                          <div class=" collapse {{ (old('v_course_id')) ? 'show' : ''}}" id="v_course_sub">
                            <label class="form-label">Choose (at least one) subject or level:<span class="help-inline">*</span></label>
                          
                            <div id="subject">
                            {{ csrf_field() }}
                            </div>
                            <span class="help-inline teacher-error">@error('subject'){{$message}}@enderror</span>
                          <br>
                          </div>
                            {{-- @foreach ($v_courses as $v_course)
                              @if ( $v_course->subject != "") 
                                @foreach(explode(',', $v_course->subject) as $sub)
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input checked-sub" type="checkbox" id="{{ $sub }}" name="subject[]" value="{{ $sub }}" {{ (is_array(old('subject')) and in_array($sub, old('subject'))) ? ' checked' : '' }}>
                                    <label class="form-check-label" for="subject[]">{{ $sub }}</label>
                                  </div>
                                  @endforeach
                                @endif
                            @endforeach --}}
                            
                          
                        <div class="mb-3 form-group">
                            <label for="teaching_time" class="form-label">What time do you want to teach your chosen
                            class.?<span class="help-inline">*</span></label>
                            <input type="text" class="form-control" id="teaching_time" name="teaching_time" value="{{old('teaching_time')}}">
                            <span class="help-inline teacher-error">@error('teaching_time'){{$message}}@enderror</span>
                        </div>
    
                        {{-- <div class="mb-3 form-group">
                          <label for="reason" class="form-label">Why do you want to teach at our school?<span class="help-inline">*</span></label>
                          <textarea  type="text" class="form-control" id="reason" name="reason">{{old('reason')}}</textarea>
                          <span class="help-inline">@error('reason'){{$message}}@enderror</span>
                        </div> --}}
                        
                    </div>

                    <div class=" collapse {{ (old('pos') == 'other') ? 'show' : ''}} chosen_hiden chosen_other">
                      <div class="mb-3 form-group">
                        <label for="other_position" class="form-label">Which position do you want to apply?<span class="help-inline">*</span></label>
                          <div class="form-group">
                            <select class="form-select" aria-label="Default select example" id="other_position" name="other_position">
                              <option value="">Choose position</option>
                              @foreach ($positions as $position)
                                @if ( $position->role == 0)
                                  <option value="{{ $position->id }}" {{ old('other_position') == "$position->id" ? 'selected' : '' }}>
                                    {{ $position->positionname }}
                                  </option>
                                @endif
                              @endforeach
                              
                            </select>
                            <span class="help-inline other-error">@error('other_position'){{$message}}@enderror</span>
                        </div>
                      </div>
                      
                    </div>
          
                    <div class="mb-3 form-group">
                      <label for="reason" class="form-label">Why do you want to work at our school?<span class="help-inline">*</span></label>
                      <textarea  type="text" class="form-control" id="reason" name="reason">{{old('reason')}}</textarea>
                      <span class="help-inline">@error('reason'){{$message}}@enderror</span>
                    </div>
                    
                    <div class="mb-3 form-group">
                      <input class="form-check-input" type="checkbox" name="agree" id="agree" required 
                      {{ (old('agree')) ? 'checked' : ''}}/>
                        <label class="form-check-label" for="agree">
                          Agree terms & conditions of THFOS
                        </label>
                      
                    </div>
                <br/>
                    <div class="d-flex justify-content-around">
                          <button type="button" id="reset" class="btn btn-secondary mb-1 col-4">Reset</button>
                          <button type="submit" class="btn btn-success mb-1 col-4 submit">Submit</button>
                    </div>
                  
      
                  </form>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </section>
    

    <!-- //////////////////////footer///////////////////// -->
    @endsection