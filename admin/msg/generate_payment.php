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
if(isset($send_payment_to_whatsapp) AND $send_payment_to_whatsapp != ""){
    $sql = "SELECT *, payby.admin_name As pby, payto.payee_name As pto, lby.admin_name As listby, lby.admin_mobile As listby_mobile FROM pay 
            INNER JOIN payee_list AS payto ON payto.payee_id = pay.pay_to
            INNER JOIN admin AS payby ON payby.admin_id = pay.pay_by
            INNER JOIN lic_list ON lic_list.lic_list_id = pay.pay_lic_list_id
            INNER JOIN admin AS lby ON lby.admin_id = lic_list.lic_list_assign_by
            INNER JOIN store_list ON store_list.store_list_id = lic_list.lic_list_store
            INNER JOIN city_state ON store_list.store_list_cs = city_state.CS_id
            INNER JOIN company ON store_list.store_list_company = company.company_id
            INNER JOIN license ON lic_list.lic_list_license = license.license_id
            INNER JOIN department ON lic_list.lic_list_department = department.department_id
            INNER JOIN type ON lic_list.license_type = type.type_id
            LEFT JOIN audit ON audit.audit_lic = lic_list.lic_list_id
            INNER JOIN status ON lic_list.lic_list_status = status.status_id WHERE pay_id='$send_payment_to_whatsapp'";
    $result = $link->query($sql);
    $msg="Payment Request Notification";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $value1="Submitted";
            $value2=$row['pby'];
            $value3=$row['company_name'];
            $value4=$row['store_list_name'];
            $value5=$row['store_list_address'].", ".$row['CS_city'].", ".$row['CS_state']." - ".$row['store_list_pincode'];
            $value6=$row['license_name'];
            $value7=$row['type_name'];
            $value8=$row['status_name'];
            $value9=$row['department_name'];
            $value10=$row['listby'];
            $value11=$row['listby_mobile'];
            $value12=$row['pby'];
            $value13=$row['pto'];
            $value15=$row['pay_mode'];
            if($row['pay_statutory']!=0){
                $value14="Statutory Payment";
                $value16=$row['pay_statutory'];
                $value17="Subhan Faruqui";
                $mobile="919899479996";
            }else{
                $value14="Expense Payment";
                $value16=$row['pay_expense'];
                $value17="Manish Sharma";
                $mobile="917838614699";
            }
        }
    }

    $response = $client->request('POST','whatsapp/1/message/template',[ RequestOptions::JSON => [
                'messages' => [
                    [
                        'from' => '918303353169',
                        'to' => $mobile,
                        'content' => [
                            'templateName' => 'payment_request',
                            'templateData' => [
                                'body' => [
                                    'placeholders' => [$value1, $value2, $value3, $value4, $value5, $value6, $value7, $value8, $value9, $value10, $value11, $value12, $value13, $value14, $value15, $value16, $value17]
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