<?php
// Database connection parameters
include "./../../db.php";

// Query to fetch notifications from the database (replace 'notifications' with your actual table name)
$sql = "SELECT * FROM notifications ORDER BY created_at DESC LIMIT 5"; // Fetch 5 most recent notifications
$result = $conn->query($sql);

// Check if there are notifications
if ($result->num_rows > 0) {
    // Output notifications
    while ($row = $result->fetch_assoc()) {
        // Generate HTML markup for each notification
        echo '<div class="notification">';
        echo '<h4>' . $row["id"] . '</h4>';
        echo '<p>' . $row["message"] . '</p>';
        echo '</div>';
    }
} else {
    echo "No notifications found";
}

// Close database connection
$conn->close();
?>
