<?php
require_once(dirname(__FILE__)."/Price.php");

class Movie
{
	const CHILDRENS = 2;
	const REGULAR = 0;
	const NEW_RELEASE = 1;
	
	private $title;
	private $priceCode;

	private $price;
	
	public function __construct($title, $priceCode) {
		$this->title = $title;
		$this->setPriceCode($priceCode);
	}
	
	public function  getPriceCode() {
		return $this->price->getPriceCode();
	}
	
	public function  setPriceCode($arg){
		switch ($arg) {
			case Movie::REGULAR:
				$this->price = new RegularPrice();
				break;
				
			case Movie::CHILDRENS:
				$this->price = new ChildrensPrice();
				break;
				
			case Movie::NEW_RELEASE:
				$this->price = new NewReleasePrice();
				break;
				
			default:
				echo 'error';
				break;
		}
	}
	
	public function getTitle() {
		return  $this->title;
	}
		
	public function getCharge($daysRented) {
		return $this->price->getCharge($daysRented);
	}
		
	public function getFrequentRenterPoints($daysRented) {
		return $this->price->getFrequentRenterPoints($daysRented);
	}
}
