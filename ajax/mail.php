<?php
$response = array();

if(isset($_POST['form_email']) && isset($_POST['form_message'])) {
    // Sanitize and validate form data
    $email = filter_var($_POST['form_email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['form_message']);

    // Set email parameters
    $to = "test@gmail.com";
    $subject = "Contact Form";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        $response['status'] = 'true';
        $response['message'] = 'Form submitted successfully.';
    } else {
        $response['status'] = 'false';
        $response['message'] = 'Error occurred while sending the form.';
    }
} else {
    $response['status'] = 'false';
    $response['message'] = 'Missing form fields.';
}

// Send JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
