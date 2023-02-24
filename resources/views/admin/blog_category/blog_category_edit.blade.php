@extends('admin.admin_master')

@section('admin_content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Blog Category</h4>
                            <form action="{{ route('update.blog.category', $editBlogCategory->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $editBlogCategory->id }}">
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Portfolio Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text"
                                            value="{{ $editBlogCategory->blog_category }}" name="blog_category"
                                            id="name">
                                    </div>
                                </div>
                                <!-- end row -->
                                <input type="submit" class="btn btn-info wave-effect waves-light" value="Blog Category Update">
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
