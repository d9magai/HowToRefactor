<?php
require_once(dirname(__FILE__)."/Movie.php");
require_once(dirname(__FILE__)."/Rental.php");
require_once(dirname(__FILE__)."/Customer.php");

$movieOmoroi = new Movie('Omoroi', 0);
$movieKanasi = new Movie('Kanasi', 0);

$rentalOmoroi = new Rental($movieOmoroi, 7);
$rentalKanasi = new Rental($movieKanasi, 1);

$customer = new Customer('kuma');
$customer->addRental($rentalOmoroi);
$customer->addRental($rentalKanasi);

printf($customer->statement());


