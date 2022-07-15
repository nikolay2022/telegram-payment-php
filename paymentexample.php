<?php

define('TOKEN', 'YOU_BOT_TOKEN');
define('PAYMENT_TOKEN', 'YOU_PAYMENT_TOKEN');

$data = json_decode(file_get_contents('php://input'), TRUE);
if (!empty($data['pre_checkout_query'])) {
    $id = $data['pre_checkout_query']['id'];
    $send_dataa = [
        'pre_checkout_query_id' => $id,
        'ok' => true,
    ];

    $method = "answerPreCheckoutQuery";
    $res = sendTelegram($method, $send_dataa);

}

$msg = $data['message'];
if (!empty($msg['successful_payment'])) {
    $method = 'sendMessage';
    $send_data = [
        'text' => "Платеж успешно прошел",
    ];

    $send_data['chat_id'] = $msg['chat']['id'];
}


$data = $data['callback_query'] ? $data['callback_query'] : $data['message'];
$id = $data['chat']['id'];
$message = (($data['text'] ? $data['text'] : $data['data']));

$type = "input message";
$tgid = $data['chat']['id'];
$firstname = $data['chat']['first_name'];
$lastname = $data['chat']['last_name'];
$username = $data['chat']['username'];

if (empty($data['pre_checkout_query']) && empty($msg['successful_payment']))
    switch ($message) {
        case '/start':
            $method = 'sendMessage';

            $send_data = [
                'text' => 'Привет! это бот для демонстрации работы выставления счета. Отправь слово Опалтить и я пришлю тебе счет',
                'reply_markup' => [
                    'resize_keyboard' => true,
                    'keyboard' => [
                        [

                            ['text' => 'Оплатить'],
                        ],

                    ]
                ],
            ];

            $send_data['chat_id'] = $data['chat']['id'];
            break;

        case 'Оплатить':

            $method = 'sendInvoice';
            $prise = json_encode([
                'label' => 'label',
                'amount' => 20000,
            ]);

            $ff = array(json_decode($prise));

            $send_data = [
                'title' => 'title',
                'description' => 'description',
                'payload' => 'payload',
                'provider_token' => PAYMENT_TOKEN,
                'currency' => 'RUB',
                'prices' => $ff,
            ];

            $send_data['chat_id'] = $data['chat']['id'];

            break;


        default:
            $method = 'sendMessage';

            $send_data = [
                'text' => 'Такой команды нет',
            ];

            $send_data['chat_id'] = $data['chat']['id'];
            break;

    }


$res = sendTelegram($method, $send_data);

function sendTelegram($method, $data, $headers = [])
{
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_POST => 1,
        CURLOPT_HEADER => 0,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'https://api.telegram.org/bot' . TOKEN . '/' . $method,
        CURLOPT_POSTFIELDS => json_encode($data),
        CURLOPT_HTTPHEADER => array_merge(array("Content-Type: application/json"), $headers)
    ]);

    $result = curl_exec($curl);

    curl_close($curl);
    return (json_decode($result, 1) ? json_decode($result, 1) : $result);
}