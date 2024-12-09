<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject = strip_tags(trim($_POST["subject"]));
    $message = trim($_POST["message"]);

    // Check if the data is valid
    if (empty($name) || empty($email) || empty($subject) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400); // Bad Request
        echo "Error: Invalid input. Please fill in all fields correctly.";
        exit;
    }

    // Email setup
    $to = "chijiokechristopher17@gmail.com"; // Replace with your email
    $email_subject = "New Contact Form Submission: " . htmlspecialchars($subject);
    $email_body = "You have received a new message from your website contact form.\n\n" .
                  "Name: " . htmlspecialchars($name) . "\n" .
                  "Email: " . htmlspecialchars($email) . "\n\n" .
                  "Message:\n" . htmlspecialchars($message) . "\n";

    $headers = "From: no-reply@yourdomain.com\r\n"; // Replace with your domain email
    $headers .= "Reply-To: $email\r\n"; // User's email for replying

    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        http_response_code(200); // OK
        echo "Message sent successfully.";
    } else {
        http_response_code(500); // Internal Server Error
        echo "Error: Message could not be sent. Please try again later.";
    }
} else {
    http_response_code(403); // Forbidden (if accessed without POST method)
    echo "Error: Invalid request.";
}
?>
