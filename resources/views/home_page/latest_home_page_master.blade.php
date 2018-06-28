<!DOCTYPE html>
<html lang="en-us">
    <head>
    	<!-- meta -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Proud S.S.C.</title>
        
        <!-- stylesheet -->
        <link rel="stylesheet" href="{{asset('home_assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('home_assets/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('home_assets/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('home_assets/css/style_gal_isotope_css.css')}}">

		<!-- google font -->
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Oswald:300,400' rel='stylesheet'>
    </head>
    <body>
        <div id="page">
          <div id="page-wrap">
            <!-- Start Header Part -->
            <div class="header-wrap">
                <header id="header" class="header-main">
                    <div class=" container">
                        <div class="row ">
                          <div class="col-md-2"></div>
                          <div class="col-md-8">
                            <div class="row">

                              <div class="col-md-3">
                                <div class="header-logo ">
                                  <a class="logo" href="{{URL::to('/')}}"><img class="logo-img" src="{{asset('home_assets/img/logo.png')}}" alt="Proud S.S.C."></a>
                                </div>
                              </div>

                              <div class="col-md-9">
                                <div class="headline">
                                  <h2>SSC 2001 and HSC 2003 Bangladesh</h2>
                                  <h2>বন্ধুত্ব দৃঢ় হোক সহযোগিতার বন্ধনে</h2>
                                </div>
                              </div>

                            </div>
                          </div>
                          <div class="col-md-2"></div>

                        </div>
                    </div>
                </header>
            </div><!-- .header-wrap -->


            <!-- start Menu bar Part -->

            <div class="main_menu">
              <nav class="navbar navbar-default">
                <div class="container-fluid">
                  <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    
                    <script type="text/javascript">

                           function changeFunc() {

                             //event.preventDefault();

                             var mydata = $('#ssc_search_form').serializeArray();
                             jQuery.ajax({
                                type: "POST",
                                url: "{{URL::to('/search-ssc-user')}}",
                                data: mydata,
                                dataType: 'html',
                                success: function(response) {
                              
                                  $('#result').fadeOut('slow', function(){
                                   
                              //$('#mydiv').fadeIn('slow').html(response);
                                  $('#result').fadeIn('slow').html(response);
                            });
                                }
                                
                            });

                            }

                          </script>

                  <ul class="collapse navbar-collapse nav nav-pills nav-justified" id="bs-example-navbar-collapse-1">
                    <li role="presentation" class="active"><a href="{{URL::to('/')}}">Home</a></li>

                    <li role="presentation">
                      <a href="{{URL::to('/search')}}">Find Friends</a>
                    </li>
                    
                    <!-- <li role="presentation">
                        <form role="search" name="ssc_search_form" id="ssc_search_form" class="" method="POST">
                                      {{csrf_field()}}
                        <input type="text" name="ssc_search_name" id="ssc_search_name" class="form-control" oninput="changeFunc();"  placeholder="Search Friends..." >
                        </form>
                        </li> -->
                    <?php
                        $user_id = Session::get('current_user_id');
                        if(empty($user_id)){
                    ?>
                      <li role="presentation"><a href="{{URL::to('/user-registration')}}">Registration</a></li>

                      <li role="presentation"><a href="{{URL::to('/user-login')}}">User Login</a></li>

                      <li role="presentation"><a href="{{URL::to('/admin-login')}}">Admin Login</a></li>
                    <?php
                      }else{
                        $id = Crypt::encrypt($user_id);
                    ?>
                      <li role="presentation"><a href="{{URL::to('/user-profile-info/'.$id)}}">{{Session::get('current_user_name')}}</a></li>
                      <li role="presentation"><a href="{{URL::to('/user-logout')}}">Logout</a></li>

                    <?php
                      }
                    ?>
                  </ul><!-- /.navbar-collapse -->

                  </div>
                  
                </div><!-- /.container-fluid -->
              </nav>
              
            </div>
            <!-- End Menu bar Part -->
            <div id="result"></div>
            <!-- End Header Part -->
              <!-- start Main Page Area --> 
            <div class='page-main'>
              <div class='container-fluid'>

                <div class="col-md-3">
                  <div class='sidebar'>
                  <ul id="sideBar" class="sidebar_menu">
                      
                      <li class="menu-item">
                        <a href="{{URL::to('/founder-member')}}">Founder Member</a>
                      </li>
                      <li class="menu-item">
                        <a href="{{URL::to('/admin-moderator-panel')}}">Admin & ModeratorPanel</a>
                      </li>
                      <li class="menu-item">
                        <a href="{{URL::to('/gallery')}}">Gallery</a>
                      </li>
                      <li class="menu-item">
                        <a href="{{URL::to('/notice-board')}}">Notice Board</a>
                      </li>
                      <li class="menu-item">
                        <a href="{{URL::to('/contact-us')}}">Contact Us</a>
                      </li>
                    </ul>
                  </div>
                </div>

                @yield('home_page_main_content')
                
              </div>
            </div>

            <footer id="site-footer">
              <div class="row">
                <div class="col-sm-6">
                  <div class="copyright">&copy; 2018 :  All rights reserved.</div>
                </div>
                <div class="col-sm-6">
                  <div class="designed-by pull-right">Designed & Developed By <a href="http://webvisiondigital.com/" target="_blank">@webvisiondigital</a></div>
                </div>
              </div>
            </footer> <!-- site-footer -->
          </div><!-- main-content -->
        </div>
    <!-- js -->
    <script src="{{asset('home_assets/js/jquery-2.1.3.min.js')}}"></script>
    <script src="{{asset('home_assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('home_assets/js/script.js')}}"></script>
    <script src="{{asset('home_assets/js/jquery.isotope.min.js')}}"></script>
    <script src="{{asset('home_assets/js/scripts-gal-isotope.js')}}"></script>

	</body>
</html>
