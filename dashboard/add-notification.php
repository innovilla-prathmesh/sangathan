<?php include "./header.php" ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include "./sidebar.php" ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include "./navbar.php" ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <?php include "./kyc-notif.php" ?>

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Add Notification</h1>
                    </div>

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-2">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Add Notification</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="p-4">
                                    <form id="notificationForm">
                                        <div class="mb-3">
                                            <label for="notificationMessage" class="form-label">Notification</label>
                                            <textarea type="text" name="notificationMessage" placeholder="Enter your notification message" class="form-control" id="notificationMessage"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <script>
                        $(document).ready(function() {
                            // Submit form using AJAX
                            $('#notificationForm').submit(function(e) {
                                e.preventDefault();
                                var message = $('#notificationMessage').val();
                                $.ajax({
                                    type: 'POST',
                                    url: 'ajax/store_and_send_notification.php', // Your PHP script URL
                                    data: {
                                        message: message
                                    },
                                    success: function(response) {
                                        alert(response);
                                        $('#notificationMessage').val('');
                                    },
                                    error: function(xhr, status, error) {
                                        console.error(xhr.responseText);
                                    }
                                });
                            });
                        });
                    </script>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
<?php include "./footer.php" ?>