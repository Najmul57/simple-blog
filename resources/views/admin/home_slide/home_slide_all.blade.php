@extends('admin.admin_master')

@section('admin_content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Home Slide</h4>
                            <form action="{{route('update.slide')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$homeSlide->id}}">
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="title"
                                            value="{{ $homeSlide->title }}" id="name">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Short Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="short_title"
                                            value="{{ $homeSlide->short_title }}" id="name">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Video URL</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="video_url"
                                            value="{{ $homeSlide->video_url }}" id="name">
                                    </div>
                                </div>
                                <!-- end row --> 
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Home Slide</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="home_slide" name="home_slide"
                                            value="{{ $homeSlide->home_slide }}" id="name">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="show_image" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="show_image" class="rounded-circle avatar-lg"
                                            src="
                                            {{ (!empty($homeSlide->home_slide)) ? url($homeSlide->home_slide) : url('upload/no-image.png') }}"
                                            alt="profile image">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-info wave-effect waves-light" value="Update Profile">
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>

    <script src="{{ asset('backend') }}/assets/js/jquery-1.12.4.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#home_slide').change(function(e) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#show_image').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
