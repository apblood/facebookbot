<?php

$access_token = 'EAAb8FMoYCnABAK94BCBrZCCOFhMkeA80ZAEAWBKql5IqRjiKHiqZB5NCasiDkSCsSWBrzZCplv3ykktlc0zKIcAGTrU27G3lGb0albCSJZCCEU3hyMScMm67ScYzQ6GedH6ISyT93LIaSZAo7uLZCNL2kvVpZCvEENqf2ntUH2a6JAZDZD';

if (isset($_GET['hub_verify_token'])) {
    if ($_GET['hub_verify_token']===$access_token) {
        echo $_GET['hub_challenge'];
        return;
    }
    else {
        echo 'Invalid Verify Token';
        return;
    }
}

$input = json_decode(file_get_contents('php://input'), true);

if (isset($input['entry'][0]['messaging'][0]['sender']['id'])) {
    $sender = $input['entry'][0]['messaging'][0]['sender']['id'];
    $message = $input['entry'][0]['messaging'][0]['message']['text'];
    
    $url = 'https://graph.facebook.com/v2.6/me/messages?access_token='.$access_token;
    
    $ch = curl_init($url);
    
    $jsonData = '{
        "recipient":{
            "id":"'.$sender.'"
        },
        "message":{
            "text":"OK"
        }
    }';
    
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json));
    
    if (!empty($message)) {
        $result = curl_exec($ch);
    }
}
