<?php

namespace App\Models;

use DateTime;

class BaseTicket{
    private $id;
    private $eventId;
    private $orderId;
    private $qrCode;
    private $isScanned;
    private DateTime $startDateTime;

    private $eventName;

    //Constructor
    public function __construct($eventId, $startDateTime, $id = null, $orderId = null, $qrCode = null, $isScanned = null, $eventName = null)  
    {
        $this->id = $id;
        $this->eventId = $eventId;
        $this->orderId = $orderId;
        $this->qrCode = $qrCode;
        $this->isScanned = $isScanned;
        $this->startDateTime = $startDateTime;
        $this->eventName = $eventName;

    }

  //Getters
  public function getTicketId()
  {
    return $this->id;
  }

  public function getEventId()
  {
    return $this->eventId;
  }

  public function getOrderId()
  {
    return $this->orderId;
  }

  public function getQrCode()
  {
    return $this->qrCode;
  }

  public function isScanned()
  {
    return $this->isScanned;
  }

  public function getText(){
    return "Customer name:  " . "Start Date: " . $this->startDateTime->format("Y-m-d") . " Quantity:  ";
  }

  public function setQrCode($qrCode){
    $this->qrCode = $qrCode;
  }

  public function getEventDate(){
    return $this->startDateTime->format("d-m-y H:i");
  }
  public function getEventName(){
    return $this->eventName;  
  }
}