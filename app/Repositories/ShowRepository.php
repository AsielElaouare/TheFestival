<?php
namespace App\Repositories;

use PDO;

class ShowRepository extends Repository
{
    public function getAllShows(): array
    {
        $sql = "SELECT 
                    s.show_id, 
                    s.show_name, 
                    s.start_date, 
                    s.price, 
                    s.location_id, 
                    s.available_spots,
                    l.venue_name
                FROM `SHOW` s
                LEFT JOIN LOCATION l ON s.location_id = l.location_id";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // krijg enkele show by id
    public function getShowById(int $id): ?array {
        $sql = "SELECT show_id, show_name, start_date, price, location_id, available_spots FROM `SHOW` WHERE show_id = :id LIMIT 1";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([':id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
    }
    
    // creer neiuew show.
    public function createShow(array $data): int {
        $sql = "INSERT INTO `SHOW` (show_name, start_date, price, location_id, available_spots) 
                VALUES (:name, :start_date, :price, :location_id, :available_spots)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            ':name'            => $data['show_name'],
            ':start_date'      => $data['start_date'],
            ':price'           => $data['price'],
            ':location_id'     => $data['location_id'],
            ':available_spots' => $data['available_spots']
        ]);
        return $this->connection->lastInsertId();
    }
    
    // bewerk bestaande show
    public function updateShow(int $id, array $data): bool {
        $sql = "UPDATE `SHOW` 
                SET show_name = :name, start_date = :start_date, price = :price, 
                    location_id = :location_id, available_spots = :available_spots 
                WHERE show_id = :id";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute([
            ':name'            => $data['show_name'],
            ':start_date'      => $data['start_date'],
            ':price'           => $data['price'],
            ':location_id'     => $data['location_id'],
            ':available_spots' => $data['available_spots'],
            ':id'              => $id
        ]);
    }
    
    // delete een show
    public function deleteShow(int $id): bool {
        $sql = "DELETE FROM `SHOW` WHERE show_id = :id";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
