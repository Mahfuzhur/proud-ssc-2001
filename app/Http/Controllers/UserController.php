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
                        ->first();                        

        if(!empty($user_info)){
            Session::put('current_user_id',$user_info->id);
            Session::put('current_user_name',$user_info->name);
            return redirect::to('/user-dashboard');
        }
        else{
            Session::put('login_error','Email Or Password Invalid !');
            return redirect::to('/user-login');
        }
    }

    public function userDashboard(){
        // $user_id = Session::get('current_user_id');
        // $single_user_info = DB::table('registration')
        //                      ->where('id', $user_id)
        //                      ->get();
        //                      // echo "<pre>";
        //                      // print_r($single_user_info);
        //                      // exit();
        //  $user_info = view('user.user_dashboard')
        //              ->with('user_info', $single_user_info);
        $info = view('user.user_dashboard');
        return view('user.user_master')
                ->with('user_main_content', $info);
                     // ->with('user_main_content',$user_info);
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
