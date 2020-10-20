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


function randomColor()
{
    $randomString = md5('d73a6ef90dc6a'); // like "d73a6ef90dc6a ..."
    $r = substr($randomString, 0, 2); //1. and 2.
    $g = substr($randomString, 2, 2); //3. and 4.
    $b = substr($randomString, 4, 2); //5. and 6.
    return [$r, $g, $b];
}
print_r(randomColor());

// $color = ['#BB9AE1', '#98D686', '#EC91A9', '#C9BCD8'];
// $colorLen = count($color) - 1;

$captcha = randomCode();

$canvas = imagecreatetruecolor(200, 100);
// $bg = imagecolorallocate($canvas);
