<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{



    function contactForm()
    {
        return view(view: "contact");
    }



    function Sendmail(Request $request)
    {
        $data = $request->only(["firstName", "lastName", "email", "phone", "message"]);

        $emailContent = <<<EOD
        You have received a new contact form submission:
        Name: {$data['firstName']} {$data['lastName']}
        Email: {$data['email']}
        Phone: {$data['phone']}
        Message: {$data['message']}
        EOD;

        Mail::raw($emailContent, function ($message) {
            $message->to("adilmalik.aptech@gmail.com")->subject("New Contact Form");
        });
    }
}
