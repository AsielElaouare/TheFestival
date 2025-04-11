<?php
namespace App\Controllers;

use App\Repositories\LocationRepository;
use App\Helper\InputHelper;

class LocationController extends BaseController
{
    private LocationRepository $locationRepo;

    public function __construct()
    {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            $this->redirectWithError("Unauthorized", "/");
        }

        $this->locationRepo = new LocationRepository();
    }

    public function index()
    {
        $locations = $this->locationRepo->getAllLocations();
        include __DIR__ . '/../views/admin/locations/index.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $venueName  = InputHelper::sanitizeString($_POST['venue_name'] ?? '');
            $postalCode = InputHelper::sanitizeString($_POST['postal_code'] ?? '');
            $streetName = InputHelper::sanitizeString($_POST['street_name'] ?? '');
            $city       = InputHelper::sanitizeString($_POST['city'] ?? '');

            if (empty($venueName) || empty($postalCode) || empty($streetName) || empty($city)) {
                $error = "Alle velden zijn verplicht.";
                include __DIR__ . '/../views/admin/locations/create.php';
                return;
            }

            $this->locationRepo->createLocation($venueName, $postalCode, $streetName, $city);
            $this->redirectWithMessage("Location created", "/location/index");
        }

        include __DIR__ . '/../views/admin/locations/create.php';
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id         = (int) ($_POST['location_id'] ?? 0);
            $venueName  = InputHelper::sanitizeString($_POST['venue_name'] ?? '');
            $postalCode = InputHelper::sanitizeString($_POST['postal_code'] ?? '');
            $streetName = InputHelper::sanitizeString($_POST['street_name'] ?? '');
            $city       = InputHelper::sanitizeString($_POST['city'] ?? '');

            if (!$id || empty($venueName) || empty($postalCode) || empty($streetName) || empty($city)) {
                $error = "Alle velden zijn verplicht.";
                $location = $this->locationRepo->getLocationById($id);
                include __DIR__ . '/../views/admin/locations/edit.php';
                return;
            }

            $this->locationRepo->updateLocation($id, $venueName, $postalCode, $streetName, $city);
            $this->redirectWithMessage("Location updated", "/location/index");
        }

        $id = (int) ($_GET['id'] ?? 0);
        if (!$id) {
            $this->redirectWithError("Location not found", "/location/index");
        }

        $location = $this->locationRepo->getLocationById($id);
        if (!$location) {
            $this->redirectWithError("Location not found", "/location/index");
        }

        include __DIR__ . '/../views/admin/locations/edit.php';
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = (int) ($_POST['location_id'] ?? 0);
            if (!$id) {
                $this->redirectWithError("Location not found", "/location/index");
            }

            if ($this->locationRepo->hasDependentShows($id)) {
                $this->redirectWithError("Cannot delete location because it is in use", "/location/index");
            }

            if (!$this->locationRepo->deleteLocation($id)) {
                $this->redirectWithError("An error occurred", "/location/index");
            }

            $this->redirectWithMessage("Location deleted", "/location/index");
        }

        $id = (int) ($_GET['id'] ?? 0);
        if (!$id) {
            $this->redirectWithError("Location not found", "/location/index");
        }

        $location = $this->locationRepo->getLocationById($id);
        if (!$location) {
            $this->redirectWithError("Location not found", "/location/index");
        }

        include __DIR__ . '/../views/admin/locations/delete.php';
    }
}
