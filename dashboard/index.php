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
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <?php
                    if (isset($role) && $role === "1") { ?>
                        <!-- Show only ADMIN -->
                        <!-- Content Row -->
                        <div class="row">
                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Total Users</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_users; ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-users fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">
                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Notifications</h6>
                                </div>
                                <?php
                                // Display notifications
                                if ($resultNotif->num_rows > 0) {
                                    while ($rowNotif = $resultNotif->fetch_assoc()) {
                                ?>
                                        <div class="card-body p-0">
                                            <div class="notice info">
                                            <div class="small text-gray-500"><?php echo $rowNotif['created_at']; ?></div>
                                                <p><?php echo htmlspecialchars($rowNotif['message']); ?></p>
                                            </div>
                                        </div>
                                <?php
                                    }
                                } else {
                                    echo "No notifications found.";
                                }
                                ?>
                            </div>
                        </div>
                        <style>
                            .notice {
                                position: relative;
                                margin: 1em;
                                background: #F9F9F9;
                                padding: 1em 1em 1em 2em;
                                border-left: 4px solid #DDD;
                                box-shadow: 0 1px 1px rgba(0, 0, 0, 0.125);
                            }

                            .notice:before {
                                position: absolute;
                                top: 50%;
                                margin-top: -17px;
                                left: -17px;
                                background-color: #DDD;
                                color: #FFF;
                                width: 30px;
                                height: 30px;
                                border-radius: 100%;
                                text-align: center;
                                line-height: 30px;
                                font-weight: bold;
                                font-family: Georgia;
                                text-shadow: 1px 1px rgba(0, 0, 0, 0.5);
                            }

                            .info {
                                border-color: #0074D9;
                            }

                            .info:before {
                                content: "i";
                                background-color: #0074D9;
                            }
                        </style>


                        <script>
                            // Function to fetch notifications from the server and display them
                            function fetchAndDisplayNotifications() {
                                $.ajax({
                                    url: 'ajax/fetch_notifications.php', // PHP script to fetch notifications
                                    method: 'GET',
                                    success: function(response) {
                                        // Append notifications to the container
                                        $('.notification-container').append(response);

                                        // Scroll notifications from bottom to top
                                        $('.notification-container').animate({
                                            scrollTop: $('.notification-container').prop("scrollHeight")
                                        }, 1000);

                                        // Fetch notifications again after some time
                                        setTimeout(fetchAndDisplayNotifications, 5000); // Fetch notifications every 5 seconds
                                    },
                                    error: function(xhr, status, error) {
                                        console.error('Error fetching notifications:', error);
                                    }
                                });
                            }

                            // Initial call to fetch and display notifications
                            $(document).ready(function() {
                                fetchAndDisplayNotifications();
                            });
                        </script>

                        <!-- <div class="col-lg-6 mb-4">

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                                </div>
                                <div class="card-body">
                                    <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                                        CSS bloat and poor page performance. Custom CSS classes are used to create
                                        custom components and custom utility classes.</p>
                                    <p class="mb-0">Before working with this theme, you should become familiar with the
                                        Bootstrap framework, especially the utility classes.</p>
                                </div>
                            </div>

                        </div> -->
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include "./footer.php" ?>