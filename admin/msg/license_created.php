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
if(isset($send_license_to_whatsapp) AND $send_license_to_whatsapp != ""){
    $sql = "SELECT *, s_by.admin_name AS store_list_by, s_by.admin_mobile AS store_list_by_mob, aby.admin_name AS assign_by, aby.admin_mobile AS assign_by_mob, ato.admin_name AS assign_to, ato.admin_mobile AS assign_to_mob FROM lic_list 
        INNER JOIN license ON lic_list.lic_list_license = license.license_id
        INNER JOIN type ON lic_list.license_type = type.type_id
        INNER JOIN department ON lic_list.lic_list_department = department.department_id
        INNER JOIN store_list ON store_list.store_list_id = lic_list.lic_list_store
        INNER JOIN city_state ON store_list.store_list_cs = city_state.CS_id
        INNER JOIN region ON city_state.CS_region_id = region.region_id
        INNER JOIN company ON store_list.store_list_company = company.company_id
        INNER JOIN status ON lic_list.lic_list_status = status.status_id
        LEFT JOIN admin AS s_by ON s_by.admin_id = store_list.store_list_by
        LEFT JOIN admin AS aby ON aby.admin_id = lic_list.lic_list_assign_by
        LEFT JOIN admin AS ato ON ato.admin_id = lic_list.lic_lis_assign_to
        LEFT JOIN audit ON audit.audit_lic = lic_list.lic_list_id WHERE lic_list_id='$send_license_to_whatsapp'";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $value2=$row['license_name'];
            $value3=$row['type_name'];
            $value4=$row['department_name'];
            $value5=$row['company_name'];
            $value6=$row['store_list_name'];
            $value7=$row['store_list_address'].", ".$row['CS_city'].", ".$row['CS_state']." - ".$row['store_list_pincode'];
            $value8=$row['store_list_by'];
            $value9="91".$row['store_list_by_mob'];
            $value10=$row['assign_by'];
            $value11="91".$row['assign_by_mob'];
            $value12=$row['assign_to'];
            $value13="91".$row['assign_to_mob'];
            $value14=$row['lic_list_emp_rmk'];
        }
    }
    $response = $client->request('POST','whatsapp/1/message/template',[ RequestOptions::JSON => [
                'messages' => [
                    [
                        'from' => '918303353169',
                        'to' => $value9,
                        'content' => [
                            'templateName' => 'create_license',
                            'templateData' => [
                                'body' => [
                                    'placeholders' => [$value8, $value2, $value3, $value4, $value5, $value6, $value7, $value8, $value9, $value10, $value11, $value12, $value13, $value14]
                                ],
                                
                            ],
                            'language' => 'en_US',
                        ],
                    ]
                ]
            ],
        ]
    );

    // echo("HTTP code: " . $response->getStatusCode() . PHP_EOL);
    // echo("Response body: " . $response->getBody()->getContents() . PHP_EOL);
    if($value9 != $value11){
        $response = $client->request('POST','whatsapp/1/message/template',[ RequestOptions::JSON => [
            'messages' => [
                [
                    'from' => '918303353169',
                    'to' => $value11,
                    'content' => [
                        'templateName' => 'create_license',
                        'templateData' => [
                            'body' => [
                                'placeholders' => [$value10, $value2, $value3, $value4, $value5, $value6, $value7, $value8, $value9, $value10, $value11, $value12, $value13, $value14]
                            ],
                            
                        ],
                        'language' => 'en_US',
                    ],
                ]
            ]
        ],
        ]
        );

        // echo("HTTP code: " . $response->getStatusCode() . PHP_EOL);
        // echo("Response body: " . $response->getBody()->getContents() . PHP_EOL);
    }
    if($value9 != $value13 AND $value11 != $value13){
        $response = $client->request('POST','whatsapp/1/message/template',[ RequestOptions::JSON => [
            'messages' => [
                [
                    'from' => '918303353169',
                    'to' => $value13,
                    'content' => [
                        'templateName' => 'create_license',
                        'templateData' => [
                            'body' => [
                                'placeholders' => [$value12, $value2, $value3, $value4, $value5, $value6, $value7, $value8, $value9, $value10, $value11, $value12, $value13, $value14]
                            ],
                            
                        ],
                        'language' => 'en_US',
                    ],
                ]
            ]
        ],
        ]
        );
    }
    // echo("HTTP code: " . $response->getStatusCode() . PHP_EOL);
    // echo("Response body: " . $response->getBody()->getContents() . PHP_EOL);
}