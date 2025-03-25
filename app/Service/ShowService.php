<?php
namespace App\Service;

use App\Repositories\ShowRepository;

class ShowService
{
    private ShowRepository $showRepository;

    public function __construct(ShowRepository $showRepository)
    {
        $this->showRepository = $showRepository;
    }
    
    public function getAllShows(): array {
        return $this->showRepository->getAllShows();
    }
    
    public function getShowById(int $id): ?array {
        return $this->showRepository->getShowById($id);
    }
    
    public function createShow(array $data): int {
        return $this->showRepository->createShow($data);
    }
    
    public function updateShow(int $id, array $data): bool {
        return $this->showRepository->updateShow($id, $data);
    }
    
    public function deleteShow(int $id): bool {
        return $this->showRepository->deleteShow($id);
    }

    public function createShowWithArtist(array $data, int $artistId): int
{
    $showId = $this->createShow($data);
    if ($showId) {
        // Link the show to the artist
        $this->showRepository->linkArtistToShow($showId, $artistId);
    }
    return $showId;
}

public function updateShowWithArtist(int $id, array $data, int $artistId): bool
{
    // Unlink old artist(s)
    $this->showRepository->unlinkArtistFromShow($id);
    // Update the show data
    $success = $this->updateShow($id, $data);
    if ($success) {
        // Link new artist
        $this->showRepository->linkArtistToShow($id, $artistId);
    }
    return $success;
}

public function linkArtist(int $showId, int $artistId): bool
{
    return $this->showRepository->linkArtistToShow($showId, $artistId);
}

public function unlinkArtist(int $showId): bool
{
    return $this->showRepository->unlinkArtistFromShow($showId);
}


}
