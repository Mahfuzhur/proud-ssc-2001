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
             $id = $request->input('id');
             $email = $request->input('email');
                $client = Registration::find($id);


                //$client->request_status = 1;

                $client->save();
        $data = array(
            'email' => "mahfuzhur@gmail.com",
            'subject' => "hello",
            'bodyMessage' => "Hello 123"
        );
//            Mail::to($email)->send(new sendMail());
        Mail::send('mail', $data, function ($message) use ($data){
            $message->to($data['email']);
            $message->subject($data['subject']);
            $message->from('mahfuzhur@gmail.com');
        });
//        Mail::send(new SendMail());
    }
    public function email(){
        return view('email');
    }
}
