<?php

function helloWorld() {

	echo "Bonjour";

}



helloWorld();

/*
//Parametres , Arguments
function helloYou( $firstname, $lastname="" ) {

	echo "Bonjour ". $firstname." ".$lastname;

}

 helloYou("Yves");
 helloYou("Yves", "SKRZYPCZYK");
 helloYou("", "SKRZYPCZYK");
*/



/*
$firstname = "Yves";

function helloYou(  ) {
	global $firstname;
	echo "Bonjour ". $firstname;
}

 helloYou();


function cleanLastname(&$name) {

	$name = mb_strtoupper(trim($name));

}

$lastname = "   SKrzYPCZYK  ";

cleanLastname($lastname);

echo $lastname;
 
 */




function addition ($number1 , $number2)
{
	echo $number2+$number1;
}


function soustraction ($number1 , $number2)
{
	echo $number1 - $number2;
}


$number1 = 2;
$number2 = 5;
$operateur = "addition";


$operateur($number1, $number2); //7



$firstname = "Yves";
$var = "firstname";

echo $$var;





