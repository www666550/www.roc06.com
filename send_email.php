<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $to = $_POST['to'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $headers = "From: rlic89183@gmail.com\r\n" .  // Change to your "from" address
               "Reply-To: noreply@example.com\r\n" .
               "Content-Type: text/html; charset=UTF-8\r\n";

    // Validate input
    if (filter_var($to, FILTER_VALIDATE_EMAIL)) {
        // Send email
        if (mail($to, $subject, $message, $headers)) {
            echo "Email has been sent to " . htmlspecialchars($to);
        } else {
            echo "Email sending failed.";
        }
    } else {
        echo "Invalid email format.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Email</title>
</head>
<body>
    <h1>Send Email</h1>
    <form action="send_email.php" method="post">
        <label for="to">To:</label>
        <input type="email" id="to" name="to" required><br><br>
        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" required><br><br>
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="4" required></textarea><br><br>
        <input type="submit" value="Send Email">
    </form>
</body>
</html>