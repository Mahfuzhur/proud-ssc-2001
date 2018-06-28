@extend('admin_master')
@section('admin_main_content')

<!-- Start content -->
<div class="content">
    <div class="container-fluid">

        <!-- Page-Title -->        
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title">Edit Notice</h4>
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="p-20">
                                <form class="form-horizontal" role="form" action="{{URL::to('/update-notice-info/'.$single_notice_info->notice_id)}}" method="post">
                                    {{csrf_field()}}
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Title</label>
                                        <div class="col-10">
                                            <input type="text" name="title" class="form-control" value="{{$single_notice_info->notice_title}}" required="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Description</label>
                                        <div class="col-10">
                                            <textarea class="form-control" name="description" cols="4" rows="5" required="">{{$single_notice_info->notice_description}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Link</label>
                                        <div class="col-10">
                                            <input type="text" name="link" class="form-control" value="{{$single_notice_info->link}}" required="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Publication Status</label>
                                        <div class="col-10">
                                            <select class="form-control" id="publication_status" name="publication_status" required="">
                                                <option value="1">Publish</option>
                                                <option value="0">Unpublish</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-10">
                                            <button type="submit" class="btn btn-success">Update</button>
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
<script type="text/javascript">
    document.getElementById('publication_status').value = {{$single_notice_info->publication_status}}
</script>  
@endsection