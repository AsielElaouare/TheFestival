<?php
namespace App\Repositories;

use PDO;
use App\Models\Location;

class LocationRepository extends Repository
{
    public function getAllLocations(): array
    {
        $sql = "SELECT location_id, venue_name, postal_code, street_name, city 
                FROM LOCATION";
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
    }
}
