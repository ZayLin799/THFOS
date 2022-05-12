@extends('template')
@section('content')

        
        
    <!-- //////////////////////Student Registration///////////////////// -->
    <section class="register-page" id="change_nav">
      <div class="container py-5">
        <div class="row d-flex justify-content-center align-items-center">
          <div class="col-lg-8 col-xl-6">
            <div class="card rounded-3">
              <img src="{{asset ('frontend/images/feedback-header.jpg')}}" class="w-100" style="height: 200px; object-fit: cover; border-top-left-radius: .3rem; border-top-right-radius: .3rem;" alt="Sample photo">
              <div class="card-body p-4 p-md-5">
                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2 text-center">Feedback Form</h3>
    
                @if(session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                @endif
                
                <form class="px-md-2" action={{url('/feedback')}} method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('POST')
                <div class="mb-3 form-group">
                    <label for="image" class="form-label">Profile Photo</label>
                    <input id="image" name="image" type="file" class="form-control-file">
                    <span class="help-inline">@error('image'){{$message}}@enderror</span>
                  </div>
                  <input type="hidden" name="status" value="0" />

                  <div class="mb-3 form-group">
                    <label for="blog title" class="form-label">Name<span class="help-inline">*</span></label>
                      <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                      <span class="help-inline">@error('name'){{$message}}@enderror</span>
                    
                  </div>
                  <div class="mb-3 form-group">
                    <label for="batch_info_id" class="form-label">Which class did you attend?<span class="help-inline">*</span></label>
                      <div class="form-group">
                        <select class="form-select" aria-label="Default select example" name="batch_info_id">
                          <option value=''>Choose Class</option>
                          @foreach ($batch_infos as $batch_info)
                          <option value="{{$batch_info->id}}" {{ old('batch_info_id') == "$batch_info->id" ? 'selected' : '' }}>
                            {{ $batch_info->course->coursename }} ({{ $batch_info->batch->batch_name }})
                          </option>
                          @endforeach 
                        </select>
                        <span class="help-inline">@error('batch_info_id'){{$message}}@enderror</span>
                      </div>
                  </div>
                  <div class="mb-3 form-group">
                    <label for="feedback" class="form-label">Feedback<span class="help-inline">*</span></label>
                      <textarea type="text" rows="5" class="form-control" id="feedback" name="feedback">{{old('feedback')}}</textarea>
                      <span class="help-inline">@error('feedback'){{$message}}@enderror</span>
                  </div>
                  
                  <br/>
                  <div class="d-flex justify-content-around">
                    <button type="reset" class="btn btn-secondary mb-1 col-4">Reset</button>
                    <button type="submit" class="btn btn-success mb-1 col-4">Submit</button>
                  </div>
    
                </form>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script>
      $(document).ready(function() {
          $(document).on('submit', 'form', function() {
              $('button').attr('disabled', 'disabled');
          });
      });
      </script>

    <!-- //////////////////////footer///////////////////// -->
    @endsection