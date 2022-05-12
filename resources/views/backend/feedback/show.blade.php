@extends('template_backend')
@section('content')
     <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Feedbacks </h6>
            </div>
            <div class="card-body">
                <a class="btn btn-primary" href="{{url('feedbacks/create')}}">
                    <i class="fas fa-plus"></i>
                        Add Feedback
                </a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Status</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Feedback</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php $no=1; ?>
                        @foreach($feedbacks as $feedback)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>
                                     @if($feedback->status == 0) 
                                         <a href="{{ route('uploadFeedback', $feedback->id) }}" class="btn btn-primary" >
                                             <input type="hidden" name="status" value="1" />
                                                 Upload
                                         </a>    
                                     @else     
                                         <p class="text-primary">Uploaded</p>
                                     @endif
                                </td>
                                <td>{{$feedback->name}}</td>
                                <td>
                                    {{$feedback->batch_info->course->coursename}}
                                    ( {{$feedback->batch_info->batch->batch_name}} )
                                </td>
                                <td>
                                    <p> {{$feedback->feedback}} </p>
                                </td>
                                @if ($feedback->image=='a')
                                    <td>
                                        <img src=
                                        "{{URL::asset('https://i.pinimg.com/564x/f1/da/a7/f1daa70c9e3343cebd66ac2342d5be3f.jpg?fbclid=IwAR05hUtNLlMrn9nKCsA8vSOKLBRKKW9Yuvui3TYItr6kzYiveEv5FbwBygw')}}"
                                        width="100px" height="100px" />
                                    </td>
                                @else
                                    <td>
                                        <img src="{{ asset('storage/img/'.$feedback->image) }}" width="100px" height="100px" />
                                    </td>
                                @endif
                                <td>
                                    <form action="{{url('feedbacks/'.$feedback->id)}}" method="POST">
                                    @csrf
                                     @method('DELETE')
                                    <button type="submit" class="btn btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this ')">
                                     <i class="fas fa-trash"></i>
                                    </button>
                                </form>
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