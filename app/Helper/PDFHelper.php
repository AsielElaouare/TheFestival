<?php
namespace App\Helper;

use App\Models\BaseTicket;
use Dompdf\Dompdf;

class PDFHelper {

    private $dompdf;   
    private $htmlContent = ''; 

    public function __construct() {
        $this->dompdf = new Dompdf(["chroot" => __DIR__, 'isRemoteEnabled' => true]);
    }

    /**
     * @param BaseTicket[] $ticketData
     */
    public function generatePDF(array $ticketData): string|null {
        foreach ($ticketData as $ticket) {
            $this->htmlContent .= $this->generateTicketHTML($ticket);
        }

        $this->dompdf->loadHtml($this->htmlContent);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream("tickets.pdf", ["Attachment" => false]);
        return $this->dompdf->output();
    }

    private function generateTicketHTML(BaseTicket $ticket): string {
        $eventName = $ticket->getEventName();
        $eventDate = $ticket->getEventDate();
        $qrCodeUrl = $ticket->getQrCode();


        $tets = "
        <div class='ticket-container'>
            <div class='ticket-header'>
                <h2>Event: {$eventName}</h2>
            </div>
            <div class='ticket-details'>
                <p><strong>Date:</strong> {$eventDate}</p>
            </div>
            <div class='qr-code'>
                <img src='" . __DIR__ . "/../../public/uploads/qrcodes_tickets/qr_67cb6ddc61454.png' alt='QR Code' width='100' height='100'>

            </div>
        </div>
        ";
        return $tets;
    }
}