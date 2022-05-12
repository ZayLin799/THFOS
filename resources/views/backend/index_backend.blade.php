@extends('template_backend')
@section('content')
	<div id="content">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Content Row -->
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <a href="{{url('active_classes')}}">
                        <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                     Available Classes</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $available_batchinfo}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <a href="{{url('feedbacks')}}">
                        <span class="position-absolute badge bg-warning" >{{$feedbacks}}</span>
                        <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Feedbacks
                                    </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $total_feedback }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comment-dots fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
            <!-- Total Students -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <a href="{{url('student')}}">
                        <span class="position-absolute badge bg-warning" >{{$students}}</span>
                        <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                    Students
                                    </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $total_student }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
            </div>

            <!-- Total Volunteers -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{url('volunteer')}}">
                    <div class="card border-left-info shadow h-100 py-2">
                        <span class="position-absolute badge bg-warning" >{{$volunteers}}</span>
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Volunteers
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total_volunteer}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <a href="{{url('blogs')}}">
                        <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Blogs</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total_blog}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="far fa-images fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <a href="{{url('position')}}">
                        <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                     Volunteer Positions</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_position}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-users-cog fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
             <!-- Total Blogs -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <a href="{{url('course')}}">
                        <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Courses</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total_course}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-book-open fa-2x text-gray-300" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
             <!-- Total Blogs -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-dark shadow h-100 py-2">
                    <a href="{{url('batch')}}">
                        <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                    Batches</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total_batch}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fab fa-bootstrap fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
        </div>
        <div class="container-fluid" >
            <div class="row">
                <div class="col-xl-6 col-md-6 mb-3">
                        <table class="table table-bordered text-center">
                            <thead>
                            <tr>
                            <th>No.</th>
                            <th>Available Classes</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; ?>

                                 @foreach( $available_batchinfos as  $available_batchinfo)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>
                                       {{$available_batchinfo->course->coursename}} (
                                       {{$available_batchinfo->batch->batch_name}}  )
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
            </div>
            <div class="col-xl-6 col-md-6 mb-3">
                        <table class="table table-bordered text-center">
                            <thead>
                            <tr>
                            <th>No.</th>
                            <th>Course Category Name</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; ?>

                                 @foreach( $categories as  $category)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>
                                       {{$category->course_category_name}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
            </div>
            </div>
        </div>
    <!-- /.container-fluid -->
        <div class="container-fluid" >
                <img src="backend/img/thfos_logo.png" width="30%" height="30%" style="display: block; margin-left: auto;margin-right: auto;">
        </div>
    </div>
@endsection