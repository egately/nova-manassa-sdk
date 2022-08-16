<?php

namespace Egately\NovaManassaSdk\Actions;



use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AccountActions
{



    public function CreateAccount($Data)
    {
      $payload = $this->BuildPayLoad($Data);
      $endpoint = '/account';
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

        if($data  && $data['status'] == 'success')
        {
            return $data['data'];
        }
        else
        {
            throw new \Exception('Manassa Connection Error - F49');
        }





    }

}
