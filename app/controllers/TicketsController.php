<?php


namespace App\Controllers;

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
        $shows = $this->eventService->getAllShowsByGenre($genreString);
        require __DIR__ .'/../views/tickets/ticketsTable.php';
    }

    public function showHistoryTickets(){
        $tours = $this->eventService->getAllTours();
        var_dump($tours);
        require __DIR__ .'/../views/tickets/ticketsTable.php';
    }
}