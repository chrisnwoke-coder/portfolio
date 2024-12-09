<?php
$to = "your-email@example.com"; // Replace with your email
$subject = "Test Email";
$message = "This is a test email to check the PHP mail() function.";
$headers = "From: no-reply@example.com"; // Replace with your domain

if (mail($to, $subject, $message, $headers)) {
    echo "Mail sent successfully.";
} else {
    echo "Mail function failed.";
}
?>
