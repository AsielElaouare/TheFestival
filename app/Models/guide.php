<?php
class TourGuide
{
  private $guideId;
  private $name;
  private $phoneNumber;
  private $email;

  //Constructor
  public function __construct($guideId, $name, $phoneNumber, $email)
  {
    $this->guideId = $guideId;
    $this->name = $name;
    $this->phoneNumber = $phoneNumber;
    $this->email = $email;
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

  public function getEmail()
  {
    return $this->email;
  }
}
