
<!DOCTYPE html>
<html>
<head>
<title>Registration form</title>
<!-- metatags-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script> -->
<!-- Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="{{asset('registration_css/css/jquery-ui.css')}}"/>
<link href="{{asset('registration_css/css/style.css')}}" rel="stylesheet" type="text/css" media="all"/>
<!-- <script src="http://code.jquery.com/jquery-1.9.1.js"></script> -->

<!-- //css files -->
</head>
<body>

<h1>Registration Form</h1>

<div class="w3l-main">
	<div class="w3l-from">
		@if (count($errors) > 0)
		<div class="alert alert-danger">
		  <strong>Whoops!</strong> There were some problems with your input.<br><br>
		  <ul>
		    @foreach ($errors->all() as $error)
		        <li>{{ $error }}</li>
		    @endforeach
		  </ul>
		</div>
		@endif
		<form action="{{URL::to('/save-user-information')}}" method="post" enctype="multipart/form-data">
		     {{csrf_field()}}
		 <!--   <div style="float: right; margin-top: -25px">-->
			<!--	<p class="pull-right"><a href="<?php //echo base_url('user-login');?>" style="color: #fff !important">Login</a></p>-->
			<!--</div>	-->
			<div class="w3l-user">
				<label class="head">Name<span class="w3l-star"> * </span></label>
				<input type="text" name="name" class="form-control" placeholder="Enter Name" required="">
			</div>
			<div class="w3l-user">
				<label class="head">School Name<span class="w3l-star"> * </span></label>
				<input type="text" name="schoolName" class="form-control" placeholder="Enter School Name" required="">
			</div>

			<div class="w3l-user">
				<label class="head">College Name<span class="w3l-star"> * </span></label>
				<input type="text" name="collegeName" class="form-control" placeholder="Enter College Name" required="">
			</div>

			<div class="clear"></div>

			<div class="w3l-user">
				<label class="head">Are you one of the GPA 5.00 holder in SSC 2001?<span class="w3l-star"> * </span></label>
				<label>Yes</label>
				<input type="radio" name="gpa" value="5" class="form-control" placeholder="" required="">
				<label>No</label>
				<input type="radio" name="gpa" value="4" class="form-control" placeholder="" required="">
			</div>
			
			<div class="clear"></div>

			<div class="w3l-user">
				<label class="head">Board<span class="w3l-star"> * </span></label>	
				<select class="category2" name="board" required="">
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
			
			<div class="clear"></div>

			<!-- <div class="w3l-details1">
				<div class="w3l-num">
					<label class="head">SSC(2001) Reg. NO<span class="w3l-star"> * </span></label>
					<input type="text" name="sscRegNo" class="form-control" placeholder="Only Visible For Admin" required="">
				</div>
				<div class="w3l-sym">
					<label class="head">SSC(2001) Roll NO<span class="w3l-star"> * </span></label>
					<input type="text" name="sscRollNo" class="form-control" placeholder="Only Visible For Admin" required="">
				</div>	

			<div class="clear"></div>
			</div> -->

			<!-- <div class="w3l-user">
				<label class="head">Present Address (Optional)</label>
				<input type="text" name="presentAddress" class="form-control" placeholder="Enter Present Address">
			</div>
			
			<div class="w3l-num">
				<label class="head">Police Station <span class="w3l-star"> * </span></label>
				<input type="text"  name="presentpoliceStation" class="form-control" placeholder="Enter Police Station" required="">
			</div>
			<div class="w3l-sym">
				<label class="head">District<span class="w3l-star"> * </span></label>
				<input type="text" name="presentdistrict" class="form-control" placeholder="Enter District" required="">
			</div>
			<div class="clear"></div>

			<div class="w3l-user">
				<label class="head">Permanent Address (Optional)</label>
				<label>Same as Present Address</label>
				<input type="checkbox" name="address_confirm" value="1" id="address_confirm" class="form-control" placeholder="">
				<input type="text" name="parmanentAddress" id="parmanentAddress" class="form-control" placeholder="Enter Parmanent Address">
			</div>

			<div class="w3l-num">
				<label class="head">Police Station <span class="w3l-star"> * </span></label>
				<input type="text"  name="parmanentpoliceStation" class="form-control" placeholder="Enter Parmanent Police Station" required="">
			</div>
			<div class="w3l-sym">
				<label class="head">District<span class="w3l-star"> * </span></label>
				<input type="text" name="parmanentdistrict" class="form-control" placeholder="Enter Parmanent District" required="">
			</div>
			<div class="clear"></div> -->

			<div class="w3l-num">
				<label class="head">Mobile Number<span class="w3l-star"> * </span></label>
				<input type="number"  name="mobileNumber" class="form-control" placeholder="Only Visible For Admin" required="">
			</div>
			<div class="w3l-sym">
				<label class="head">Blood Group<span class="w3l-star"> * </span></label>
				<input type="text" name="bloodGroup" class="form-control" placeholder="Enter Blood Group" required="">
			</div>
			<div class="clear"></div>

			<div class="w3l-num">
				<label class="head">Occupation<span class="w3l-star"> * </span></label>
				<input type="text"  name="occupation" class="form-control" placeholder="Enter Occupation" required="">
			</div>
			<div class="w3l-sym">
				<label class="head">Home District<span class="w3l-star"> * </span></label>
				<input type="text" name="home_district" class="form-control" placeholder="Enter Home district" required="">
			</div>
			<!-- <div class="w3l-sym">
				<label class="head">Expertise<span class="w3l-star"> * </span></label>
				<input type="text" name="expertise" class="form-control" placeholder="Enter Expertise" required="">
			</div> -->
			<div class="clear"></div>

			<div class="w3l-user">
				<label class="head">Current Name Of Business/Working Organisation<span class="w3l-star"> * </span></label>
				<input type="text" name="currentBusinessOrWorkingOrg" class="form-control" placeholder="Enter Working Organisation" required="">
			</div>
			
			<div class="w3l-user">
				<label class="head">Designation<span class="w3l-star"> * </span></label>
				<input type="text"  name="designation" class="form-control" placeholder="Enter Designation" required="">
			</div>
			
			<div class="clear"></div>

			<div class="w3l-user">
				<label class="head">Social Activities</label>
				<input type="text" name="social_activities"  class="form-control" placeholder="Social Activities">
			</div>
			
			<div class="clear"></div>

			<div class="w3l-num">
				<label class="head">FB ID name <span class="w3l-star"> * </span></label>
				<input type="text"  name="fbIdName" class="form-control" placeholder="Enter Facebook ID" required="">
			</div>
			<div class="w3l-sym">
				<label class="head">Email<span class="w3l-star"> * </span></label>
				<input type="email" name="email" class="form-control" placeholder="Enter Email" required="">
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
			
			<div class="w3l-num" >
				<label class="head">Upload Your Image (Max 2MB)</label>
				<input type="file" name="user_image" class="form-control" placeholder="" required=""><br>
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
			
			<div class="w3l-num" style="margin-left: 25px;">
				<label class="head">Upload Registration Card Image (2001) (Max 2MB)</label>
				<input type="file" name="reg_card_image" class="form-control" placeholder="" required=""><br>
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
			<div class="clear"></div><br>

			<input type="checkbox" name="terms_and_privacy" value="1" class="form-control" placeholder="" required="">
			<!--<label class="terms">I agree to the<span id="termLink" class="term_link"> <a href="<?php //echo base_url('terms-condition')?>" target="_blank">terms and conditions</a></span><span class="w3l-star"> * </span></label>-->
			
			<label class="terms">I agree to the<span id="termLink" class="term_link"> terms and conditions for membership. Click here to view</span></label>
			
			<div id="termsCond" class="terms_cond">
			    <h2 class= "term_title">Terms and Conditions</h2>
                <p>Terms and Conditions are a set of rules and guidelines that a member must agree in order to access the services or facilities and make our group website great.
                </p>
                <br>
                1.You had to be registered for SSC Board Exam in 2001 and HSC Broad Exam in 2003.<br>
                2.If anyone failed to attend the final Exam of SSC 01 Or HSC 03 due to any crisis,  He / She will be eligible to be a member of this group. But with proper documents.<br>
                3.If anyone was registered in 2000 but attended the final exam of  SSC 2001, He/She will not be eligible to be a member of the group.<br>
                4. If anyone passed the SSC Board exam in 2000 but took part in HSC  Board Exam in 2003, He/She will not be eligible to be a member  of the group.<br>
                
                <p id="termHide" class="term_hide_btn" >Hide terms</p>

			</div>

<style>
    .term_link{
        cursor:pointer;
        color:red;
    }
    .terms_cond{
        visibility:hidden;
        height:0;
        opacity:1;
        transition:.5s;
        padding: 2em 1em;
        color: #f9f9f9;
        background-color: #00000021;
        text-align: justify;
        box-shadow: 2px 2px 10px #56371c;
        font-size: 16px;
    }
    .term_title{
       color:red; 
    }
    .term_hide_btn {
    background-color: #ffffff;
    color: #040404;
    padding: .5em 0.5em;
    width: 95px;
    text-align: center;
    text-transform: uppercase;
    font-size: 14px;
    border: 2px solid #fff;
    margin-top: 5px;
}

@media screen and (max-width: 850px) {
    .terms_cond {
        font-size: 14px;
    }
}
@media screen and (max-width: 392px) {
    .term_hide_btn {
        border: 0px solid #fff;
        padding: .3em 0.5em;
    }
}

</style>
			<div class="w3l-rem">
					
				<div class="btn">
					<input type="submit" name="submit" value="Submit"/>
				</div>
			</div>
			<div class="clear"></div>
		</form>
	</div>
</div>


<!--script for terms and conditions section-->
<script>
    var termLink, termsCond, techBtnClose;

    termLink  = document.getElementById("termLink");
    termsCond = document.getElementsByClassName('terms_cond');
    termsHide = document.getElementById('termHide');
    
    termsHide.addEventListener("click", termsClose);
    termLink.addEventListener("click", termsOpen);
    
    function termsOpen() {
        termsCond[0].style.visibility = "visible";
        termsCond[0].style.height = '320px';
        termsCond[0].style.opacity = "1";
    }
    function termsClose() {
        termsCond[0].style.visibility = "hidden";
        termsCond[0].style.height = '0';
        termsCond[0].style.opacity = "0";
    }
</script>

<!-- <script type="text/javascript">
// 	$(document).ready(function () {
//     $('#address_confirm').change(function () {
//         if (!this.checked) 
//         //  ^
//            $('#parmanentAddress').fadeIn('slow');
//         else 
//             $('#parmanentAddress').fadeOut('slow');
//     });
// });

	$(document).ready(function () {
    $('#address_confirm').change(function () {
      $('#parmanentAddress').fadeToggle();
    });
});
</script> -->
</body>
</html>