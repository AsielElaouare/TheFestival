<?php
namespace App\Controllers;

use App\Service\ShowService;
use App\Repositories\ShowRepository;
use App\Repositories\LocationRepository; 

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

    // laat alle shows zien
    public function index()
    {
        $shows = $this->showService->getAllShows();
        include __DIR__ . '/../views/admin/shows/index.php';
    }

    // form laten zien voor aanmaken van nieuwe show
    public function create()
    {
        // haal alle locaties op
        $locationRepo = new LocationRepository();
        $locations = $locationRepo->getAllLocations();

        include __DIR__ . '/../views/admin/shows/create.php';
    }

    // verwerken van inending van nieuwe formulier
    public function store()
    {
        $data = [
            'show_name'       => $_POST['show_name']       ?? '',
            'start_date'      => $_POST['event_date']      ?? '',
            'price'           => $_POST['price']           ?? 0,
            'location_id'     => $_POST['location_id']     ?? 0,
            'available_spots' => $_POST['available_spots'] ?? 0
        ];
        $this->showService->createShow($data);
        header("Location: /admin/dashboard?message=Show+created");
        exit();
    }

    // laat form zien voor het editen van bestaande show
    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: /admin/dashboard?error=Show+not+found");
            exit();
        }
        $show = $this->showService->getShowById($id);
        if (!$show) {
            header("Location: /admin/dashboard?error=Show+not+found");
            exit();
        }
        
        // haal alle beschikbare locaties op voor dropdown
        $locationRepo = new LocationRepository();
        $locations = $locationRepo->getAllLocations();
        
        include __DIR__ . '/../views/admin/shows/edit.php';
    }

    // verwerken van formulier inzending voor bijwerken van een show
    public function update()
    {
        $id = $_POST['show_id'] ?? null;
        if (!$id) {
            header("Location: /admin/dashboard?error=Show+not+found");
            exit();
        }
        $data = [
            'show_name'       => $_POST['show_name']       ?? '',
            'start_date'      => $_POST['event_date']      ?? '',
            'price'           => $_POST['price']           ?? 0,
            'location_id'     => $_POST['location_id']     ?? 0,
            'available_spots' => $_POST['available_spots'] ?? 0
        ];
        $this->showService->updateShow($id, $data);
        header("Location: /admin/dashboard?message=Show+updated");
        exit();
    }

    // verwerk het verwijderen van een show
    public function destroy()
    {
        $id = $_POST['show_id'] ?? null;
        if (!$id) {
            header("Location: /admin/dashboard?error=Show+not+found");
            exit();
        }
        $this->showService->deleteShow($id);
        header("Location: /admin/dashboard?message=Show+deleted");
        exit();
    }
}
