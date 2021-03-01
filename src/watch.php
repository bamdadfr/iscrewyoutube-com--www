<?php

include('./redirect.php');

$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$regEx = '%(?:iscrewyoutube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i';

if (preg_match($regEx, $url, $match)) {
    $baseUrl = 'https://screwmycode.in/youtube/';
    $videoId = $match[1];

    redirect($baseUrl . $videoId, true);
} else {
    echo 'error';
}
