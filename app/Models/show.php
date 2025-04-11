<?php

namespace App\Models;


class Show extends BaseEvent
{
  private $artistName;

  public function __construct($id, $name, $startDate, $endDate, $price, Location $location, $availableSpots, $ArtistName){
    parent::__construct($id, $name, $startDate, $endDate, $price, $location, $availableSpots);
    $this->artistName = $ArtistName;
  }

  //Getters
  public function getArtistName(){
    return $this->artistName;
  }

  public function setArtistName(string $artistName): void {
    $this->artistName = $artistName;
}
  
}
