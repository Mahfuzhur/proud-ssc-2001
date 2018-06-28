@extend('user_master')
@section('user_main_content')
<div class="content">
    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Profile</h4><br>
            </div>
        </div>


        <div class="row">
            


            <div class="col-lg-12 col-md-12">
                <form method="post" class="card-box">
                    
                <div class="card-box table-responsive">
                    <h3 class="m-t-0 header-title">User List</h3>                                   
                    <table id="datatable" class="table">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>School</th>
                            <th>Address</th>
                            <th>Organisation</th>
                            <th>Designation</th>
                            <th>Board</th>
                            <th>Details</th>
                            
                        </tr>
                        </thead>


                        <tbody>
                            @foreach($all_user_info as $v_info)
                        <tr>
                            <?php
                                $image_path = 'user_images/'.$v_info->user_image;
                            ?>
                            <td><img src="{{asset($image_path)}}" class="rounded-circle thumb-md" alt="profile-image"></td>
                            <td>{{$v_info->name}}</td>
                            <td>{{$v_info->school_name}}</td>
                            <td>{{$v_info->present_address}}</td>
                            <td>{{$v_info->working_organisation}}</td>
                            <td>{{$v_info->designation}}</td>
                            <td>{{$v_info->board}}</td>
                            <td><a href="{{URL::to('/single-user-info/'.$v_info->id)}}">Details</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>                
                </form>
                
            </div>

        </div>

    </div> <!-- container -->

</div> <!-- content -->
@endsection