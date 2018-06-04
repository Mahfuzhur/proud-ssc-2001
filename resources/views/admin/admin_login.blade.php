<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="proud ssc">

        <!-- <link rel="shortcut icon" href="assets/images/favicon.ico"> -->

        <title>Admin | Login</title>

        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />

        <script src="{{asset('assets/js/modernizr.min.js')}}"></script>
        
    </head>
    <body>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
            <div class="card-box">
                <div class="panel-heading">
                    <h4 class="text-center"> Sign In</h4>
                    <h4 style="color: green; text-align: center;">
                      <?php
                        $login_error = Session::get('login_error');
                        if($login_error){
                          echo $login_error;
                          Session::put('login_error','');
                        }
                      ?>
                    </h4>
                </div>


                <div class="p-20">
                    <form class="form-horizontal m-t-20" action="{{URL::to('/admin-login-check')}}" method="post">
                        {{csrf_field()}}

                        <div class="form-group ">
                            <div class="col-12">
                                <input class="form-control" type="text" name="admin_email" required="" placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <input class="form-control" type="password" name="admin_password" required="" placeholder="Password">
                            </div>
                        </div>

                        <!-- <div class="form-group ">
                            <div class="col-12">
                                <div class="checkbox checkbox-primary">
                                    <input id="checkbox-signup" type="checkbox">
                                    <label for="checkbox-signup">
                                        Remember me
                                    </label>
                                </div>

                            </div>
                        </div> -->

                        <div class="form-group text-center m-t-40">
                            <div class="col-12">
                                <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light"
                                        type="submit">Log In
                                </button>
                            </div>
                        </div>

                        <!-- <div class="form-group m-t-30 m-b-0">
                            <div class="col-12">
                                <a href="page-recoverpw.html" class="text-dark"><i class="fa fa-lock m-r-5"></i> Forgot
                                    your password?</a>
                            </div>
                        </div> -->
                    </form>

                </div>
            </div>
            <!-- <div class="row">
                <div class="col-sm-12 text-center">
                    <p>Don't have an account? <a href="page-register.html" class="text-primary m-l-5"><b>Sign Up</b></a>
                    </p>

                </div>
            </div> -->
            
        </div>
        
        

        
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
	
	</body>
</html>