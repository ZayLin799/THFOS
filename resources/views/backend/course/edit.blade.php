@extends('template_backend')
@section('content')
<div class="row d-flex justify-content-center align-items-center">
  <div class="col-lg-8 col-xl-6">
      <div class="card rounded-3">
        <div class="card-body">
                  <h3>Edit Course</h3>
                  <form action="{{route('course.update',$course->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                      <label for="course name" class="form-label">Course Name</label>
                      <input type="text" class="form-control" id="coursename" name="coursename" value="{{$course->coursename}}">
                      <span class="help-inline">@error('coursename'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3">
                      <label for="course_category_id" class="form-label">Category</label>
                      <div class="form-group">
                        <select class="form-control form-control-md" aria-label="Default select example" id="course_category_id" name="course_category_id">
                          <option selected value="">Choose Category</option>
                          @foreach ($course_categories as $course_category)
                            <option value="{{ $course_category->id }}" {{$course->course_category_id == $course_category->id  ? 'selected' : ''}}>
                              {{ $course_category->course_category_name }}
                            </option>
                          @endforeach 
                        </select>
                        <span class="help-inline">@error('course_category_id'){{$message}}@enderror</span>
                      </div>
                      
                    </div>
                    <div class="mb-3">
                      <label for="description" class="form-label">Description</label>
                      <textarea  type="summernote" class="form-control" id="summernote" name="description">{{$course->description}}</textarea>
                      <span class="help-inline">@error('description'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3">
                      <label for="duration" class="form-label">Class Duration</label>
                       <input type="text" class="form-control" id="duration" name="duration" value="{{$course->duration}}">
                       <span class="help-inline">@error('duration'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3">
                      <label for="level" class="form-label">Level Must Have</label>
                       <input type="text" class="form-control" id="level" name="level" value="{{$course->level}}">
                       <span class="help-inline">@error('level'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3">
                      <label for="Photo" class="form-label">Photo</label>
                      <img src="{{asset('storage/img/' . $course->course_img)}}" height="100" width="100">
                      <input type="file" name="course_img" value="{{ old('course_img') ?? $course->course_img}}">
                      <input type="hidden" name="course_img" value="{{$course->course_img}}">
                      <span class="help-inline">@error('course_img'){{$message}}@enderror</span>
                    </div>
                    <div class="d-flex justify-content-around">
                    <a href="{{url('course')}}" class="btn btn-secondary mb-1 col-4">Back</a>
                    <button type="submit" class="btn btn-primary mb-1 col-4">Change</button>
                  </div>
                  </form>
                </div>
            </div>
          </div>
        </div>
        <script>
          $(document).ready(function() {
              $('#summernote').summernote({
                  height: 80
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