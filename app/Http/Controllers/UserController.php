<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
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

        $current_admin_id = Session::get('current_admin_id');
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

        $data = array();
        $data['name'] = $request->name;
        $data['school_name'] = $request->schoolName;
        $data['college_name'] = $request->collegeName;
        $data['gpa_5_holder'] = $request->gpa;
        $data['board'] = $request->board;
        $data['present_address'] = $request->presentAddress;
        $data['present_police_station'] = $request->presentpoliceStation;
        $data['present_district'] = $request->presentdistrict;
        $data['parmanent_address'] = $request->parmanentAddress;
        $data['parmanent_police_station'] = $request->parmanentpoliceStation;
        $data['parmanent_district'] = $request->parmanentdistrict;
        $data['mobile'] = $request->mobileNumber;
        $data['blood_group'] = $request->bloodGroup;
        $data['occupation'] = $request->occupation;
        $data['expertise'] = $request->expertise;
        $data['working_organisation'] = $request->currentBusinessOrWorkingOrg;
        $data['designation'] = $request->designation;
        $data['social_activities'] = $request->social_activities;
        $data['fb_id'] = $request->fbIdName;
        $data['email'] = $request->email;
        $data['password'] = md5($request->password);

        // $user_image = $request->file('user_image');
        // $user_image_name = str_random(20);
        // $extension = $user_image->getClientOriginalExtension();
        // $image_full_name = $user_image_name.'.'.$extension;
        // $upload_path = 'user_images/';
        // $image_url = $upload_path.$image_full_name;
        // $success = $user_image->move($upload_path, $image_full_name);

        $image = $request->file('user_image');
        $data['user_image'] = rand(1, 10000000).'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/user_images');
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
            $destinationPath = public_path('/user_images');
            $success = $image->move($destinationPath, $data['reg_card_image']);
            $data['request_status'] = 0;

                // echo "<pre>";
                // print_r($data);
                // exit();

            DB::table('registration')
                ->insert($data);
            //$request->session()->flash('message','Blog saved successfully !');
                echo "<script>alert('Registration Successfull.');</script>";
             return Redirect::to('/user-registration');
        }else{
            DB::table('registration')
                ->insert($data);
            //$request->session()->flash('message','Blog saved successfully !');
            return Redirect::to('/user-registration');
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
            return redirect::to('/user-dashboard');
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
                return redirect::to('/user-dashboard');
            }
            else{
                Session::put('new_password_err','New Password and Confirm password Not Match !');
                return redirect::to('/user-dashboard');
            }
        }
        else{

            Session::put('old_password_err','Old Password Not Match !');
            return redirect::to('/user-dashboard');
        }



    }

     public function userLogout(){

        Session::put('current_user_id','');
        Session::put('current_user_name','');
        //Session::put('message','You are successfully logout !');
        return Redirect::to('/user-login');
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
