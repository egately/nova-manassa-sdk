<?php

namespace Egately\NovaManassaSdk\Traits;

use Egately\NovaManassaSdk\Actions\AccountActions;
use Egately\NovaManassaSdk\NovaManassaSdk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasManassaAccountTrait
{

    /**
     * @return MorphOne
     */
    public function manassaAccount():MorphOne
    {
        return $this->morphOne(\Egately\NovaManassaSdk\Models\EgateManassa::class, 'manassable');
    }


    /**
     * @param string $name
     * @param string $email
     * @param string $type
     * @param string|null $phone
     * @param string|null $address_1
     * @param int|null $city_id
     * @param string $country_id
     * @param string|null $postal_code
     * @param string|null $website
     * @param string|null $latitude
     * @param string|null $longitude
     * @return mixed
     */
    public function AddAccount(

        string $name,                   // required
        string $email,                  // required to send Invoices To if enabled
        string $type = 'subscriptions',      //'subscriptions' or 'business'
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


        //  $RemoteId = $this->manassaAccount()->create([]);


        $accounnt = app(NovaManassaSdk::class)->CreateAccount(
            remote_id: $this->id,
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
            $this->manassaAccount()->update(['manassa_id' => $accounnt['id'], 'status' => 'active']);
        }
        return $accounnt;

    }

    public function hasValidSubscription(Model $product)
    {

        if(!$this->manassaAccount()->exists()  || $this->manassaAccount->manassa_id == Null)
        {
          $this->AddAccount($this->name, $this->email);
        }
        $subscriptionData = [
            'account_id'=>$this->manassaAccount->manassa_id,
            'product_id' => $product->manassa_product_id,
        ];



         return app(AccountActions::class)->GetValidSubscription($subscriptionData);
      //  return $this->manassaAccount()->where('status', 'active')->exists();
    }
}
