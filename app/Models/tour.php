<?php
class Tour
{
  private $tourId;
  private $guideId;
  private DateTime $dateTime;
  private $language;
  private $availableSpots;
  private $price;

  //Constructor
  public function __construct($tourId, $guideId, $dateTime, $language, $availableSpots, $price)
  {
    $this->tourId = $tourId;
    $this->guideId = $guideId;
    $this->dateTime = new DateTime($dateTime);
    $this->language = $language;
    $this->availableSpots = $availableSpots;
    $this->price = $price;
  }

  //Getters
  public function getTourId()
  {
    return $this->tourId;
  }

  public function getGuideId()
  {
    return $this->guideId;
  }

  public function getDateTime()
  {
    return $this->dateTime;
  }

  public function getLanguage()
  {
    return $this->language;
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
