<?php

namespace App\Http\Controllers;

use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        $newsletter->subscribe(auth()->user()->email);
        try {
        } catch (Exception $err) {
            throw ValidationException::withMessages([
                'email' => 'this email is invalid'
            ]);
        }

        return back()->with('success', 'you are now subscribed to our newsletter');
    }
}
