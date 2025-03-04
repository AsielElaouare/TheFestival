<?php


namespace App\Controllers;

use App\Models\BaseEvent;
use App\Service\EventService;
use App\Service\TicketService;

class TicketsController{

    private $eventService;

    public function __construct(){
        $this->eventService = new EventService();
    }

    public function index(){
        //show default ticket page
        require __DIR__ ."/../views/tickets/ticketsPage.php";
    }

    public function showMusicTickets(){
        $genreString = $_GET['genre'] ?? 'dance'; 
        $events = $this->eventService->getAllShowsByGenre($genreString);
        require __DIR__ .'/../views/tickets/ticketsTable.php';
    }

    public function showHistoryTickets(){
        $events = $this->eventService->getAllTours();
        require __DIR__ .'/../views/tickets/ticketsTable.php';
    }
    
    public function showPersonalProgram() {
        session_start();
        $error = "";
        $showIdsArray = [];
        $toursIdsArray = [];
        $tickets = $_SESSION['cart'] ?? [];

        if (empty($tickets)) {
            $error = "You haven't selected any tickets for your personal program yet";

        } else{
            foreach ($tickets as $ticket) {
                if(array_key_exists('artistsName', $ticket)){
                    $showIdsArray[] = $ticket['eventId'];

                } else{
                    $toursIdsArray[] = $ticket['eventId'];
                }
            }
            $tours = $this->eventService->getAllToursByIds($toursIdsArray);
            $shows = $this->eventService->getAllShowsByIds($toursIdsArray);
        }
        $events = array_merge($tours, $shows);
        require __DIR__ . "/../views/tickets/ticketsTable.php";
    }



    public function saveSelectedTicketinShopingCart() {
        session_start(); 
    
        $ticket = $_POST['ticket'] ?? null;
        $quantity = $_POST['quantity'] ?? 0;
    
        if (!$ticket) {
            echo json_encode(["status" => "error", "message" => "Invalid ticket data"]);
            return;
        }
    
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    
        $ticketKey = md5($ticket['eventName'] . $ticket['location']); //unique identifier

    
        if ($quantity > 0) {
            $_SESSION['cart'][$ticketKey] = [
                "eventId" => $ticket["eventId"],
                "artistsName" => $ticket["artistsName"],
                "eventName" => $ticket['eventName'],
                "price" => $ticket['price'],
                "location" => $ticket['location'],
                "startDate" => $ticket['startDate'],
                "quantity" => $quantity
            ];
        } else {
            unset($_SESSION['cart'][$ticketKey]);
        }
    
        echo json_encode(["status" => "success", "cart" => $_SESSION['cart']]);
    }
    
}