@extends('admin.admin_master')

@section('admin_content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Profile</h4>
                            <form action="{{ route('store.profile') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="name"
                                            value="{{ $adminEdit->name }}" id="example-text-input">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="email"
                                            value="{{ $adminEdit->email }}" id="example-text-input">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="image" class="col-sm-2 col-form-label">Profile Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" name="profile_image" id="image">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="show_image" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="show_image" class="rounded-circle avatar-lg"
                                            src="
                                        {{ !empty($adminEdit->profile_image) ? url('upload/admin_images/' . $adminEdit->profile_image) : url('upload/no-image.png') }}"
                                            alt="profile image">
                                    </div>
                                </div>
                                <!-- end row -->
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
