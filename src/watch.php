<?php

/*
 * GLOBAL FUNCTIONS
 */

function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);
    exit();
}


/*
 * VAR
 */

$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$regEx = '%(?:iscrewyoutube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i';

/*
 * LOGIC
 */

if (preg_match($regEx, $url, $match)) {
    $baseUrl = 'https://screwmycode.in/youtube/';
    $video_id = $match[1];

    Redirect($baseUrl . $video_id, true);

} else {
    echo 'error';
}
