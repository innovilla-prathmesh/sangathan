<?php
header("content-type: image/jpeg");
$id = $_GET['id'];
include_once "./../db.php";

$query = "SELECT * FROM users WHERE id = '$id'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $name = $row["name"];
    $email = $row["email"];
    $mobile = $row["mobile"];
    $profession = $row["profession"];
    $address = $row["address"];
    $user_img = $row["img"];
}

$font = "./../font/BenguiatStd-Medium.otf";
$img = imagecreatefromjpeg("./../img/id.jpg");
$color = imagecolorallocate($img,19,22,22);


imagettftext($img,50,0,1690,800,$color,$font,$id );
imagettftext($img,50,0,1485,950,$color,$font,$name);
imagettftext($img,50,0,1460,1110,$color,$font,$email);
imagettftext($img,50,0,1510,1300,$color,$font,$mobile);
imagettftext($img,50,0,1600,1480,$color,$font,$address);


// Load the original image
$original_img = imagecreatefromjpeg("./../uploaded/" . $user_img);

// Get the dimensions of the original image
$original_width = imagesx($original_img);
$original_height = imagesy($original_img);

// Create a new image with the desired dimensions
$new_width = 455;
$new_height = 480;
$resized_img = imagecreatetruecolor($new_width, $new_height);

// Resize and copy the original image to the new image
imagecopyresampled($resized_img, $original_img, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);

// Copy the resized image to the destination image at position (420, 880)
imagecopy($img, $resized_img, 420, 880, 0, 0, $new_width, $new_height);

// Output the final image
imagejpeg($img);

// Destroy the images to free up memory
imagedestroy($original_img);


imagejpeg($img);
imagedestroy($img);
?>