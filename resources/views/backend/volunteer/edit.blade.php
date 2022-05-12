@extends('template_backend')
@section('content')
     {{-- @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
        @endforeach --}}
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-8 col-xl-6">
              <div class="card rounded-3">
                <div class="card-body">
                  <h3>Edit Volunteer Registration</h3>
                  <form action="{{route('volunteer.update',$volunteer->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3 form-group">
                      <label for="volunteername" class="form-label">Name</label>
                      <input type="text" class="form-control" id="volunteername" name="volunteername" value="{{$volunteer->volunteername}}">
                      <span class="help-inline">@error('volunteername'){{$message}}@enderror</span>
                      
                    </div>
                    <div class="mb-3 form-group">
                      <label for="viberph" class="form-label">Viber Phone</label>
                      <input type="text" class="form-control" id="viberph" name="viberph" value="{{$volunteer->viberph}}">
                      <span class="help-inline">@error('viberph'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3 form-group">
                      <label for="email" class="form-label">E-mail</label>
                      <input type="text" class="form-control" id="email" name="email" value="{{$volunteer->email}}">
                      <span class="help-inline">@error('email'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3 form-group">
                      <label for="age" class="form-label">Age</label>
                      <input type="number" class="form-control" id="age" name="age" value="{{$volunteer->age}}">
                      <span class="help-inline">@error('age'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3 form-group">
                      <label class="form-label" for="gender">Gender</label>
                      <br>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="gender" id="male" value="male" {{ ($volunteer->gender=="male") ? 'checked' : ''}}>
                          <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="gender" id="female" value="female" {{ ($volunteer->gender=="female")  ? 'checked' : ''}}>
                          <label class="form-check-label" for="female">Female</label>
                        </div>
                        <br>
                    
                          <span class="help-inline">@error('gender'){{$message}}@enderror</span>
                    </div>
                    
                    <div class="mb-3 form-group">
                          <label for="skill" class="form-label">Skills</label>
                          <input type="text" class="form-control" id="skill" name="skill" value="{{$volunteer->skill}}">
                          <span class="help-inline">@error('skill'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3 form-group">
                          <label for="education" class="form-label">Background Education</label>
                          <input type="text" class="form-control" id="education" name="education" value="{{$volunteer->education}}">
                          <span class="help-inline">@error('education'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3 form-group">
                          <label for="experience" class="form-label">Experience</label>
                          <input type="text" class="form-control" id="experience" name="experience" value="{{$volunteer->experience}}">
                          <span class="help-inline">@error('experience'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3 form-group">
                          <label for="tele_name" class="form-label">Telegram Nickname</label>
                          <input type="text" class="form-control" id="tele_name" name="tele_name" value="{{$volunteer->tele_name}}">
                          <span class="help-inline">@error('tele_name'){{$message}}@enderror</span>
                    </div>
  
                    <div class="mb-3 form-group">
                      
                      <label class="form-label" for="pos">Which option do you want to apply?</label>
                      <br>
                        <div class="form-check form-check-inline">
                          @if($volunteer->position->role == '1')
                          <input class="form-check-input" type="radio" name="pos" id="teacher" value="teacher" checked>
                          @else
                          <input class="form-check-input" type="radio" name="pos" id="teacher" value="teacher" >
                           @endif
                          <label class="form-check-label" for="teacher">Teacher</label>
                        </div>
                        <div class="form-check form-check-inline">
                          @if($volunteer->position->role != '1')
                          <input class="form-check-input" type="radio" name="pos" id="other" value="other" checked>
                          @else
                          <input class="form-check-input" type="radio" name="pos" id="other" value="other" >
                          @endif
                          <label class="form-check-label" for="other">Other</label>
                        </div>
                        <br>
                          <span class="help-inline">@error('pos'){{$message}}@enderror</span>
                    </div>

                    <div class=" collapse {{ ($volunteer->position->role == '1') ? 'show' : ''}} chosen_hiden chosen_teacher">

                        <div class="mb-3 form-group">
                          <label for="teacher_role" class="form-label">Which teacher role do you want to apply?</label>
                            <div class="form-group">
                              <select class="form-control form-control-md" aria-label="Default select example" id="teacher_role" name="teacher_role">
                                <option value="">Choose teacher role</option>
                                @foreach ($positions as $position)
                                  @if ( $position->role == 1)
                                    <option value="{{ $position->id }}" {{ $volunteer->position_id  == "$position->id" ? 'selected' : '' }}>
                                      {{ $position->positionname }}
                                    </option>
                                  @endif
                                @endforeach
                              </select>
                              <span class="help-inline teacher-error">@error('teacher_role'){{$message}}@enderror</span>
                            </div>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="v_course_id" class="form-label">Which course do you want to teach?</label>
                          <div class="form-group">
                            <select class="form-control form-control-md" aria-label="Default select example" id="v_course_id" name="v_course_id" data-dependent="subject">
                                <option value="">Choose course</option>
                              @foreach ($v_courses as $v_course)

                                <option value="{{ $v_course->id }}" {{ $v_course->id ? 'selected' : '' }}>
                                  {{ $v_course->v_course_name }}
                                </option>
                              @endforeach
                            </select>
                            <span class="help-inline teacher-error">@error('v_course_id'){{$message}}@enderror</span>
                          </div>
                        </div>
                          <div class=" collapse {{ (old('v_course_id')) ? 'show' : ''}}" id="v_course_sub">
                            <label class="form-label">Choose (at least one) subjects or level:</label>
                            
                            <div id="subject">
                              {{ csrf_field() }}
                              <span class="help-inline teacher-error">@error('subject'){{$message}}@enderror</span>
                              <br>
                            </div>
                          </div>
                          
                        <div class="mb-3 form-group">
                            <label for="teaching_time" class="form-label">What time do you want to teach your chosen
                            class.?</label>
                            <input type="text" class="form-control" id="teaching_time" name="teaching_time" value="{{$volunteer->teaching_time}}">
                            <span class="help-inline teacher-error">@error('teaching_time'){{$message}}@enderror</span>
                        </div>
                    </div>
                    
                    <div class=" collapse {{ ($volunteer->position->role == '0') ? 'show' : ''}} chosen_hiden chosen_other">
                      <div class="mb-3 form-group">
                        <label for="other_position" class="form-label">Which position do you want to apply?</label>
                          <div class="form-group">
                            <select class="form-control form-control-md" aria-label="Default select example" id="other_position" name="other_position">
                              <option value="">Choose position</option>
                              @foreach ($positions as $position)
                                @if ( $position->role == 0)
                                  <option value="{{ $position->id }}" {{ $volunteer->position_id == "$position->id" ? 'selected' : '' }}>
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
                      <label for="reason" class="form-label">Why do you want to work at our school?</label>
                      <textarea  type="text" class="form-control" id="reason" name="reason">{{$volunteer->reason}}</textarea>
                      <span class="help-inline">@error('reason'){{$message}}@enderror</span>
                    </div>
                    <br/> 


                    <div class="d-flex justify-content-around">
                          <a class="btn btn-secondary mb-1 col-4" href="{{url('volunteer')}}">Back</a>
                          <button type="submit" class="btn btn-primary mb-1 col-4">Submit</button>
                    </div>
                  </form>
              </div>
            </div>
          </div>
        </div>
       <!--  <script type="text/javascript">
        
          function show()
          {
            for(let i=0; i <= document.getElementsByClassName('a').length; i++)
            {
              document.getElementsByClassName('a')[i].classList.add('d-none');
            }

          }
          function hide()
          {
            for(let i=0; i <= document.getElementsByClassName('a').length; i++)
            {
              document.getElementsByClassName('a')[i].classList.remove('d-none');
            }
          }
        </script> -->
        <script>

          $(document).ready(function() {
              $(document).on('submit', 'form', function() {
                  $('button').attr('disabled', 'disabled');
              });
          });
          </script>
@endsection