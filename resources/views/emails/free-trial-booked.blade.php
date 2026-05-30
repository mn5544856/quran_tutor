<!DOCTYPE html>
<html>
<head>
    <title>Free Trial Booking</title>
</head>
<body>
    <h2>Dear {{ $bookingData['name'] }},</h2>
    <p>Thank you for booking a free trial class with us!</p>

    <h3>Booking Details:</h3>
    <ul>
        <li><strong>Name:</strong> {{ $bookingData['name'] }}</li>
        <li><strong>Email:</strong> {{ $bookingData['email'] }}</li>
        <li><strong>Phone:</strong> {{ $bookingData['phone'] }}</li>
        <li><strong>Country:</strong> {{ $bookingData['country'] }}</li>
        <li><strong>Level:</strong> {{ $bookingData['level'] }}</li>
        <li><strong>Course:</strong> {{ $bookingData['course'] }}</li> 
    </ul>

    <p>We will contact you within 24 hours to confirm your trial class timing.</p>
    <p>Best regards,<br>Quran Tutor Team</p>
</body>
</html>