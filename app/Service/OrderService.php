<?php


namespace App\Service;

use App\Models\BaseEvent;
use App\Models\BaseTicket;
use App\Repositories\OrderRepository;
use App\Models\Order;
use App\Models\TourTicket;
use App\Models\MusicTicket;
use App\Helper\QrCodeGenerationHelper;

use DateTime;

class OrderService{
    private OrderRepository $orderRepo;

    public function __construct(){
        $this->orderRepo = new OrderRepository();
    }

    public function saveUserOrder($userId, array $ticketData){
        $totalAmount = array_sum(array_map(function($ticket) {
            return floatval($ticket['price']) * intval($ticket['quantity']);
        }, $ticketData));

        $tickets = $this->mapTicketsToObj($ticketData);
        $order = Order::createOrderObj($userId, new DateTime()->format("Y-m-d H:i:s"), $totalAmount, );

        $order = $this->orderRepo->saveUserOrderWithTickets($order,$tickets );
        return $order;
    }

    private function mapTicketsToObj(array $ticketData): array{
        $tickets = [];
        foreach ($ticketData as $ticket) {
            $ticketObject = null;
            $costumerName = $_SESSION["userName"];

            for ($i = 0; $i < $ticket["quantity"]; $i++){
                if ($ticket["artistsName"] === "") {
                    $ticketObject = new TourTicket($ticket['eventId'],  
                    new DateTime($ticket['startDate']), null, null, null, 
                    null, $ticket["eventName"], null, $costumerName);
                } else {
                    $ticketObject = new MusicTicket($ticket['eventId'], 
                    new DateTime($ticket['startDate']), null, null, 
                    null, null, $ticket["eventName"], null, $costumerName);
                }
                $qrCode = new QrCodeGenerationHelper($ticketObject);
                $qrCode = $qrCode->generateQrCodeAsBinary();
                $ticketObject->setQrCode($qrCode);
                $tickets[] = $ticketObject;
            }
        }
        return $tickets;
    }
}