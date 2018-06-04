<?php

namespace App\Http\Controllers;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Mail\Transport\MailgunTransport;
use Session;
use Mail;
use Illuminate\View\View;
use Redirect;

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
    public function index(){
        return view('email.mail');
    }
    public function send(){
        Mail::send(['text'=>'mail'],['name','mahfuzh'],function ($message){
            $message->to('m2h2.doxa@gmail.com');
            $message->subject('test mail');
            $message->from('mahfuzhur@gmail.com');
        });
    }
}
