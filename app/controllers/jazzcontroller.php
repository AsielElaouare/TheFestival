<?php
namespace App\Controllers;
use App\Service\CmsService;

class JazzController
{

    private $cmsService;
    public function __construct(){
        $this->cmsService = new CmsService();
    
    }

    public function index(){
        $blocks = $this->cmsService->getPageById(2);
        require __DIR__ . '/../views/jazz/jazz.php';
    }

}