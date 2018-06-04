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
class AdminController extends Controller
{


    public function adminLogin(){
        return view('admin.admin_login');
    }

    public function adminLoginCheck(Request $request){

        $email = $request->admin_email;
        $password = md5($request->admin_password);

        $admin_info = DB::table('tbl_admin')
                        ->select('*')
                        ->where('admin_email',$email)
                        ->where('admin_password',$password)
                        ->get();
                        echo "<pre>";
                        print_r($admin_info);
                        exit();

        if(!empty($admin_info)){
            // Session::put('current_admin_id',$admin_info->admin_id);
            // Session::put('current_admin_name',$admin_info->admin_name);
            return redirect::to('/admin-dashboard');
        }
        else{
            //Session::put('login_error','Email Or Password Invalid !');
            return redirect::to('/admin-login');
        }
    }

    public function adminDashboard(){
        echo "found";
    }

}
