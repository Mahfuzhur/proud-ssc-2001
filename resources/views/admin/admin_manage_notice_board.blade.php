@extend('admin_master')
@section('admin_main_content')
<div class="content">
    <div class="container-fluid">                  
        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="m-t-0 header-title">Notice Board</h4>
                        </div>
                        <div class="col-md-6">
                            <a href="{{URL::to('/add-notice')}}"><button class="add_notice btn-primary">Add new</button></a>
                        </div>
                    </div>                                    
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Link</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                            <?php
                                foreach ($all_publish_notice as $v_notice) {
                                
                            ?>
                            <tr id="notice0">
                                <td>{{$v_notice->notice_title}}</td>
                                <td>{{$v_notice->notice_description}}</td>
                                <td>{{$v_notice->link}}</td>
                                <td>
                                    <a href="{{URL::to('/edit-notice/'.$v_notice->notice_id)}}"><button id="notice_edit" class="btn-primary action-btn">Edit</button></a>
                                    <a href="{{URL::to('/delete-notice/'.$v_notice->notice_id)}}"><button id="notice_dlt" class="btn-danger action-btn" onclick="return check_delete()">Delete</button></a>
                                    <!-- <input class="action-btn" type="checkbox" checked data-toggle="toggle"> -->
                                    <?php
                                        if($v_notice->publication_status == 1){
                                    ?>
                                    <a href="{{URL::to('/change-notice-status/'.$v_notice->notice_id)}}"><button class="btn btn-success">Active</button></a>
                                    <?php
                                        }else{
                                    ?>
                                    <a href="{{URL::to('/change-notice-status/'.$v_notice->notice_id)}}"><button class="btn btn-warning">Inactive</button></a>
                                    <?php
                                        }
                                    ?>
                                </td>
                            </tr>

                            <?php
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