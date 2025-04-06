<?php

namespace App\Controllers;

use App\Service\CmsService;
use Exception;

class AdminCMSController {

    private $cmsService;

    public function __construct() {
        if ($_SESSION['role'] !== 'admin') {
            http_response_code(403);
            exit;
        }
        $this->cmsService = new CmsService();
    }

    public function edit() {
        try{
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $json = file_get_contents('php://input');
                $data = json_decode($json, true); 
                $pageIdentifier = empty($data["page_identifier"]) ? 'home' : strtolower($data["page_identifier"]);

                if (json_last_error() === JSON_ERROR_NONE && is_array($data)) {

                    error_log("Identifier of page Controller CMS " . $pageIdentifier);

                    $this->cmsService->updateContentInDb($data,  $pageIdentifier);

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

    public function uploadimg(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
            $uploadDirectory = 'uploads/';
        
            $file = $_FILES['file'];
        
            $fileName = time() . '_' . basename($file['name']);
            $filePath = $uploadDirectory . $fileName;
        
            $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
        
            if (in_array($file['type'], $allowedTypes)) {
                if (move_uploaded_file($file['tmp_name'], $filePath)) {
                    $response = [
                        'location' => '/' . $filePath  
                    ];
                    echo json_encode($response);  
                    exit;
                } else {
                    http_response_code(500);
                    echo json_encode(['error' => 'Failed to upload image.']);
                }
            } else {
                http_response_code(400);
                echo json_encode(['error' => 'Invalid file type. Only JPEG, PNG, and GIF are allowed.']);
            }
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'No file uploaded or invalid request.']);
        }
    }
}