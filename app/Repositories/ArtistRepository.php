<?php
namespace App\Repositories;

use PDO;
use App\Models\Artist;

class ArtistRepository extends Repository
{
    // Haal alle artiesten op
    public function getAllArtists(): array
    {
        try {
            $sql = "SELECT artist_id, name, genre FROM ARTIST";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            error_log("getAllArtists error: " . $e->getMessage());
            return [];
        }
    }

    // Haal één artiest op via ID
    public function getArtistById(int $artistId): ?array
    {
        try {
            $sql = "SELECT artist_id, name, genre FROM ARTIST WHERE artist_id = :id LIMIT 1";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([':id' => $artistId]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row ?: null;
        } catch (\PDOException $e) {
            error_log("getArtistById error: " . $e->getMessage());
            return null;
        }
    }

    // Maak een nieuwe artiest
    public function createArtist(string $name, string $genre): int
    {
        try {
            $sql = "INSERT INTO ARTIST (name, genre) VALUES (:name, :genre)";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([
                ':name'  => $name,
                ':genre' => $genre
            ]);
            return (int) $this->connection->lastInsertId();
        } catch (\PDOException $e) {
            error_log("createArtist error: " . $e->getMessage());
            return 0;
        }
    }

    // Update een bestaande artiest
    public function updateArtist(int $artistId, string $name, string $genre): bool
    {
        try {
            $sql = "UPDATE ARTIST SET name = :name, genre = :genre WHERE artist_id = :id";
            $stmt = $this->connection->prepare($sql);
            return $stmt->execute([
                ':name' => $name,
                ':genre' => $genre,
                ':id' => $artistId
            ]);
        } catch (\PDOException $e) {
            error_log("updateArtist error: " . $e->getMessage());
            return false;
        }
    }

    // Verwijder een artiest
    public function deleteArtist(int $artistId): bool
    {
        try {
            $sql = "DELETE FROM ARTIST WHERE artist_id = :id";
            $stmt = $this->connection->prepare($sql);
            return $stmt->execute([':id' => $artistId]);
        } catch (\PDOException $e) {
            error_log("deleteArtist error: " . $e->getMessage());
            return false;
        }
    }
}
