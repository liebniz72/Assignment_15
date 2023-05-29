<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function __invoke(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Send an email with the submitted data
        Mail::to('your-email@example.com')->send(new \App\Mail\ContactFormMail($validatedData));

        // Redirect back to the form with a success message
        return redirect()->back()->with('success', 'Thank you for your message!');
    }
}
