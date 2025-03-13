<?php
namespace App\Models;

class Location
{
    private $locationId;
    private $venueName;
    private $postalCode;
    private $streetName;
    private $city;

    public function __construct($locationId, $venueName, $postalCode, $streetName, $city)
    {
        $this->locationId = $locationId;
        $this->venueName  = $venueName;
        $this->postalCode = $postalCode;
        $this->streetName = $streetName;
        $this->city       = $city;
    }

    public function getLocationId() {
        return $this->locationId;
    }

    public function getVenueName() {
        return $this->venueName;
    }

    public function getPostalCode() {
        return $this->postalCode;
    }

    public function getStreetName() {
        return $this->streetName;
    }

    public function getCity() {
        return $this->city;
    }
}
