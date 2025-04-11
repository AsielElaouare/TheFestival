<?php
namespace App\Controllers;

use App\Service\CmsService;
use App\Service\ShowService;
use App\Service\ScheduleService;
use App\Repositories\ShowRepository;
use App\Service\EventService;
use App\Service\ArtistService;
use App\Models\Enums\MusicGenre;

class DanceController
{
    private CmsService $cmsService;
    private ShowService $showService;
    private ScheduleService $scheduleService;
    private EventService $eventService;
    private $artistService;
    private $danceShows;
    public function __construct()
    {
        $this->cmsService = new CmsService();
        $this->showService = new ShowService(new ShowRepository());
        $this->scheduleService = new ScheduleService($this->showService);
        $this->eventService = new EventService();
        $this->artistService = new ArtistService();
        $this->danceShows = $this->eventService->getAllShowsByGenre(MusicGenre::DANCE->value);

    }

    public function index()
    {
        $blocks = $this->cmsService->getPageById(5);
        $schedule = $this->scheduleService->getDanceSchedule();
        $groupedShows = $this->groupShows();
        $showsForMartin = $this->showService->getShowsForArtist(8);

        require __DIR__ . '/../views/dance/dance.php';
    }

    private function groupShows(){
        $groupedShows = [];
        foreach ($this->danceShows as $show) {
            $day = $show->startDate->format('l');
            $groupedShows[$day][] = $show;
        }
        return $groupedShows;
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
    
                       
    
            if ($pageId == 6) {
                include __DIR__ . '/../views/dance/detailPageDance.php';
            } elseif ($pageId == 7) {
                include __DIR__ . '/../views/dance/detailPageDance2.php';
            } else {
                http_response_code(404);
            }
            exit;

        }
    }
}
