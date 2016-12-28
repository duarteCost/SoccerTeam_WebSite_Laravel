<?php

/*namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Http\Controllers\Controller;//adicionei isto de outro site
use App\Http\Requests;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;*/

namespace App\Http\Controllers;

/*use App\Order;
use App\Mail\OrderShipped;*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Session;    //nao parece estar a funcionar




class HelpController extends Controller
{
    public function postContact(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'min:3',
            'message' => 'min:10']);

        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        );

        Mail::send('emails.contact', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('moscapt1988@mailtrap.io');
            $message->subject($data['subject']);
        });

        Session::flash('success', 'Your Email was Sent!');

        return redirect('contact');
    }

    public function getContact()
    {
        return view('help');
    }

    public function contact()
    {
        return view('emails.contact');
    }

    //lol
}