<?php

namespace Phone;
require "Smartphone.php";

$numbers = readline();
$pages = readline();

$phone = new Smartphone();
$phone->Call($numbers);
$phone->Browse($pages);

