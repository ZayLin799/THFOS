@extends('template_backend')
@section('content')
     <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Students </h6>
            </div>
            <div class="card-body">
                 @if(session('success_message'))
                    <div class="alert alert-success">{{session('success_message')}}</div>
                @endif
                <div class="row">
                    <div class="col-lg-6">
                        <a class="btn btn-primary" href="{{url('student/create')}}">
                            <i class="fas fa-plus"></i>
                                New Student
                        </a>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <a class="btn btn-primary" href="{{url('student')}}">
                                    Show All
                            </a>
                        </div>
                    </div>    
                    <div class="col-lg-4">    
                        <form action="{{ route('students.filter') }}" method="post" class="d-inline">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="col-lg-8 form-group">
                                    <select class="form-control form-control-md" aria-label="Default select example" name="batchinfo_id">
                                        <option selected>Choose Class</option>
                                        @foreach ($batch_infos as $batch_info) 
                                            <option value="{{ $batch_info->id }}">
                                                @foreach ($courses as $course)   
                                                    @if($batch_info->course_id == $course->id)                   
                                                        {{$course->coursename}} 
                                                    @endif 
                                                @endforeach 
                                                @foreach ($batches as $batch)   
                                                    @if($batch_info->batch_id == $batch->id)                   
                                                        ( {{$batch->batch_name}} )
                                                    @endif 
                                                @endforeach
                                            </option>
                                        @endforeach                               
                                    </select>
                                </div>
                                <div class="form-group">                          
                                    <button type="submit" class="btn btn-info">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                <hr>
                <div class="table-responsive">
                    
                    <table class="table table-bordered" width="100%" cellspacing="0" id="dataTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Status</th>
                                <th>Student Name</th>
                                <th>Viber Phone</th>
                                <th>Email</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Previous Level</th>
                                <th>Comment</th>
                                <th>Course</th>
                                <th>Batch</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php $no=1; ?>
                        @foreach($student_batch_infos as $student_batch_info)
                        <tr>
                            <td>{{$no++}}</td>
                            @foreach($students as $student)
                                @if ($student_batch_info->student_id == $student->id )
                                <td>
                                    @if($student->status == 0) 
                                         <a href="{{ route('confirmStudent', [$student->id,$student_batch_info->batch_info_id]) }}" class="btn btn-primary" >
                                             <input type="hidden" name="status" value="1" />
                                             <input type="hidden" value="{{$student_batch_info->batch_info_id}}" name="batch_info_id">
                                                 Confirm
                                         </a>    
                                     @else     
                                         <p class="text-primary">Confirmed</p>
                                     @endif
                                 </td>
                                    <td>{{$student->studentname}}</td>
                                    <td>{{$student->viberph}}</td>
                                    <td>{{$student->email}}</td>
                                    <td>{{$student->age}}</td>
                                    <td>{{$student->gender}}</td>
                                    <td>{{$student->previous_level}}</td>
                                    <td>{{$student->comment}}</td>
                                 
                                <td>    
                                    @foreach ($student->batch_infos as $batch_info)   
                                        @foreach ($courses as $course)   
                                            @if($batch_info->course_id == $course->id)                   
                                                {{$course->coursename}} 
                                            @endif 
                                        @endforeach  
                                    @endforeach  
                                </td>
                                <td>
                                    @foreach ($student->batch_infos as $batch_info)   
                                        @foreach ($batches as $batch)   
                                            @if($batch_info->batch_id == $batch->id)                   
                                                {{$batch->batch_name}} 
                                            @endif 
                                        @endforeach  
                                    @endforeach 
                                </td>
                                <td>
                                    <table class='table table-borderless'>
                                    <tr>
                                        <td>
                                        <a href="{{url('student/'.$student->id.'/edit')}}" class="btn btn-success" >
                                                <i class="far fa-edit"></i>
                                        </a> 
                                        </td>
                                        <td>
                                            <form action="{{url('student/'.$student->id)}}" method="POST" title="Delete">
                                                @csrf
                                                 @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this student')">
                                                 <i class="fas fa-trash"></i>
                                                </button>
                                            </form> 
                                        </td> 
                                    </tr>
                                </table>
                                </td>
                                @endif
                            @endforeach 
                            
                        </tr> 
                        @endforeach  
                    </table>  
                </div>
            </div>
        </div>
    </div>
    <script>
</script>
@endsection