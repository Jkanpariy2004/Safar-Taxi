<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Mail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MailController extends Controller
{
    //
    public function txt_mail(Request $req)
    {
        $input = $req->all();
        $validator = Validator::make($input, [
            // 'car_type' => 'required',
            'phone' => 'required|min:10',
            'pick_up' => 'required',
            'drop' => 'required',
        ])->validateWithBag('user');

        if ($validator) {
            $info = array(
                'phone' => $req->phone,
                'pick_up' => $req->pick_up,
                'car_type' => $req->car_type,
                'drop' => $req->drop,
            );
            Mail::send('mail', $info, function ($message) {
                $message->to('rajeshmunot2@gmail.com', 'Knommy')
                        ->from('rajeshmunot2@gmail.com', 'Knommy')
                        ->subject('Welcome to our website');
                        
            });
            
            
            session()->flash('success', 'Email sent successfully!');

            return redirect()->back();   
        }
        else{
            return redirect()->back()->withErrors($validator)->withInput();

           
        }


   }
   public function contact_mail(Request $req)
   {
      $input = $req->all();
    $validator = Validator::make($input, [
        'number' => 'required|digits:10',
        'name' => 'required',

    ])->validateWithBag('contact');

        if ($validator){
            $info = array(
                'number' => $req->number,
                'msg' => $req->msg,
                'name' => $req->name,
            );
            Mail::send('feedback', $info, function ($message) {
                $message->to('rajeshmunot2@gmail.com', 'Knommy')
                        ->from('rajeshmunot2@gmail.com', 'Knommy')
                        ->subject('Inquiry by client');
            });
                return redirect()->back();        
        
        }
        else{
            return redirect()->back()->withErrors($validator)->withInput();

          
        }
   }


    public function html_mail()
    {
        $info = array(
            'name' => "Pandav Ashish"
        );
        Mail::send('mail', $info, function ($message)
        {
            $message->to('rajeshmunot2@gmail.com', 'w3schools')
                ->subject('HTML test eMail from W3schools.');
            $message->from('ashishpandav2003@gmail.com', 'Pandav Ashish');
        });
        return redirect()->back();        
    }

    public function attached_mail()
    {
        $info = array(
            'name' => "Alex"
        );
        Mail::send('mail', $info, function ($message)
        {
            $message->to('rajeshmunot2@gmail.com', 'w3schools')
                ->subject('Test eMail with an attachment from W3schools.');
            $message->attach('D:\laravel_main\laravel\public\uploads\pic.jpg');
            $message->attach('D:\laravel_main\laravel\public\uploads\message_mail.txt');
            $message->from('karlosray@gmail.com', 'Alex');
        });
        echo "Successfully sent the email";
    }

}
