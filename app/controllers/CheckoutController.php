<?php

namespace App\Controllers;

use Stripe\Stripe;
use Stripe\Checkout\Session;

class CheckoutController {
    public function __construct() {
        $stripeConfig = require __DIR__ . '/../config/stripe.php';
        Stripe::setApiKey($stripeConfig['secret_key']); 
    }

    public function paymentPortal(){
        if(isset($_SESSION['user_id'])){
            $lineItems = [];
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $item) {
                    
                    $lineItems[] = [
                        "quantity" => $item['quantity'], 
                        "price_data" => [
                            "currency" => "eur",
                            "unit_amount" => $item['price'] * 100,  
                            "product_data" => [
                                "name" => $item['eventName'] 
                            ]
                        ]
                    ];
                }
            }else{
                header('Location: /tickets');
                exit;
            }
            
            $checkout_session = Session::create([
                "mode" => "payment",
                'phone_number_collection' => [
                    'enabled' => false 
                ],
                "customer_email" => $_SESSION["email"],
                "line_items" => $lineItems,
                "success_url" => "http://localhost/SuccessCheckout",
                "cancel_url" => "http://localhost/tickets"
            ]);
            header("Location: " . $checkout_session->url);
        }
        else{
            header("Location: /login");
        }
    }
}