<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Submission</title>
</head>
<body>
    <p>Name: {{ $emailData['name'] }}</p>
    <p>Email: {{ $emailData['email'] }}</p>
    <p>Subject: {{ $emailData['subject'] }}</p>
    <p>Message:</p>
    <p>{{ $emailData['message'] }}</p>
</body>
</html>
