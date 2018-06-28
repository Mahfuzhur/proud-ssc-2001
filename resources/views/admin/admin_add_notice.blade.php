@extend('admin_master')
@section('admin_main_content')

<!-- Start content -->
<div class="content">
    <div class="container-fluid">

        <!-- Page-Title -->        
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title">Add New Notice</h4>
                    <h4 style="color: green; text-align: center;">
                      <?php
                        $notice_success_message = Session::get('notice_success_message');
                        if($notice_success_message){
                          echo $notice_success_message;
                          Session::put('notice_success_message','');
                        }
                      ?>
                    </h4>
                    <h4 style="color: green; text-align: center;">
                      <?php
                        $notice_update_success_message = Session::get('notice_update_success_message');
                        if($notice_update_success_message){
                          echo $notice_update_success_message;
                          Session::put('notice_update_success_message','');
                        }
                      ?>
                    </h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="p-20">
                                <form class="form-horizontal" role="form" action="{{URL::to('/save-notice-info')}}" method="post">
                                    {{csrf_field()}}
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Title</label>
                                        <div class="col-10">
                                            <input type="text" name="title" class="form-control" value="" placeholder="Notice Title" required="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Description</label>
                                        <div class="col-10">
                                            <textarea class="form-control" name="description" cols="4" rows="5" placeholder="Notice Description" required=""></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Link</label>
                                        <div class="col-10">
                                            <input type="text" name="link" class="form-control" value="" placeholder="notice Link" required="">
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