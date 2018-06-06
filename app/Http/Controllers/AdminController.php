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
            return 1;
        }else{
            return 0;
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

        $registered_user_info = DB::table('registration')
                            ->where('request_status',1)
                            ->get();
        $user_info = view('admin.admin_registered_user')
                    ->with('registered_user_info',$registered_user_info);
        return view('admin.admin_master')
                    ->with('admin_main_content',$user_info);
    }

    public function adminLogout(){

        Session::put('current_admin_id','');
        Session::put('current_admin_name','');
        //Session::put('message','You are successfully logout !');
        return Redirect::to('/admin-login');
    }

    public function accepted(Request $request){
        $id = $request->input('id');
        $email = $request->input('email');

        $user = Registration::find($id);

        $user->request_status = 1;
        $user->save();
        return redirect()->back();


    }

}
