@extends('template_backend')
@section('content')
     <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Courses </h6>
            </div>
            <div class="card-body">
                 @if(session('success_message'))
                    <div class="alert alert-success">{{session('success_message')}}</div>
                @endif
                <a class="btn btn-primary" href="{{url('course/create')}}">
                    <i class="fas fa-plus"></i>
                        New Course
                </a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Course Name</th>
                                <th>Course Type</th>
                                <th>Description</th>
                                <th>Duration</th>
                                <th>level</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php $no=1; ?>
                        @foreach($courses as $course)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$course->coursename}}</td>
                                <td>{{$course->course_category->course_category_name}}</td>
                                <td>
                                    <p> {!! $course->description !!} </p>
                                </td>
                                <td>{{$course->duration}}</td>
                                <td>{{$course->level}}</td>
                                <td>
                                    <img src="{{ asset('storage/img/' . $course->course_img) }}" width="100px" height="100px" />
                                </td>
                    <td>     
                    <table class='table table-borderless'>
                        <tr>
                            <td>
                                <a href="{{url('course/'.$course->id.'/edit')}}">
                                    <button type="submit" class="btn btn-success" title="Edit">
                                        <i class="far fa-edit"></i>
                                    </button>
                                </a>  
                            </td>
                            <!-- <td>
                                <form action="{{url('course/'.$course->id)}}" method="POST">
                                @csrf
                                 @method('DELETE')
                                <button type="submit" class="btn btn-danger" title="Delete">
                                 <i class="fas fa-trash"></i>
                                </button>
                                </form>
                            </td> -->
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