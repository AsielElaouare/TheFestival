<?php
namespace App\Controllers;

use App\Service\CmsService;

class DanceController
{
    private $cmsService;
    public function __construct(){
        $this->cmsService = new CmsService();
    }

    public function index(){
        $blocks = $this->cmsService->getPageById(5);
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
            include __DIR__ . '/../views/dance/detailPageDance.php';
        }
    }
}
