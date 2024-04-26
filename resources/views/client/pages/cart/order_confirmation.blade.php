<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ORDER CONFIRMATION</title>
</head>
<body>
    <div style="text-align:center">
        <h1><strong>SAIGON BOOKING</strong></h1>
        <h2><strong>THANK YOU FOR BOOKING</strong></h2>
        <p>Here is your booking detail:</p>
    <ul style="list-style: NONE">
        <li><strong>Booking code:</strong> {{ $bookingCode }}</li>
        <li><strong>Your name:</strong> {{ $fullname }}</li>
        <li><strong>Hotel</strong> {{ $hotelName }}</li>
        <li><strong>Room:</strong> {{ $roomName }}</li>
        <li><strong>Room quantity:</strong> {{ $quantity }}</li>
        <li><strong>People quantity:</strong> {{ $adultNumber }}</li>
        <li><strong>Check-in day:</strong> {{ $checkInDate }}</li>
        <li><strong>Check-out day:</strong> {{ $checkOutDate }}</li>
        <li><strong>Total:</strong> {{ number_format($cartTotal) }} VND</li>
    </ul>
</div>
    <!-- Thêm các thông tin đặt hàng khác nếu cần -->
    <p>Please keep this order information for future reference. We will contact you soon.</p>

</body>
</html>

