@extends('admin.admin_master')

@section('admin_content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Multi Images</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Multi Images</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">All Multi Images</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Multi Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php($i=1)
                                @foreach ($allimages as $key=> $item)
                                <tr>
                                    <td>{{$i++}}</td>
                                   <td><img src="{{asset($item->multi_image)}}" width="80px" alt=""></td>
                                    <td>
                                        <a href="{{route('edit.multi.image',$item->id)}}" class="btn btn-info sm"><i class="fa fa-edit"></i></a>    
                                        <a href="{{route('delete.multi.image',$item->id)}}" id="delete" class="btn btn-danger sm"><i class="fa fa-trash"></i></a>    
                                    </td>
                                </tr>
                                @endforeach
                            
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- container-fluid -->
</div>
@endsection