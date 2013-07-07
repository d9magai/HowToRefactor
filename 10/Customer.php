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
			// この貸し出しに関する数値の表示
			$result .= "\t" . $rental->getMovie()->getTitle() . "\t" . $rental->getCharge() . "\n";
		}
			
		$result .= "Amount owed is " . $this->getTotalCharge() . "\n";
		$result .= "You earned " . $this->getTotalFrequentRenterPoints() . " frequent renter points\n";
		return $result;
	}
	
	private function amountFor(Rental $aRental) {
		return $aRental->getCharge();
	}
	
	private function  getTotalCharge() {
		$result = 0;
		foreach ($this->rentals as $rental){
			$result += $rental->getCharge();
		}
		return $result;
	}
	
	private function  getTotalFrequentRenterPoints() {
		$result = 0;
		foreach ($this->rentals as $rental){
			$result += $rental->getFrequentRenterPoints();
		}
		return $result;
	}
	
	public function  htmlStatement() {
		$result = "<H1>Rental Record for <EM>" . $this->getName() . "</EM></H1><P>\n";
		foreach ($this->rentals as $rental){
			// この貸し出しに関する数値の表示
			$result .= $rental->getMovie()->getTitle() . ":" . $rental->getCharge() . "<BR>\n";
		}
		$result .= "<P>You owe <EM>" . $this->getTotalCharge() . "</EM><P>\n";
		$result .= "On this rental you earned <EM> " . $this->getTotalFrequentRenterPoints() . " </EM> frequent renter points<P>\n";
		return $result;
	}
}
