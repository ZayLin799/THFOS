@extends('template_backend')
@section('content')
     <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Positions </h6>
            </div>
            <div class="card-body">
                @if(session('success_message'))
                    <div class="alert alert-success">{{session('success_message')}}</div>
                @endif
                <a class="btn btn-primary" href="{{url('position/create')}}">
                    <i class="fas fa-plus"></i>
                        New Position
                </a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Position Name</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php $no=1; ?>
                        @foreach($positions as $position)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$position->positionname}}</td>
                                <td>
                                    @if($position->role==0)
                                    Other 
                                    @else
                                    Teacher
                                    @endif

                                </td>
                    <td>     
                    <table class='table table-borderless'>
                        <tr>
                            <td>
                                <a href="{{url('position/'.$position->id.'/edit')}}" class="btn btn-success" >
                                    <i class="far fa-edit"></i>
                                </a>
                            </td>
                           <!--  <td>
                                <form action="{{url('position/'.$position->id)}}" method="POST">
                    @csrf
                     @method('DELETE')
                    <button type="submit" class="btn btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this ')">
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