<?php
include "./../../db.php";
// Get notification message from AJAX request
$message = $_POST['message'];

// Prepare SQL statement
$sql = "INSERT INTO notifications (message, status) VALUES ('$message','1')";

if ($conn->query($sql) === TRUE) {
    echo sendOneSignalNotification($message); // Send push notification when storing notification
    // echo "Notification stored successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

function sendOneSignalNotification($message, $includedSegments = array('All'), $url = null, $data = null) {
    // Your OneSignal App ID and REST API Key
    $onesignal_app_id = '74e31e4b-d48e-4a52-b3fd-6591a7415d51';
    $onesignal_api_key = 'NjM3ZjRkYWUtOTEzMy00NTVmLTg0YzgtMTM0OGFkYTYyYTFh';

    // Message data to send
    $notification_data = array(
        'app_id' => $onesignal_app_id,
        'contents' => array(
            'en' => $message
        ),
        'included_segments' => $includedSegments
    );

    // If URL is provided, add it to the notification data
    if ($url !== null) {
        $notification_data['url'] = $url;
    }

    // If additional data is provided, add it to the notification data
    if ($data !== null) {
        $notification_data['data'] = $data;
    }

    // Convert message data to JSON
    $fields = json_encode($notification_data);

    // Set the OneSignal API endpoint
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");

    // Set the HTTP header with the required authorization and content type
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json; charset=utf-8',
        'Authorization: Basic ' . $onesignal_api_key
    ));

    // Set other curl options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

    // Execute the request
    $response = curl_exec($ch);
    curl_close($ch);

    // Handle the response
    if ($response === false) {
        // Request failed
        return 'Failed to send notification.';
    } else {
        // Request succeeded
        return 'Notification sent successfully.';
    }
}

?>

