<?php

class Movie
{
	const CHILDRENS = 2;
	const REGULAR = 0;
	const NEW_RELEASE = 1;
	
	private $title;
	private $priceCode;

	public function __construct($title, $priceCode) {
		$this->title = $title;
		$this->priceCode = $priceCode;
	}
	
	public function  getPriceCode() {
		return $this->priceCode;
	}
	
	public function  setPriceCode($arg){
		$this->priceCode = $arg;
	}
	
	public function getTitle() {
		return  $this->title;
	}
}
