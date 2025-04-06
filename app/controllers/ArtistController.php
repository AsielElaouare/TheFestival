<?php
namespace App\Controllers;

use App\Service\ArtistService;
use App\Helper\InputHelper;

class ArtistController
{
    private ArtistService $artistService;

    public function __construct()
    {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header("Location: /");
            exit();
        }
        $this->artistService = new ArtistService();
    }

    // Toon een lijst met alle artiesten
    public function index()
    {
        $artists = $this->artistService->getAllArtists();
        include __DIR__ . '/../views/admin/artists/index.php';
    }

    // Combineer Create: toont het formulier (GET) en verwerkt nieuwe artiesten (POST)
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include __DIR__ . '/../views/admin/artists/create.php';
        } else { // POST
            $name  = InputHelper::sanitizeString($_POST['name'] ?? '');
            $genre = InputHelper::sanitizeString($_POST['genre'] ?? '');
            if (empty($name) || empty($genre)) {
                $error = "Name and genre are required.";
                include __DIR__ . '/../views/admin/artists/create.php';
                return;
            }
            $newId = $this->artistService->createArtist($name, $genre);
            if (!$newId) {
                header("Location: /artist/index?error=Could+not+create+artist");
                exit();
            }
            header("Location: /artist/index?message=Artist+created");
            exit();
        }
    }

    // Combineer Edit en Update: toont het formulier (GET) en verwerkt de update (POST)
    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = (int) ($_GET['id'] ?? 0);
            if (!$id) {
                header("Location: /artist/index?error=Artist+not+found");
                exit();
            }
            $artist = $this->artistService->getArtistById($id);
            if (!$artist) {
                header("Location: /artist/index?error=Artist+not+found");
                exit();
            }
            include __DIR__ . '/../views/admin/artists/edit.php';
        } else { // POST request: update de artiest
            $id    = (int) ($_POST['artist_id'] ?? 0);
            $name  = InputHelper::sanitizeString($_POST['name'] ?? '');
            $genre = InputHelper::sanitizeString($_POST['genre'] ?? '');
            if (!$id || empty($name) || empty($genre)) {
                header("Location: /artist/index?error=Artist+not+found+or+invalid+data");
                exit();
            }
            $success = $this->artistService->updateArtist($id, $name, $genre);
            if (!$success) {
                header("Location: /artist/index?error=Could+not+update+artist");
                exit();
            }
            header("Location: /artist/index?message=Artist+updated");
            exit();
        }
    }

    // Combineer Delete bevestiging en verwerking: als GET, toon de bevestiging; als POST, voer de verwijdering uit.
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = (int) ($_GET['id'] ?? 0);
            if (!$id) {
                header("Location: /artist/index?error=Artist+not+found");
                exit();
            }
            $artist = $this->artistService->getArtistById($id);
            if (!$artist) {
                header("Location: /artist/index?error=Artist+not+found");
                exit();
            }
            include __DIR__ . '/../views/admin/artists/delete.php';
        } else { // POST: verwijder de artiest
            $id = (int) ($_POST['artist_id'] ?? 0);
            if (!$id) {
                header("Location: /artist/index?error=Artist+not+found");
                exit();
            }
            $success = $this->artistService->deleteArtist($id);
            if (!$success) {
                header("Location: /artist/index?error=Could+not+delete+artist+(maybe+in+use)");
                exit();
            }
            header("Location: /artist/index?message=Artist+deleted");
            exit();
        }
    }
}
