@extend('admin_master')
@section('admin_main_content')

<!-- Start content -->
<div class="content">
    <div class="container-fluid">

        <!-- Page-Title -->        
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title">Add Category</h4>
                    <h4 style="color: green; text-align: center;">
                      <?php
                        $category_success_message = Session::get('category_success_message');
                        if($category_success_message){
                          echo $category_success_message;
                          Session::put('category_success_message','');
                        }
                      ?>
                    </h4>

                    <h4 style="color: green; text-align: center;">
                      <?php
                        $update_category_success_message = Session::get('update_category_success_message');
                        if($update_category_success_message){
                          echo $update_category_success_message;
                          Session::put('update_category_success_message','');
                        }
                      ?>
                    </h4>
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="p-20">
                                <form class="form-horizontal" role="form" action="{{URL::to('/save-gallery-category-info')}}" method="post">
                                    {{csrf_field()}}
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Name</label>
                                        <div class="col-10">
                                            <input type="text" name="name" class="form-control" value="" placeholder="Category Name" required="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Description</label>
                                        <div class="col-10">
                                            <textarea class="form-control" name="description" cols="4" rows="5" placeholder="Category Description" required=""></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Publication Status</label>
                                        <div class="col-10">
                                            <select class="form-control" name="publication_status" required="">
                                                <option value="1">Publish</option>
                                                <option value="0">Unpublish</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-10">
                                            <button type="submit" class="btn btn-success">Add</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>
                    <!-- end row -->

                </div> <!-- end card-box -->
            </div><!-- end col -->
        </div>
        <!-- end row -->
    </div> <!-- container -->

</div> <!-- content -->
          
@endsection