<?php

namespace App\Repositories;

use App\Models\Show;
use App\Models\Enums\MusicGenre;
use PDO;

class EventRepository extends Repository{


    public function getAllShowsByGenre(MusicGenre $musicGenre){
        $stmt = $this->connection->prepare("SELECT 
                                            s.show_id, 
                                            s.show_name, 
                                            s.start_date, 
                                            s.price, 
                                            s.available_spots, 
                                            l.location_id, 
                                            l.address_name, 
                                            l.postal_code, 
                                            l.street_name, 
                                            l.city, 
                                            GROUP_CONCAT(a.name ORDER BY a.name ASC) AS artist_names, 
                                            GROUP_CONCAT(a.genre ORDER BY a.name ASC) AS genres
                                        FROM `SHOW` s
                                        JOIN LOCATION l ON s.location_id = l.location_id
                                        JOIN SHOW_ARTIST sa ON s.show_id = sa.show_id
                                        JOIN ARTIST a ON sa.artist_id = a.artist_id
                                        WHERE a.genre = :genre
                                        GROUP BY s.show_id, s.show_name, s.start_date, s.price, s.available_spots, l.location_id, l.address_name, l.postal_code, l.street_name, l.city
                                        ");
        $stmt->execute([':genre' => $musicGenre->value]);
        $show = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $show;
    }

    public function getAllTours(){
        $stmt = $this->connection->prepare('SELECT 
                                            T.tour_id, 
                                            T.tour_name, 
                                            T.start_date, 
                                            T.end_date, 
                                            T.price, 
                                            T.available_spots, 
                                            L.location_id, 
                                            L.address_name, 
                                            L.postal_code, 
                                            L.street_name, 
                                            L.city, 
                                            G.guide_id, 
                                            G.name AS guide_name, 
                                            G.contact_info,
                                            TL.language
                                        FROM EventManagement.TOUR T
                                        LEFT JOIN EventManagement.LOCATION L ON T.location_id = L.location_id
                                        LEFT JOIN EventManagement.TOUR_GUIDE G ON T.tour_id = G.tour_id
                                        LEFT JOIN EventManagement.TOUR_LANGUAGE TL ON G.guide_id = TL.tour_guide_id AND T.tour_id = TL.tour_id;');
        $stmt->execute();
        $tour = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $tour;
    }
}