<?php

class Address
{
    private $city;
    private $street;
    private $postCode;


    public function __construct($city, $street, $postCode)
    {
        $this->city = $city;
        $this->street = $street;
        $this->postCode = $postCode;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city): void
    {
        $this->city = $city;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function setStreet($street): void
    {
        $this->street = $street;
    }

    public function getPostCode()
    {
        return $this->postCode;
    }

    public function setPostCode($postCode): void
    {
        $this->postCode = $postCode;
    }


}