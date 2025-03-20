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

    private function generateTicketHTML($ticket): string {
        $qrCodeBinary = $ticket->getQrCode();
        $qrCodeUrl = "data:image/png;base64," . $qrCodeBinary;
        

        $html = $this->getTemplateStyle($ticket, $qrCodeUrl);
        return $html;
    }

    private function getTemplateStyle(BaseTicket $ticket, string $qrCodeUrl): string {
        ob_start();
        include __DIR__ ."/../views/tickets/ticketTemplatePDF/ticketTemplate.php";
        return ob_get_clean();
    }
}