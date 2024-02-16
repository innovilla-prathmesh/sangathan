<?php
include_once './../db.php';

// Array of states
$states = array(
    1 => "Andaman and Nicobar",
    2 => "Andhra Pradesh",
    3 => "Arunachal Pradesh",
    4 => "Assam",
    5 => "Bihar",
    6 => "Chandigarh",
    7 => "Chhattisgarh",
    8 => "Dadra and Nagar Haveli",
    9 => "Daman and Diu",
    10 => "Delhi",
    11 => "Goa",
    12 => "Gujarat",
    13 => "Haryana",
    14 => "Himachal Pradesh",
    15 => "Jammu and Kashmir",
    16 => "Jharkhand",
    17 => "Karnataka",
    18 => "Kerala",
    19 => "Lakshdweep",
    20 => "Madhya Pradesh",
    21 => "Maharashtra",
    22 => "Manipur",
    23 => "Meghalaya",
    24 => "Mizoram",
    25 => "Nagaland",
    26 => "Odisha",
    27 => "Puducherry",
    28 => "Punjab",
    29 => "Rajasthan",
    30 => "Sikkim",
    31 => "Tamil Nadu",
    32 => "Tripura",
    33 => "Uttar Pradesh",
    34 => "Uttarakhand",
    35 => "West Bengal"
);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['form']) && $_POST['form'] === "FormSimple") {
    // Retrieve form data
    // Check if all required fields are not empty
    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['mobile']) && !empty($_POST['father_name']) && !empty($_POST['state']) && !empty($_POST['city']) && !empty($_POST['aadhar']) && !empty($_POST['address']) && !empty($_POST['gender']) && !empty($_POST['profession']) && !empty($_POST['pass'])) {


        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $fatherName = $_POST['father_name'];
        $stateNumber = $_POST['state'];
        $stateName = $states[$stateNumber];
        $city = $_POST['city'];
        $aadhar = $_POST['aadhar'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $profession = $_POST['profession'];
        $currentDateTime = date('Y-m-d H:i:s');
        $password = $_POST['pass'];

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Now $hashedPassword contains the hashed password

        // Handle file upload if necessary
        // Example:
        $img = $_FILES['upload_image']['name'];
        $uploadDir = './../uploaded/';
        $uploadedFile = $uploadDir . basename($_FILES['upload_image']['name']);
        move_uploaded_file($_FILES['upload_image']['tmp_name'], $uploadedFile);

        // Check if the email already exists in the database
        $checkQuery = "SELECT * FROM users WHERE email = '$email'";
        $checkResult = mysqli_query($conn, $checkQuery);
        $response = array();
        if (mysqli_num_rows($checkResult) > 0) {
            // Email already exists, handle accordingly (e.g., display an error message)
            // Email already exists
            $response['status'] = '0';
            $response['message'] = 'Email already exists!';
        } else {
            // Email does not exist, proceed with registration
            $query = "INSERT INTO users (name, email, mobile, father_name, state, city, aadhar, img, address, gender, profession, password, role,kyc,status, registration_date) 
              VALUES ('$name', '$email', '$mobile', '$fatherName', '$stateName', '$city', '$aadhar', '$img', '$address', '$gender', '$profession', '$hashedPassword', '0','0','0', '$currentDateTime')";

            // Execute the query
            $result = mysqli_query($conn, $query);

            if ($result) {
                $response['status'] = '1';
                $response['message'] = 'User registered successfully!';
            } else {
                $response['status'] = '0';
                $response['message'] = 'Error occurred!';
            }
        }
    } else {
        // One or more required fields are empty
        $response['status'] = '0';
        $response['message'] = 'One or more required fields are empty';
    }

    // Encode the response array to JSON
    echo json_encode($response);
} else {
    if (!empty($_POST['name1']) && !empty($_POST['email1']) && !empty($_POST['mobile1']) && !empty($_POST['father_name1']) && !empty($_POST['state1']) && !empty($_POST['city1']) && !empty($_POST['aadhar1']) && !empty($_POST['address1']) && !empty($_POST['gender1']) && !empty($_POST['profession1']) && !empty($_POST['pass1'])) {

        $name = $_POST['name1'];
        $email = $_POST['email1'];
        $mobile = $_POST['mobile1'];
        $fatherName = $_POST['father_name1'];
        $stateNumber = $_POST['state1'];
        $stateName = $states[$stateNumber];
        $city = $_POST['city1'];
        $aadhar = $_POST['aadhar1'];
        $address = $_POST['address1'];
        $gender = $_POST['gender1'];
        $profession = $_POST['profession1'];
        $currentDateTime = date('Y-m-d H:i:s');
        $password = $_POST['pass1'];

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Now $hashedPassword contains the hashed password

        // Handle file upload if necessary
        // Example:
        $img = $_FILES['upload_image1']['name'];
        $uploadDir = './../uploaded/';
        $uploadedFile = $uploadDir . basename($_FILES['upload_image1']['name']);
        move_uploaded_file($_FILES['upload_image1']['tmp_name'], $uploadedFile);

        // Check if the email already exists in the database
        $checkQuery = "SELECT * FROM users WHERE email = '$email'";
        $checkResult = mysqli_query($conn, $checkQuery);
        $response = array();
        if (mysqli_num_rows($checkResult) > 0) {
            // Email already exists, handle accordingly (e.g., display an error message)
            // Email already exists
            $response['status'] = '0';
            $response['message'] = 'Email already exists!';
        } else {
            // Email does not exist, proceed with registration
            $query = "INSERT INTO users (name, email, mobile, father_name, state, city, aadhar, img, kyc_img,  address, gender, profession, password, role,kyc,status ,registration_date) 
              VALUES ('$name', '$email', '$mobile', '$fatherName', '$stateName', '$city', '$aadhar', '$img', '', '$address', '$gender', '$profession', '$hashedPassword', '0','0','0', '$currentDateTime')";

            // Execute the query
            $result = mysqli_query($conn, $query);

            if ($result) {
                $response['status'] = '1';
                $response['message'] = 'User registered successfully!';
            } else {
                $response['status'] = '0';
                $response['message'] = 'Error occurred!';
            }
        }
    } else {
        // One or more required fields are empty
        $response['status'] = '0';
        $response['message'] = 'One or more required fields are empty';
    }

    // Encode the response array to JSON
    echo json_encode($response);
}
