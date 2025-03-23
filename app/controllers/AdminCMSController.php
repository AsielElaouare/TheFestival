<?php

namespace App\Controllers;

use App\Service\CmsService;
use Exception;

class AdminCMSController {

    private $cmsService;

    public function __construct() {
        if ($_SESSION['role'] !== 'admin') {
            exit('Access denied');
        }
        $this->cmsService = new CmsService();
    }

    public function index() {
        $data = $this->cmsService->getPageById(1);
        var_dump($data); 
    }

    public function edit() {
        try{
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $json = file_get_contents('php://input');
                $data = json_decode($json, true); 
                $slug = empty($data["page_slug"]) ? 'home' : strtolower($data["page_slug"]);

                if (json_last_error() === JSON_ERROR_NONE && is_array($data)) {

                    $this->cmsService->updateContentInDb($data,  $slug);

                    header('Content-Type: application/json');
                    echo json_encode(['status' => 'success', 'message' => 'Content updated successfully']);

                } else {
                    header('Content-Type: application/json', true, 400);
                    echo json_encode(['status' => 'error', 'message' => 'Invalid JSON data']);
                }
            } else {
                header('Content-Type: application/json', true, 405);
                echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
            }
        }
        catch(Exception $e){
            echo $e->getMessage();
        }   
    }
}