@extends('template_backend')
@section('content')
        <div class="row d-flex justify-content-center align-items-center">
          <div class="col-lg-8 col-xl-6">
              <div class="card rounded-3">
                <div class="card-body">
                  <h3>Create Feedback</h3>
                  <form action="{{route('feedbacks.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                      <label for="blog title" class="form-label">Name</label>
                      <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                      <span class="help-inline">@error('name'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3">
                      <label for="course_id" class="form-label">Which class did you attend?</label>
                      <div class="form-group">
                        <select class="form-control form-control-md" aria-label="Default select example" name="batch_info_id">
                          <option selected value=" ">Choose Class</option>
                          @foreach ($batch_infos as $batch_info)
                            <option value="{{ $batch_info->id }}" {{ old('batch_info_id') == "$batch_info->id" ? 'selected' : '' }}>{{ $batch_info->course->coursename }} ({{ $batch_info->batch->batch_name }})</option>
                          @endforeach 
                        </select>
                        <span class="help-inline">@error('batch_info_id'){{$message}}@enderror</span>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="description" class="form-label">Feedback</label>
                      <textarea  type="text" class="form-control" name="feedback">{{old('feedback')}}</textarea>
                      <span class="help-inline">@error('description'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3">
                      <label for="Photo" class="form-label">Profile Photo</label>
                      <input id="image" name="image" type="file" class="form-control-file">
                      <span class="help-inline">@error('image'){{$message}}@enderror</span>
                    </div>
                    <input type="hidden" name="status" value="0" />
                    <div class="d-flex justify-content-around">
                      <a class="btn btn-secondary mb-1 col-4" href="{{url('feedbacks')}}">Back</a>
                      <button type="submit" class="btn btn-primary mb-1 col-4">Submit</button>
                </div>
                  </form>
                </div>
            </div>
          </div>
        </div>
 <script>
          $(document).ready(function() {
              $('#summernote').summernote({
                  height: 300
              });
          });
      </script>
      <script>
        $(document).ready(function() {
            $(document).on('submit', 'form', function() {
                $('button').attr('disabled', 'disabled');
            });
        });
        </script>
@endsection