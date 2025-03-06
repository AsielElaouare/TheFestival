<?php

namespace App\Controllers;

class SuccessCheckoutController{



    public function index(){
        session_start();
        //clear session cart
        //save tickets in db
        // send tickets via email

        require __DIR__ ."/../views/successCheckout/success.php";

    }


}