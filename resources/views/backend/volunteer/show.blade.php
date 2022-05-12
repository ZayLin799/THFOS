@extends('template_backend')
@section('content')
     <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Volunteers </h6>
            </div>
            <div class="card-body">
                 @if(session('success_message'))
                    <div class="alert alert-success">{{session('success_message')}}</div>
                @endif
                <div class="row">
                    <div class="col-lg-6">
                        <a class="btn btn-primary" href="{{url('volunteer/create')}}">
                            <i class="fas fa-plus"></i>
                                New Volunteer
                        </a>
                    </div>
                    <div class="col-lg-3">
                      <label for="course_id" class="form-label">Volunteer Filter</label>
                      <div class="form-group">
                        <select onchange="window.location.href=this.value;" class="form-control form-control-md" aria-label="Default select example" name="filter">
                            <option selected>Search Volunteer</option>
                            <option value="{{url('volunteer')}}">Show All</option>
                            <option value="{{url('active_volunteer')}}">Confirmed</option>
                            <option value="{{url('inactive_volunteer')}}">Unconfirm</option>
                        </select>
                        </div>
                </div> 
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Status</th>
                                <th>Name</th>
                                <th>Viber-ph</th>
                                <th>Skill</th>
                                <th>Email</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Education</th>
                                <th>Experience</th>
                                <th>Tele_name</th>
                                <th>Reason</th>
                                <th>Subject</th>
                                <th>Teaching_time</th>
                                <th>Course</th>
                                <th>Position</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php $no=1; ?>
                        @foreach($volunteers as $volunteer)
                            <tr>
                                <td>{{$no++}}</td>
                                 <td>
                                   @if($volunteer->status == 0) 
                                        <a href="{{ route('confirmVolunteer', $volunteer->id) }}" class="btn btn-primary" >
                                            <input type="hidden" name="status" />
                                                Confirm
                                        </a>    
                                    @else     
                                        <p class="text-primary">Confirmed</p>
                                    @endif
                                </td>
                                <td>{{$volunteer->volunteername}}</td>
                                <td>{{$volunteer->viberph}}</td>
                                <td>{{$volunteer->skill}}</td>
                                <td>{{$volunteer->email}}</td>
                                <td>{{$volunteer->age}}</td>
                                <td>{{$volunteer->gender}}</td>
                                <td>{{$volunteer->education}}</td>
                                <td>{{$volunteer->experience}}</td>
                                <td>{{$volunteer->tele_name}}</td>
                                <td>{{$volunteer->reason}}</td>
                                <td>{{$volunteer->subject}}</td>
                                <td>{{$volunteer->teaching_time}}</td>

                                <td>
                                    @foreach ($v_courses as $v_course)
                                      @if ($v_course->id == $volunteer->v_course_id)
                                        {{ $v_course->v_course_name }}
                                      @endif
                                    @endforeach    
                                </td>

                                <td>
                                    @foreach ($positions as $position)
                                      @if ($position->id == $volunteer->position_id)
                                        {{ $position->positionname }}
                                      @endif
                                    @endforeach    
                                </td>

                                <td>
                                    @foreach ($positions as $position)
                                      @if ($position->id == $volunteer->position_id)
                                        @if($position->role==0)
                                            Other 
                                        @else
                                            Teacher
                                        @endif
                                      @endif
                                    @endforeach    
                                </td>
                    <td>     
                    <table class='table table-borderless'>
                        <tr>
                            <td>
                                <a href="{{url('volunteer/'.$volunteer->id.'/edit')}}">
                                    <button type="submit" class="btn btn-success" title="Edit">
                                        <i class="far fa-edit"></i>
                                    </button>
                                </a>
                            </td>
                            <td>
                                <form action="{{url('volunteer/'.$volunteer->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this volunteer')">
                                    <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </table>    
                             </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection 