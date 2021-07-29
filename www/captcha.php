<?php
session_start();


header("Content-Type: image/png");

/* 
	TP : A faire :

	- utilisation d'une police (type) aléatoire en fonction de ce que l'on trouve dans le dossier "typo" au format ttf
	- taille du texte aléatoire
	- angle du texte aléatoire
	- couleur de fond aléatoire
	- couleurs des caractères aléatoires
	- position des caractères aléatoires
	- Ajout d'un nombre aléatoire de formes aléatoires (rond carré trait ...) de mêmes couleurs que les caractères sur l'image.


	-> ATTENTION LE CAPTCHA DOIT TOUJOURS ETRE LISIBLE

*/




//Création de notre image
$image = imagecreate(400, 200);

//La première couleur créée est la couleur de fond de mon image
$white = imagecolorallocate($image, 255, 255, 255);
$black = imagecolorallocate($image, 0, 0, 0);


$chars = "abcdefghijklmnopqrstuvwxyz0123456789";
$chars = str_shuffle($chars);

$captcha = substr($chars, 0, rand(6, 8));

$_SESSION["captcha"] = $captcha;

imagestring($image, 5, 100, 100, $captcha, $black);


//Affichage de notre image
imagepng($image);

