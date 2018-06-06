@extend('admin_master')
@section('admin_main_content')
<div class="content">
    <div class="container-fluid">                  
        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <h4 class="m-t-0 header-title">User Request List</h4><br>                                    
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
                            <th>Email</th>

                        </tr>
                        </thead>


                        <tbody>
                            @foreach($requested_user_info as $v_info)
                        <tr>
                            <td>{{$v_info->name}}</td>
                            <td>{{$v_info->school_name}}</td>
                            <td>{{$v_info->present_address}}</td>
                            <td>{{$v_info->mobile}}</td>
                            <td>{{$v_info->occupation}}</td>
                            <td>{{$v_info->working_organisation}}</td>
                            <td>{{$v_info->designation}}</td>
                            <td>{{$v_info->board}}</td>
                            <td>{{$v_info->email}}</td>
                            <td>
                                <form action="send" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" value="{{$v_info->id}}" name="id">
                                    <input type="hidden" value="{{$v_info->email}}" name="email">
                                    <button type="submit" value="send" class="btn btn-success btn-sm">Accept</button>
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