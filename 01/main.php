<?php
require_once(dirname(__FILE__)."/Movie.php");
require_once(dirname(__FILE__)."/Rental.php");
require_once(dirname(__FILE__)."/Customer.php");

$movie = new Movie('Omoroi', 0);
$rental = new Rental($movie, 7);
$customer = new Customer('kuma');

$customer->addRental($rental);

printf($customer->statement());


