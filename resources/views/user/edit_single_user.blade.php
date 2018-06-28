@extend('user_master')
@section('user_main_content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title">Edit Profile</h4>                  
                    <div class="row">
                        <div class="col-12">
                            <div class="p-20">
                            	
                                <form class="form-horizontal" id="update_user_profile_form" name="update_user_profile_form" role="form" action="{{URL::to('/update-user-profile/')}}" method="post">
                                	{{csrf_field()}}
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Name</label>
                                        <div class="col-10">
                                            <input type="text" name="name" class="form-control" value="{{$user_profile_info->name}}" placeholder="Enter Name" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
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
												<option value="">Select your board</option>
												<option value="Dhaka">Dhaka</option>
												<option value="Rajshahi">Rajshahi</option>
												<option value="Comilla">Comilla</option>
												<option value="Jessore">Jessore</option>
												<option value="Chittagong">Chittagong</option>
												<option value="Barisal">Barisal</option>
												<option value="Sylhet">Sylhet</option>
												<option value="Dinajpur">Dinajpur</option>
												<option value="Madrasah">Madrasah</option>
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
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Expertise</label>
                                        <div class="col-10">
                                            <input type="text" name="expertise" class="form-control" value="{{$user_profile_info->expertise}}" placeholder="Expertise" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Working Organisation</label>
                                        <div class="col-10">
                                            <input type="text" name="working_organisation" class="form-control" value="{{$user_profile_info->working_organisation}}" placeholder="orking Organisation" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
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
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Email</label>
                                        <div class="col-10">
                                            <input type="text" name="email" class="form-control" value="{{$user_profile_info->email}}" placeholder="Enter Email" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Your Image</label>
                                        <div class="col-10">
                                            <input type="file" name="user_image" class="form-control">
                                            <input type="hidden" name="exist_user_image" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Registration Card Image</label>
                                        <div class="col-10">
                                            <input type="file" name="reg_card_image" class="form-control">
                                            <input type="hidden" name="exist_reg_card_image" class="form-control">
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
    document.getElementById('board').value={{$user_profile_info->board}}
 </script>
@endsection