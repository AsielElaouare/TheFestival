<?php


namespace App\Service;

use App\Repositories\CmsRepository;
use App\Helper\InputHelper;

class CmsService{

    private $cmsRepo;
    private $inputHelper;

    public function __construct(){
        $this->inputHelper = new InputHelper();
        $this->cmsRepo = new CmsRepository();
    }
    
    public function getPageById($page_id){
        $data =  $this->cmsRepo->getPageWithSectionsById($page_id);
        return $data;
    }

    public function updateContentInDb($update, $pageIdentifier){
        foreach($update as $key => $item){
             $update[$key] = $this->inputHelper->sanitizeSringForCMS($item);
        }
        
        $this->cmsRepo->updateContentBatch($update,  $pageIdentifier);
    }

}