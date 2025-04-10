<?php
namespace App\Repositories;

use PDO;

class ShowRepository extends Repository
{
    public function getAllShows(): array
{
    try {
        $sql = "SELECT 
                    s.show_id, 
                    s.show_name, 
                    s.start_date, 
                    s.price, 
                    s.location_id, 
                    s.available_spots,
                    l.venue_name,
                    a.artist_id,
                    a.name AS artist_name,
                    a.genre AS artist_genre
                FROM `SHOW` s
                LEFT JOIN LOCATION l ON s.location_id = l.location_id
                LEFT JOIN SHOW_ARTIST sa ON s.show_id = sa.show_id
                LEFT JOIN ARTIST a ON sa.artist_id = a.artist_id";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (\PDOException $e) {
        error_log("getAllShows error: " . $e->getMessage());
        return [];
    }
}

    
    public function getShowById(int $id): ?array {
        try {
            $sql = "SELECT show_id, show_name, start_date, price, location_id, available_spots FROM `SHOW` WHERE show_id = :id LIMIT 1";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([':id' => $id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result ?: null;
        } catch (\PDOException $e) {
            error_log("getShowById error: " . $e->getMessage());
            return null;
        }
    }
    
    public function createShow(array $data): int {
        try {
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
        } catch (\PDOException $e) {
            error_log("createShow error: " . $e->getMessage());
            return 0;
        }
    }
    
    public function updateShow(int $id, array $data): bool {
        try {
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
        } catch (\PDOException $e) {
            error_log("updateShow error: " . $e->getMessage());
            return false;
        }
    }
    
    public function deleteShow(int $id): bool {
        try {
            $sql = "DELETE FROM `SHOW` WHERE show_id = :id";
            $stmt = $this->connection->prepare($sql);
            return $stmt->execute([':id' => $id]);
        } catch (\PDOException $e) {
            error_log("deleteShow error: " . $e->getMessage());
            return false;
        }
    }

    public function linkArtistToShow(int $showId, int $artistId): bool
{
    try {
        $sql = "INSERT INTO SHOW_ARTIST (show_id, artist_id) VALUES (:showId, :artistId)";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute([
            ':showId' => $showId,
            ':artistId' => $artistId
        ]);
    } catch (\PDOException $e) {
        error_log("linkArtistToShow error: " . $e->getMessage());
        return false;
    }
}

public function unlinkArtistFromShow(int $showId): bool
{
    try {
        $sql = "DELETE FROM SHOW_ARTIST WHERE show_id = :showId";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute([':showId' => $showId]);
    } catch (\PDOException $e) {
        error_log("unlinkArtistFromShow error: " . $e->getMessage());
        return false;
    }
}

public function getShowsForArtist(int $artistId): array
{
    $sql = "
      SELECT s.show_id, s.show_name, s.start_date, s.price,
             s.available_spots, l.venue_name, a.name AS artist_name, a.genre
        FROM `SHOW` s
        JOIN SHOW_ARTIST sa ON s.show_id = sa.show_id
        JOIN ARTIST a       ON sa.artist_id = a.artist_id
        JOIN LOCATION l     ON s.location_id = l.location_id
       WHERE a.artist_id = :artistId
    ";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute([':artistId' => $artistId]);
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
}


}
