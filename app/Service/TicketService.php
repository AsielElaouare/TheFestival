<?php

namespace App\Service;

use App\Models\BaseTicket;
use App\Repositories\TicketRepository;
use App\Models\TourTicket;
use App\Models\MusicTicket;
use App\Models\Enums\TicketTypeEnum;
use PDO;
use DateTime;   

class TicketService{
    
    private $ticketRepo;
    public function __construct(){
        $this->ticketRepo = new TicketRepository();
    }

    public function getUserTickets($userId): array{
        $tickets = $this->ticketRepo->getUserTickets($userId);
        $tickets= $this->mapDataToTicketObj($tickets);
        return $tickets;
    }


    private function mapDataToTicketObj(array $tickets): array{
        $ticketObjects = [];  
        
        foreach($tickets as $ticket) {
            if ($ticket["ticket_type"] == TicketTypeEnum::TOUR_TICKET->value) {
                $ticketObjects[] = new TourTicket(
                    $ticket["event_id"], 
                    new DateTime($ticket["tour_start_date"]), 
                    $ticket["ticket_id"], 
                    null, 
                    $ticket["qr_code"], 
                    null, 
                    $ticket["tour_name"]
                );
            } else if ($ticket["ticket_type"] == TicketTypeEnum::MUSIC_TICKET->value) {
                $ticketObjects[] = new MusicTicket(
                    $ticket["event_id"],
                    new DateTime($ticket["show_start_date"]), 
                    null, 
                    null, 
                    $ticket['qr_code'], 
                    null, 
                    $ticket['show_name']
                );
            }
        }
        
        return $ticketObjects;  
    }
}