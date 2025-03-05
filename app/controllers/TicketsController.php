<?php


namespace App\Controllers;

use App\Models\BaseEvent;
use App\Service\EventService;
use App\Service\TicketService;
use Stripe\Issuing\CardDetails;

class TicketsController{

    private $eventService;

    public function __construct(){
        $this->eventService = new EventService();
    }

    public function index(){
        $shoppingCart = [];
        if(isset($_SESSION['cart'])){
            $shoppingCart =$_SESSION['cart'];
        }
        require __DIR__ ."/../views/tickets/ticketsPage.php";
    }

    public function showMusicTickets(){
        $genreString = $_GET['genre'] ?? 'dance'; 
        $events = $this->eventService->getAllShowsByGenre($genreString);
        if(isset($_SESSION['cart'])){
            $this->showWantedQuantity($events);
        }
        require __DIR__ .'/../views/tickets/ticketsTable.php';
    }

    public function showHistoryTickets(){
        $events = $this->eventService->getAllTours();
        if(isset($_SESSION['cart'])){
            $this->showWantedQuantity($events);
        }
        require __DIR__ .'/../views/tickets/ticketsTable.php';
    }
    
    public function showPersonalProgram() {
        $tickets = [] ;
        if (empty($tickets)) {
            $error = "You haven't purchased any tickets to display it in your personal program yet";
        } else{
            foreach ($tickets as $ticket) {
                if(array_key_exists('artistsName', $ticket)){
                    $showIdsArray[] = $ticket['eventId'];

                } else{
                    $toursIdsArray[] = $ticket['eventId'];
                }
            }
           
        }
        $events = $tickets;
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
    
    private function showWantedQuantity(array $events){
            foreach ($events as $event) {
                $ticketKey = md5($event->getEventName() . $event->location->getAddressName());
                $quantityInCart = isset($_SESSION['cart'][$ticketKey]) ? $_SESSION['cart'][$ticketKey]['quantity'] : 0;
                $event->setWantedQuantity($quantityInCart);
            }
    }
}