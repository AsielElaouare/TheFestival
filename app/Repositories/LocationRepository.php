<?php
namespace App\Repositories;

use PDO;
use App\Models\Location;

class LocationRepository extends Repository
{
    public function getAllLocations(): array
    {
        try {
            $stmt = $this->connection->prepare(
                "SELECT location_id, venue_name, postal_code, street_name, city FROM LOCATION"
            );
            $stmt->execute();

            return array_map(fn($row) => new Location(
                $row['location_id'],
                $row['venue_name'],
                $row['postal_code'],
                $row['street_name'],
                $row['city']
            ), $stmt->fetchAll(PDO::FETCH_ASSOC));
        } catch (\PDOException $e) {
            error_log("getAllLocations error: " . $e->getMessage());
            return [];
        }
    }

    public function getLocationById(int $id): ?Location
    {
        try {
            $stmt = $this->connection->prepare(
                "SELECT location_id, venue_name, postal_code, street_name, city 
                 FROM LOCATION 
                 WHERE location_id = :id 
                 LIMIT 1"
            );
            $stmt->execute([':id' => $id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row ? new Location(
                $row['location_id'],
                $row['venue_name'],
                $row['postal_code'],
                $row['street_name'],
                $row['city']
            ) : null;
        } catch (\PDOException $e) {
            error_log("getLocationById error: " . $e->getMessage());
            return null;
        }
    }

    public function createLocation(string $venueName, string $postalCode, string $streetName, string $city): int
    {
        try {
            $stmt = $this->connection->prepare(
                "INSERT INTO LOCATION (venue_name, postal_code, street_name, city) 
                 VALUES (:venue_name, :postal_code, :street_name, :city)"
            );
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
            $stmt = $this->connection->prepare(
                "UPDATE LOCATION 
                 SET venue_name = :venue_name, postal_code = :postal_code, 
                     street_name = :street_name, city = :city 
                 WHERE location_id = :id"
            );

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
            $stmt = $this->connection->prepare(
                "DELETE FROM LOCATION WHERE location_id = :id"
            );
            return $stmt->execute([':id' => $id]);
        } catch (\PDOException $e) {
            error_log("deleteLocation error: " . $e->getMessage());
            return false;
        }
    }

    public function hasDependentShows(int $locationId): bool
    {
        try {
            $stmt = $this->connection->prepare(
                "SELECT COUNT(*) AS count FROM `SHOW` WHERE location_id = :locationId"
            );
            $stmt->execute([':locationId' => $locationId]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return (int)$result['count'] > 0;
        } catch (\PDOException $e) {
            error_log("hasDependentShows error: " . $e->getMessage());
            return false;
        }
    }
}
