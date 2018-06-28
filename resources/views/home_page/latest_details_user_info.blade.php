@extent('latest_home_page_master')
@section('home_page_main_content')

<div class="col-md-9">
  <div class='main-content'>

    <div class="col-md-9">
     
      <div>

        <div id="user-profile-2" class="user-profile">
          <div class="tabbable">
            <ul class="nav nav-tabs padding-18">
              <li class="active">
                <a data-toggle="tab" href="#home">
                  <i class="green ace-icon fa fa-user bigger-120"></i>
                  Profile
                </a>
              </li>
     
            </ul>

            <div class="tab-content no-border padding-24">

              <!-- /#home -->
              <div id="home" class="tab-pane in active">
                <div class="row">
                  <div class="col-xs-12 col-sm-3 center">
                    <?php
                        $image_path = 'user_images/'.$detils_user_info->user_image;
                    ?>
                    <span class="profile-picture">
                      <img class="editable img-responsive" alt=" Avatar" id="avatar2" src="{{asset($image_path)}}" style="width: 200px;height: 150px;">
                    </span>

                    <div class="space space-4"></div>

                   
                    <!-- <a href="#" class="btn btn-sm btn-block btn-message">
                      <i class="ace-icon fa fa-envelope-o bigger-110"></i>
                      <span class="bigger-110">Send a message</span>
                    </a> -->
                  </div><!-- /.col -->

                  <div class="col-xs-12 col-sm-9">
                    <h4 class="blue">
                      <span class="middle">{{$detils_user_info->name}}</span>

                      <span class="label label-purple arrowed-in-right">
                        <i class="ace-icon fa fa-circle smaller-80 align-middle"></i>
                        online
                      </span>
                    </h4>

                    <div class="profile-user-info">
                      <div class="profile-info-row">
                        <div class="profile-info-name"> School Name </div>

                        <div class="profile-info-value">
                          <span>{{$detils_user_info->school_name}}</span>
                        </div>
                      </div>

                      <div class="profile-info-row">
                        <div class="profile-info-name"> College Name </div>

                        <div class="profile-info-value">
                          <span>{{$detils_user_info->college_name}}</span>
                        </div>
                      </div>

                      <div class="profile-info-row">
                        <div class="profile-info-name"> Board </div>

                        <div class="profile-info-value">
                          <span>{{$detils_user_info->board}}</span>
                        </div>
                      </div>

                      <div class="profile-info-row">
                        <div class="profile-info-name"> Location </div>

                        <div class="profile-info-value">
                          <i class="fa fa-map-marker light-orange bigger-110"></i>
                          {{$detils_user_info->present_address}}
                        </div>
                      </div>

                      <div class="profile-info-row">
                        <div class="profile-info-name"> Blood Group </div>

                        <div class="profile-info-value">
                          <span>{{$detils_user_info->blood_group}}</span>
                        </div>
                      </div>

                      <div class="profile-info-row">
                        <div class="profile-info-name"> Occupation </div>

                        <div class="profile-info-value">
                          <span> {{$detils_user_info->occupation}}</span>
                        </div>
                      </div>

                      <div class="profile-info-row">
                        <div class="profile-info-name"> Working Organisation </div>

                        <div class="profile-info-value">
                          <span> {{$detils_user_info->working_organisation}}</span>
                        </div>
                      </div>

                      <div class="profile-info-row">
                        <div class="profile-info-name"> Designation  </div>

                        <div class="profile-info-value">
                          <span>{{$detils_user_info->designation}}</span>
                        </div>
                      </div>

                      <div class="profile-info-row">
                        <div class="profile-info-name"> Social Activities </div>

                        <div class="profile-info-value">
                          <span>{{$detils_user_info->social_activities}}</span>
                        </div>
                      </div>

                    </div>

                    <div class="hr hr-8 dotted"></div>

                    <!-- <div class="profile-user-info">

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