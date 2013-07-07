<?php

abstract class Price
{
    abstract protected function getPriceCode();
    
	abstract protected function getCharge($daysRented);

}

class ChildrensPrice extends Price
{
    public function getPriceCode() {
        return Movie::CHILDRENS;
    }
    
    public function getCharge($daysRented) {
    	$result = 2;
    	if($daysRented > 2) {
    		$result += ($daysRented - 2) * 1.5;
    	}
    	return $result;
    }
}

class NewReleasePrice extends Price
{
    public function getPriceCode() {
        return Movie::NEW_RELEASE;
    }
    
    public function getCharge($daysRented) {
    	return $daysRented * 3;
    }
}

class RegularPrice extends Price
{
    public function getPriceCode() {
        return Movie::REGULAR;
    }

    public function getCharge($daysRented) {
    	$result = 2;
    	if($daysRented > 2) {
    		$result += ($daysRented - 2) * 1.5;
    	}
    	return $result;
    }
}
