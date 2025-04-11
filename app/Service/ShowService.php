<?php

namespace App\Service;

use App\Models\Show;
use App\Repositories\ShowRepository;

class ShowService
{
    private ShowRepository $showRepository;

    public function __construct(ShowRepository $showRepository)
    {
        $this->showRepository = $showRepository;
    }

    public function getAllShows(): array
    {
        return $this->showRepository->getAllShows();
    }

    public function getShowById(int $id)
    {
        return $this->showRepository->getShowById($id);
    }

    public function createShow(array $data): int
    {
        return $this->showRepository->createShow($data);
    }

    public function updateShow(int $id, array $data): bool
    {
        return $this->showRepository->updateShow($id, $data);
    }

    public function deleteShow(int $id): bool
    {
        return $this->showRepository->deleteShow($id);
    }

    public function getShowsForArtist(int $artistId): array
    {
        return $this->showRepository->getShowsForArtist($artistId);
    }

    public function linkArtist(int $showId, int $artistId): bool
    {
        return $this->showRepository->linkArtistToShow($showId, $artistId);
    }

    public function unlinkArtist(int $showId): bool
    {
        return $this->showRepository->unlinkArtistFromShow($showId);
    }

    //Maakt een show aan en koppelt direct een artiest.
    public function createShowWithArtist(array $data, int $artistId): int
    {
        $showId = $this->createShow($data);

        if ($showId) {
            $this->linkArtist($showId, $artistId);
        }

        return $showId;
    }

     //Update een show én vervangt de gekoppelde artiest.
    public function updateShowWithArtist(int $id, array $data, int $artistId): bool
    {
        $this->unlinkArtist($id);

        $success = $this->updateShow($id, $data);

        if ($success) {
            $this->linkArtist($id, $artistId);
        }

        return $success;
    }
}
