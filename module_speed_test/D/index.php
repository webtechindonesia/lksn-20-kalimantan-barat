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

$captcha = randomCode();

function randomColor($num)
{
    $hash = md5('color' . $num);
    return [hexdec(substr($hash, 0, 2)), hexdec(substr($hash, 2, 2)), hexdec(substr($hash, 4, 2))];
}

$bgColor = randomColor(rand(0, 20));

$rotate = [];
$posX = [];
$posY = [];

for ($i = 0; $i < count($captcha); $i++) {
    $rotate[] = rand(10, 22);
    $posX[] = rand(30, 40);
    $posY[] = rand(10, 15);
}

$canvas = imagecreatetruecolor(200, 100);
$bg = imagecolorallocate($canvas, $bgColor[0], $bgColor[1], $bgColor[2]);
$white = imagecolorallocate($canvas, 255, 255, 255);

imagefilledrectangle($canvas, 0, 0, 200, 200, $bg);

$lineChance = rand(3, 6);

// TODO random line
$linePosXArr = [];
$linePosYArr = [];
$endLineXArr = [];
$endLineYArr = [];
for ($i = 0; $i < $lineChance; $i++) {
    $linePosXArr[] = rand(0, 200);
    $linePosYArr[] = rand(0, 100);

    $endLineXArr[] = rand(0, 200);
    $endLineYArr[] = rand(0, 100);

    imageline($canvas, $linePosXArr[$i], $linePosYArr[$i], $endLineXArr[$i], $endLineYArr[$i], $white);
}

$pixel_color = imagecolorallocate($canvas, 230, 245, 230);
for ($i = 0; $i < 200; $i++) {
    imagesetpixel($canvas, rand() % 200, rand() % 100, $pixel_color);
}

for ($i = 0; $i < count($captcha); $i++) {
    $color = randomColor($captcha[$i]);
    $color = imagecolorallocate($canvas, $color[0], $color[1], $color[2]);

    $letter = $captcha[$i];

    $chance = rand(0, 1);
    if ($chance) $rotate[$i] = -abs($rotate[$i]);

    $dir = $rotate[$i];

    // imagestring($canvas, 5, ($i * $posX[$i]) + (200 / 4) - 15, $posY[$i] + (100 / 2) - 20, $letter, $color);
    imagettftext($canvas, 25, $dir, ($i * $posX[$i]) + (200 / 4) - 15, $posY[$i] + (100 / 2) - 20, $color, __DIR__ . '\\Poppins-SemiBold.ttf', $letter);
}

header('Cache-Control: no-cache, mush-revalidate');
header('Content-Type: image/png');

imagepng($canvas);
imagedestroy($canvas);
