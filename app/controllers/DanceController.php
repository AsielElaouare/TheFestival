<?php
namespace App\Controllers;

use App\Service\CmsService;
use App\Service\ShowService;
use App\Service\ScheduleService;
use App\Repositories\ShowRepository;

class DanceController
{
    private CmsService $cmsService;
    private ShowService $showService;
    private ScheduleService $scheduleService;

    public function __construct()
    {
        $this->cmsService = new CmsService();
        $this->showService = new ShowService(new ShowRepository());
        $this->scheduleService = new ScheduleService($this->showService);
    }

    public function index()
    {
        $blocks = $this->cmsService->getPageById(5);
        $schedule = $this->scheduleService->getDanceSchedule();
        $showsForMartin = $this->showService->getShowsForArtist(8);

        require __DIR__ . '/../views/dance/dance.php';
    }

    public function artistView() {
        if ($_SERVER["REQUEST_METHOD"] === 'GET') {
            $pageId = isset($_GET['id']) ? $_GET['id'] : null;
            if ($pageId === null) {
                header("Location: /dance");
                exit();
            }
    
            $blocks = $this->cmsService->getPageById($pageId);
            if (empty($blocks)) {
                http_response_code(404);
                return;
            }
    
            // Map page IDs to artist IDs
            $pageIdToArtistId = [
                6 => 8, // Martin Garrix
                7 => 4, // Hardwell
            ];
    
            $artistId = $pageIdToArtistId[$pageId] ?? null;
            if (!$artistId) {
                http_response_code(404);
                echo "Unknown artist for this page.";
                exit();
            }
    
            $orderedSchedule = $this->scheduleService->getScheduleForArtist($artistId);
    
                        echo "Loading detail for page ID: $pageId<br>";
            echo "Artist ID: $artistId<br>";
            echo "Loading file: ";

            if ($pageId == 6) {
                echo "detailPageDance.php";
                include __DIR__ . '/../views/dance/detailPageDance.php';
            } elseif ($pageId == 7) {
                echo "detailPageDance2.php";
                include __DIR__ . '/../views/dance/detailPageDance2.php';
            } else {
                http_response_code(404);
                echo "No detail page available.";
            }
            exit;

        }
    }
    
}
