<?php
include_once './../db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['form']) && $_POST['form'] === "FormSimple") {
    // Retrieve form data
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // Query to select user data based on the provided email
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $res = mysqli_query($conn, $sql);


    if ($res) {
        // Check if a row is returned
        if (mysqli_num_rows($res) == 1) {
            // Fetch the user data
            $row = mysqli_fetch_assoc($res);
            $id = $row['id'];
            $status = $row['status'];
            $hashedPassword = $row['password'];

            if ($status == '0') {
                // Passwords match, login successful
                $response['status'] = '0';
                $response['message'] = 'Your account not approved by admin';
            }else{
                // Verify the password
                if (password_verify($pass, $hashedPassword)) {
                    $_SESSION['user_ID'] = $id;
    
                    // Passwords match, login successful
                    $response['status'] = '1';
                    $response['message'] = 'Login successful';
                } else {
                    // Passwords do not match, login failed
                    $response['status'] = '0';
                    $response['message'] = 'Invalid email or password';
                }

            }

        } else {
            // No user found with the provided email
            $response['status'] = '0';
            $response['message'] = 'User not found';
        }
    } else {
        // Error in query execution
        $response['status'] = '0';
        $response['message'] = 'Error occurred';
    }

    // Encode the response array to JSON
    echo json_encode($response);
} else {
    $email = $_POST['email1'];
    $pass = $_POST['pass1'];

    // Query to select user data based on the provided email
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        // Check if a row is returned
        if (mysqli_num_rows($res) == 1) {
            // Fetch the user data
            $row = mysqli_fetch_assoc($res);
            $id = $row['id'];
            $hashedPassword = $row['password'];

            // Verify the password
            if (password_verify($pass, $hashedPassword)) {
                $_SESSION['user_ID'] = $id;

                // Passwords match, login successful
                $response['status'] = '1';
                $response['message'] = 'Login successful';
            } else {
                // Passwords do not match, login failed
                $response['status'] = '0';
                $response['message'] = 'Invalid email or password';
            }
        } else {
            // No user found with the provided email
            $response['status'] = '0';
            $response['message'] = 'User not found';
        }
    } else {
        // Error in query execution
        $response['status'] = '0';
        $response['message'] = 'Error occurred';
    }

    // Encode the response array to JSON
    echo json_encode($response);
}
