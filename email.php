<?php
if ($_POST['submit'] !== null) {
    $receiverEmail = $_POST['receiverEmail'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $headers = 'From: regmisuman87@example.com' . "\r\n" .
    'Reply-To: regmisuman87@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    if (mail($receiverEmail, $subject, $message, $headers)) {
        echo 'Email sent successfully!';
    } else {
        echo 'Unable to send email.';
    }

}
else{
    echo("Input field cannot be left blank.");
}