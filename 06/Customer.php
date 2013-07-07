<?php
require_once(dirname(__FILE__)."/Movie.php");
require_once(dirname(__FILE__)."/Rental.php");

class Customer
{
	private $name;
	private $rentals;

	public function __construct($name) {
		$this->name = $name;
	}
	
	public function addRental(Rental $arg) {
		$this->rentals[] = $arg;
	}
	
	public function getName(){
		return $this->name;
	}
	
	public function statement(){
		$totalAmount = 0;
		$frequentRenterPoints = 0;
		$result = "Rental Record for " . $this->getName() . "\n";
		
		foreach ($this->rentals as $rental){
			// レンタルポイントを加算
			$frequentRenterPoints += $rental->getFrequentRenterPoints();
			// この貸し出しに関する数値の表示
			$result .= "\t" . $rental->getMovie()->getTitle() . "\t" . $rental->getCharge() . "\n";
			$totalAmount += $rental->getCharge();
		}
			
		$result .= "Amount owed is " . $totalAmount . "\n";
		$result .= "You earned " . $frequentRenterPoints . " frequent renter points\n";
		return $result;
	}
	
	private function amountFor(Rental $aRental) {
		return $aRental->getCharge();
	}
}
