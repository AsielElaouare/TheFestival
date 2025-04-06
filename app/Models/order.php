<?php

namespace App\Models;

class Order
{
  private $orderID;
  private $userID;
  private $orderDate;
  private $amount;

  //Constructor
  private function __construct()
  {
    
  }

  public static function create($orderID, $userID, $orderDate, $amount){
    $order = new Order();
    $order->orderID = $orderID;
    $order->userID = $userID;
    $order->orderDate = $orderDate;
    $order->amount = $amount;
    return $order;
  }
 
  public static function createOrderObj($userID, $orderDate, $amount){
    $order = new Order();
    $order->userID = $userID;
    $order->orderDate = $orderDate;
    $order->amount = $amount;
    return $order;
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

  public function getAmount(){
    return $this->amount;
  }
}
