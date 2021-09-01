<?php
session_start();


header("Content-Type: image/png");


//Création de notre image
$image = imagecreate(400, 200);

//La première couleur créée est la couleur de fond de mon image
$backgroundColor = imagecolorallocate($image, rand(0, 250), rand(0, 250), rand(0, 250));


// Chargement des typos
$fontLists = glob("fonts/*.ttf");


$chars = "abcdefghijklmnopqrstuvwxyz0123456789";
$chars = str_shuffle($chars);
$captcha = substr($chars, 0, rand(6, 8));
$lengthCaptcha = strlen($captcha);
$x = rand(20, 40);
$y = rand(60, 80);


$_SESSION["captcha"] = $captcha;

for ($i = 0; $i < $lengthCaptcha; $i++) {
	$colors[] = imagecolorallocate($image, rand(0, 100), rand(0, 100), rand(0, 100));

	imagettftext($image, rand(30, 60), rand(-50, 50), $x, $y, $colors[$i], $fontLists[array_rand($fontLists)], $captcha[$i]);

	$x += rand(40, 60);
}

$figures = rand(2, 4);
for ($i = 0; $i < $figures; $i++) {

	$fig = rand(1, 2);

	if ($fig == 1) {
		imageline($image, rand(0, 400), rand(0, 100), rand(0, 400), rand(0, 100), $colors[array_rand($colors)]);
	}
	else {
		imagerectangle($image, rand(0, 400), rand(0, 100), rand(0, 400), rand(0, 100), $colors[array_rand($colors)]);
	}
}


//Affichage de notre image
imagepng($image);