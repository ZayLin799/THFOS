@extends('template_backend')
@section('content')
        <div class="row d-flex justify-content-center align-items-center">
          <div class="col-lg-8 col-xl-6">
              <div class="card rounded-3">
                <div class="card-body">
                  <h3>Create Batch</h3>
                  <form action="{{route('batch.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                      <label for="batch name" class="form-label">Batch Name</label>
                      <input type="text" class="form-control" id="batch_name" name="batch_name" value="{{old('batch_name')}}">
                      <span class="help-inline">@error('batch_name'){{$message}}@enderror</span>
                    </div>
                    <div class="d-flex justify-content-around">
                    <a href="{{url('batch')}}" class="btn btn-secondary mb-1 col-4">Back</a>
                    <button type="submit" class="btn btn-primary mb-1 col-4">Submit</button>
                  </div>
                  </form>
                </div>
            </div>
          </div>
        </div>
        <script>
          $(document).ready(function() {
              $(document).on('submit', 'form', function() {
                  $('button').attr('disabled', 'disabled');
              });
          });
          </script>
@endsection