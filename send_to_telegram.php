<?php
// vk_send.php

// Ваш токен доступа (поддерживающий права на отправку сообщений)
$access_token = '54150018';

// ID пользователя или сообщества, которому нужно отправить сообщение
$peer_id = 'list_all';

// Получаем данные из формы
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Формируем сообщение
$text = "Обратная связь:\nИмя: $name\nEmail: $email\nСообщение: $message";

// URL для отправки сообщения через API ВКонтакте
$url = "https://api.vk.com/method/messages.send";

// Параметры запроса
$params = [
    'access_token' => $access_token,
    'peer_id' => $peer_id,
    'message' => $text,
    'v' => '5.131' // версия API
];

// Формируем POST-запрос
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);

// Можно вывести сообщение или перенаправить
echo "Сообщение отправлено!";
?>