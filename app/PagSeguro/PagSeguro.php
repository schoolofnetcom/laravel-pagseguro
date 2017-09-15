<?php

namespace App\PagSeguro;

use GuzzleHttp\Client;

class PagSeguro
{
    const SESSION = 0;
    const SESSION_SANDBOX = 1;
    const CHECKOUT = 2;
    const CHECKOUT_SANDBOX = 3;

    private $requests = [
        0 => [
            'url' => 'https://ws.pagseguro.uol.com.br/v2/sessions',
            'method' => 'POST',
            'options' => [
                'withBody' => false
            ],
        ],
        1 => [
            'url' => 'https://ws.sandbox.pagseguro.uol.com.br/v2/sessions',
            'method' => 'POST',
            'options' => [
                'withBody' => false
            ],
        ],
        2 => [
            'url' => 'https://ws.pagseguro.uol.com.br/v2/transactions',
            'method' => 'POST',
            'options' => [
                'withBody' => true
            ],
        ],
        3 => [
            'url' => 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions',
            'method' => 'POST',
            'options' => [
                'withBody' => true
            ],
        ]
    ];

    public function request(int $url, array $data = [])
    {
        $request = $this->requests[$url];
        $url = $request['url'];

        if ($request['options']['withBody']) {
            $options['form_params'] = $data;
        } else {
            $url = $url . '?' . http_build_query($data);
            $options = [];
        }

        $client = new Client;
        $response = $client->request($request['method'], $url, $options);

        return $response->getBody();
    }
}
