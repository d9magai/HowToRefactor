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
			$thisAmount = 0;
			switch($rental->getMovie()->getPriceCode()){
				case Movie::REGULAR:
					$thisAmount += 2;
					if($rental->getDaysRented() > 2) {
						$thisAmount += ($rental->getDaysRented() - 2) * 1.5;
					}
					break;
					
				case Movie::NEW_RELEASE:
					$thisAmount += $rental->getDaysRented() * 3;
					break;
					
				case Movie::CHILDRENS:
					$thisAmount += 1.5;
					if($rental->getDaysRented() > 3){
						$thisAmount += ($rental->getDaysRented() - 3) * 1.5;
					}
					break;
			}
			
			// レンタルポイントを加算
			$frequentRenterPoints++;
			// 新作を2日以上借りた場合はボーナスポイント
			if(($rental->getMovie()->getPriceCOde() === Movie::NEW_RELEASE) && $rental->getDaysRented() > 1) {
				$frequentRenterPoints++;
			}
			// この貸し出しに関する数値の表示
			$result .= "\t" . $rental->getMovie()->getTitle() . "\t" . $thisAmount . "\n";
			$totalAmount += $thisAmount;
		}
			
		$result .= "Amount owed is " . $totalAmount . "\n";
		$result .= "You earned " . $frequentRenterPoints . " frequent renter points\n";
		return $result;
	}
	
}
