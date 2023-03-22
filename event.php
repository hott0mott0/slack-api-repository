<?php

$data = file_get_contents('php://input');
$data = json_decode($data, true);

if ($data['type']=='url_verification') {
    echo json_encode($data["challenge"]);
} else if ($data['type']=='event_callback') {
    // error_log(print_r($data, true));
    error_log(print_r($data, true));
    $event = $data["event"];
    // error_log(print_r($event, true));

    if ($event["type"]=="app_mention") {
        error_log("app_mentioned");
        $message = 
        [
            'attachments' => 
            [
                [
                    "text" => "以下の選択肢から要件を選んでください。",
                    "callback_id" => "select_menu",
                    "color" => "#3AA3E3",
                    "attachment_type" => "default",
                    "actions" => [
                        [
                            "name" => "list",
                            "text" => "選択してください",
                            "type" => "select",
                            "options" => [
                                [
                                    "text" => "WPについて知りたい",
                                    "value" => "wpHomepageLink"
                                ],
                                [
                                    "text" => "社内の管理画面にアクセスしたい",
                                    "value" => "wpManageSystem"
                                ],
                            ]
                        ],
                        [
                            "name" => "cancel",
                            "type" => "button",
                            "text" => "キャンセル",
                            "value" => "cancel"
                        ],
                    ]
                ],
            ]
        ];
    
        $ch = curl_init("xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx");
        curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($message));
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, false );
        curl_exec($ch);
        // error_log(curl_error($ch));
        curl_close($ch);
    }
}