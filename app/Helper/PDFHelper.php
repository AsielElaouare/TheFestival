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
    public function generatePDF(array $ticketData): string {
        foreach ($ticketData as $ticket) {
            $this->htmlContent .= $this->generateTicketHTML($ticket);
        }
    
        $this->dompdf->loadHtml($this->htmlContent);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();
        
        $pdfName = 'pdf_' . uniqid() . '.pdf';  

        $filePath = __DIR__ . "/../storage/pdfs_tickets/{$pdfName}";
        file_put_contents($filePath, $this->dompdf->output());
    
        return $filePath;  
    }

    private function generateTicketHTML(BaseTicket $ticket): string {
        $eventName = $ticket->getEventName();
        $eventDate = $ticket->getEventDate();
        $qrCodePath = $ticket->getQrCode();
        var_dump($qrCodePath);
        $qrCodeBase64 = base64_encode(file_get_contents($qrCodePath));
        $qrCodeUrl = "data:image/png;base64," . $qrCodeBase64;

        $html = "
            {$this->getTemplateStyle()}

        <div class='ticket-container'>
            <div class='ticket-header'>
                <h2 class='yellow'>{$eventName}</h2>
            </div>
            <div class='ticket-details'>
                <p><strong>Date:</strong> {$eventDate}</p>
            </div>
            <div class='qr-code'>
                <img src='{$qrCodeUrl}' alt='QR Code' width='150' height='150'>
            </div>
        </div>
        ";
    return $html;
    }


    private function getTemplateStyle(){
        return "<style>
            .ticket-container {
                width: 80%;
                max-width: 600px;
                border: 2px solid #333;
                border-radius: 10px;
                padding: 20px;
                margin: 20px auto;
                font-family: Arial, sans-serif;
                box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2);
                text-align: center;
            }
            .ticket-header {
                background-color: #800080;
                color: white;
                padding: 10px;
                border-radius: 8px 8px 0 0;
            }
            .ticket-details {
                margin: 15px 0;
                font-size: 18px;
            }
            .qr-code img {
                margin-top: 10px;
                border: 2px solid #000;
                padding: 5px;
                border-radius: 5px;
            }
            .impact-font{
                font-family: Impact;

            }
            .yellow{
                color: #F9F871;
            }

        </style>";
    }
}