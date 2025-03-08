<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tickets</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .ticket-container {
            border: 1px solid #ccc;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .ticket-header {
            background-color: #f4f4f4;
            padding: 10px;
            border-radius: 5px 5px 0 0;
        }
        .ticket-details {
            padding: 10px;
        }
        h1, h2, h3 {
            margin: 0;
        }
        .qr-code {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <h1>Your Tickets</h1>

    <!-- Loop through each ticket -->
    <div class="ticket-container">
        <div class="ticket-header">
            <h2>Event: {{event_name}}</h2>
        </div>
        <div class="ticket-details">
            <p><strong>Date:</strong> {{event_date}}</p>
            <p><strong>Location:</strong> {{event_location}}</p>
            <p><strong>Ticket Type:</strong> {{ticket_type}}</p>
        </div>
        <div class="qr-code">
            <img src="{{qr_code_url}}" alt="QR Code" width="100" height="100">
        </div>
    </div>
    <!-- End loop -->

</body>
</html>