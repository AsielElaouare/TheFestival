<?php
namespace App\Controllers;

use App\Service\CmsService;

class DanceController
{
    private $cmsService;
    public function index()
    {
        $this->cmsService = new CmsService();
        $blocks  = $this->cmsService->getPageById(5);
        // laad de dance page view
        require __DIR__ . '/../views/dance/dance.php';
    }
}
