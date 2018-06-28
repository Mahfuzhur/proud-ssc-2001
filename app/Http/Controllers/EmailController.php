<?php

namespace App\Http\Controllers;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Mail\Transport\MailgunTransport;
use Session;
use Mail;
use Illuminate\View\View;
use Redirect;
use App\Mail\SendMail;
use App\Registration;
use Illuminate\Support\Facades\Hash;
use DB;

class EmailController extends Controller
{
    public function postContact(Request $request){

        $data = array(
            'email' => "mahfuzhur.rahman@gmail.com",
            'subject' => "hello",
            'bodyMessage' => "Hello 123"
        );

        Mail::send('email.contact', $data, function ($message) use ($data){
            $message->to($data['email']);
            $message->subject($data['subject']);
            $message->from('mahfuzhur@gmail.com');
        });

        session::flash('success',"mail submitted");
        return redirect::to('/mail');
    }
//    public function index(){
//        return view('email.mail');
//    }
 public function send(Request $request){
        // Mail::send(new SendMail());
        $id = $request->id;
        $email = $request->email;
        // echo $id;
        // exit();
        $string = rand(1000,10000);
        $password = md5($string);
        // $data = array(
        //     'email' => $email,
        //     'subject' => "confarmation",
        //     'username' => $email,
        //     'password' => $string
            
        // );
        try{
            
            // Mail::send('mail', $data, function ($message) use ($data){
            // $message->to($data['email']);
            // $message->subject($data['subject']);
            // $message->from('info@proudssc2001bd.com');
            // });
            // $user = Registration::find($id);
            

            // $user->request_status = 1;
            // $user->password= $password;

            $data = array(
                'password' => $password,
                'request_status' => "1",
                
            
            );

            $info = DB::table('registration')
                    ->where('id',$id)
                    ->update($data);
                    echo $string;
                     exit();
                // return 'abcd';
                     
            // $requested_user_info = DB::table('registration')
            //                     ->where('request_status',0)
            //                     ->get();
            // echo $string;
            //  return view('admin.admin_ajax_pending_request')
            //         ->with('requested_user_info',$requested_user_info);
            //         echo $string;
            //         exit();
            // // $user->save();
            // return redirect()->back();
        }catch(Exception $ex){
            //echo "email not send";
            return $ex;
        }
        
        
 }
    public function email(){
        return view('email');
    }

    public function forgotPasswordMailSend(Request $request){

        $email = $request->email;
        $email_exits_check = DB::table('registration')
                            ->where('email', $request->email)
                            ->where('request_status', 1)
                            ->first();
        if(empty($email_exits_check)){
            Session::put('email_exits_error','Email Not Found !');
            return redirect()->back();
        }else{

        $string = rand(1000,10000);
        $password = md5($string);
        // $data = array(
        //     'email' => $email,
        //     'subject' => "confarmation",
        //     'username' => $email,
        //     'password' => $string
            
        // );
        try{
            
            // Mail::send('mail', $data, function ($message) use ($data){
            // $message->to($data['email']);
            // $message->subject($data['subject']);
            // $message->from('info@proudssc2001bd.com');
            // });
            // $user = Registration::find($id);
            

            // $user->request_status = 1;
            // $user->password= $password;

            $data = array(
                'password' => $password,
                'request_status' => "1",
                
            
            );

            $info = DB::table('registration')
                    ->where('email',$email)
                    ->update($data);
                    echo $string;
                    exit();
            // $user->save();
            return redirect()->back();
        }catch(Exception $ex){
            //echo "email not send";
            return $ex;
        }
        }
    }
}
