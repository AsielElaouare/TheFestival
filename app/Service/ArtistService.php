<?php
namespace App\Service;

use App\Repositories\ArtistRepository;

class ArtistService
{
    private ArtistRepository $artistRepo;

    public function __construct()
    {
        $this->artistRepo = new ArtistRepository();
    }

    public function getAllArtists(): array
    {
        return $this->artistRepo->getAllArtists();
    }

    public function getArtistById(int $artistId): ?array
    {
        return $this->artistRepo->getArtistById($artistId);
    }

    public function createArtist(string $name, string $genre): int
    {
        return $this->artistRepo->createArtist($name, $genre);
    }

    public function updateArtist(int $artistId, string $name, string $genre): bool
    {
        return $this->artistRepo->updateArtist($artistId, $name, $genre);
    }

    public function deleteArtist(int $artistId): bool
    {
        return $this->artistRepo->deleteArtist($artistId);
    }
}
