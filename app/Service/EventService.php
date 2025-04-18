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
            return array_map(fn($data) => $this->mapToEntity($data, 'show'), $showsData);
    }

    public function getAllTours(){
        $tourData = $this->eventRepo->getAllTours();
        return array_map(fn($data) => $this->mapToEntity($data, 'tour'), $tourData);
    }

    private function mapToEntity(array $data, string $type) {
        $commonParams = [
            $data[$type . '_id'],
            $data[$type . '_name'],
            new DateTime($data['start_date']),
            new DateTime($data['end_date'] ?? 'now'), 
            $data['price'],
            new Location(
                $data['location_id'],
                $data['venue_name'],
                $data['postal_code'],
                $data['street_name'],
                $data['city']
            ),
            $data['available_spots']
        ];
    
        if ($type === 'show') {
            return new Show(...array_merge($commonParams, [$data['artist_names']]));
        } elseif ($type === 'tour') {
            return new Tour(...array_merge($commonParams, [$data['language'], $data['guide_id']]));
        } else {
            throw new \InvalidArgumentException("Invalid entity type: " . $type);
        }
    }
}