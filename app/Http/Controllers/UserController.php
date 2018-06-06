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
