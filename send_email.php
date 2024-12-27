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