<?php

namespace Egately\NovaManassaSdk\Actions;



use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AccountActions
{



    public function CreateAccount($Data)
    {
        $endpoint = 'account';
        try {
            $resposne = app(ManssaClient::class)->sendPost($Data, $endpoint);
            return $this->AddAccount($resposne);
        } catch (\Exception $e) {
            Log::error($e);
            throw new \Exception('Manassa Connection Error - F49');
        }
    }

    protected function AddAccount($data)
    {

        if(isset($data['data'])  && isset($data['data']['id']) && $data['data']['id'] )
        {
            return $data['data'];
        }
        else
        {
            throw new \Exception('Manassa Connection Error - F49');
        }





    }

}
