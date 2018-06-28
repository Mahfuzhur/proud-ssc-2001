@extend('admin_master')
@section('admin_main_content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<!-- Start content -->
<div class="content">
    <div class="container-fluid">

        <!-- Page-Title -->        
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title">Edit Image</h4>
                   @if (count($errors) > 0)
                    <div class="alert alert-danger">
                      <strong>Whoops!</strong> There were some problems with your input.<br><br>
                      <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                    @endif
                    
                    <div class="row">
                        <div class="col-8">
                            <div class="p-20">
                                <form class="form-horizontal" role="form" action="{{URL::to('/admin-save-gallery-image/'.$single_image_info->id)}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="input-group control-group increment" >
                                      <label>Title:</label>
                                        <input type="text" name="image_title" class="form-control" placeholder="Image title" value="{{$single_image_info->image_title}}"><br>
                                        <label>Category</label>
                                        <select name="image_category" id="image_category" class="form-control" style="height: 40px;">
                                          <?php
                                            foreach ($all_category_info as $v_category) {
                                          ?>
                                          <option value="{{$v_category->category_id}}">{{$v_category->category_name}}</option>
                                          <?php
                                            }
                                          ?>
                                        </select>
                                      <br>
                                      <label>Image</label>
                                      <?php
                                        $image_path = 'gallery_images/'.$single_image_info->file_name;
                                      ?>
                                        <a href="{{asset($image_path)}}" target="_blank"><img src="{{asset($image_path)}}" class="img-responsive" style="height: 100px; width: 150px;float: right;"></a>
                                        <input type="file" name="filename" class="form-control">
                                        <input type="hidden" name="exits_filename" class="form-control" value="{{$single_image_info->file_name}}">
                                      
                                      <!-- <div class="input-group-btn"> 
                                        <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                      </div> -->
                                    </div>
                                    

                                    <button type="submit" class="btn btn-primary" style="margin-top:10px">Update</button>

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
  document.getElementById('image_category').value = {{$single_image_info->category_id}}
</script>
          
@endsection