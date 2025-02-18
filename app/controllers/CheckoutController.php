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
        $quantityItems = 1;

        if(isset($_GET['quantity'])){
            $quantityItems = $_GET['quantity'];
         };

        $this->checkout_session = Session::create([
            "mode" => "payment",
            "line_items" => [  
                [
                    "quantity" => $quantityItems,
                    "price_data" => [
                        "currency" => "eur",
                        "unit_amount" => 2000,
                        "product_data" => [
                            "name" => "Ticket Dance"
                        ]
                    ]
                ]
            ],
            "success_url" => "http://localhost/success",
            "cancel_url" => "http://localhost/"
        ]);
        header("Location: " .$this->checkout_session->url);
    }
}