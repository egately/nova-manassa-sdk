<?php

namespace Egately\NovaManassaSdk\Traits;

use Egately\NovaManassaSdk\NovaManassaSdk;

trait HasManassaAccountTrait
{

    public function manassaAccount()
    {
        return $this->morphOne(\Egately\NovaManassaSdk\Models\EgateManssa::class, 'manssaable');
    }


    public function AddAccount(

        string $name,                   // required
        string $email,                  // required to send Invoices To if enabled
        string $type = 'personal',      //'personal' or 'business'
        string $phone = null,           //optional +218911234567
        string $address_1 = null,       //optional
        int    $city_id = null,         //1 Tripoli , 2 Tripoli optional
        string $country_id = 'LY',      //optional
        string $postal_code = null,     //optional
        string $website = null,         //optional
        string $latitude = null,        //optional
        string $longitude = null,       //optional
    )
    {
        $RemoteId = $this->manassaAccount()->insertGetId([]);
        $accounnt = app(NovaManassaSdk::class)->CreateAccount(
            remote_id: $RemoteId,
            name: $name,
            email: $email,
            type: $type,
            phone: $phone,
            address_1: $address_1,
            city_id: $city_id,
            country_id: $country_id,
            postal_code: $postal_code,
            website: $website,
            latitude: $latitude,
            longitude: $longitude
        );

        if($accounnt)
        {
            $this->manassaAccount()->update(['manassa_id' => $accounnt['id'], 'manassa_name' => $accounnt['name'], 'status' => 'active']);
        }
        return $accounnt;

    }
}
