<?php

namespace App\Models;

class Tour extends BaseEvent
{
  private $tourGuide;
  private $language;

  public function __construct($id, $name, $startDate, $endDate, $price, $location, $availableSpots, $language, $tourGuide){
    parent::__construct($id, $name, $startDate, $endDate, $price, $location, $availableSpots);
    $this->tourGuide = $tourGuide;
    $this->language = $language;
  }
  //Getters
  public function getTourGuide()
  {
    return $this->tourGuide;
  }
  public function getLanguage()
  {
    return $this->language;
  }
  
}
