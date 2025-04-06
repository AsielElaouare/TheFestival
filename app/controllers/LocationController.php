<?php
namespace App\Controllers;

use App\Repositories\LocationRepository;
use App\Helper\InputHelper;

class LocationController
{
    private LocationRepository $locationRepo;

    public function __construct()
    {
        // Start sessie indien nodig en controleer admin-toegang
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header("Location: /");
            exit();
        }

        $this->locationRepo = new LocationRepository();
    }

    // Toon alle locaties
    public function index()
    {
        $locations = $this->locationRepo->getAllLocations();
        include __DIR__ . '/../views/admin/locations/index.php';
    }

    // Combineer Create: Als GET tonen we het formulier, als POST verwerken we de creatie
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include __DIR__ . '/../views/admin/locations/create.php';
        } else { // POST
            $venueName  = InputHelper::sanitizeString($_POST['venue_name'] ?? '');
            $postalCode = InputHelper::sanitizeString($_POST['postal_code'] ?? '');
            $streetName = InputHelper::sanitizeString($_POST['street_name'] ?? '');
            $city       = InputHelper::sanitizeString($_POST['city'] ?? '');

            // Basisvalidatie
            if (empty($venueName) || empty($postalCode) || empty($streetName) || empty($city)) {
                $error = "Alle velden zijn verplicht.";
                include __DIR__ . '/../views/admin/locations/create.php';
                return;
            }

            $this->locationRepo->createLocation($venueName, $postalCode, $streetName, $city);
            header("Location: /location/index?message=Location+created");
            exit();
        }
    }

    // Combineer Edit en Update: Als GET tonen we het formulier, als POST verwerken we de update
    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = InputHelper::sanitizeString($_GET['id'] ?? '');
            if (empty($id)) {
                header("Location: /admin/locations?error=Location+not+found");
                exit();
            }
            $location = $this->locationRepo->getLocationById((int)$id);
            if (!$location) {
                header("Location: /admin/locations?error=Location+not+found");
                exit();
            }
            include __DIR__ . '/../views/admin/locations/edit.php';
        } else { // POST: verwerk update
            $id = InputHelper::sanitizeString($_POST['location_id'] ?? '');
            if (empty($id)) {
                header("Location: /admin/locations?error=Location+not+found");
                exit();
            }
            $venueName  = InputHelper::sanitizeString($_POST['venue_name'] ?? '');
            $postalCode = InputHelper::sanitizeString($_POST['postal_code'] ?? '');
            $streetName = InputHelper::sanitizeString($_POST['street_name'] ?? '');
            $city       = InputHelper::sanitizeString($_POST['city'] ?? '');

            if (empty($venueName) || empty($postalCode) || empty($streetName) || empty($city)) {
                $error = "Alle velden zijn verplicht.";
                include __DIR__ . '/../views/admin/locations/edit.php';
                return;
            }

            $this->locationRepo->updateLocation((int)$id, $venueName, $postalCode, $streetName, $city);
            header("Location: /location/index?message=Location+updated");
            exit();
        }
    }

    // Combineer Delete bevestiging en Verwerking: Als GET tonen we bevestiging, als POST verwerken we de verwijdering
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = InputHelper::sanitizeString($_GET['id'] ?? '');
            if (empty($id)) {
                header("Location: /admin/locations?error=Location+not+found");
                exit();
            }
            $location = $this->locationRepo->getLocationById((int)$id);
            if (!$location) {
                header("Location: /admin/locations?error=Location+not+found");
                exit();
            }
            include __DIR__ . '/../views/admin/locations/delete.php';
        } else { // POST: verwerk verwijdering
            $id = InputHelper::sanitizeString($_POST['location_id'] ?? '');
            if (empty($id)) {
                header("Location: /location/index?error=Location+not+found");
                exit();
            }
            // Controleer of er afhankelijkheden zijn (bijv. shows)
            if ($this->locationRepo->hasDependentShows((int)$id)) {
                header("Location: /location/index?error=Cannot+delete+location+because+it+is+in+use");
                exit();
            }
            $result = $this->locationRepo->deleteLocation((int)$id);
            if (!$result) {
                header("Location: /location/index?error=An+error+occurred");
                exit();
            }
            header("Location: /location/index?message=Location+deleted");
            exit();
        }
    }
}
