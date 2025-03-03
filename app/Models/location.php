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
  public function getLocationID()
  {
    return $this->locationId;
  }

  public function getAddressName(): string
  {
    return $this->addressName;
  }

  
}
