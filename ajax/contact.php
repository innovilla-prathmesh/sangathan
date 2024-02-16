<?php
include_once './../db.php';

// Process form submission
$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['form_subject'];
    $mobile = $_POST['mobile'];
    $comments = $_POST['comments'];
    $currentDateTime = date('Y-m-d H:i:s');

    $sql = "INSERT INTO contacts (name, email, subject, mobile, comments, dt) VALUES ('$name', '$email', '$subject', '$mobile', '$comments','$currentDateTime')";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        $response['status'] = 'true';
        $response['message'] = 'Form submitted successfully.';
    }else {
        $response['status'] = 'false';
        $response['message'] = 'Error Occured';
    }
} else {
    $response['status'] = 'false';
    $response['message'] = 'Invalid request method.';
}

// Send JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
