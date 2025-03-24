<?php
namespace App\Repositories;

use PDO;
use App\Models\Location;

class LocationRepository extends Repository
{
    public function getAllLocations(): array
    {
        try {
            $sql = "SELECT location_id, venue_name, postal_code, street_name, city FROM LOCATION";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $locations = [];
            foreach ($rows as $row) {
                $locations[] = new Location(
                    $row['location_id'],
                    $row['venue_name'],
                    $row['postal_code'],
                    $row['street_name'],
                    $row['city']
                );
            }
            return $locations;
        } catch (\PDOException $e) {
            error_log("getAllLocations error: " . $e->getMessage());
            return [];
        }
    }

    public function getLocationById(int $id): ?Location
    {
        try {
            $sql = "SELECT location_id, venue_name, postal_code, street_name, city 
                    FROM LOCATION
                    WHERE location_id = :id
                    LIMIT 1";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([':id' => $id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$row) {
                return null;
            }
            return new Location(
                $row['location_id'],
                $row['venue_name'],
                $row['postal_code'],
                $row['street_name'],
                $row['city']
            );
        } catch (\PDOException $e) {
            error_log("getLocationById error: " . $e->getMessage());
            return null;
        }
    }

    public function createLocation(string $venueName, string $postalCode, string $streetName, string $city): int
    {
        try {
            $sql = "INSERT INTO LOCATION (venue_name, postal_code, street_name, city)
                    VALUES (:venue_name, :postal_code, :street_name, :city)";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([
                ':venue_name'  => $venueName,
                ':postal_code' => $postalCode,
                ':street_name' => $streetName,
                ':city'        => $city
            ]);
            return (int) $this->connection->lastInsertId();
        } catch (\PDOException $e) {
            error_log("createLocation error: " . $e->getMessage());
            return 0;
        }
    }

    public function updateLocation(int $id, string $venueName, string $postalCode, string $streetName, string $city): bool
    {
        try {
            $sql = "UPDATE LOCATION
                    SET venue_name = :venue_name,
                        postal_code = :postal_code,
                        street_name = :street_name,
                        city = :city
                    WHERE location_id = :id";
            $stmt = $this->connection->prepare($sql);
            return $stmt->execute([
                ':venue_name'  => $venueName,
                ':postal_code' => $postalCode,
                ':street_name' => $streetName,
                ':city'        => $city,
                ':id'          => $id
            ]);
        } catch (\PDOException $e) {
            error_log("updateLocation error: " . $e->getMessage());
            return false;
        }
    }

    public function deleteLocation(int $id): bool
    {
        try {
            $sql = "DELETE FROM LOCATION WHERE location_id = :id";
            $stmt = $this->connection->prepare($sql);
            return $stmt->execute([':id' => $id]);
        } catch (\PDOException $e) {
            error_log("deleteLocation error: " . $e->getMessage());
            return false;
        }
    }

    public function hasDependentShows(int $locationId): bool {
        try {
            $stmt = $this->connection->prepare("SELECT COUNT(*) AS count FROM `SHOW` WHERE location_id = :locationId");
            $stmt->execute([':locationId' => $locationId]);
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            return ($result['count'] > 0);
        } catch (\PDOException $e) {
            error_log("hasDependentShows error: " . $e->getMessage());
            return false;
        }
    }
    
}
