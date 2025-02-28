<?php

namespace App\Models;

class MusicTicket
{
  private $musicTicketID;
  private $showID;
  private $orderID;
  private $qrCode;
  private $isScanned;
  private $price;
  private $quantity;

  //Constructor
  public function __construct($musicTicketID, $showID, $orderID, $qrCode, $price, $quantity, $isScanned)
  {
    $this->musicTicketID = $musicTicketID;
    $this->showID = $showID;
    $this->orderID = $orderID;
    $this->qrCode = $qrCode;
    $this->price = $price;
    $this->quantity = $quantity;
    $this->isScanned = $isScanned;
  }

  //Getters
  public function getMusicTicketID()
  {
    return $this->musicTicketID;
  }

  public function getShowID()
  {
    return $this->showID;
  }

  public function getOrderID()
  {
    return $this->orderID;
  }

  public function getQrCode()
  {
    return $this->qrCode;
  }

  public function isScanned()
  {
    return $this->isScanned;
  }

  public function getPrice()
  {
    return $this->price;
  }

  public function getQuantity()
  {
    return $this->quantity;
  }
}
