<?php

namespace App\Models;

class Location
{
  private $locationID;
  private $locationAddress;

  //Constructor
  public function __construct($locationID, $locationAddress)
  {
    $this->locationID = $locationID;
    $this->locationAddress = $locationAddress;
  }

  //Getters
  public function getLocationID()
  {
    return $this->locationID;
  }

  public function getLocationAddress()
  {
    return $this->locationAddress;
  }
}
