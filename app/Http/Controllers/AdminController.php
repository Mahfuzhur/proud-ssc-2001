<?php

namespace App\Http\Controllers;
use App\Form;
//use \Input as Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Carbon\Carbon;
use DB;
use Session;
use App\Registration;
class AdminController extends Controller
{


    public function auth_check(){

        $current_admin_id = Session::get('current_admin_id');
        if($current_admin_id != NULL){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function adminLogin(){
        //$this->auth_check();
        return view('admin.admin_login');
    }

    public function adminLoginCheck(Request $request){

        $email = $request->admin_email;
        $password = md5($request->admin_password);

        $admin_info = DB::table('tbl_admin')
                        ->select('*')
                        ->where('admin_email',$email)
                        ->where('admin_password',$password)
                        ->first();                        

        if(!empty($admin_info)){
            Session::put('current_admin_id',$admin_info->admin_id);
            Session::put('current_admin_name',$admin_info->admin_name);
            return redirect::to('/admin-dashboard');
        }
        else{
            Session::put('login_error','Email Or Password Invalid !');
            return redirect::to('/admin-login');
        }
    }

    public function adminDashboard(){
       // Session::get('current_admin_id') !=NULL
        if($this->auth_check() ==1){
            $requested_user_info = DB::table('registration')
                            ->where('request_status',0)
                            ->get();
        $user_info = view('admin.admin_pending_request')
                    ->with('requested_user_info', $requested_user_info);
        return view('admin.admin_master')
                    ->with('admin_main_content',$user_info);
        }
        else{
            return Redirect::to('/admin-login');
        }
        
    }

    public function adminUserList(){
        if($this->auth_check() ==1){

            $registered_user_info = DB::table('registration')
                                ->where('request_status',1)
                                ->get();
            $user_info = view('admin.admin_registered_user')
                        ->with('registered_user_info',$registered_user_info);
            return view('admin.admin_master')
                        ->with('admin_main_content',$user_info);
        }else{
            return Redirect::to('/admin-login');
        }
    }

    public function adminLogout(){

        Session::put('current_admin_id','');
        Session::put('current_admin_name','');
        //Session::put('message','You are successfully logout !');
        return Redirect::to('/admin-login');
    }

    public function accepted(Request $request){
        if($this->auth_check() ==1){
            $id = $request->input('id');
            $email = $request->input('email');

            $user = Registration::find($id);

            $user->request_status = 1;
            $user->save();
            return redirect()->back();

        }else{
            return Redirect::to('/admin-login');
        }


    }
    
    public function adminSingleSingleInfo($id){

        if($this->auth_check() ==1){
            $single_user_info = DB::table('registration')
                            ->where('id', $id)
                            ->first();

            $info = view('admin.admin_single_user')
                    ->with('single_user_info',$single_user_info);
            return view('admin.admin_master')
                    ->with('admin_main_content', $info);
        }else{
            return Redirect::to('/admin-login');
        }
    }

    public function suspendUser(Request $request){
        if($this->auth_check() ==1){
            $data = array();
            $data['request_status'] = 2;

            $info = DB::table('registration')
                    ->where('id',$request->id)
                    ->update($data);

            return Redirect::to('/admin-user-list');
        }else{
            return Redirect::to('/admin-login');
        }
    }

    public function suspenduserList(){

        if($this->auth_check() ==1){

            $suspend_user_info = DB::table('registration')
                                ->where('request_status',2)
                                ->get();
            $user_info = view('admin.admin_suspend_user')
                        ->with('suspend_user_info',$suspend_user_info);
            return view('admin.admin_master')
                        ->with('admin_main_content',$user_info);
        }else{
            return Redirect::to('/admin-login');
        }
    }

    public function adminMangeNoticeBoard(){

        if($this->auth_check() ==1){

            $all_notice_info = DB::table('tbl_notice_board')
                                ->get();
            $notice_board = view('admin.admin_manage_notice_board')
                            ->with('all_publish_notice',$all_notice_info);
                        
            return view('admin.admin_master')
                        ->with('admin_main_content',$notice_board);
        }else{
            return Redirect::to('/admin-login');
        }
    }

    public function addNotice(){

        if($this->auth_check() ==1){

            $add_notice = view('admin.admin_add_notice');
                        
            return view('admin.admin_master')
                        ->with('admin_main_content',$add_notice);
        }else{
            return Redirect::to('/admin-login');
        }
    }

    public function saveNoticeInfo(Request $request){

        if($this->auth_check() ==1){

            $data = array();
            $data['notice_title'] = $request->title;
            $data['notice_description'] = $request->description;
            $data['link'] = $request->link;
            $data['publication_status'] = $request->publication_status;
            $data['created_at'] = date("Y-m-d");

            $insert = DB::table('tbl_notice_board')
                    ->insert($data);
            Session::put('notice_success_message','Notice Added Successfully !');
            return Redirect::to('/add-notice');
            
            
        }else{
            return Redirect::to('/admin-login');
        }
    }

    public function editNotice($id){

        if($this->auth_check() ==1){

            $single_notice_info = DB::table('tbl_notice_board')
                                ->where('notice_id',$id)
                                ->first();
            $edit_notice = view('admin.admin_edit_notice')
                            ->with('single_notice_info',$single_notice_info);
                        
            return view('admin.admin_master')
                        ->with('admin_main_content',$edit_notice);           
            
        }else{
            return Redirect::to('/admin-login');
        }
    }

    public function updateNoticeInfo(Request $request, $id){

        if($this->auth_check() ==1){

            $data = array();
            $data['notice_title'] = $request->title;
            $data['notice_description'] = $request->description;
            $data['link'] = $request->link;
            $data['publication_status'] = $request->publication_status;
            $data['updated_at'] = date("Y-m-d");

            $insert = DB::table('tbl_notice_board')
                    ->where('notice_id',$id)
                    ->update($data);
            Session::put('notice_update_success_message','Notice Updated Successfully !');
            return Redirect::to('/add-notice');
            
            
        }else{
            return Redirect::to('/admin-login');
        }
    }

    public function deleteNotice($id){

        if($this->auth_check() ==1){
            $delete = DB::table('tbl_notice_board')
                        ->where('notice_id',$id)
                        ->delete();
            return Redirect::to('/admin-notice-board');  

        }else{
            return Redirect::to('/admin-login');
        }         
    }

    public function changeNoticeStatus($id){

        if($this->auth_check() ==1){

            $info = DB::table('tbl_notice_board')
                    ->select('publication_status')
                    ->where('notice_id',$id)
                    ->first();
            
            if($info->publication_status == 1){

                $data = array();
                $data['publication_status'] = 0;

            }else{
                $data = array();
                $data['publication_status'] = 1;
            }

            $update = DB::table('tbl_notice_board')
                        ->where('notice_id',$id)
                        ->update($data);
                return Redirect::to('/admin-notice-board');
        }else{
            return Redirect::to('/admin-login');
        }
    }

    public function addGalleryImage(){

        if($this->auth_check() ==1){

            $all_category_info = DB::table('tbl_gallery_category')
                                ->get();
            $form =  view('admin.admin_add_gallery_image')
                    ->with('all_category_info',$all_category_info);
            return view('admin.admin_master')
                            ->with('admin_main_content',$form); 

        }else{
            return Redirect::to('/admin-login');
        }
    }

    public function saveGalleryImage(Request $request){

        if($this->auth_check() ==1){

             $this->validate($request, [

                'filename' => 'required',
                'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);
            
            if($request->hasfile('filename'))
             {
                $image_category  = $request->image_category;
                $image_title = $request->image_title;
                $filename = $request->filename;
                

                $array_size = $filename;
                $a = sizeof($array_size);
                // echo "<pre>";
                // print_r($request->file('filename'));
                // exit();
                // foreach($request->file('filename') as $image)
                for($i=0;$i<$a;$i++){
                    {
                        $name=rand(1, 10000000).$filename[$i]->getClientOriginalName();
                        $filename[$i]->move(base_path().'/gallery_images/', $name);  
                        $data['file_name'] = $name;
                        $data['category_id'] = $image_category[$i];
                        $data['image_title'] = $image_title[$i];
                        DB::table('tbl_gallery')
                            ->insert($data);
                    }
                }
             }

            return back()->with('success', 'Your Information has been successfully added');

        }else{
                return Redirect::to('/admin-login');
            }
    }

    
    public function adminManageGallery(){

        if($this->auth_check() ==1){

            $all_gallery_image = DB::table('tbl_gallery')
                                ->join('tbl_gallery_category', 'tbl_gallery.category_id', '=', 'tbl_gallery_category.category_id')
                                ->orderBy('id')
                                ->get();
            $admin_image_gallery = view('admin.admin_manage_gallery')
                                    ->with('all_gallery_image',$all_gallery_image);
            return view('admin.admin_master')
                            ->with('admin_main_content',$admin_image_gallery); 
        }else{
                return Redirect::to('/admin-login');
            }
    }

    public function adminGalleryCategory(){

        if($this->auth_check() ==1){

            $all_category_info = DB::table('tbl_gallery_category')
                                ->get();
            $form =  view('admin.admin_gallery_category')
                    ->with('all_category_info',$all_category_info);
            return view('admin.admin_master')
                            ->with('admin_main_content',$form); 

        }else{
            return Redirect::to('/admin-login');
        }
    }

    public function addGalleryCategory(){

        if($this->auth_check() ==1){

            $form =  view('admin.admin_add_gallery_category');
            return view('admin.admin_master')
                            ->with('admin_main_content',$form); 

        }else{
            return Redirect::to('/admin-login');
        }
    }

    public function saveGalleryCategoryInfo(Request $request){

        if($this->auth_check() ==1){

            $data = array();
            $data['category_name'] = $request->name;
            $data['category_description'] = $request->description;
            $data['publication_status'] = $request->publication_status;
           

            $insert = DB::table('tbl_gallery_category')
                    ->insert($data);
            Session::put('category_success_message','Category Added Successfully !');
            return Redirect::to('/add-gallery-category');
            
            
        }else{
            return Redirect::to('/admin-login');
        }
    }

    public function editGalleryCategory($id){

        if($this->auth_check() ==1){

            $single_category_info = DB::table('tbl_gallery_category')
                                    ->where('category_id',$id)
                                    ->first();
            $form = view('admin.admin_edit_gallery_category')
                ->with('single_category_info',$single_category_info);
            return view('admin.admin_master')
                            ->with('admin_main_content',$form); 

        }else{
            return Redirect::to('/admin-login');
        }
    }

    public function updateGalleryCategoryInfo(Request $request, $id){

        if($this->auth_check() ==1){

            $data = array();
            $data['category_name'] = $request->name;
            $data['category_description'] = $request->description;
            $data['publication_status'] = $request->publication_status;
           

            $insert = DB::table('tbl_gallery_category')
                    ->where('category_id',$id)
                    ->update($data);
            Session::put('update_category_success_message','Category Updated Successfully !');
            return Redirect::to('/add-gallery-category');
            
            
        }else{
            return Redirect::to('/admin-login');
        }
    }

    public function deleteGalleryCategoryInfo($id){

        if($this->auth_check() ==1){
            $delete = DB::table('tbl_gallery_category')
                        ->where('category_id',$id)
                        ->delete();
            return Redirect::to('/admin-gallery-category');  

        }else{
            return Redirect::to('/admin-login');
        }         
    }

    public function changeGalleryCategoryStatus($id){

        if($this->auth_check() ==1){

            $info = DB::table('tbl_gallery_category')
                    ->select('publication_status')
                    ->where('category_id',$id)
                    ->first();
            
            if($info->publication_status == 1){

                $data = array();
                $data['publication_status'] = 0;

            }else{
                $data = array();
                $data['publication_status'] = 1;
            }

            $update = DB::table('tbl_gallery_category')
                        ->where('category_id',$id)
                        ->update($data);
                return Redirect::to('/admin-gallery-category');
        }else{
            return Redirect::to('/admin-login');
        }
    }

    public function adminEditGallery($id){

        if($this->auth_check() ==1){

            $all_category_info = DB::table('tbl_gallery_category')
                                ->get();
            $single_image_info = DB::table('tbl_gallery')
                                ->where('id',$id)
                                ->first();
            $form =  view('admin.admin_edit_gallery_image')
                    ->with('all_category_info',$all_category_info)
                    ->with('single_image_info',$single_image_info);
            return view('admin.admin_master')
                            ->with('admin_main_content',$form); 

        }else{
            return Redirect::to('/admin-login');
        }
    }

    public function adminSaveGalleryImage(Request $request, $id){

        if($this->auth_check() ==1){

             $this->validate($request, [
               
                'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);
            $image_category  = $request->image_category;
            $image_title = $request->image_title;
            $exits_filename = $request->exits_filename;

            if($request->hasfile('filename'))
             {               
                $filename = $request->filename;                     
                $name=rand(1, 10000000).$filename->getClientOriginalName();
                $filename->move(base_path().'/gallery_images/', $name);
                unlink(base_path().'/gallery_images/'.$exits_filename);  
                $data['file_name'] = $name;                               
             }

            $data['category_id'] = $image_category;
            $data['image_title'] = $image_title;
            DB::table('tbl_gallery')
                ->where('id',$id)
                ->update($data);
            return redirect::to('/admin-gallery')->with('update_info', 'Your Information has been successfully updated'); 

        }else{
                return Redirect::to('/admin-login');
            }
    }

    public function adminDeleteGallery($id){

        if($this->auth_check() ==1){
            $single_image_info = DB::table('tbl_gallery')
                                    ->where('id',$id)
                                    ->first();
            $exits_filename = $single_image_info->file_name;
            $delete = DB::table('tbl_gallery')
                            ->where('id',$id)
                            ->delete();
            unlink(base_path().'/gallery_images/'.$exits_filename);
            return redirect::to('/admin-gallery')->with('delete_info', 'Your Information has been successfully deleted');

        }else{
            return Redirect::to('/admin-login');
        }
    }

    public function adminDeleteUser($id){

        if($this->auth_check() ==1){
            $single_user_info = DB::table('registration')
                                    ->where('id',$id)
                                    ->first();
            $exits_user_image = $single_user_info->user_image;
            $exits_user_reg_card = $single_user_info->reg_card_image;
            $delete = DB::table('registration')
                            ->where('id',$id)
                            ->delete();
            unlink(base_path().'/user_images/'.$exits_user_image);
            unlink(base_path().'/user_images/'.$exits_user_reg_card);
            return redirect::to('/admin-dashboard')->with('delete_info', 'User has been successfully deleted');

        }else{
            return Redirect::to('/admin-login');
        }
    }

    public function activeUser($id){
        if($this->auth_check() ==1){
            $data = array();
            $data['request_status'] = 1;

            $info = DB::table('registration')
                    ->where('id',$id)
                    ->update($data);

            return Redirect::to('/suspend-user-list')->with('active_info', 'User has been successfully activated');
        }else{
            return Redirect::to('/admin-login');
        }
    }


}
