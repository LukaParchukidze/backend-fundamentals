<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendMailRequest;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function create() {
        return view('mail/create');
    }

    public function send(SendMailRequest $request) {
//        Mail::raw('Test Mail!', function ($message) use ($request) {
//            $message->to($request->get('mail'))->subject('Hi!');
//        });

        $data = [
            'text' => 'This is a welcome message.',
            'name' => 'Test',
        ];

        Mail::to($request->get('mail'))->send(new WelcomeMail($data));

        return redirect()->route('mail.create');
    }
}
