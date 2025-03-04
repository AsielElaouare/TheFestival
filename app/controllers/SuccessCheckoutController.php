<?php

namespace App\Controllers;

class SuccessCheckoutController{



    public function index(){
        session_start();
        //clear session kart
        // update personal program table
        //save tickets indb
        // send tickets via email

        require __DIR__ ."/../views/successCheckout/success.php";

    }


}