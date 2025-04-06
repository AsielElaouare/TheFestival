<?php


namespace App\Models;

use DateTime;

class BaseEvent{
    public $id;
    public $name;
    public DateTime $startDate;
    public DateTime $endDate;
    public $price;
    public Location $location;
    public $availableSpots;
    public int $wantedQuantity;


    public function __construct($id, $name, DateTime $startDate, DateTime $endDate, $price, Location $location, $availableSpots){ 
        $this->id = $id;
        $this->name = $name;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->price = $price;
        $this->location = $location;
        $this->availableSpots = $availableSpots;
        $this->wantedQuantity = 0; 
    }

    public function getEventID()
  {
    return $this->id;
  }

  public function getEventName()
  {
    return $this->name;
  }

  public function getStartDate()
  {
    return $this->startDate->format('Y-m-d H:i');
  }
  public function getEndDate()
  {
    return $this->endDate->format('Y-m-d H:i');;
  }


  public function getAvailableSpots()
  {
    return $this->availableSpots;
  }

  public function getPrice()
  {
    return $this->price;
  }

  public function getDayFromDate(){
    return $this->startDate->format('l'); 
  }

  public function getWantedQuantity(){
    return $this->wantedQuantity;
  }

  public function setWantedQuantity($wantedQuantity){
    $this->wantedQuantity = $wantedQuantity;
  }
}