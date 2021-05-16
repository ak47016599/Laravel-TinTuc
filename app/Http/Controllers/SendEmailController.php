<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\SendMail;
class SendEmailController extends Controller
{
    //
    public function index(){
         return (view('send_email'));
    }
    public function send(Request $request){
         echo "Tên : $request->username <br/>";
         echo "Email : $request->email <br/>";
         echo "Nội Dung : $request->content <br/>";
        /* $this->validate($request, [
             'username' => 'required',
             'email' => 'required',
             'content' => 'required'
         ],
         [
            'username.required' => 'Tên không được để trống',
            'email.required' => 'email Không được để trống',
            'content.required' => 'Nội dung không được để trống'
         ]); */
         $data = array(
            'name' => $request->username,
            'content' => $request->content

         );
       //  return (redirect('sendEmail'));
       Mail::to('vuminhhungltt904@gmail.com')->send(new SendMail($data));
       return back()->with('success', 'Thank you contact us!');
    }
}
