@extends('admin.admin_master')

@section('admin_content')
    <style type="text/css">
        .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: #b70000;
            font-weight: 700px;
        }
    </style>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Update Blog Page</h4>
                            <form action="{{ route('update.blog',$blogs->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$blogs->id}}">
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Blog Category Name</label>
                                    <div class="col-sm-10">
                                        <select name="" id="" class="form-select">
                                            <option selected="">Select Category</option>
                                            @foreach ($categoris as $cat)
                                                <option value="{{ $cat->id }}" {{$cat->id == $blogs->blog_category_id ? 'selected' : '' }}>{{ $cat->blog_category }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Blog Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="{{$blogs->blog_title}}" name="blog_title" id="name"
                                            placeholder="Blog Title">

                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Blog Tags</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="blog_tags" value="{{$blogs->blog_tags}}"
                                            data-role="tagsinput" id="name">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Blog Description</label>
                                    <div class="col-sm-10">
                                        <textarea id="elm1" class="form-control" name="blog_description">{!! $blogs->blog_description !!}</textarea>
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="image" type="file" name="blog_image">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="show_image" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="show_image" class="rounded-circle avatar-lg"
                                            src="{{asset($blogs->blog_image)}}" alt="profile image">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-info wave-effect waves-light" value="Portfolio Add">
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>

    <script src="{{ asset('backend') }}/assets/js/jquery-1.12.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#show_image').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
