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
        if(isset($_SESSION['cart'])){
            $orderId = $this->orderService->saveUserOrder($_SESSION['user_id'], $_SESSION['cart']);

            $tickets = $this->ticketService->getUserTickets($_SESSION['user_id']);

            $pdfFilePath = $this->pdfHelper->generatePDF($tickets);

            $this->mailHelper->sendTicketsViaEmail($pdfFilePath, $_SESSION["email"]);

            unset($_SESSION['cart']);
            require __DIR__ ."/../views/success/success.php";
        }
        else{
            header("Location: /");
        }
    }
}