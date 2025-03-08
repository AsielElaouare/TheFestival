<?php

namespace App\Controllers;
use App\Models;
use App\Service\OrderService;
use App\Service\TicketService;
use App\Helper\MailHelper;
use App\Helper\PDFHelper;

class SuccessCheckoutController{

    private $orderService;
    private $ticketService;
    private $mailHelper;

    private $pdfHelper;


    public function __construct(){
        $this->orderService = new OrderService();
        $this->ticketService = new TicketService();
        $this->mailHelper = new MailHelper();
        $this->pdfHelper = new PDFHelper();
    }


    public function index(){

        //save tickets in db
        $orderId = $this->orderService->saveUserOrder($_SESSION['user_id'], $_SESSION['cart']);

        $tickets = $this->ticketService->getUserTickets($_SESSION['user_id']);
        //create pdf with tickets

        $pdf = $this->pdfHelper->generatePDF($tickets);
        //var_dump($pdf);
        // send tickets via email
        $this->mailHelper->sendTicketsViaEmail($pdf);
        //clear session cart

        require __DIR__ ."/../views/successCheckout/success.php";

    }


}