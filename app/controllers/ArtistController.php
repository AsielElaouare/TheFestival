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

    // List all artists
    public function index()
    {
        $artists = $this->artistService->getAllArtists();
        include __DIR__ . '/../views/admin/artists/index.php';
    }

    // Show form to create a new artist
    public function create()
    {
        include __DIR__ . '/../views/admin/artists/create.php';
    }

    // Process form submission to create new artist
    public function store()
    {
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

    // Show form to edit an artist
    public function edit()
    {
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
    }

    // Process updating an existing artist
    public function update()
    {
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

    // Show delete confirmation
    public function delete()
    {
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
    }

    // Actually delete the artist
    public function destroy()
    {
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
