<?php

namespace App\Models;

class Location
{
  private $locationId;
  private $addressName;
  private $postalCode;
  private $streetName;
  private $city;

  public function __construct($locationId, $addressName, $postalCode, $streetName, $city){
    $this->locationId = $locationId;
    $this->addressName = $addressName;
    $this->postalCode = $postalCode;
    $this->streetName = $streetName;
    $this->city = $city;
  }

  //Getters
  public function getLocationId()
  {
    return $this->locationId;
  }

  public function getPostalCode(){
    return $this->postalCode;
  }

  public function getStreetName(){
    return $this->streetName;
  }

  public function getCity(){
    return $this->city;
  }

  public function getAddressName(): string
  {
    return $this->addressName;
  }

  
}
