<?php include "./header.php";
$category_name = "";
$msg = "";

if (!isset($_SESSION['user_ID'])) {
    if (basename($_SERVER['PHP_SELF']) != 'login.php') {
        header("Location: login.php");
        exit();
    }
}

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM notifications WHERE id = '$id'";
    $res = mysqli_query($conn, $sql);
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($res);
        $message = $row['message'];
    } else {
        header("location: manage-notification.php");
        exit();
    }
}

?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include "./sidebar.php"; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include "navbar.php"; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <?php include "./kyc-notif.php" ?>

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit Category</h1>
                    </div>

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Edit Category</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="p-4">
                                    <form id="editNotificationForm" method="POST">
                                        <div class="mb-3">
                                            <label for="InputCategory" class="form-label">Name</label>
                                            <textarea type="text" name="message" class="form-control" id="InputNotificationMessage"><?php echo $message; ?></textarea>
                                            <input type="hidden" name="notification_id" class="form-control" id="InputNotificationID" value="<?php echo $id; ?>">
                                        </div>
                                        <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                                <p style="font-size:15px; color : red; margin-top:10px"><?php echo $msg; ?></p>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->
            </div>
            <script>
                $(document).ready(function() {
                    $('#editNotificationForm').on('submit', function(e) {
                        e.preventDefault();
                        var NotificationMessage = $('#InputNotificationMessage').val();
                        var NotifyID = $('#InputNotificationID').val();

                        // Send AJAX request
                        $.ajax({
                            type: 'POST',
                            url: 'ajax/edit_notification.php',
                            data: {
                                message: NotificationMessage,
                                notification_id: NotifyID
                            },
                            dataType: 'json', // Expect JSON response from the server
                            success: function(response) {
                                // Handle the response
                                if (response.status === 'success') {
                                    alert(response.message);
                                    // redirect
                                    window.location.href = response.location;
                                } else {
                                    alert(response.message);
                                }
                            },
                            error: function(xhr, status, error) {
                                // Handle errors
                                console.error(xhr.responseText);
                                alert('An error occurred during the AJAX request. Check the console for details.');
                            }
                        });
                    });
                });
            </script>
            <?php include "./footer.php" ?>