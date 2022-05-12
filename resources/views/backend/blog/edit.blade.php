@extends('template_backend')
@section('content')
        <div class="row d-flex justify-content-center align-items-center">
          <div class="col-lg-8 col-xl-6">
              <div class="card rounded-3">
                <div class="card-body">
                  <h3>Edit Blog</h3>
                  <form action="{{route('blogs.update',$blog->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                      <label for="blog title" class="form-label">Blog Title</label>
                      <input type="text" class="form-control" id="blog_title" name="blog_title" value="{{$blog->blog_title}}">
                      <span class="help-inline">@error('blog_title'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3">
                      <label for="description" class="form-label">Blog Description</label>
                      <textarea  type="text" class="summernote" id="summernote" name="description" >{{$blog->description}}</textarea>
                      <span class="help-inline">@error('description'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3">
                      <label for="Photo" class="form-label">Photo</label>
                      <img src="{{asset('storage/img/' . $blog->blog_img)}}" height="100" width="100">
                      <input type="file" name="blog_img" value="{{ old('blog_img') ?? $blog->blog_img}}">
                      <input type="hidden" name="blog_img" value="{{$blog->blog_img}}">
                      <span class="help-inline">@error('blog_img'){{$message}}@enderror</span>
                    </div>
                    <div class="d-flex justify-content-around">
                      <a class="btn btn-secondary mb-1 col-4" href="{{url('blogs')}}">Back</a>
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