<?php 

namespace App\Models;

class TourTicket extends BaseTicket{

    public ?TourGuide $tourGuide;

    public function __construct( $eventId, $startDateTime, $id = null, $orderId = null, $qrCode = null, $isScanned = null, $eventName = null,  $tourGuide = null){
        parent::__construct( $eventId,  $startDateTime, $id = null, $orderId = null, $qrCode = null, $isScanned = null, $eventName);
        $this->tourGuide = $tourGuide;
    }

    public function getTourGuideInfo(){
        return $this->tourGuide->__toString();
    }
}