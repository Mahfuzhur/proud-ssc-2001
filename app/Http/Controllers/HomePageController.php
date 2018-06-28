<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use DB;
use Illuminate\Support\Facades\Crypt;
use Session;

class HomePageController extends Controller
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

    public function home()
    {
        $all_notice_info = DB::table('tbl_notice_board')
                        ->where('publication_status',1)
                        ->get();
        $main_content_view = view('home_page.latest_home_page')
                            ->with('all_notice_info',$all_notice_info);
        return view('home_page.latest_home_page_master')
                    ->with('home_page_main_content', $main_content_view);
        
        // $home_page = view('home_page.home');
        // return view('home_page.home_page_master')
        //             ->with('homa_page_main_content', $home_page);
    }
    public function search(){

        $user_id = Session::get('current_user_id');
        if(!empty($user_id)){

            $search = view('home_page.latest_search_bar');

            return view('home_page.latest_home_page_master')
                ->with('homa_page_main_content',$search);


        }else{
            return Redirect::to('/user-login');
        }

    }

    public function founderMember(){

        $founder_member = view('home_page.latest_founder_member');
        return view('home_page.latest_home_page_master')
                    ->with('homa_page_main_content',$founder_member);
    }

    public function gallery(){

        $all_category_info = DB::table('tbl_gallery_category')
                            ->where('publication_status',1)
                            ->get();
        $all_gallery_image = DB::table('tbl_gallery')
                            ->get();
        $gallery = view('home_page.gallery')
                    ->with('all_category_info',$all_category_info)
                    ->with('all_gallery_image',$all_gallery_image);
        return view('home_page.latest_home_page_master')
                    ->with('homa_page_main_content',$gallery);
    }

    public function registration(){

        $registration = view('home_page.registration');
        return view('home_page.home_page_master')
                    ->with('homa_page_main_content',$registration);
    }

    public function noticeBoard(){

        $all_notice_info = DB::table('tbl_notice_board')
                        ->where('publication_status',1)
                        ->get();

        $notice_board = view('home_page.latest_notice_board')
                        ->with('all_notice_info',$all_notice_info);
        return view('home_page.latest_home_page_master')
                    ->with('homa_page_main_content',$notice_board);
    }

    public function contactUs(){

        $contact_us = view('home_page.contact_us');
        return view('home_page.latest_home_page_master')
                    ->with('homa_page_main_content',$contact_us);
    }
    
    public function searchUser(Request $request){

        $name = $request->ssc_search_name;
                if(!empty($name)){
            $user_info = DB::table('registration')
                        ->where('name', 'LIKE', '%'.$name.'%')
                        ->orWhere('school_name', 'LIKE', '%'.$name.'%')
                        ->orWhere('college_name', 'LIKE', '%'.$name.'%')
                        ->orWhere('occupation', 'LIKE', '%'.$name.'%')
                        ->orWhere('working_organisation', 'LIKE', '%'.$name.'%')
                        ->orWhere('board', 'LIKE', '%'.$name.'%')
                        ->orWhere('designation', 'LIKE', '%'.$name.'%')
                        ->orWhere('blood_group', 'LIKE', '%'.$name.'%')
                        ->get();
            // echo '<pre>';
            // print_r($user_info);
            // exit();
            return view('home_page.latest_search_view')
                        ->with('search_info', $user_info);
            }
            else{

            }
    }
    
    public function userDetailsInfo($encrypt_id){

        //$user_id = Session::get('current_user_id');
        // if(!empty($user_id)){
            $id = Crypt::decrypt($encrypt_id);
        
        $all_info = DB::table('registration')
                    ->where('id',$id)
                    ->first();
        $details_user_info = view('home_page.latest_details_user_info')
                            ->with('detils_user_info', $all_info);
        return view('home_page.latest_home_page_master')
                ->with('home_page_main_content', $details_user_info);
        // }
        // else{
        //     return Redirect::to('/user-login');
        // }
        // echo $user_id;
        // exit();
        
    }

    public function saveContactUsInfo(Request $request){

        $data = array();
        $data['name'] = $request->Name;
        $data['email'] = $request->Email;
        $data['message'] = $request->Message;

        $result = DB::table('tbl_contact_us')
                ->insert($data);

        $mail_info = array(
                        'email' => "wbitsbd@gmail.com",
                        'subject' => "Proud SSC Contact Us"
                    );

        // Mail::send('', $mail_info, function ($message) use ($mail_info){
        //     $message->to($mail_info['email']);
        //     $message->subject($mail_info['subject']);
        //     $message->from($data['email']);       
        // });

        Session::put('contact_us_message_info','Your message have sent successfully');
        return Redirect::to('/contact-us');
    }

    public function userProfileInfo($id){

        $id = Crypt::decrypt($id);
        
        $all_info = DB::table('registration')
                    ->where('id',$id)
                    ->first();
        $details_user_info = view('home_page.latest_user_profile_info')
                            ->with('user_profile_info', $all_info);
        return view('home_page.latest_home_page_master')
                ->with('home_page_main_content', $details_user_info);
    }

    public function adminModeratorPanel(){

        $admin_moderator_panel = view('home_page.latest_admin_moderator_panel');
        return view('home_page.latest_home_page_master')
                    ->with('homa_page_main_content',$admin_moderator_panel);
    }

    public function categoryWiseGallery($id){

        $id = Crypt::decrypt($id);
        $all_category_info = DB::table('tbl_gallery_category')
                            ->where('publication_status',1)
                            ->get();

        $all_info = DB::table('tbl_gallery')
                    ->where('category_id',$id)
                    ->get();
        $category_wise_gallery = view('home_page.category_wise_gallery')
                            ->with('category_wise_gallery', $all_info)
                            ->with('all_category_info', $all_category_info);
        return view('home_page.latest_home_page_master')
                ->with('home_page_main_content', $category_wise_gallery);
    }

    public function searchFriends(Request $request){

        $name = $request->ssc_search_name;

        if(!empty($name)){

            $user_info = DB::table('registration')
                        ->where('name', 'LIKE', '%'.$name.'%')
                        ->orWhere('school_name', 'LIKE', '%'.$name.'%')
                        ->orWhere('college_name', 'LIKE', '%'.$name.'%')
                        ->orWhere('occupation', 'LIKE', '%'.$name.'%')
                        ->orWhere('working_organisation', 'LIKE', '%'.$name.'%')
                        ->orWhere('board', 'LIKE', '%'.$name.'%')
                        ->orWhere('designation', 'LIKE', '%'.$name.'%')
                        ->orWhere('blood_group', 'LIKE', '%'.$name.'%')
                        ->get();
            // echo '<pre>';
            // print_r($user_info);
            // exit();
            $count = count($user_info);
            if($count != NULL){
            $info = view('home_page.latest_search_friends_view')
                        ->with('search_info', $user_info);

            return view('home_page.latest_home_page_master')
                    ->with('homa_page_main_content', $info);

            }else{

            $no_data = "No result found";
            $no_data_info = view('home_page.latest_search_friends_view')
                    ->with('no_data', $no_data);

             return view('home_page.latest_home_page_master')
                    ->with('homa_page_main_content', $no_data_info);
            }
            

        }else{
            $user_info = "No result found. Search with some value";
            $info = view('home_page.latest_search_friends_view')
                    ->with('no_data', $user_info);

        return view('home_page.latest_home_page_master')
                ->with('homa_page_main_content', $info);
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
