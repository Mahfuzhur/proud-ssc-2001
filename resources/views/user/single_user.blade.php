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
                    <?php
                        $image_path = 'user_images/'.$single_user_info->user_image;
                    ?>
                    <div>
                        <img src="{{asset($image_path)}}" class="rounded-circle" alt="profile-image">

                        <ul class="list-inline status-list m-t-20">
                            <li class="list-inline-item">
                                <h3 class="text-primary m-b-5">{{$single_user_info->name}}</h3>
                                <!-- <p class="text-muted">{{$single_user_info->name}}</p> -->
                            </li>                                        
                        </ul>
<!-- 
                        <button type="button" class="btn btn-pink btn-custom btn-rounded waves-effect waves-light">Follow</button>

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

                        </div>


                        <div class="button-list m-t-20">
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
                     <h5>Details Information</h5><hr>
                    <div class="row">
                        <table style="font-size: 18px; margin-left: 15px;">
                            <tbody>
                                
                                <tr>
                                    <td>Name:</td>
                                    <td>&nbsp;</td>
                                    <td>{{$single_user_info->name}}</td>
                                </tr>
                                <tr>
                                    <td>School:</td>
                                    <td>&nbsp;</td>
                                    <td>{{$single_user_info->school_name}}</td>
                                </tr>
                                <tr>
                                    <td>College:</td>
                                    <td>&nbsp;</td>
                                    <td>{{$single_user_info->college_name}}</td>
                                </tr>
                                <tr>
                                    <td>GPA:</td>
                                    <td>&nbsp;</td>
                                    <td>{{$single_user_info->gpa_5_holder}}</td>
                                </tr>
                                
                                <tr>
                                    <td>Board:</td>
                                    <td>&nbsp;</td>
                                    <td>{{$single_user_info->board}}</td>
                                </tr>
                                <tr>
                                    <td>Present Address:</td>
                                    <td>&nbsp;</td>
                                    <td>{{$single_user_info->present_address}}</td>
                                </tr>
                                <tr>
                                    <td>Present Police Station:</td>
                                    <td>&nbsp;</td>
                                    <td>{{$single_user_info->present_police_station}}</td>
                                </tr>
                                <tr>
                                    <td>Present district:</td>
                                    <td>&nbsp;</td>
                                    <td>{{$single_user_info->present_district}}</td>
                                </tr>
                                <tr>
                                    <td>Permanent Address:</td>
                                    <td>&nbsp;</td>
                                    <td>{{$single_user_info->parmanent_address}}</td>
                                </tr>
                                <tr>
                                    <td>Permanent Police Station:</td>
                                    <td>&nbsp;</td>
                                    <td>{{$single_user_info->parmanent_police_station}}</td>
                                </tr>
                                <tr>
                                    <td>Permanent District:</td>
                                    <td>&nbsp;</td>
                                    <td>{{$single_user_info->parmanent_district}}</td>
                                </tr>
                                <tr>
                                    <td>Blood Group:</td>
                                    <td>&nbsp;</td>
                                    <td>{{$single_user_info->blood_group}}</td>
                                </tr>
                                <tr>
                                    <td>Occupation:</td>
                                    <td>&nbsp;</td>
                                    <td>{{$single_user_info->occupation}}</td>
                                </tr>
                                <tr>
                                    <td>Expertise:</td>
                                    <td>&nbsp;</td>
                                    <td>{{$single_user_info->expertise}}</td>
                                </tr>
                                <tr>
                                    <td>Working Organisation:</td>
                                    <td>&nbsp;</td>
                                    <td>{{$single_user_info->working_organisation}}</td>
                                </tr>
                                <tr>
                                    <td>Social Activities:</td>
                                    <td>&nbsp;</td>
                                    <td>{{$single_user_info->social_activities}}</td>
                                </tr>
                                <tr>
                                    <td>Designation:</td>
                                    <td>&nbsp;</td>
                                    <td>{{$single_user_info->designation}}</td>
                                </tr>
                                <tr>
                                    <td>Facebook ID:</td>
                                    <td>&nbsp;</td>
                                    <td>{{$single_user_info->fb_id}}</td>
                                </tr>
                                
                                
                            </tbody>
                        </table>
                    </div>

                </form>
                
            </div>

        </div>

    </div> <!-- container -->

</div> <!-- content -->
@endsection