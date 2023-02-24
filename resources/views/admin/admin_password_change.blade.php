@extends('admin.admin_master')

@section('admin_content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Password Change</h4>

                            @if (count($errors))
                                @foreach($errors->all() as $error)
                                    <p class="alert alert-danger alert-dismissable fade show">{{$error}}</p>
                                @endforeach
                            @endif

                            <form action="{{route('update.password')}}" method="post">
                                @csrf
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Old Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" name="oldpassword"
                                            id="oldpassword" placeholder="Old Password">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" name="newpassword"
                                            id="newpassword" placeholder="New Password">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Confirm Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" name="confirm_password"
                                            id="confirm_password" placeholder="Confirm Password">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-info wave-effect waves-light" value="Change Password">
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
