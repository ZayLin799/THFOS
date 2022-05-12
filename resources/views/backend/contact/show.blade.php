@extends('template_backend')
@section('content')
     <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Contacts </h6>
            </div>
            <div class="card-body">
                 @if(session('success_message'))
                    <div class="alert alert-success">{{session('success_message')}}</div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject/Title</th>
                                <th>About Us</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php $no=1; ?>
                        @foreach($contacts as $contact)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->subject}}</td>
                                <td>{{$contact->message}}</td>
                                <td>
                                    <form action="{{url('contact/'.$contact->id)}}" method="POST">
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