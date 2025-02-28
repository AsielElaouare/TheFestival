<?php

namespace App\Models;

class Order
{
  private $orderID;
  private $userID;
  private $orderDate;
  private $isPaid;

  //Constructor
  public function __construct($orderID, $userID, $orderDate, $isPaid)
  {
    $this->orderID = $orderID;
    $this->userID = $userID;
    $this->orderDate = $orderDate;
    $this->isPaid = $isPaid;
  }

  //Getters
  public function getOrderID()
  {
    return $this->orderID;
  }

  public function getUserID()
  {
    return $this->userID;
  }

  public function getOrderDate()
  {
    return $this->orderDate;
  }

  public function isPaid()
  {
    return $this->isPaid;
  }
}
