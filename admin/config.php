<?php
require_once 'vendor/autoload.php';
$google_client = new Google_Client();
$google_client->setClientId('166833365582-v1h7jj9b23h7udpu4vbf0tkpe9pgovqq.apps.googleusercontent.com');
$google_client->setClientSecret('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');
$google_client->setRedirectUri('https://server.eminentcompliance.com/login/index.php');
$google_client->addScope('email');
$google_client->addScope('profile');
session_start();
?>