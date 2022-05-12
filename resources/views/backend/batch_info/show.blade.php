@extends('template_backend')
@section('content')
     <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Classes </h6>
            </div>
            <div class="card-body">
                 @if(session('success_message'))
                    <div class="alert alert-success">{{session('success_message')}}</div>
                @endif
                <div class="row">
                    <div class="col-lg-6">
                        <a class="btn btn-primary" href="{{url('batch_info/create')}}">
                            <i class="fas fa-plus"></i>
                                New Class
                        </a>
                    </div>  
                    <div class="col-lg-3">
                      <label for="course_id" class="form-label">Classes Filter</label>
                      <div class="form-group">
                        <select onchange="window.location.href=this.value;" class="form-control form-control-md" aria-label="Default select example" name="filter">
                            <option selected>Search Classes</option>
                            <option value="{{url('batch_info')}}">All Classes</option>
                            <option value="{{url('active_classes')}}">Active Classes</option>
                            <option value="{{url('inactive_classes')}}">Inactive Classes</option>
                        </select>
                        </div>
                    </div>                  
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%"cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Course Name</th>   
                                <th>Batch Name</th>
                                <th>Avaliable Student</th>
                                <th>Start Date</th>
                                <th>Achieve Class</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach($batch_infos as $batch_info)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$batch_info->course->coursename}}</td>
                                <td>{{$batch_info->batch->batch_name}}</td>
                                <td>{{$batch_info->avaliable_student}}</td>
                                <td>{{$batch_info->start}}</td>
                                <td> 
                                     @if($batch_info->status == 1) 
                                         <a href="{{ route('completedUpdate', $batch_info->id) }}" class="btn btn-primary" >
                                            <input type="hidden" name="status" value="1" />
                                                <i class="fas fa-check"></i>
                                            </a>    
                                    @else 
                                    <button disabled="disabled" class="btn btn-primary">
                                            <input type="hidden" name="status" value="1" />
                                                <i class="fas fa-check"></i>
                                   </button>
                                    @endif
                                </td>
                                 <td>
                                    @if($batch_info->status == 1) 
                                        <p class="text-success">Active</p> 
                                    @else     
                                        <p class="text-secondary">Inactive</p>
                                    @endif
                                </td>
                                <td>
                                    <table class='table table-borderless'>
                                    <tr>
                                        <td>
                                            <a href="{{url('batch_info/'.$batch_info->id.'/edit')}}" class="btn btn-success" >
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </td>
                                        <!-- <td>
                                             <form action="{{url('batch_info/'.$batch_info->id)}}" method="POST" title="Delete">
                                                @csrf
                                                 @method('DELETE')
                                                <button type="submit" class="btn btn-danger" >
                                                 <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td> -->
                                        <td>
                                            @if ($batch_info->status == 1)
                                            <a href="{{url('studentRegister/'.$batch_info->id)}}" class="btn btn-primary w-100" title="Add Student" >
                                                <i class="fas fa-user-plus"></i>
                                                Student
                                            </a>
                                            @else
                                            <button disabled="disabled" class="btn btn-primary w-100">
                                                <i class="fas fa-user-plus"></i>
                                                Student
                                            </button>
                                            @endif
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