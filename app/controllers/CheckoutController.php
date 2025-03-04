<?php

namespace App\Controllers;

use Stripe\Stripe;
use Stripe\Checkout\Session;

class CheckoutController {
    public $checkout_session;

    public function __construct() {
        $stripeConfig = require __DIR__ . '/../config/stripe.php';

        Stripe::setApiKey($stripeConfig['secret_key']); 
    }

    public function paymentPortal(){
        session_start();
        $lineItems = [];
    
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                
                $lineItems[] = [
                    "quantity" => $item['quantity'], 
                    "price_data" => [
                        "unit_amount" => $item['price'] * 100,  
                        "product_data" => [
                            "name" => $item['eventName'] 
                        ]
                    ]
                ];
            }
        }
        $this->checkout_session = Session::create([
            "mode" => "payment",
            "line_items" => $lineItems,
            "success_url" => "http://localhost/SuccessCheckout",
            "cancel_url" => "http://localhost/"
        ]);
        header("Location: " . $this->checkout_session->url);
    }
    
}