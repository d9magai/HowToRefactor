<?php
require_once(dirname(__FILE__)."/Movie.php");

abstract class Price
{
    abstract protected function getPriceCode();
}

class ChildrensPrice extends Price
{
    public function getPriceCode() {
        return Movie::CHILDRENS;
    }
}

class NewReleasePrice extends Price
{
    public function getPriceCode() {
        return Movie::NEW_RELEASE;
    }
}

class RegularPrice extends Price
{
    public function getPriceCode() {
        return Movie::REGULAR;
    }
}
