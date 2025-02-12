<?php

namespace App\Controllers;

use Stripe\Stripe;
use Stripe\Checkout\Session;


class CheckoutController {
    public $checkout_session;

    public function __construct() {
        $stripeConfig = require __DIR__ . '/../config/stripe.php';

        Stripe::setApiKey($stripeConfig['secret_key']); 

      
        $this->checkout_session = Session::create([
            "mode" => "payment",
            "line_items" => [  
                [
                    "quantity" => 1,
                    "price_data" => [
                        "currency" => "eur",
                        "unit_amount" => 2000,
                        "product_data" => [
                            "name" => "Ticket Dance"
                        ]
                    ]
                ]
            ],
            "success_url" => "https://localhost/success",
            "cancel_url" => "https://localhost/index"
        ]);
    }

    public function paymentPortal(){
        header("Location: " .$this->checkout_session->url);
    }
}