<?php

namespace App\Models;

use App\Models\Enums\MusicGenre;


class Artist
{
  private $artistID;
  private $eventID;
  private MusicGenre $genre;

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
  public function getArtistName(){
    
  }
}
