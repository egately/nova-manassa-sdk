<?php

namespace Egately\NovaManassaSdk\Actions;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ManssaClient
{
    protected $config;

    protected $Client;

    protected $Url;

    protected $TenantId;


    public function __construct()
    {
        $this->config = config('nova-manassa-sdk');

        $this->Client = Http::withHeaders([

            'Accept' => 'application/json',
        ])->withToken($this->config['manassa_secret_key']);

        $this->Url = $this->config['manassa_url'];

        $this->TenantId = $this->config['manassa_tenant_id'];
    }

    public function sendPost(array $parameters, string $endpoint)
    {

        $payload = $this->BuildRequest($parameters);

        // Log::info('EgateWalletConnectionClass 37 ' . $payload);

        try {

            $resposne = $this->Client->withBody($payload, 'application/json')->post($this->Url . $endpoint);
            return $this->respond($resposne);

        } catch (\Exception $e) {
            Log::error($e);
            throw new \Exception('Manassa Connection Error - F49');

        }


    }


    private function BuildRequest($parameters)
    {

        $parameters['tenant_id'] = $this->TenantId;

        return json_encode($parameters);

    }

    private function respond($response)
    {
        if ($response->successful()) {
            // Log::info($response);
            return $response->json();

        }
        // Log::error($response);
        // Determine if the response has a 400 level status code...
        if ($response->clientError()) {
            return $response->body();
        }
        // Determine if the response has a 500 level status code...
        if ($response->serverError()) {
            Log::error($response->json());
            return $response->body();
        }

        throw new \Exception('Unable to get response  F-82');


    }


}
