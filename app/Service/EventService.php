<?php


namespace App\Service;

use App\Models\Enums\MusicGenre;
use App\Models\Location;
use App\Repositories\EventRepository;
use App\Models\Show;
use App\Models\Tour;
use DateTime;

class EventService{
    
    private $eventRepo;

    public function __construct(){
        $this->eventRepo = new EventRepository();
    }


    public function getAllShowsByGenre($genreString) {
        
            $musicGenre = MusicGenre::tryFrom($genreString);
            if ($musicGenre === null) {
                return;
            } 

            $showsData = $this->eventRepo->getAllShowsByGenre($musicGenre);
            
            return array_map([$this, 'mapToShow'], $showsData);
            
        
    }

    public function getAllTours(){
        $tourData = $this->eventRepo->getAllTours();
        return array_map([$this,'mapToTour'], $tourData);
    }

    private function mapToShow(array $data): Show {
        $show = new Show($data['show_id'],$data['show_name'], 
        new DateTime($data['start_date']), new DateTime(), $data['price'], 
        new Location($data['location_id'],
        $data['address_name'], $data['postal_code'], 
        $data['street_name'], $data['city'] ), 
        $data['available_spots'], $data['artist_names'] );
        return $show;
    }

    private function mapToTour(array $data): Tour{
        $tour = new Tour($data['tour_id'],$data['tour_name'], 
        new DateTime($data['start_date']), new DateTime($data['end_date']), 
        $data['price'], 
        new Location($data['location_id'],
        $data['address_name'], $data['postal_code'], 
        $data['street_name'], $data['city'] ), 
        $data['available_spots'], $data['language'], $data['guide_id'] );
        return $tour;
    }
}