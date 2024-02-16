<?php
header('Content-Type: application/json');
// Include your database connection file
include_once './../../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the category name from the AJAX request
    $notify_msg = $_POST['message'];
    $notify_id = $_POST['notification_id'];

    // Perform the database update
    $sql = "UPDATE notifications SET message = '$notify_msg' WHERE id = '$notify_id'"; 

    if ($conn->query($sql) === TRUE) {
        $response = array('status' => 'success', 'message' => 'Notification updated successfully', 'location' => 'manage-notification.php');
    } else {
        $response = array('status' => 'error', 'message' => 'Error updating notification: ' . $conn->error);
    }
} else {
    // If the request method is not POST, handle accordingly
    $response = array('status' => 'error', 'message' => 'Invalid request method');
}

// Close the database connection
$conn->close();

// Send the JSON response
echo json_encode($response);
?>