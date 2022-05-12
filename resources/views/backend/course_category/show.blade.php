@extends('template_backend')
@section('content')
     <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Course Categories </h6>
            </div>
            <div class="card-body">
                 @if(session('success_message'))
                    <div class="alert alert-success">{{session('success_message')}}</div>
                @endif
                <a class="btn btn-primary" href="{{url('category/create')}}">
                    <i class="fas fa-plus"></i>
                        New Course Category
                </a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Course Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php $no=1; ?>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$category->course_category_name}}</td>
                    <td>     
                    <table class='table table-borderless'>
                        <tr>
                            <td>
                                <a href="{{url('create_course/'.$category->id)}}">
                                    <button type="submit" class="btn btn-info" title="Create">
                                        <i class="fas fa-plus"></i>Add Course
                                    </button> 
                                </a>
                            </td>
                            <td>
                                <a href="{{url('category/'.$category->id.'/edit')}}">
                                    <button type="submit" class="btn btn-success" >
                                        <i class="far fa-edit"></i>
                                    </button>   
                                </a>
                            </td>
                           <!--  <td>
                                <form action="{{url('category/'.$category->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" >
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