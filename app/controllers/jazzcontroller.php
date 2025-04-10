<?php
namespace App\Controllers;
use App\Service\CmsService;
use App\Service\EventService;
use App\Models\Enums\MusicGenre;

class JazzController
{

    private $cmsService;
    private $eventService;
    public function __construct(){
        $this->cmsService = new CmsService();
        $this->eventService = new EventService();
    }

    public function index(){
        $blocks = $this->cmsService->getPageById(2);
        $jazzShows = $this->eventService->getAllShowsByGenre(MusicGenre::JAZZ->value);
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
            include __DIR__ . '/../views/jazz/detailPageJazz.php';
        }
    }
}