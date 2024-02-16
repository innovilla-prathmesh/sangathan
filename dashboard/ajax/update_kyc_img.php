<?php
include "./../../db.php";

// Retrieve user ID from the form data
if(isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];
}

// Handle file upload
$targetDir = "./../../kycImg/";
$filename = $_FILES["image"]["name"];
$targetFile = $targetDir . basename($_FILES["image"]["name"]);

if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
    // File uploaded successfully, proceed to update the database
    $sql = "UPDATE users SET kyc_img = '" . $filename . "' WHERE id = '" . $user_id . "'";

    if ($conn->query($sql) === TRUE) {
        echo "Submit successfully";
    } else {
        echo "Error : " . $conn->error;
    }
} else {
    echo "Error uploading file";
}

$conn->close();
?>
