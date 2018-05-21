<?php

// Replace 'yourbotname' with your bot's name
$WEBHOOK_URL = 'https://yourbotname.herokuapp.com/execute.php';

// Replace 'YOUR TOKEN HERE' with your token
$BOT_TOKEN = 'YOUR TOKEN HERE';

// Do not change this
$API_URL = 'https://api.telegram.org/bot' . $BOT_TOKEN .'/';
$method = 'setWebhook';
$parameters = array('url' => $WEBHOOK_URL);
$url = $API_URL . $method. '?' . http_build_query($parameters);
$handle = curl_init($url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($handle, CURLOPT_TIMEOUT, 60);
$result = curl_exec($handle);
print_r($result);
