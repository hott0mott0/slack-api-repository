<?php

$message = ["text" => "Slack APIメッセージ投稿テストです。"];

$ch = curl_init("https://hooks.slack.com/services/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");
curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($message));
curl_setopt( $ch, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, false );
curl_exec($ch);
// error_log(curl_error($ch));
curl_close($ch);