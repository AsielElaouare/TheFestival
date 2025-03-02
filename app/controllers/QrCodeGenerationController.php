<?php

namespace App\Controllers;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\Result\PngResult;

class QrCodeGenerationController {
    private $text;
    private $qrCode;
    private $writer;
    private $result;

    public function __construct() {
        $this->text = "Dance ticket 16:00 uur";

        $this->qrCode = new QrCode($this->text);
        $this->writer = new PngWriter();
        $this->result = $this->writer->write($this->qrCode);
    }

    public function index() {
        header("Content-Type: " . $this->result->getMimeType());
        echo $this->result->getString();
    }
}
