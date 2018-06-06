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
                            <th>Name</th>
                            <th>School</th>
                            <th>Address</th>
                            <th>Mobile</th>
                            <th>Occupation</th>
                            <th>Organisation</th>
                            <th>Designation</th>
                            <th>Board</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                            @foreach($registered_user_info as $v_info)
                        <tr>
                            <td>{{$v_info->name}}</td>
                            <td>{{$v_info->school_name}}</td>
                            <td>{{$v_info->present_address}}</td>
                            <td>{{$v_info->mobile}}</td>
                            <td>{{$v_info->occupation}}</td>
                            <td>{{$v_info->working_organisation}}</td>
                            <td>{{$v_info->designation}}</td>
                            <td>{{$v_info->board}}</td>
                            <td>
                                <a href=""><i class="md md-edit" title="Edit"></i></a>
                                <a href=""><i class="md md-close" title="Delete"></i></a>
                                <a href="" title="View Details">Profile</a>
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