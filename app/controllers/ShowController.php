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

    public function __construct()
    {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header("Location: /");
            exit();
        }
        
        $this->showService = new ShowService(new ShowRepository());
    }

    // Laat alle shows zien
    public function index()
    {
        $shows = $this->showService->getAllShows();
        include __DIR__ . '/../views/admin/shows/index.php';
    }

    // Toon het formulier voor het aanmaken van een nieuwe show
    public function create()
    {
        // Haal alle locaties op
        $locationRepo = new LocationRepository();
        $locations = $locationRepo->getAllLocations();
        
        // Haal alle artiesten op
        $artistRepo = new ArtistRepository();
        $artists = $artistRepo->getAllArtists();

        include __DIR__ . '/../views/admin/shows/create.php';
    }

    // Verwerk de inzending van het formulier voor een nieuwe show
    public function store()
    {
        $data = [
            'show_name'       => InputHelper::sanitizeString($_POST['show_name'] ?? ''),
            'start_date'      => InputHelper::sanitizeString($_POST['event_date'] ?? ''),
            'price'           => InputHelper::sanitizeString($_POST['price'] ?? 0),
            'location_id'     => InputHelper::sanitizeString($_POST['location_id'] ?? 0),
            'available_spots' => InputHelper::sanitizeString($_POST['available_spots'] ?? 0)
        ];
        // Maak de show aan en ontvang de gegenereerde ID
        $showId = $this->showService->createShow($data);
        // Haal de geselecteerde artiest op uit het formulier
        $artistId = InputHelper::sanitizeString($_POST['artist_id'] ?? '');
        if ($showId && !empty($artistId)) {
            // Koppel de artiest aan de show via ShowService
            $this->showService->linkArtist($showId, (int)$artistId);
        }
        header("Location: /admin/dashboard?message=Show+created");
        exit();
    }

    // Toon het formulier voor het editen van een bestaande show
    public function edit()
    {
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
        
        // Haal alle beschikbare locaties op voor de dropdown
        $locationRepo = new LocationRepository();
        $locations = $locationRepo->getAllLocations();
        
        // Haal alle artiesten op voor de dropdown
        $artistRepo = new ArtistRepository();
        $artists = $artistRepo->getAllArtists();
        
        include __DIR__ . '/../views/admin/shows/edit.php';
    }

    // Verwerk de inzending van het formulier voor bijwerken van een show
    public function update()
    {
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
        // Update de artiest-koppeling als er een nieuwe artiest is geselecteerd
        $artistId = InputHelper::sanitizeString($_POST['artist_id'] ?? '');
        if (!empty($artistId)) {
            // Eerst, verwijder bestaande koppeling
            $this->showService->unlinkArtist($id);
            // Link de nieuwe artiest
            $this->showService->linkArtist($id, (int)$artistId);
        }
        header("Location: /admin/dashboard?message=Show+updated");
        exit();
    }

    // Verwerk het verwijderen van een show
    public function destroy()
    {
        $id = InputHelper::sanitizeString($_POST['show_id'] ?? '');
        if (empty($id)) {
            header("Location: /admin/dashboard?error=Show+not+found");
            exit();
        }
        $this->showService->deleteShow($id);
        header("Location: /admin/dashboard?message=Show+deleted");
        exit();
    }
}
