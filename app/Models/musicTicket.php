<?php

namespace App\Models;

class MusicTicket extends BaseTicket {

  private $artistName;


  public function __construct($eventId,  $startDateTime, $id = null, $orderId = null, $qrCode = null, $isScanned = null, $eventName=null,  $artistName = null) {
      parent::__construct($eventId,  $startDateTime, $id, $orderId, $qrCode, $isScanned, $eventName);
  }
}
