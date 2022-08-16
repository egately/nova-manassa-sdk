<?php

namespace Egately\NovaManassaSdk;

use Egately\NovaManassaSdk\Actions\AccountActions;

class NovaManassaSdk
{

    protected $config;


    public function __construct()
    {
        $this->config = config('nova-manassa-sdk');
    }


    public function CreateAccount(
        int    $remote_id,
        string $name,                   // required
        string $email,                  // required to send Invoices To if enabled
        string $type = 'subscriptions',      //'personal' or 'business'
        string $phone = null,           //optional +218911234567
        string $address_1 = null,       //optional
        int    $city_id = null,         //1 Tripoli , 2 Benghazi optional
        string $country_id = 'LY',      //optional
        string $postal_code = null,     //optional
        string $website = null,         //optional
        string $latitude = null,        //optional
        string $longitude = null,       //optional

    )
    {
        $Data = [
            'remote_id' => $remote_id,
            'name' => $name,
            'email' => $email,
            'type' => $type,
            'phone' => $phone,
            'address_1' => $address_1,
            'city_id' => $city_id,
            'country_id' => $country_id,
            'postal_code' => $postal_code,
            'website' => $website,
            'latitude' => $latitude,
            'longitude' => $longitude,
        ];
        $Data = array_filter($Data);

        $Account = app(AccountActions::class)->CreateAccount($Data);

        return $Account;

    }
}
