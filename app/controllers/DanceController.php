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
    private $artistService;

    public function __construct(){
        $this->cmsService = new CmsService();

        $this->showService = new ShowService(new ShowRepository());

        $this->scheduleService = new ScheduleService($this->showService);

        $this->artistService = new ArtistService();
    }

    public function index(){
         $blocks = $this->cmsService->getPageById(5);
        $schedule = $this->scheduleService->getDanceSchedule();

         $showsForMartin = $this->showService->getShowsForArtist(9);


         require __DIR__ . '/../views/dance/dance.php';
    }

    public function artistView(){
        if($_SERVER["REQUEST_METHOD"] === 'GET'){
            $pageId = isset($_GET['id']) ? $_GET['id'] : null;
            if($pageId === null){
                header("Location: /dance");
                exit();
            }

            $blocks = $this->cmsService->getPageById($pageId);
            if(empty($blocks)){
                http_response_code(404);
                return;
            }

            $schedule = $this->scheduleService->getDanceSchedule();
            $showsForMartin = $this->showService->getShowsForArtist(9);

            $groupedShows = [];
            foreach ($showsForMartin as $show) {
                $day = date('l', strtotime($show['start_date']));
                if (in_array($day, ['Friday', 'Saturday', 'Sunday'])) {
                    $groupedShows[$day][] = $show;
                }
            }

            $orderedDays = ['Friday', 'Saturday', 'Sunday'];
            $orderedSchedule = [];
            foreach ($orderedDays as $day) {
                if (isset($groupedShows[$day])) {
                    $orderedSchedule[$day] = $groupedShows[$day];
                }
            }

            include __DIR__ . '/../views/dance/detailPageDance.php';
        }
    }
}
