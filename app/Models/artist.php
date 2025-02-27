<?php

namespace App\Models;

class Artist
{
  private $artistID;
  private $eventID;
  private $genre;

  //Constructor
  public function __construct($artistID, $eventID, $genre)
  {
    $this->artistID = $artistID;
    $this->eventID = $eventID;
    $this->genre = $genre;
  }

  //Getters
  public function getArtistID()
  {
    return $this->artistID;
  }

  public function getEventID()
  {
    return $this->eventID;
  }

  public function getGenre()
  {
    return $this->genre;
  }
}
