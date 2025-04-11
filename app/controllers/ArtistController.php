<?php
namespace App\Controllers;

use App\Service\ArtistService;
use App\Helper\InputHelper;

class ArtistController extends BaseController
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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name  = InputHelper::sanitizeString($_POST['name'] ?? '');
            $genre = InputHelper::sanitizeString($_POST['genre'] ?? '');

            if (empty($name) || empty($genre)) {
                $error = "Name and genre are required.";
                include __DIR__ . '/../views/admin/artists/create.php';
                return;
            }

            if (!$this->artistService->createArtist($name, $genre)) {
                $this->redirectWithError("Could not create artist", "/artist/index");
            }

            $this->redirectWithMessage("Artist created", "/artist/index");
        }

        include __DIR__ . '/../views/admin/artists/create.php';
    }

    // Combineer Edit en Update: toont het formulier (GET) en verwerkt de update (POST)
    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id    = (int) ($_POST['artist_id'] ?? 0);
            $name  = InputHelper::sanitizeString($_POST['name'] ?? '');
            $genre = InputHelper::sanitizeString($_POST['genre'] ?? '');

            if (!$id || empty($name) || empty($genre)) {
                $this->redirectWithError("Invalid data", "/artist/index");
            }

            if (!$this->artistService->updateArtist($id, $name, $genre)) {
                $this->redirectWithError("Could not update artist", "/artist/index");
            }

            $this->redirectWithMessage("Artist updated", "/artist/index");
        }

        $id = (int) ($_GET['id'] ?? 0);
        if (!$id) {
            $this->redirectWithError("Artist not found", "/artist/index");
        }

        $artist = $this->artistService->getArtistById($id);
        if (!$artist) {
            $this->redirectWithError("Artist not found", "/artist/index");
        }

        include __DIR__ . '/../views/admin/artists/edit.php';
    }

    // Combineer Delete bevestiging en verwerking: als GET, toon de bevestiging; als POST, voer de verwijdering uit.
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = (int) ($_POST['artist_id'] ?? 0);
            if (!$id) {
                $this->redirectWithError("Artist not found", "/artist/index");
            }

            if (!$this->artistService->deleteArtist($id)) {
                $this->redirectWithError("Could not delete artist (maybe in use)", "/artist/index");
            }

            $this->redirectWithMessage("Artist deleted", "/artist/index");
        }

        $id = (int) ($_GET['id'] ?? 0);
        if (!$id) {
            $this->redirectWithError("Artist not found", "/artist/index");
        }

        $artist = $this->artistService->getArtistById($id);
        if (!$artist) {
            $this->redirectWithError("Artist not found", "/artist/index");
        }

        include __DIR__ . '/../views/admin/artists/delete.php';
    }
}
