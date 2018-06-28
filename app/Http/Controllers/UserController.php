<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Crypt;
use DB;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function auth_check(){

        $current_admin_id = Session::get('current_user_id');
        if($current_admin_id != NULL){
            return Redirect::to('/user-dashboard');
        }else{
            return Redirect::to('/user-login');
        }
    }

    public function userRegistration(){

        return view('user.user_registration');
    }

    public function saveUserInformation(Request $request){
        
        $email_exits_check = DB::table('registration')
                            ->where('email', $request->email)
                            ->first();
        if($email_exits_check){
            Session::put('email_exits_error','Email Already Exits !');
            return redirect::to('/user-registration');
        }else{

            $this->validate($request, [
               
                'user_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'reg_card_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);



        $data = array();
        $data['name'] = $request->name;
        $data['school_name'] = $request->schoolName;
        $data['college_name'] = $request->collegeName;
        $data['gpa_5_holder'] = $request->gpa;
        $data['board'] = $request->board;
        // $data['present_address'] = $request->presentAddress;
        // $data['present_police_station'] = $request->presentpoliceStation;
        // $data['present_district'] = $request->presentdistrict;
        // $data['parmanent_address'] = $request->parmanentAddress;
        // $data['parmanent_police_station'] = $request->parmanentpoliceStation;
        $data['parmanent_district'] = $request->home_district;
        $data['mobile'] = $request->mobileNumber;
        $data['blood_group'] = $request->bloodGroup;
        $data['occupation'] = $request->occupation;
        // $data['expertise'] = $request->expertise;
        $data['working_organisation'] = $request->currentBusinessOrWorkingOrg;
        $data['designation'] = $request->designation;
        $data['social_activities'] = $request->social_activities;
        $data['fb_id'] = $request->fbIdName;
        $data['email'] = $request->email;
        // $data['password'] = md5($request->password);

        // $user_image = $request->file('user_image');
        // $user_image_name = str_random(20);
        // $extension = $user_image->getClientOriginalExtension();
        // $image_full_name = $user_image_name.'.'.$extension;
        // $upload_path = 'user_images/';
        // $image_url = $upload_path.$image_full_name;
        // $success = $user_image->move($upload_path, $image_full_name);
        
        $user_file_size = $request->file('user_image')->getClientSize();
        if($user_file_size > 2048000){

            Session::put('user_image_upload_error','Image Must Be below 2MB !');
            return redirect::to('/user-registration');
        }

        $user_reg_card_file_size = $request->file('reg_card_image')->getClientSize();
            if($user_reg_card_file_size > 2048000){

                Session::put('user_reg_card_image_upload_error','Image Must Be below 2MB !');
                return redirect::to('/user-registration');
            }

        $image = $request->file('user_image');
        $data['user_image'] = rand(1, 10000000).'.'.$image->getClientOriginalExtension();
        $destinationPath = base_path().'/user_images';
        $success = $image->move($destinationPath, $data['user_image']);
        if($success){
            // $data['user_image'] = $image_url;
            //     $reg_card_image = $request->file('user_image');
            //     $reg_card_image_name = str_random(20);
            //     $extension = $reg_card_image->getClientOriginalExtension();
            //     $image_full_name = $reg_card_image_name.'.'.$extension;
            //     $upload_path = 'user_images/';
            //     $image_url = $upload_path.$image_full_name;
            //     $success = $reg_card_image->move($upload_path, $image_full_name);
            $image = $request->file('reg_card_image');
            $data['reg_card_image'] = rand(1, 10000000).'.'.$image->getClientOriginalExtension();
            $destinationPath = base_path().'/user_images';
            $success = $image->move($destinationPath, $data['reg_card_image']);
            $data['request_status'] = 0;

                // echo "<pre>";
                // print_r($data);
                // exit();

            DB::table('registration')
                ->insert($data);
                    // $email = $data['email'];
                    // $header_name = "proudssc2001@gmail.com";
                    // $to = $email;
                    // $subject = "Proud SSC registration Confirm";
            
                    // $txt =  'We’re happy you’re here! Your registration has been submitted .' . "\n\n" . 'You will get the sign in credentials after the quick review process.' . "\n\n" . 'Please stay with us.' . "\n\n". 'Thanks' . "\n\n". 'SSC 2001 and HSC 2003 Bangladesh'. "\n\n" . 'বন্ধুত্ব দৃঢ় হোক সহযোগিতার বন্ধনে' . "\n\n". ' ' . "\n\n". 'N.B: for any issue please contact with this link http://proudssc2001bd.com/';
                    
                    // $headers = "From: <".$header_name.">\r\n" ;
            
                    // if (mail($to,$subject,$txt,$headers)) {
                    //     echo "<script type=\"text/javascript\">alert(\"Thank you for registration.\");</script>";
                    // } else {
                    //     echo "<script type=\"text/javascript\">alert(\"Sorry something error..\");</script>";
                    // }
        
        
            //$request->session()->flash('message','Blog saved successfully !');
                // echo "<script>alert('Registration Successfull.');</script>";
                Session::put('registration_successfull_message','Registration Successfull. Please Check Your Email !');
                 return Redirect::to('/');
            }else{
                DB::table('registration')
                    ->insert($data);
                //$request->session()->flash('message','Blog saved successfully !');
                return Redirect::to('/');
            } 
        }  

    }

    public function userLogin(){

        return view('user.user_login');
    }

    public function userLoginCheck(Request $request){

        $email = $request->user_email;
        $password = md5($request->user_password);

        $user_info = DB::table('registration')
                        ->select('*')
                        ->where('email',$email)
                        ->where('password',$password)
                        ->where('request_status',1)
                        ->first();                        

        if(!empty($user_info)){
            Session::put('current_user_id',$user_info->id);
            Session::put('current_user_name',$user_info->name);
            Session::put('current_user_image',$user_info->user_image);
            return redirect::to('/');
        }
        else{
            Session::put('login_error','Email Or Password Invalid !');
            return redirect::to('/user-login');
        }
    }

    public function userDashboard(){
        // $this->auth_check();
        $user_id = Session::get('current_user_id');
        $current_user_info = DB::table('registration')
                             ->where('id', $user_id)
                             ->first();
        $all_user_info = DB::table('registration')
                        ->orderby('id','desc')
                        ->get();

        $info = view('user.user_dashboard')
                ->with('current_user_info',$current_user_info)
                ->with('all_user_info',$all_user_info);
        return view('user.user_master')
                ->with('current_user_info',$current_user_info)
                ->with('user_main_content', $info);
    }

    public function userSingleInfo($id){

        $user_id = Session::get('current_user_id');
        $current_user_info = DB::table('registration')
                             ->where('id', $user_id)
                             ->first();
        $single_user_info = DB::table('registration')
                        ->where('id', $id)
                        ->first();

        $info = view('user.single_user')
                ->with('current_user_info',$current_user_info)
                ->with('single_user_info',$single_user_info);
        return view('user.user_master')
                ->with('current_user_info',$current_user_info)
                ->with('user_main_content', $info);
    }

    public function changePassword(Request $request,$id){

        $old_password = md5($request->old_password);
        $new_password = md5($request->new_password);
        $confirm_new_password = md5($request->confirm_new_password);

        $password_info = DB::table('registration')
                        ->where('password',$old_password)
                        ->first();
        if(isset($password_info)){

            if ($new_password == $confirm_new_password) {
                $data = array();
                $data['password'] = $new_password;
                DB::table('registration')
                ->where('id',$id)
                ->update($data);
                Session::put('update_password_message','Password Updated Successfully !');
                return redirect()->back();
            }
            else{
                Session::put('new_password_err','New Password and Confirm password Not Match !');
                return redirect()->back();
            }
        }
        else{

            Session::put('old_password_err','Old Password Not Match !');
            return redirect()->back();
        }



    }

    public function editUserProfile($user_id){
        $id = Crypt::decrypt($user_id);
        $edit_profile = "edit_profile";
        $user_profile_info = DB::table('registration')
                    ->where('id',$id)
                    ->first();
                    // echo "<pre>";
                    // print_r($user_info);
                    // exit();
        $current_user_info = DB::table('registration')
                             ->where('id', $id)
                             ->first();

        $user_info_view = view('home_page.latest_edit_single_user')
                        ->with('user_profile_info',$user_profile_info)
                        ->with('edit_profile',$edit_profile);

        return view('home_page.latest_home_page_master')
                ->with('current_user_info',$current_user_info)
                ->with('user_main_content',$user_info_view);

    }

    public function updateUserProfile(Request $request, $id){
        $user_id = Crypt::encrypt($id);
        $email_exits_check = DB::table('registration')
                            ->where('email', $request->email)
                            ->where('id','!=',$id)
                            ->first();
        if($email_exits_check){
            Session::put('email_exits_error','Email Already Exits !');
            return redirect::to('/edit-user-profile/'.$user_id);
        }else{

        $data = array();
        $data['name'] = $request->name;
        // $data['school_name'] = $request->school_name;
        // $data['college_name'] = $request->college_name;
        // $data['gpa_5_holder'] = $request->gpa;
        // $data['board'] = $request->board;
        // $data['present_address'] = $request->present_address;
        // $data['present_police_station'] = $request->present_police_station;
        // $data['present_district'] = $request->present_district;
        // $data['parmanent_address'] = $request->parmanent_address;
        // $data['parmanent_police_station'] = $request->parmanemt_police_station;
        // $data['parmanent_district'] = $request->parmanent_district;
        // $data['mobile'] = $request->mobile;
        // $data['blood_group'] = $request->blood_group;
        // $data['occupation'] = $request->occupation;
        $data['expertise'] = $request->expertise;
        $data['working_organisation'] = $request->working_organisation;
        // $data['designation'] = $request->designation;
        // $data['social_activities'] = $request->social_activities;
        // $data['fb_id'] = $request->facebook_id;
        $data['email'] = $request->email;

        $exist_user_image = $request->exist_user_image;
        $exist_reg_card_image = $request->exist_reg_card_image;
        
        $image = $request->file('user_image');

        if($image){
            $user_file_size = $request->file('user_image')->getClientSize();
                if($user_file_size > 2048000){

                Session::put('user_image_upload_error','Image Must Be below 2MB !');
                return redirect::to('/edit-user-profile/'.$user_id);
            }

            $data['user_image'] = rand(1, 10000000).'.'.$image->getClientOriginalExtension();
            $destinationPath = base_path().'/user_images';
            $success = $image->move($destinationPath, $data['user_image']);
            unlink(base_path().'/user_images/'.$exist_user_image);
                               

        }else{

            }

        $reg_image = $request->file('reg_card_image');
        
        if($reg_image){
            $user_reg_card_file_size = $request->file('reg_card_image')->getClientSize();
            if($user_reg_card_file_size > 2048000){

                Session::put('user_reg_card_image_upload_error','Image Must Be below 2MB !');
                return redirect::to('/edit-user-profile/'.$user_id);
            }

            $data['reg_card_image'] = rand(1, 10000000).'.'.$reg_image->getClientOriginalExtension();
            $destinationPath = base_path().'/user_images';
            $success = $reg_image->move($destinationPath, $data['reg_card_image']);
            unlink(base_path().'/user_images/'.$exist_reg_card_image);
           
                 
        }else{

        }

         $data['request_status'] = 1;

            DB::table('registration')
                ->where('id',$id)
                ->update($data);
                    
                Session::put('profile_update_message','Profile Successfully Updated');
                 return Redirect::to('/user-profile-info/'.$user_id);


        }  

    }

    public function forgotPassword(){

        return view('user.user_forgot_password');
    }

    

     public function userLogout(){

        Session::put('current_user_id','');
        Session::put('current_user_name','');
        //Session::put('message','You are successfully logout !');
        return Redirect::to('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
