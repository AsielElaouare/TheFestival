<?php

namespace App\Repositories;
use PDO;
use PDOException;
use App\Models\Enums\TicketTypeEnum;

class TicketRepository extends Repository{


    public function getUserTickets($userId): array{
        try{
                                            $stmt = $this->connection->prepare("SELECT 
                                    TICKET.ticket_id,
                                    ORDER.order_date,
                                    USER.name AS customer_name,
                                    COALESCE(TOUR.tour_name, 'N/A') AS tour_name,
                                    COALESCE(TOUR.start_date, 'N/A') AS tour_start_date,
                                    COALESCE(TOUR.end_date, 'N/A') AS tour_end_date,
                                    COALESCE(SHOW.show_name, 'N/A') AS show_name,
                                    COALESCE(SHOW.start_date, 'N/A') AS show_start_date,
                                    COALESCE(TOUR_TICKET.qr_code, MUSIC_TICKET.qr_code, 'N/A') AS qr_code,
                                    CASE 
                                        WHEN TOUR_TICKET.tour_ticket_id IS NOT NULL THEN 'tourTicket'
                                        WHEN MUSIC_TICKET.music_ticket_id IS NOT NULL THEN 'musicTicket'
                                        ELSE 'Unknown'
                                    END AS ticket_type,
                                    COALESCE(TOUR.tour_id, SHOW.show_id) AS event_id,
                                    COALESCE(
                                        CONCAT(
                                            LOCATION.address_name, ', ',
                                            LOCATION.street_name, ', ',
                                            LOCATION.city, ' ',
                                            LOCATION.postal_code
                                        ), 'N/A'
                                    ) AS full_location
                                FROM 
                                    EventManagement.TICKET
                                JOIN 
                                    EventManagement.ORDER ON TICKET.order_id = ORDER.order_id
                                JOIN 
                                    EventManagement.USER ON ORDER.user_id = USER.user_id
                                LEFT JOIN 
                                    EventManagement.TOUR_TICKET ON TICKET.ticket_id = TOUR_TICKET.ticket_id
                                LEFT JOIN 
                                    EventManagement.TOUR ON TOUR_TICKET.tour_id = TOUR.tour_id
                                LEFT JOIN 
                                    EventManagement.MUSIC_TICKET ON TICKET.ticket_id = MUSIC_TICKET.ticket_id
                                LEFT JOIN 
                                    EventManagement.SHOW ON MUSIC_TICKET.show_id = SHOW.show_id
                                LEFT JOIN 
                                    EventManagement.LOCATION ON COALESCE(TOUR.location_id, SHOW.location_id) = LOCATION.location_id
                                WHERE 
                                    USER.user_id = :userId
                                    AND ORDER.order_id = (
                                        SELECT MAX(order_id) 
                                        FROM EventManagement.ORDER 
                                        WHERE user_id = :userId
                                    );");

            $stmt->execute([
                ":userId" => $userId,]);
            $userTickets = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $userTickets;    
        }catch(PDOException $e){
            echo"". $e->getMessage();
            return [];  
        }
    }
}