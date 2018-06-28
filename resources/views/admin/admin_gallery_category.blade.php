@extend('admin_master')
@section('admin_main_content')
<div class="content">
    <div class="container-fluid">                  
        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="m-t-0 header-title">Gallery Category</h4>
                        </div>
                        <div class="col-md-6">
                            <a href="{{URL::to('/add-gallery-category')}}"><button class="add_notice btn-primary">Add new</button></a>
                        </div>
                    </div>                                    
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Category Name</th>
                                <th>Category Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                            <?php
                            $serial = 1;
                                foreach ($all_category_info as $v_category) {
                                
                            ?>
                            <tr id="notice0">
                                <td>{{$serial}}</td>
                                <td>{{$v_category->category_name}}</td>
                                <td>{{$v_category->category_description}}</td>
                                <td>
                                    <a href="{{URL::to('/edit-gallery-category/'.$v_category->category_id)}}"><button id="notice_edit" class="btn-primary action-btn">Edit</button></a>
                                    <a href="{{URL::to('/delete-gallery-category/'.$v_category->category_id)}}"><button id="notice_dlt" class="btn-danger action-btn" onclick="return check_delete()">Delete</button></a>
                                    <!-- <input class="action-btn" type="checkbox" checked data-toggle="toggle"> -->
                                    <?php
                                        if($v_category->publication_status == 1){
                                    ?>
                                    <a href="{{URL::to('/change-gallery-category-status/'.$v_category->category_id)}}"><button class="btn btn-success">Active</button></a>
                                    <?php
                                        }else{
                                    ?>
                                    <a href="{{URL::to('/change-gallery-category-status/'.$v_category->category_id)}}"><button class="btn btn-warning">Inactive</button></a>
                                    <?php
                                        }
                                    ?>
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