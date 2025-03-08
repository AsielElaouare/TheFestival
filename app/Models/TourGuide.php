<?php
namespace App\Models;
class TourGuide
{
  private $guideId;
  private $name;
  private $phoneNumber;
 

  //Constructor
  public function __construct($guideId, $name, $phoneNumber, $email)
  {
    $this->guideId = $guideId;
    $this->name = $name;
    $this->phoneNumber = $phoneNumber;
  }

  //Getters
  public function getGuideId()
  {
    return $this->guideId;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getPhoneNumber()
  {
    return $this->phoneNumber;
  }

  public function __toString()
  {
    return "Guide name" . $this->name. "contact" . $this->phoneNumber;
  }
}
