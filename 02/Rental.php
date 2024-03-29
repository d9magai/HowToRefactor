<?php
require_once(dirname(__FILE__)."/Movie.php");

class Rental
{
	private $movie;
	private $daysRented;

	public function __construct(Movie $movie, $daysRented) {
		$this->movie = $movie;
		$this->daysRented = $daysRented;
	}
	
	public function getMovie(){
		return $this->movie;
	}
	
	public function getDaysRented(){
		return $this->daysRented;
	}
	
}
