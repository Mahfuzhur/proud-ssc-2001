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
            <div class="col-md-4 col-lg-3">
                <div class="profile-detail card-box">
                    <div>
                        <?php
                            $image_path = 'user_images/'.$current_user_info->user_image;
                        ?>
                        <img src="{{asset($image_path)}}" class="rounded-circle" alt="profile-image">

                        <ul class="list-inline status-list m-t-20">
                            <li class="list-inline-item">
                                <a href="{{URL::to('/single-user-info/'.$current_user_info->id)}}"><h3 class="text-primary m-b-5">Profile</h3></a>
                                <p class="text-muted">{{$current_user_info->name}}</p>
                            </li>
                            <li class="list-inline-item" id="change_password">
                                <button class="btn btn-primary" onclick="myFunction()">Change Password</button>
                            </li>
                        </ul>

                        <div id="password_form">
                            <span style="color: green; text-align: center;">
                              <?php
                                $update_password_message = Session::get('update_password_message');
                                if($update_password_message){
                                  echo $update_password_message;
                                  Session::put('update_password_message','');
                                }
                              ?>
                            </span>
                            <form class="form-horizontal m-t-20" action="{{URL::to('/change-password/'.$current_user_info->id)}}" method="post">
                                {{csrf_field()}}
                                    <label>Old Password</label>
                                    <input type="text" name="old_password" class="form-control" required="">
                                    <span style="color: red; text-align: center;">
                                      <?php
                                        $old_password_err = Session::get('old_password_err');
                                        if($old_password_err){
                                          echo $old_password_err;
                                          Session::put('old_password_err','');
                                        }
                                      ?>
                                    </span>
                                    <label>New Password</label>
                                    <input type="text" name="new_password" class="form-control" required="">
                                    <label>Confirm New Password</label>
                                    <input type="text" name="confirm_new_password" class="form-control" required=""><span style="color: red; text-align: center;">
                                      <?php
                                        $new_password_err = Session::get('new_password_err');
                                        if($new_password_err){
                                          echo $new_password_err;
                                          Session::put('new_password_err','');
                                        }
                                      ?>
                                    </span><br>
                                    <button type="submit" class="btn btn-success">Update</button>
                            </form>
                        </div>

                        <script>
                            function myFunction() {
                                var x = document.getElementById("password_form");
                                if (x.style.display === "none") {
                                    x.style.display = "block";
                                } else {
                                    x.style.display = "none";
                                }
                            }
                            </script>

                        <!-- <button type="button" class="btn btn-pink btn-custom btn-rounded waves-effect waves-light">Follow</button>

                        <hr>
                        <h4 class="text-uppercase font-18 font-600">About Me</h4>
                        <p class="text-muted font-13 m-b-30">
                            Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type.
                        </p>

                        <div class="text-left">
                            <p class="text-muted font-13"><strong>Full Name :</strong> <span class="m-l-15">Johnathan Deo</span></p>

                            <p class="text-muted font-13"><strong>Mobile :</strong><span class="m-l-15">(123) 123 1234</span></p>

                            <p class="text-muted font-13"><strong>Email :</strong> <span class="m-l-15">coderthemes@gmail.com</span></p>

                            <p class="text-muted font-13"><strong>Location :</strong> <span class="m-l-15">USA</span></p>

                        </div> -->


                        <!-- <div class="button-list m-t-20">
                            <button type="button" class="btn btn-facebook waves-effect waves-light">
                                <i class="fa fa-facebook"></i>
                            </button>

                            <button type="button" class="btn btn-twitter waves-effect waves-light">
                                <i class="fa fa-twitter"></i>
                            </button>

                            <button type="button" class="btn btn-linkedin waves-effect waves-light">
                                <i class="fa fa-linkedin"></i>
                            </button>

                            <button type="button" class="btn btn-dribbble waves-effect waves-light">
                                <i class="fa fa-dribbble"></i>
                            </button>

                        </div> -->
                    </div>

                </div>

            </div>


            <div class="col-lg-9 col-md-8">
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