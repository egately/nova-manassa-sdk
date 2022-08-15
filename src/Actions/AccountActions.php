<?php

namespace Egately\NovaManassaSdk\Actions;



use Illuminate\Support\Facades\Http;
class AccountActions
{



    public function CreateAccount($Data)
    {
      $payload = $this->BuildPayLoad($Data);
      $endpoint = '/account';
        try {
            $resposne = app(ManssaClient::class)->sendPost($Data, $endpoint);
            return $this->respond($resposne);
        } catch (\Exception $e) {
            Log::error($e);
            throw new \Exception('Manassa Connection Error - F49');
        }
    }

    protected function BuildPayLoad($data)
    {

        $payload =[




        ] ;

        return $payload;


    }

}
