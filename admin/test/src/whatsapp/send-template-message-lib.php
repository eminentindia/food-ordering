<?php

/**
 * Send WhatsApp template message using Infobip API PHP Client.
 *
 * For your convenience, environment variables are already pre-populated with your account data
 * like authentication, base URL and phone number.
 *
 * Send WhatsApp API reference: https://www.infobip.com/docs/api#channels/whatsapp/send-whatsapp-template-message
 *
 * Please find detailed information in the readme file.
 */

require '../../vendor/autoload.php';

use GuzzleHttp\Client;
use Infobip\Api\SendWhatsAppApi;
use Infobip\Model\WhatsAppMessage;
use Infobip\Model\WhatsAppTemplateContent;
use Infobip\Model\WhatsAppTemplateDataContent;
use Infobip\Model\WhatsAppTemplateBodyContent;
use Infobip\Model\WhatsAppBulkMessage;
use Infobip\Configuration;

$BASE_URL = "https://yrg6nd.api.infobip.com";
$API_KEY = "637182ab24357b4396c3763ab0761a8f-385dae8c-4f11-4958-9903-be9e1c5abef9";
$RECIPIENT = "917827970588";

$client = new Client();

$configuration = (new Configuration())
->setHost($BASE_URL)
->setApiKeyPrefix('Authorization', 'App')
->setApiKey('Authorization', $API_KEY);

$whatsAppApi = new SendWhatsAppApi($client, $configuration);

$message = (new WhatsAppMessage())
->setFrom('447860099299')
->setTo($RECIPIENT)
->setContent(
    (new WhatsAppTemplateContent())
        ->setLanguage('en')
        ->setTemplateName('welcome_multiple_languages')
        ->setTemplateData(
            (new WhatsAppTemplateDataContent())
                ->setBody(
                    (new WhatsAppTemplateBodyContent())
                        ->setPlaceholders(['IB_USER_NAME'])
                )
        )
);

$bulkMessage = (new WhatsAppBulkMessage())->setMessages([$message]);

$messageInfo = $whatsAppApi->sendWhatsAppTemplateMessage($bulkMessage);

foreach ($messageInfo->getMessages() as $messageInfoItem) {
    echo $messageInfoItem->getStatus()->getDescription() . PHP_EOL;
}
