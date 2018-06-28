@extent('latest_home_page_master')
@section('home_page_main_content')

<div class="col-md-9">
  <div class='main-content'>
    <div class="main-content-wrap">
    <div class="col-md-9">
     
      <div>
        <?php
            $user_image = 'user_images/'.$user_profile_info->user_image;
            $reg_card_image = 'user_images/'.$user_profile_info->reg_card_image;
            $user_id = Session::get('current_user_id');
            $id = Crypt::encrypt($user_id);
        ?>
        <div id="user-profile-2" class="user-profile">
          <div class="tabbable">
            <ul class="nav nav-tabs padding-18">
              <li>
                <a href="{{URL::to('/user-profile-info/'.$id)}}">
                  <i class="green ace-icon fa fa-user bigger-120"></i>
                  Profile
                </a>
              </li>
              <li class="active">
                <a href="{{URL::to('/edit-user-profile/'.$id)}}">
                  <i class="green ace-icon fa fa-user bigger-120"></i>
                  Edit Profile
                </a>
              </li>
     
            </ul><br>

            <div id="profile_edit_form" class="tab-content no-border padding-24">

              <!-- /#home -->
              <form class="form-horizontal" id="update_user_profile_form" name="update_user_profile_form" role="form" action="{{URL::to('/update-user-profile/'.$user_id)}}" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Name</label>
                        <div class="col-10">
                            <input type="text" name="name" class="form-control" value="{{$user_profile_info->name}}" placeholder="Enter Name" required="">
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                        <label class="col-2 col-form-label">School Name</label>
                        <div class="col-10">
                            <input type="text" name="school_name" class="form-control" value="{{$user_profile_info->school_name}}" placeholder="Enter School Name" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">College Name</label>
                        <div class="col-10">
                            <input type="text" name="college_name" class="form-control" value="{{$user_profile_info->college_name}}" placeholder="Enter College Name" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Are You GPA 5 Holder?</label>
                        <div class="col-10">
                          <label>Yes</label>
                          <input type="radio" name="gpa" value="5" <?php echo ($user_profile_info->gpa_5_holder==5)?'checked':'' ?> class="form-control" placeholder="" required="">
                          <label>No</label>
                          <input type="radio" name="gpa" value="4" <?php echo ($user_profile_info->gpa_5_holder==4)?'checked':'' ?> class="form-control" placeholder="" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Board</label>
                        <div class="col-10">
                            <select class="form-control" name="board" id="board" required="">
                              <option value="Dhaka"<?php if($user_profile_info->board == 'Dhaka') { ?> selected="selected"<?php } ?>>Dhaka</option>
                              <option value="Rajshahi"<?php if($user_profile_info->board == 'Rajshahi') { ?> selected="selected"<?php } ?>>Rajshahi</option>
                              <option value="Comilla"<?php if($user_profile_info->board == 'Comilla') { ?> selected="selected"<?php } ?>>Comilla</option>
                              <option value="Jessore"<?php if($user_profile_info->board == 'Jessore') { ?> selected="selected"<?php } ?>>Jessore</option>
                              <option value="Chittagong"<?php if($user_profile_info->board == 'Chittagong') { ?> selected="selected"<?php } ?>>Chittagong</option>
                              <option value="Barisal"<?php if($user_profile_info->board == 'Barisal') { ?> selected="selected"<?php } ?>>Barisal</option>
                              <option value="Sylhet"<?php if($user_profile_info->board == 'Sylhet') { ?> selected="selected"<?php } ?>>Sylhet</option>
                              <option value="Dinajpur"<?php if($user_profile_info->board == 'Dinajpur') { ?> selected="selected"<?php } ?>>Dinajpur</option>
                              <option value="Madrasah"<?php if($user_profile_info->board == 'Madrasah') { ?> selected="selected"<?php } ?>>Madrasah</option>
                             
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Present Address</label>
                        <div class="col-10">
                            <input type="text" name="present_address" class="form-control" value="{{$user_profile_info->present_address}}" placeholder="Present Address" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Present Police Station</label>
                        <div class="col-10">
                            <input type="text" name="present_police_station" class="form-control" value="{{$user_profile_info->present_police_station}}" placeholder="Present Police Station" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Present District</label>
                        <div class="col-10">
                            <input type="text" name="present_district" class="form-control" value="{{$user_profile_info->present_district}}" placeholder="Present District" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Parmanent Address</label>
                        <div class="col-10">
                            <input type="text" name="parmanent_address" class="form-control" value="{{$user_profile_info->parmanent_address}}" placeholder="Parmanent Address" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Parmanent Police Station</label>
                        <div class="col-10">
                            <input type="text" name="parmanemt_police_station" class="form-control" value="{{$user_profile_info->parmanent_police_station}}" placeholder="Parmanent Police Station" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Parmanent District</label>
                        <div class="col-10">
                            <input type="text" name="parmanent_district" class="form-control" value="{{$user_profile_info->parmanent_district}}" placeholder="Parmanent District" required="">
                        </div>
                    </div>
                   
                    <div class="form-group row">
                        <label class="col-2 col-form-label" for="example-email">Mobile Number</label>
                        <div class="col-10">
                            <input type="number" name="mobile" class="form-control" placeholder="Mobile Number" value="{{$user_profile_info->mobile}}" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Blood Gruop</label>
                        <div class="col-10">
                            <input type="text" name="blood_group" class="form-control" value="{{$user_profile_info->blood_group}}" placeholder="Blood Gruop" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Occupation</label>
                        <div class="col-10">
                            <input type="text" name="occupation" class="form-control" value="{{$user_profile_info->occupation}}" placeholder="Occupation" required="">
                        </div>
                    </div> -->
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Email</label>
                        <div class="col-10">
                            <input type="text" name="email" class="form-control" value="{{$user_profile_info->email}}" placeholder="Enter Email" required="">
                            <span style="color: red; text-align: center;">
                              <?php
                                $email_exits_error = Session::get('email_exits_error');
                                if($email_exits_error){
                                  echo $email_exits_error;
                                  Session::put('email_exits_error','');
                                }
                              ?>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Working Organisation</label>
                        <div class="col-10">
                            <input type="text" name="working_organisation" class="form-control" value="{{$user_profile_info->working_organisation}}" placeholder="orking Organisation" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Expertise</label>
                        <div class="col-10">
                            <input type="text" name="expertise" class="form-control" value="{{$user_profile_info->expertise}}" placeholder="Expertise" required="">
                        </div>
                    </div>
                    
                    <!-- <div class="form-group row">
                        <label class="col-2 col-form-label">Designation</label>
                        <div class="col-10">
                            <input type="text" name="designation" class="form-control" value="{{$user_profile_info->designation}}" placeholder="Designation" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Social Activites</label>
                        <div class="col-10">
                            <input type="text" name="social_activities" class="form-control" value="{{$user_profile_info->social_activities}}" placeholder="Social Activites" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Facebook Id</label>
                        <div class="col-10">
                            <input type="text" name="facebook_id" class="form-control" value="{{$user_profile_info->fb_id}}" placeholder="Facebook Id" required="">
                        </div>
                    </div> -->

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Your Image (Max 2MB)</label>
                        <a target="_blank" href="{{asset($user_image)}}"><img class="img-responsive pull-right" style="max-width: 100px;max-height: 100px;" src="{{asset($user_image)}}"></a>
                        <div class="col-10">
                            <input type="file" name="user_image" class="form-control">
                            <input type="hidden" name="exist_user_image" class="form-control" value="{{$user_profile_info->user_image}}">
                            <span style="color: red; text-align: center;">
                              <?php
                                $user_image_upload_error = Session::get('user_image_upload_error');
                                if($user_image_upload_error){
                                  echo $user_image_upload_error;
                                  Session::put('user_image_upload_error','');
                                }
                              ?>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Registration Card Image (Max 2MB)</label>
                        <a target="_blank" href="{{asset($reg_card_image)}}"><img class="img-responsive pull-right" style="max-width: 100px;max-height: 100px;" src="{{asset($reg_card_image)}}"></a>
                        <div class="col-10">
                            <input type="file" name="reg_card_image" class="form-control">
                            <input type="hidden" name="exist_reg_card_image" class="form-control" value="{{$user_profile_info->reg_card_image}}">
                            <span style="color: red; text-align: center;">
                              <?php
                                $user_reg_card_image_upload_error = Session::get('user_reg_card_image_upload_error');
                                if($user_reg_card_image_upload_error){
                                  echo $user_reg_card_image_upload_error;
                                  Session::put('user_reg_card_image_upload_error','');
                                }
                              ?>
                            </span>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <div class="col-10">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>                             

                </form>
              <!-- /#home -->

            </div>
          </div>
        </div>
        
      </div>

      <!--   user profile ended -->

    </div>
    </div>
  </div>
</div>


@endsection