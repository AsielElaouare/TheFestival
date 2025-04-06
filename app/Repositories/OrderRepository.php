<?php

namespace App\Repositories;
use App\Models\Order;
use PDOException;

class OrderRepository extends Repository{

    
    public function saveUserOrderWithTickets(Order $order, array $tickets) {
        try {
            $this->connection->beginTransaction();
    
            $stmt = $this->connection->prepare("INSERT INTO `ORDER` (order_date, total_amount, user_id) VALUES (:order_date, :total_amount, :user_id)");
            $stmt->execute([
                ':order_date' => $order->getOrderDate(),
                ':total_amount' => $order->getAmount(),
                ':user_id' => $order->getUserID()
            ]);
            $orderId = $this->connection->lastInsertId();
    
            $ticketStmt = $this->connection->prepare("INSERT INTO TICKET (order_id) VALUES (:order_id)");
            $tourTicketStmt = $this->connection->prepare("INSERT INTO TOUR_TICKET (ticket_id, tour_id, qr_code) VALUES (:ticket_id, :tour_id, :qr_code)");
            $musicTicketStmt = $this->connection->prepare("INSERT INTO MUSIC_TICKET (ticket_id, qr_code, show_id) VALUES (:ticket_id, :qr_code, :show_id)");
    
            foreach ($tickets as $ticket) {
                $ticketStmt->execute([':order_id' => $orderId]);
                $ticketId = $this->connection->lastInsertId();
    
                if (get_class($ticket) === 'App\Models\TourTicket') {
                    $tourTicketStmt->execute([
                        ':ticket_id' => $ticketId,
                        ':tour_id' => $ticket->getEventId(),
                        ':qr_code' => $ticket->getQrCode(),
                    ]);
                } elseif (get_class($ticket) === 'App\Models\MusicTicket') {
                    $musicTicketStmt->execute([
                        ':ticket_id' => $ticketId,
                        ':show_id' => $ticket->getEventId(),
                        ':qr_code' => $ticket->getQrCode(),
                    ]);
                }
            }
            $this->connection->commit();
            return $orderId;

        } catch (PDOException $e) {
            $this->connection->rollBack();
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}