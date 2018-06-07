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
        <link rel="stylesheet" href="{{asset('home_page_assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('home_page_assets/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('home_page_assets/css/style.css')}}">

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
                          <div class="col-md-3">
                              <div class="header-logo ">
                                  <a class="logo" href="#"><img class="logo-img" src="{{asset('home_page_assets/img/logo.png')}}" alt="Proud S.S.C."></a>
                              </div>
                          </div>
                          <div class="col-md-9">
                                <div class="header-search">
                                    <div class='search-content' >
                                        <p>Search for Registration User via name, e-mail, Profession, Department etc.</p>
                                    </div>
                                    <div class="search-bar">
                                        <div class="input-group stylish-input-group">
                                            <input type="text" class="form-control"  placeholder="Search" >
                                            <span class="input-group-addon">
                                              <button type="submit">
                                                 <i class="fa fa-search"></i>
                                              </button>  
                                            </span>
                                        </div>
                                    </div>  
                                </div>
                          </div>
                      </div>
                  </div>
              </header>
          </div><!-- .header-wrap -->
          <!-- End Header Part -->
            <!-- start Main Page Area --> 
            <div class='page-main'>
              <div class='main-wrap'>
                <div class='main-menu'>
                  <ul id="menu-main" class="menu">
                      <li class="menu-item active">
                        <a href="{{URL::to('/')}}">Home</a>
                      </li>
                      <li class="menu-item">
                        <a href="{{URL::to('/founder-member')}}">Founder Member</a>
                      </li>
                      <li class="menu-item">
                        <a href="{{URL::to('/gallery')}}">Gallery</a>
                      </li>
                      <li class="menu-item">
                        <a href="{{URL::to('/registration')}}">Registration</a>
                      </li>
                      <li class="menu-item">
                        <a href="{{URL::to('/notice-board')}}">Notice Board</a>
                      </li>
                      <li class="menu-item">
                        <a href="{{URL::to('/contact-us')}}">Contact Us</a>
                      </li>
                    </ul>
                </div>
                @yield('home_page_main_content')
              </div>
            </div><!-- .page-body -->
          </div>
        </div>    
    <!-- js -->
    <script src="{{asset('home_page_assets/js/jquery-2.1.3.min.js')}}"></script>
    <script src="{{asset('home_page_assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('home_page_assets/js/script.js')}}"></script>

	</body>
</html>
