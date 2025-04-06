<?php
namespace App\Controllers;

use App\Service\ShowService;
use App\Repositories\ShowRepository;
use App\Repositories\LocationRepository;
use App\Repositories\ArtistRepository;
use App\Helper\InputHelper;

class ShowController
{
    private ShowService $showService;
    private LocationRepository $locationRepo;
    private ArtistRepository $artistRepo;

    public function __construct()
    {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header("Location: /");
            exit();
        }
        
        $this->showService = new ShowService(new ShowRepository());
        $this->locationRepo = new LocationRepository();
        $this->artistRepo = new ArtistRepository();
    }

    // Toon alle shows
    public function index()
    {
        $shows = $this->showService->getAllShows();
        include __DIR__ . '/../views/admin/shows/index.php';
    }

    // Combineer Create en Store: GET toont formulier, POST verwerkt creatie
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'show_name'       => InputHelper::sanitizeString($_POST['show_name'] ?? ''),
                'start_date'      => InputHelper::sanitizeString($_POST['event_date'] ?? ''),
                'price'           => InputHelper::sanitizeString($_POST['price'] ?? 0),
                'location_id'     => InputHelper::sanitizeString($_POST['location_id'] ?? 0),
                'available_spots' => InputHelper::sanitizeString($_POST['available_spots'] ?? 0)
            ];
            $showId = $this->showService->createShow($data);
            $artistId = InputHelper::sanitizeString($_POST['artist_id'] ?? '');
            if ($showId && !empty($artistId)) {
                $this->showService->linkArtist($showId, (int)$artistId);
            }
            header("Location: /admin/dashboard?message=Show+created");
            exit();
        } else {
            $locations = $this->locationRepo->getAllLocations();
            $artists = $this->artistRepo->getAllArtists();
            include __DIR__ . '/../views/admin/shows/create.php';
        }
    }

    // Combineer Edit en Update: GET toont formulier, POST verwerkt update
    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = InputHelper::sanitizeString($_POST['show_id'] ?? '');
            if (empty($id)) {
                header("Location: /admin/dashboard?error=Show+not+found");
                exit();
            }
            $data = [
                'show_name'       => InputHelper::sanitizeString($_POST['show_name'] ?? ''),
                'start_date'      => InputHelper::sanitizeString($_POST['event_date'] ?? ''),
                'price'           => InputHelper::sanitizeString($_POST['price'] ?? 0),
                'location_id'     => InputHelper::sanitizeString($_POST['location_id'] ?? 0),
                'available_spots' => InputHelper::sanitizeString($_POST['available_spots'] ?? 0)
            ];
            $this->showService->updateShow($id, $data);
            $artistId = InputHelper::sanitizeString($_POST['artist_id'] ?? '');
            if (!empty($artistId)) {
                // Verwijder bestaande koppeling en koppel de nieuwe artiest
                $this->showService->unlinkArtist($id);
                $this->showService->linkArtist($id, (int)$artistId);
            }
            header("Location: /admin/dashboard?message=Show+updated");
            exit();
        } else {
            $id = InputHelper::sanitizeString($_GET['id'] ?? '');
            if (empty($id)) {
                header("Location: /admin/dashboard?error=Show+not+found");
                exit();
            }
            $show = $this->showService->getShowById($id);
            if (!$show) {
                header("Location: /admin/dashboard?error=Show+not+found");
                exit();
            }
            $locations = $this->locationRepo->getAllLocations();
            $artists = $this->artistRepo->getAllArtists();
            include __DIR__ . '/../views/admin/shows/edit.php';
        }
    }

    // Combineer Delete bevestiging en verwijdering: GET toont bevestigingspagina, POST verwerkt verwijdering
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = InputHelper::sanitizeString($_POST['show_id'] ?? '');
            if (empty($id)) {
                header("Location: /admin/dashboard?error=Show+not+found");
                exit();
            }
            $this->showService->deleteShow($id);
            header("Location: /admin/dashboard?message=Show+deleted");
            exit();
        } else {
            $id = InputHelper::sanitizeString($_GET['id'] ?? '');
            if (empty($id)) {
                header("Location: /admin/dashboard?error=Show+not+found");
                exit();
            }
            $show = $this->showService->getShowById($id);
            if (!$show) {
                header("Location: /admin/dashboard?error=Show+not+found");
                exit();
            }
            include __DIR__ . '/../views/admin/shows/delete.php';
        }
    }
}
