<?php

namespace App\Http\Controllers;

use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use MailchimpMarketing\ApiClient;


class NewsletterController extends Controller
{
    public function __invoke(MailchimpNewsletter $newsletter)
    {

        $client = new ApiClient;
        $client->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us9'
        ]);

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
