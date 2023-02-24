@extends('admin.admin_master')

@section('admin_content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Blog Category</h4>
                            <form action="{{ route('store.blog.category') }}" method="post" >
                                @csrf
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Blog Category</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="blog_category" id="name" placeholder="Enter Blog Category">
                                    </div>
                                </div>
                                <!-- end row -->
                                <input type="submit" class="btn btn-info wave-effect waves-light" value="Blog Category Add">
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
