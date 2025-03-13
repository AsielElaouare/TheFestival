<?php

namespace App\Controllers;

class CartController{
    
    
    public function shoppingCart(){
        $shoppingCart = [];
        if(isset($_SESSION['cart'])){
            $shoppingCart = $_SESSION['cart'];
        }
        require __DIR__ . '/../views/tickets/shoppingCart.php';
    }


    public function saveSelectedTicketinShoppingCart() {
    
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