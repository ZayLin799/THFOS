@extends('template_backend')
@section('content')
     <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Batches </h6>
            </div>
            <div class="card-body">
                 @if(session('success_message'))
                    <div class="alert alert-success">{{session('success_message')}}</div>
                @endif
                <a class="btn btn-primary" href="{{url('batch/create')}}">
                    <i class="fas fa-plus"></i>
                        New Batch
                </a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%"cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Batch Name</th>
                                <th>Add New Class</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach($batches as $batch)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$batch->batch_name}}</td>
                                <td>
                                <form action="{{url('batchinfo/'.$batch->id)}}" method="GET">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn btn-info" title="Create">
                                        <i class="fas fa-plus"></i>New Class
                                    </button>   
                                </form>
                            </td>
                                <td>
                                    <table class='table table-borderless'>
                                    <tr>
                                        <!-- <td>
                                            <form action="{{url('batch/'.$batch->id)}}" method="POST" title="Delete">
                                                @csrf
                                                 @method('DELETE')
                                                <button type="submit" class="btn btn-danger" >
                                                 <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td> -->

                                         <td>
                                            <a href="{{url('batch/'.$batch->id.'/edit')}}" class="btn btn-success" >
                                                <i class="far fa-edit"></i>
                                            </a> 
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