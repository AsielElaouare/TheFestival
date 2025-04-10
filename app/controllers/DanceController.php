<?php
namespace App\Controllers;

use App\Service\CmsService;
use App\Service\ShowService;
use App\Service\ScheduleService;
use App\Service\ArtistService;
use App\Repositories\ShowRepository;


class DanceController
{
    private $cmsService;
    private $showService;  //call methode getshowforartist
    private $scheduleService; //call methode getdanceschedule

    public function __construct(){
        $this->cmsService = new CmsService();

        $this->showService = new ShowService(new ShowRepository());

        $this->scheduleService = new ScheduleService($this->showService);
    }

    public function index(){
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
    
            $pageIdToArtistId = [
                6 => 8, // Martin Garrix
            ];
    
            $artistId = $pageIdToArtistId[$pageId] ?? null;
            if (!$artistId) {
                http_response_code(404);
                echo "Unknown artist for this page.";
                exit();
            }
    
            $orderedSchedule = $this->scheduleService->getScheduleForArtist($artistId);
    
            include __DIR__ . '/../views/dance/detailPageDance.php';
        }
    }
    
}
