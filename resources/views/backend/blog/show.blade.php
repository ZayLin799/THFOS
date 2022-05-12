@extends('template_backend')
@section('content')
     <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Blogs </h6>
            </div>
            <div class="card-body">
                 @if(session('success_message'))
                    <div class="alert alert-success">{{session('success_message')}}</div>
                @endif
                <a class="btn btn-primary" href="{{url('blogs/create')}}">
                    <i class="fas fa-plus"></i>
                        New Blog
                </a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Blog Title</th>
                                <th>Description</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php $no=1; ?>
                        @foreach($blogs as $blog)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$blog->blog_title}}</td>
                                <td>
                                    <p> {!! $blog->description !!} </p>
                                </td>
                                <td>
                                    <img src="{{ asset('storage/img/' . $blog->blog_img) }}" width="100px" height="100px" />
                                </td>
                    <td>     
                    <table class='table table-borderless'>
                        <tr>
                            <td>
                                <a href="{{url('blogs/'.$blog->id.'/edit')}}">
                                    <button type="submit" class="btn btn-success">
                                        <i class="far fa-edit"></i>
                                    </button>
                                </a>
                            </td>
                            <td>
                                <form action="{{url('blogs/'.$blog->id)}}" method="POST">
                    @csrf
                     @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this')">
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