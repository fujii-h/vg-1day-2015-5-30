<?php

use Symfony\Component\HttpFoundation\Request;

$app = new My1DayServer\Application();
$app['debug'] = true;

$app->get('/messages', function () use ($app) {
    $messages = $app->getAllMessages();

    return $app->json($messages);
});

$app->get('/messages/{id}', function ($id) use ($app) {
    $message = $app->getMessage($id);

    return $app->json($message);
});

$app->post('/messages', function (Request $request) use ($app) {
    $data = $app->validateRequestAsJson($request);

    $username = isset($data['username']) ? $data['username'] : '';
    $body = isset($data['body']) ? $data['body'] : '';

    /* $createdMessage = $app->createMessage($username, $body, base64_encode(file_get_contents($app['icon_image_path']))); */

/*    $createdMessage = $app->createMessage("bot", $body, base64_encode(file_get_contents($app['icon_image_path']))); */

    $num = mt_rand(0,4);

    if($num == 0){
        $body = "Nobunaga Oda";
    }else if($num == 1){
        $body = "Naichinge-ru";
    }else if($num == 2){
        $body = "Zabieru";
    }else if($num == 3){
        $body = "Ainshutain";
    }else if($num == 4){
        $body = "Himiko";
    }

/*
    if($username == "uranai"){
    $createdMessage = $app->createMessage("Bot", "Daikichi", base64_encode(file_get_contents($app['icon_image_path'])));
    }else{ */
    $createdMessage = $app->createMessage($username, $body, base64_encode(file_get_contents($app['icon_image_path'])));

    return $app->json($createdMessage);
});

return $app;
