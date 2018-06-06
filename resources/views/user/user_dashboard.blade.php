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
                        <img src="assets/images/users/avatar-2.jpg" class="rounded-circle" alt="profile-image">

                        <ul class="list-inline status-list m-t-20">
                            <li class="list-inline-item">
                                <h3 class="text-primary m-b-5">456</h3>
                                <p class="text-muted">Followings</p>
                            </li>

                            <li class="list-inline-item">
                                <h3 class="text-success m-b-5">5864</h3>
                                <p class="text-muted">Followers</p>
                            </li>
                        </ul>

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

                        </div>
                    </div>

                </div>

            </div>


            <div class="col-lg-9 col-md-8">
                <form method="post" class="card-box">
                    <span class="input-icon icon-right">
                        <textarea rows="2" class="form-control"
                                  placeholder="Post a new message"></textarea>
                    </span>
                    <div class="p-t-10 pull-right">
                        <a class="btn btn-sm btn-primary waves-effect waves-light">Send</a>
                    </div>
                    <ul class="nav nav-pills profile-pills m-t-10">
                        <li>
                            <a href="#"><i class="fa fa-user"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-location-arrow"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class=" fa fa-camera"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-smile-o"></i></a>
                        </li>
                    </ul>

                </form>
                
            </div>

        </div>

    </div> <!-- container -->

</div> <!-- content -->
@endsection