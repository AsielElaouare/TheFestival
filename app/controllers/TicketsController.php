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
        $shoppingCartItemCount = 0;
        if(isset($_SESSION['cart'])){
            $shoppingCart =$_SESSION['cart'];
            $shoppingCartItemCount =  array_sum(array_column($shoppingCart, 'quantity'));
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
        //onderdeel van adam
    }
    
    public function showPersonalProgram() {
        //onderdeel van Adam
    }

    private function showWantedQuantity(array $events){
            foreach ($events as $event) {
                $ticketKey = $event->getEventId();
                $quantityInCart = isset($_SESSION['cart'][$ticketKey]) ? $_SESSION['cart'][$ticketKey]['quantity'] : 0;
                $event->setWantedQuantity($quantityInCart);
            }
    }
}