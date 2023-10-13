<?php
    require 'vendor/autoload.php';
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

$response = $client->request('POST','whatsapp/1/message/template',[ RequestOptions::JSON => [
            'messages' => [
                [
                    'from' => '918303353169',
                    'to' => '91'.$_SESSION['admin_mobile'],
                    'content' => [
                        'templateName' => 'login',
                        'templateData' => [
                            'body' => [
                                'placeholders' => [$_SESSION['admin_name'], $_SESSION['OTP']]
                            ],
                            
                        ],
                        'language' => 'en_US',
                    ],
                ]
            ]
        ],
    ]
);

echo("HTTP code: " . $response->getStatusCode() . PHP_EOL);
echo("Response body: " . $response->getBody()->getContents() . PHP_EOL);
