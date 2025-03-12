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
}
