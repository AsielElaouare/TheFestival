<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Festival Ticket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: Arial, sans-serif; }
        .ticket-container { max-width: 600px; margin: auto; border: 2px solid #000; padding: 20px; }
        .header { text-align: center; margin-bottom: 20px; }
        .ticket-details { font-size: 16px; }
        .qr-code { text-align: center; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="ticket-container">
        <div class="header">
            <h2><?echo $ticket->getEventName() ?></h2>
        </div>
            <div class="ticket-details">
                <p><strong>Name:</strong> <? echo $ticket->getCostumerName() ?></p>
                <p><strong>Activity:</strong> <? echo $ticket->getEventName() ?></p>
                <p><strong>Date and Time:</strong> <? echo $ticket->getEventDate() ?></p>
                <p><strong>Event location:</strong> <? echo $ticket->getLocation() ?></p>
            </div>
        <div class="qr-code">
            <img src="<? echo $qrCode ?>" alt="QR Code" width="150">
        </div>
        <p class="text-center mt-3">This ticket is valid for one person only. Non-transferable.</p>
        <div class="disclaimer mt-4">
            <p><strong>Important:</strong> Please arrive at the festival at the time specified on your ticket. You may stay at the event as long as you like, until closing time.</p>
            <p>By purchasing this ticket, you agree to the terms and conditions of TheFestival Haarlem. Reselling this ticket is strictly prohibited. No refunds are available. Duplicating or misusing this ticket will result in denial of entry.</p>
            <p>For more information, visit our website: <a href="https://www.thefestivalhaarlem.com">www.thefestivalhaarlem.com</a></p>
        </div>
        <p class="text-center mt-4">TheFestival Haarlem | Contact: info@thefestivalhaarlem.com | +31 123 456 789</p>
    </div>
</body>
</html>
