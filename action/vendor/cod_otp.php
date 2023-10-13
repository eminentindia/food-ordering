<?php
require 'autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

$client = new Client([
    'base_uri' => "https://yrg6nd.api.infobip.com/",
    'headers' => [
        'Authorization' => "App 637182ab24357b4396c3763ab0761a8f-385dae8c-4f11-4958-9903-be9e1c5abef9",
        'Content-Type' => 'application/json',
        'Accept' => 'application/json',
    ]
]);

$amount='500';

$response = $client->request(
    'POST',
    'whatsapp/1/message/template',
    [
        RequestOptions::JSON => [
            'messages' => [
                [
                    'from' => '917827970588',
                    'to' => '91' . $phoneNumber,
                    'content' => [
                        // 'templateName' => 'final_delivery',
                        'templateName' => 'new_order',
                        'templateData' => [
                            'body' => [
                                'placeholders' => [$amount,$otp]
                            ],

                        ],
                        'language' => 'en_US',
                    ],
                ]
            ]
        ],
    ]
);

// echo ("HTTP code: " . $response->getStatusCode() . PHP_EOL);
// echo ("Response body: " . $response->getBody()->getContents() . PHP_EOL);
