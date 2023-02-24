@extends('admin.admin_master')

@section('admin_content')
    <div class="page-content">
        <div class="container-fluid">


            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <center> <br><br>
                            <img class="rounded-circle avatar-lg" src="
                            {{(!empty($adminData->profile_image)) ? url('upload/admin_images/'.$adminData->profile_image):url('upload/no-image.png')}}"
                                alt="profile image">
                        </center>
                        <div class="card-body">
                            <h4 class="card-title">Name : {{ $adminData->name }}</h4>
                            <hr>
                            <h4 class="card-title">User Email : {{ $adminData->email }}</h4>
                            <hr>

                            <a href="{{ route('edit.profile') }}"
                                class="btn btn-info btn-rounded wave-effect wave-light">Edit Profile</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
