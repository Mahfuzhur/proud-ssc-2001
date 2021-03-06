<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- <link rel="shortcut icon" href="assets/images/favicon.ico"> -->

        <title>User | Dashboard</title>

        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />

        <script src="{{asset('assets/js/modernizr.min.js')}}"></script>


    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="{{asset('/')}}" class="logo"><i class="icon-magnet icon-c-logo"></i><span>Dashboard</a>
                        <!-- Image Logo here -->
                        <!--<a href="index.html" class="logo">-->
                        <!--<i class="icon-c-logo"> <img src="assets/images/logo_sm.png" height="42"/> </i>-->
                        <!--<span><img src="assets/images/logo_light.png" height="20"/></span>-->
                        <!--</a>-->
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <nav class="navbar-custom">

                    <ul class="list-inline float-right mb-0">
                        

                        

                        <li class="list-inline-item dropdown notification-list">
                            <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="false" aria-expanded="false">
                               <?php
                                    $image_name = Session::get('current_user_image');
                                    $image_path = 'user_images/'.$image_name;
                                    // echo $image_path;
                                    // exit();
                               ?>
                                <img src="{{asset($image_path)}}" alt="user" class="rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="text-overflow"><small>Welcome ! {{Session::get('current_user_name')}}</small> </h5>
                                </div>

                                <!-- item-->
                                <!-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="md md-account-circle"></i> <span>Profile</span>
                                </a>
 -->
                                <!-- item-->
                                <a href="{{URL::to('/user-logout')}}" class="dropdown-item notify-item">
                                    <i class="md md-settings-power"></i> <span>Logout</span>
                                </a>

                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-light waves-effect">
                                <i class="dripicons-menu"></i>
                            </button>
                        </li>
                        <!-- <li class="hide-phone app-search">
                            <form role="search" class="">
                                <input type="text" placeholder="Search..." class="form-control">
                                <a href=""><i class="fa fa-search"></i></a>
                            </form>
                        </li> -->
                    </ul>

                </nav>

            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>

                            <li class="text-muted menu-title">Navigation</li>

                            <li class="has_sub">
                                <a href="{{URL::to('/user-dashboard')}}" class="waves-effect"><i class="ti-home"></i> <span> Dashboard </span></a>
                               
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-12">
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

                       
                    </div>

                </div>

            </div>
                </div>
            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                @yield('user_main_content')

                <footer class="footer text-right">
                    &copy; 2016 - 2018. All rights reserved.
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/popper.min.js')}}"></script><!-- Popper for Bootstrap -->
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/detect.js')}}"></script>
        <script src="{{asset('assets/js/fastclick.js')}}"></script>
        <script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
        <script src="{{asset('assets/js/jquery.blockUI.js')}}"></script>
        <script src="{{asset('assets/js/waves.js')}}"></script>
        <script src="{{asset('assets/js/wow.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.nicescroll.js')}}"></script>
        <script src="{{asset('assets/js/jquery.scrollTo.min.js')}}"></script>

        <script src="{{asset('assets/js/jquery.core.js')}}"></script>
        <script src="{{asset('assets/js/jquery.app.js')}}"></script>
        <!-- Required datatable js -->
        <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <!-- Buttons examples -->
        <script src="{{asset('plugins/datatables/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/jszip.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/pdfmake.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/vfs_fonts.js')}}"></script>
        <script src="{{asset('plugins/datatables/buttons.html5.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/buttons.print.min.js')}}"></script>

        <!-- Key Tables -->
        <script src="{{asset('plugins/datatables/dataTables.keyTable.min.js')}}"></script>

        <!-- Responsive examples -->
        <script src="{{asset('plugins/datatables/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/responsive.bootstrap4.min.js')}}"></script>

        <!-- Selection table -->
        <script src="{{asset('plugins/datatables/dataTables.select.min.js')}}"></script>
        <script type="text/javascript">
            $(document).ready(function() {

                // Default Datatable
                $('#datatable').DataTable();

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf']
                });

                // Key Tables

                $('#key-table').DataTable({
                    keys: true
                });

                // Responsive Datatable
                $('#responsive-datatable').DataTable();

                // Multi Selection Datatable
                $('#selection-datatable').DataTable({
                    select: {
                        style: 'multi'
                    }
                });

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            } );
        </script>

    </body>
</html>