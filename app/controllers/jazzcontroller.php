<?php
namespace App\Controllers;
use App\Service\ArtistService;
use App\Service\CmsService;
use App\Service\EventService;
use App\Models\Enums\MusicGenre;

class JazzController
{

    private $cmsService;
    private $eventService;
    private $jazzShows;
    private $artistService;
    public function __construct(){
        $this->cmsService = new CmsService();
        $this->eventService = new EventService();
        $this->artistService = new ArtistService();

        $this->jazzShows = $this->eventService->getAllShowsByGenre(MusicGenre::JAZZ->value);
        
    }

    public function index(){
        $blocks = $this->cmsService->getPageById(2);
        $groupedShows = $this->groupShows();
        require __DIR__ . '/../views/jazz/jazz.php';
    }

    public function artistView(){
        if($_SERVER["REQUEST_METHOD"] === 'GET'){
            $pageId = isset($_GET['id']) ? $_GET['id'] : null;
            if($pageId === null){
                header("Location: /jazz");
                exit();
            }
            $blocks = $this->cmsService->getPageById($pageId);
            if(empty($blocks)){
                http_response_code(404);
                return;
            }
            
            $groupedShows = $this->groupShowsByArtist($blocks);
            $allArtists = $this->artistService->getAllArtists();
            include __DIR__ . '/../views/jazz/detailPageJazz.php';
        }
    }

    private function groupShows(){
        $groupedShows = [];
        foreach ($this->jazzShows as $show) {
            $day = $show->startDate->format('l');
            $groupedShows[$day][] = $show;
        }
        return $groupedShows;
    }
    private function groupShowsByArtist($blocks){
        $artistName = null;
        $groupedShows = [];

        foreach ($blocks as $block) {
            if ($block->contentblock_title === "FirstSection") {
                $artistName = $block->content;
            }
        }
        foreach ($this->jazzShows as $show) {
            $day = $show->startDate->format('l');
            if($artistName == $show->getArtistName()){
                $groupedShows[$day][] = $show;
            }
        }
        return $groupedShows;
    }
}