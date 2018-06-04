<?php

namespace App\Http\Controllers;

use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function postContact(Request $request){

        $data = array(
            'email' => "mahfuzhur@gmail.com",
            'subject' => "hello",
            'body' => "Hello 123"
        );

        Mail::send('email.contact', $data, function ($message) use ($data){
            $message->to($data['email']);
            $message->subject($data['subject']);
            $message->from($data['mahfuzhur.rahman@gmail.com']);
        });
    }
}
