@extend('admin_master')
@section('admin_main_content')
<div class="content">
    <div class="container-fluid">                  
        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="m-t-0 header-title">Gallery Image</h4>
                            @if(session('update_info'))
                            <div class="alert alert-success">
                              {{ session('update_info') }}
                            </div> 
                            @endif

                            @if(session('delete_info'))
                            <div class="alert alert-danger">
                              {{ session('delete_info') }}
                            </div> 
                            @endif
                        </div>
                        <div class="col-md-6">
                            <a href="{{URL::to('/add-gallery-image')}}"><button class="add_notice btn-primary">Add new</button></a>
                        </div>
                    </div>                                    
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                            <?php
                            $serial = 1;
                                foreach ($all_gallery_image as $v_gallery) {
                                    $image_path = 'gallery_images/'.$v_gallery->file_name;
                            ?>
                            <tr id="notice0">
                                <td>{{$serial}}</td>
                                <td><a href="{{asset($image_path)}}" target="_blank"><img src="{{asset($image_path)}}" class="img-responsive" style="height: 80px; width: 120px;"></a></td>
                                <td>{{$v_gallery->image_title}}</td>
                                <td>{{$v_gallery->category_name}}</td>
                                <td>
                                    <a href="{{URL::to('/admin-edit-gallery/'.$v_gallery->id)}}"><button id="notice_edit" class="btn-primary action-btn">Edit</button></a>
                                    <a href="{{URL::to('/admin-delete-gallery/'.$v_gallery->id)}}"><button id="notice_dlt" class="btn-danger action-btn" onclick="return check_delete()">Delete</button></a>
                                    <!-- <input class="action-btn" type="checkbox" checked data-toggle="toggle"> -->
                                    <!-- <?php
                                        if($v_gallery->id == 1){
                                    ?>
                                    <a href="{{URL::to('/change-notice-status/'.$v_gallery->id)}}"><button class="btn btn-success">Active</button></a>
                                    <?php
                                        }else{
                                    ?>
                                    <a href="{{URL::to('/change-notice-status/'.$v_gallery->id)}}"><button class="btn btn-warning">Inactive</button></a>
                                    <?php
                                        }
                                    ?> -->
                                </td>
                            </tr>

                            <?php
                            $serial++;
                                }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end row -->   

    </div> <!-- container -->

</div> <!-- content -->
 <style type="text/css">
            .add_notice {
                float: right;
                padding: 5px 23px;
                margin: 0px 15px 12px 0px;
            }
            .action-btn{
                padding: 6px 15px;
            }
        </style>
@endsection