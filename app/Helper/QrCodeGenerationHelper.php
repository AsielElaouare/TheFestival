<?php

namespace App\Helper;

use App\Models\BaseTicket;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\Result\PngResult;

class QrCodeGenerationHelper {
    private $text;
    private $qrCode;
    private $writer;
    private $result;

    public function __construct(BaseTicket $ticket) {
        $this->text = $ticket->getText();
        $this->qrCode = new QrCode($this->text);
        $this->writer = new PngWriter();
        $this->result = $this->writer->write($this->qrCode);
    }

    public function saveQrCode(): string {
        $targetDir = __DIR__ . "/../public/uploads/qrcodes_tickets/";
        $fileName = 'qr_' . uniqid() . '.png';  
        $filePath = $targetDir . $fileName;
        file_put_contents($filePath, $this->result->getString());
        $result = preg_replace('/\/app\/Helper/', '', $filePath);
        return $result;
    }
}
