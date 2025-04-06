<?php
namespace App\Controllers;

use App\Service\CmsService;

class HomeController
{

    private $cmsService;
    public function __construct(){
        $this->cmsService = new CmsService();
    
    }

    public function index(){
        $blocks = $this->cmsService->getPageById(1);
        require __DIR__ . '/../views/home/index.php';
    }

}