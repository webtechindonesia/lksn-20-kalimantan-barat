<?php

function randomCode()
{
    $alpha = 'ABCEDFGHIJKLMNOPQRSTUVWXYZ01234567890';

    $code = [];
    for ($i = 0; $i < 4; $i++) {
        $code[] = $alpha[rand(0, strlen($alpha) - 1)];
    }

    return $code;
}

$color = [];
$colorLen = count($color) - 1;

$captcha = randomCode();

$canvas = imagecreatetruecolor(200, 100);
