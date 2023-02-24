@extends('admin.admin_master')

@section('admin_content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Footer Page</h4>
                            <form action="{{ route('update.footer') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $footer->id }}">
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Number</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="number" name="number"
                                            value="{{ $footer->number }}" id="name">
                                    </div>
                                </div>  <!-- end row -->
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Short Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="short_description" rows="5" class="form-control" id="short_description">{{ $footer->short_description }}</textarea>
                                    </div>
                                </div> <!-- end row -->
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="address"
                                            value="{{ $footer->address }}" id="name">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="email" name="email"
                                            value="{{ $footer->email }}" id="name">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Facebook</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="facebook"
                                            value="{{ $footer->facebook }}" id="name">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Twitter</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="twitter"
                                            value="{{ $footer->twitter }}" id="name">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Copyright</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="copyright"
                                            value="{{ $footer->copyright }}" id="name">
                                    </div>
                                </div>
                                <!-- end row -->
                                <input type="submit" class="btn btn-info wave-effect waves-light" value="Update Footer">
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
