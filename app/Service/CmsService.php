<?php


namespace App\Service;

use App\Repositories\CmsRepository;


class CmsService{

    private $cmsRepo;

    public function __construct(){

        $this->cmsRepo = new CmsRepository();

    }

    
    public function getPageById($page_id){
        $data =  $this->cmsRepo->getPageWithSections($page_id);
        return $data;
    }


    public function updateContentInDb($contentTitle, $content, $pageSlug){
        $this->cmsRepo->updateContent($contentTitle, $content, $pageSlug);
    }

}