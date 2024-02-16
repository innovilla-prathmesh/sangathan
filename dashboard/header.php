<?php 
$total_users = "0";
$user_id = "0";

include "./../db.php";
session_start();
if(!isset($_SESSION['user_ID'])){
    header("Location: ../login.php");
    die();
}


if(isset($_SESSION['user_ID'])){
    $user_id = $_SESSION['user_ID'];

    $sql = "SELECT * FROM users WHERE id = $user_id";
    $res  = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($res);

    $name = $rows['name'];
    $email = $rows['email'];
    $img = $rows['img'];
    $kyc = $rows['kyc'];
    $role = $rows['role'];
    $default_img = "./../img/default.jpeg";

    // echo "<pre>";
    // print_r($rows);
    // die();
 }


 // Query to get the total number of users
$sqls = "SELECT COUNT(*) as total_users FROM users WHERE role = '0'"; // Replace 'users' with your actual table name

$result = $conn->query($sqls);

if ($result && $result->num_rows > 0) {
    // Output data of each row
    $row = $result->fetch_assoc();
    $total_users = $row["total_users"];
}

// Query to fetch notifications from the database
$sqlNotif = "SELECT * FROM notifications WHERE status='1' ORDER BY id DESC  LIMIT 10";
$resultNotif = $conn->query($sqlNotif);


// Query to fetch notifications from the database for nav
$sqlNot = "SELECT * FROM notifications WHERE status='1' ORDER BY id DESC LIMIT 5";
$resultNot = $conn->query($sqlNot);


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- datatables cdn -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    
    <!-- FontAwesome Css/CDN -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>