<?php

namespace App;

use App\User\Security as Secu;
//use App\File\Security as Security;
use App\File\Security;


require "SecurityUser.php";
require "SecurityFile.php";

// vient SecurityUser.php
$user = new Secu();

// vient SecurityFile.php
$file = new Security();


