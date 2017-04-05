<?php
$access_token = 'W6KJ9hOZxmYxq166VcKrIH13UEGwuKQzWpU21N8uKqXXXRf3Ot6ukCA/ofBVZ9pp3iek8k+dFc7PF2xdV8Mq7Eo8wh0pO4JWI+focx4yF2Uo1vQ8yVW9l3nNGStGWluAGO7GL/LxWHhTpu3B6feCfQdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
