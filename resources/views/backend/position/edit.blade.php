@extends('template_backend')
@section('content')
     @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
        @endforeach
        <div class="row d-flex justify-content-center align-items-center">      
          <div class="col-lg-8 col-xl-6">
            <div class="card rounded-3">
              <div class="card-body">
                  <h3>Edit Volunteer Position</h3>
                  <form action="{{route('position.update',$position->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 form-group">
                      <label class="form-label" for="role">Role</label>
                      <br>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="role" id="teacher" value="1" {{ ($position->role=="1") ? 'checked' : ''}}>
                          <label class="form-check-label" for="teacher">Teacher</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="role" id="other" value="0" {{ ($position->role=="0") ? 'checked' : ''}}>
                          <label class="form-check-label" for="other">Other</label>
                        </div>
                        <br>
                          <span class="help-inline">@error('role'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3">
                      <label for="positionname" class="form-label">Position Name</label>
                      <input type="text" class="form-control" id="positionname" name="positionname" value="{{$position->positionname}}">
                      <span class="help-inline">@error('positionname'){{$message}}@enderror</span>
                    </div>
                    <div class="d-flex justify-content-around">
                      <a class="btn btn-secondary mb-1 col-4" href="{{url('position')}}">Back</a>
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