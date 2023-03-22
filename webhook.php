<?php

$message = ["text" => "Slack APIメッセージ投稿テストです。"];

$ch = curl_init("xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx");
curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($message));
curl_setopt( $ch, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, false );
curl_exec($ch);
// error_log(curl_error($ch));
curl_close($ch);