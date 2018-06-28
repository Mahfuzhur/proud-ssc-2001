@extend('admin_master')
@section('admin_main_content')
<div class="content">
    <div class="container-fluid">                  
        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <h4 class="m-t-0 header-title">Registered User List</h4><br>                                    
                    <table id="datatable" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Registration Card</th>
                            <th>Details</th>
                            <th>Action</th>
                            
                        </tr>
                        </thead>


                        <tbody>
                            @foreach($registered_user_info as $v_info)
                        <tr>
                            <?php
                                $image_path = 'user_images/'.$v_info->user_image;
                                $reg_card_image_path = 'user_images/'.$v_info->reg_card_image;
                            ?>
                            <td><a href="{{asset($image_path)}}" target="_blank"><img src="{{asset($image_path)}}" class="rounded-circle thumb-md" alt="profile-image"></a></td>
                            <td>{{$v_info->name}}</td>
                            <td>{{$v_info->email}}</td>
                            <td><a href="{{asset($image_path)}}" target="_blank"><img src="{{asset($reg_card_image_path)}}" class="rounded-circle thumb-md" alt="profile-image"></a></td>
                            <td><a href="{{URL::to('/admin-single-user-info/'.$v_info->id)}}">View Details</a></td>
                            <td>
                                <form action="{{URL::to('/suspend-user')}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" value="{{$v_info->id}}" name="id">
                                    <button type="submit" value="send" class="btn btn-danger btn-sm">Suspend</button>
                                </form>
                            </td>
                            
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end row -->   

    </div> <!-- container -->

</div> <!-- content -->
@endsection