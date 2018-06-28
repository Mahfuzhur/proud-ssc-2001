@extend('admin_master')
@section('admin_main_content')

<!-- Start content -->
<div class="content">
    <div class="container-fluid">

        <!-- Page-Title -->        
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title">Edit Category</h4>
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="p-20">
                                <form class="form-horizontal" role="form" action="{{URL::to('/save-gallery-category-info/'.$single_category_info->category_id)}}" method="post">
                                    {{csrf_field()}}
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Name</label>
                                        <div class="col-10">
                                            <input type="text" name="name" class="form-control" value="{{$single_category_info->category_name}}" placeholder="Category Name" required="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Description</label>
                                        <div class="col-10">
                                            <textarea class="form-control" name="description" cols="4" rows="5" placeholder="Category Description" required="">{{$single_category_info->category_description}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Publication Status</label>
                                        <div class="col-10">
                                            <select class="form-control" name="publication_status" id="publication_status" required="publication_status">
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
	document.getElementById('publication_status').value = {{$single_category_info->publication_status}}
</script>
@endsection