@extends('admin.admin_master')

@section('admin_content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Multi Image</h4>
                            <form action="{{ route('update.multi.image') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$allMultiImage->id}}">
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">About Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="image" type="file" name="multi_image"
                                            multiple>
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="show_image" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="show_image" class="rounded-circle avatar-lg"
                                            src="{{ asset($allMultiImage->multi_image) }}" alt="profile image">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-info wave-effect waves-light" value="Update About">
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
