<?php

namespace App\Services;

use Illuminate\Support\Facades\Config;
use MailchimpMarketing\ApiClient;



class MailchimpNewsletter
{
    //Register client in AppProvider
    public function __construct(protected ApiClient $client)
    {
        //
    }


    public function subscribe($email, string $list = null)
    {

        $list ??= config('services.mailchimp.lists.subscribers');

        return $response = $this->client->lists->addListMember(Config('services.mailchimp.lists'), [
            'email_address' => $email,
            'status' => 'subscribed'
        ]);
    }
}
