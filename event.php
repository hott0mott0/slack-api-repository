<?php

$data = file_get_contents('php://input');
$data = json_decode($data, true);

$event = $data['event'];

if ($event['type']=='challenge') {
    return $data;
} else if ($event['type']=='app_mention') {
    error_log(print_r($event, true));
}

$ch = curl_init("https://hooks.slack.com/services/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");
curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($data) );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
$result = curl_exec($ch);
curl_close($ch);