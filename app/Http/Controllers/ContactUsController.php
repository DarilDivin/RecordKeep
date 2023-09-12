<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;
use App\Jobs\ContactUsJob;

class ContactUsController extends Controller
{
    public function index() {
        return view('user.ContactUs');
    }

    public function send(ContactUsRequest $request) {

        ContactUsJob::dispatch($request->validated());

        return back()->with('success', 'Votre message a bien été envoyée');
    }
}
