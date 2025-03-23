<?php


namespace App\Service;

use App\Repositories\CmsRepository;


class CmsService{

    private $cmsRepo;

    public function __construct(){

        $this->cmsRepo = new CmsRepository();

    }

    
    public function getPageById($page_id){
        $data =  $this->cmsRepo->getPageWithSectionsById($page_id);
        return $data;
    }

    public function updateContentInDb($update, $pageSlug){
        $this->cmsRepo->updateContentBatch($update,  $pageSlug);
    }

}