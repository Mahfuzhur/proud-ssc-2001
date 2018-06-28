@extent('latest_home_page_master')
@section('home_page_main_content')

<div class="col-md-9">
  <div class='main-content'>

    <div class="col-md-9">
     
      <div>
        <?php
            $image_path = 'user_images/'.$user_profile_info->user_image;
            $user_id = Session::get('current_user_id');
            $id = Crypt::encrypt($user_id);
        ?>
        <div id="user-profile-2" class="user-profile">
          <div class="tabbable">
            <ul class="nav nav-tabs padding-18">
              <li class="active">
                <a href="{{URL::to('/user-profile-info/'.$id)}}">
                  <i class="green ace-icon fa fa-user bigger-120"></i>
                  Profile
                </a>
              </li>
              <li>
                <a href="{{URL::to('/edit-user-profile/'.$id)}}">
                  <i class="green ace-icon fa fa-user bigger-120"></i>
                  Edit Profile
                </a>
              </li>
     
            </ul>
            <h4 style="color: Green; text-align: center;">
              <?php
                $profile_update_message = Session::get('profile_update_message');
                if($profile_update_message){
                  echo $profile_update_message;
                  Session::put('profile_update_message','');
                }
              ?>
            </h4>
            <div class="tab-content no-border padding-24">

              <!-- /#home -->
              <div id="home" class="tab-pane in active">
                <div class="row">
                  <div class="col-xs-12 col-sm-3 center">
                    
                    <span class="profile-picture">
                      <img class="editable img-responsive" alt=" Avatar" id="avatar2" src="{{asset($image_path)}}" style="width: 200px;height: 150px;">
                    </span>

                    <div class="space space-4"></div>

                   
                    <a href="#" class="btn btn-sm btn-block btn-message">
                      <span class="bigger-110" onclick="myFunction()">Change Password</span><br>
                    </a><br>
                    <span style="color: green; text-align: center;">
                          <?php
                            $update_password_message = Session::get('update_password_message');
                            if($update_password_message){
                              echo $update_password_message;
                              Session::put('update_password_message','');
                            }
                          ?>
                        </span>
                        <span style="color: red; text-align: center;">
                          <?php
                            $old_password_err = Session::get('old_password_err');
                            if($old_password_err){
                              echo $old_password_err;
                              Session::put('old_password_err','');
                            }
                          ?>
                        </span>
                        <span style="color: red; text-align: center;">
                          <?php
                            $new_password_err = Session::get('new_password_err');
                            if($new_password_err){
                              echo $new_password_err;
                              Session::put('new_password_err','');
                            }
                          ?>
                        </span>
                    <div id="password_form" style="display: none;">
                        
                        <form class="form-horizontal m-t-20" action="{{URL::to('/change-password/'.$user_id)}}" method="post">
                            {{csrf_field()}}
                                <label>Old Password</label>
                                <input type="text" name="old_password" class="form-control" required="">
                                <label>New Password</label>
                                <input type="text" name="new_password" class="form-control" required="">
                                <label>Confirm New Password</label>
                                <input type="text" name="confirm_new_password" class="form-control" required=""><br>
                                <button type="submit" class="btn btn-sm btn-block btn-message">Update</button>
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
                    
                  </div><!-- /.col -->

                  <div class="col-xs-12 col-sm-9">
                    <h4 class="blue">
                      <span class="middle">{{$user_profile_info->name}}</span>

                      <span class="label label-purple arrowed-in-right">
                        <i class="ace-icon fa fa-circle smaller-80 align-middle"></i>
                        online
                      </span>
                    </h4>

                    <div class="profile-user-info">
                      <div class="profile-info-row">
                        <div class="profile-info-name"> School Name </div>

                        <div class="profile-info-value">
                          <span>{{$user_profile_info->school_name}}</span>
                        </div>
                      </div>

                      <div class="profile-info-row">
                        <div class="profile-info-name"> College Name </div>

                        <div class="profile-info-value">
                          <span>{{$user_profile_info->college_name}}</span>
                        </div>
                      </div>

                      <div class="profile-info-row">
                        <div class="profile-info-name"> Board </div>

                        <div class="profile-info-value">
                          <span>{{$user_profile_info->board}}</span>
                        </div>
                      </div>

                      <div class="profile-info-row">
                        <div class="profile-info-name"> Location </div>

                        <div class="profile-info-value">
                          <i class="fa fa-map-marker light-orange bigger-110"></i>
                          {{$user_profile_info->present_address}}
                        </div>
                      </div>

                      <div class="profile-info-row">
                        <div class="profile-info-name"> Mobile </div>

                        <div class="profile-info-value">
                          {{$user_profile_info->mobile}}
                        </div>
                      </div>

                      <div class="profile-info-row">
                        <div class="profile-info-name"> Email </div>

                        <div class="profile-info-value">
                          {{$user_profile_info->email}}
                        </div>
                      </div>

                      <div class="profile-info-row">
                        <div class="profile-info-name"> Blood Group </div>

                        <div class="profile-info-value">
                          <span>{{$user_profile_info->blood_group}}</span>
                        </div>
                      </div>

                      <div class="profile-info-row">
                        <div class="profile-info-name"> Occupation </div>

                        <div class="profile-info-value">
                          <span> {{$user_profile_info->occupation}}</span>
                        </div>
                      </div>

                      <div class="profile-info-row">
                        <div class="profile-info-name"> Working Organisation </div>

                        <div class="profile-info-value">
                          <span> {{$user_profile_info->working_organisation}}</span>
                        </div>
                      </div>

                      <div class="profile-info-row">
                        <div class="profile-info-name"> Designation  </div>

                        <div class="profile-info-value">
                          <span>{{$user_profile_info->designation}}</span>
                        </div>
                      </div>

                      <div class="profile-info-row">
                        <div class="profile-info-name"> Social Activities </div>

                        <div class="profile-info-value">
                          <span>{{$user_profile_info->social_activities}}</span>
                        </div>
                      </div>

                    </div>

                    <!-- <div class="hr hr-8 dotted"></div>

                    <div class="profile-user-info">

                      <div class="profile-info-row">
                        <div class="profile-info-name">
                          <i class="middle ace-icon fa fa-facebook-square bigger-150 blue"></i>
                        </div>

                        <div class="profile-info-value">
                          <a href="#">Find me on Facebook</a>
                        </div>
                      </div>

                    </div> -->
                  </div><!-- /.col -->
                </div><!-- /.row -->

                <div class="space-20"></div>

               
              </div>
              <!-- /#home -->

            </div>
          </div>
        </div>
        
      </div>

      <!--   user profile ended -->

    </div>

  </div>
</div>


@endsection