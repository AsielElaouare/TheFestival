<?php

namespace App\Models;

class Show
{
  private $showID;
  private $locationID;
  private $name;
  private $date;
  private $type;
  private $availableSpots;
  private $price;

  //Constructor
  public function __construct($showID, $locationID, $name, $date, $type, $availableSpots, $price)
  {
    $this->showID = $showID;
    $this->locationID = $locationID;
    $this->name = $name;
    $this->date = $date;
    $this->type = $type;
    $this->availableSpots = $availableSpots;
    $this->price = $price;
  }

  //Getters
  public function getShowID()
  {
    return $this->showID;
  }

  public function getLocationID()
  {
    return $this->locationID;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getDate()
  {
    return $this->date;
  }

  public function getType()
  {
    return $this->type;
  }

  public function getAvailableSpots()
  {
    return $this->availableSpots;
  }

  public function getPrice()
  {
    return $this->price;
  }
}
