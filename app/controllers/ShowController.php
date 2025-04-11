<?php
namespace App\Controllers;

use App\Service\ShowService;
use App\Repositories\ShowRepository;
use App\Repositories\LocationRepository;
use App\Repositories\ArtistRepository;
use App\Helper\InputHelper;

class ShowController extends BaseController
{
    private ShowService $showService;
    private LocationRepository $locationRepo;
    private ArtistRepository $artistRepo;

    public function __construct()
    {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            $this->redirectWithError("Unauthorized access", "/");
        }

        $this->showService  = new ShowService(new ShowRepository());
        $this->locationRepo = new LocationRepository();
        $this->artistRepo   = new ArtistRepository();
    }

    public function index(): void
    {
        $shows = $this->showService->getAllShows();
        include __DIR__ . '/../views/admin/shows/index.php';
    }

    public function create(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $this->collectShowData();
            $showId = $this->showService->createShow($data);

            $artistId = (int) ($_POST['artist_id'] ?? 0);
            if ($showId && $artistId > 0) {
                $this->showService->linkArtist($showId, $artistId);
            }

            $this->redirectWithMessage("Show created", "/admin/dashboard");
        }

        $locations = $this->locationRepo->getAllLocations();
        $artists   = $this->artistRepo->getAllArtists();
        include __DIR__ . '/../views/admin/shows/create.php';
    }

    public function edit(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = (int) ($_POST['show_id'] ?? 0);
            if (!$id) {
                $this->redirectWithError("Show not found", "/admin/dashboard");
            }

            $data = $this->collectShowData();
            $this->showService->updateShow($id, $data);

            $artistId = (int) ($_POST['artist_id'] ?? 0);
            if ($artistId) {
                $this->showService->unlinkArtist($id);
                $this->showService->linkArtist($id, $artistId);
            }

            $this->redirectWithMessage("Show updated", "/admin/dashboard");
        }

        $id = (int) ($_GET['id'] ?? 0);
        if (!$id) {
            $this->redirectWithError("Show not found", "/admin/dashboard");
        }

        $show = $this->showService->getShowById($id);
        if (!$show) {
            $this->redirectWithError("Show not found", "/admin/dashboard");
        }

        $locations = $this->locationRepo->getAllLocations();
        $artists   = $this->artistRepo->getAllArtists();

        include __DIR__ . '/../views/admin/shows/edit.php';
    }

    public function delete(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = (int) ($_POST['show_id'] ?? 0);
            if (!$id) {
                $this->redirectWithError("Show not found", "/admin/dashboard");
            }

            $this->showService->deleteShow($id);
            $this->redirectWithMessage("Show deleted", "/admin/dashboard");
        }

        $id = (int) ($_GET['id'] ?? 0);
        if (!$id) {
            $this->redirectWithError("Show not found", "/admin/dashboard");
        }

        $show = $this->showService->getShowById($id);
        if (!$show) {
            $this->redirectWithError("Show not found", "/admin/dashboard");
        }

        include __DIR__ . '/../views/admin/shows/delete.php';
    }

    // Verzamel en filter alle show-data
    private function collectShowData(): array
    {
        return [
            'show_name'       => InputHelper::sanitizeString($_POST['show_name'] ?? ''),
            'start_date'      => InputHelper::sanitizeString($_POST['event_date'] ?? ''),
            'price'           => (float) ($_POST['price'] ?? 0),
            'location_id'     => (int) ($_POST['location_id'] ?? 0),
            'available_spots' => (int) ($_POST['available_spots'] ?? 0)
        ];
    }
}
