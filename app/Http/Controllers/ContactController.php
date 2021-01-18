<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\Contacted;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function input() {

        return view('contact.input');

    }

    public function send(ContactRequest $request) {

        $subjects = \App\EmailSubject::all();
        $params = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'subject_id' => $request->subject_id,
            'body' => $request->body,
            'subject' => $subjects[$request->subject_id]
        ];
        \Mail::to('admin@example.com')->send(new Contacted($params));

    }
}
