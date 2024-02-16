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
                                    <h6 class="m-0 font-weight-bold text-primary text-center">ID CARD</h6>
                                </div>

                                <div id="print" width='100%' class="card">
                                    <img class="img-responsive img img-fluid" src="./printID.php?id=<?php echo $user_id; ?>" alt="" srcset="">
                                </div>

                                <div class="d-flex justify-content-center my-div">
                                    <!-- Download ID Card Button -->
                                    <a class="img-fluid" href="./printID.php?id=<?php echo $user_id; ?>" download="ID Card">
                                        <button class="btn btn-success">
                                            Download ID Card
                                        </button>
                                    </a>
                                    <!-- Print ID Card Button -->
                                    <button class="btn btn-primary ml-2" onclick="printDiv('print')">
                                        Print ID Card
                                    </button>
                                </div>
                            </div>
                        </div>
                        <style>
                            .my-div {
                                /* Apply margin */
                                margin: 20px;
                                /* Apply padding */
                                padding: 10px;
                            }

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

                        <!-- Include JavaScript to handle printing -->
                        <script>
                            function printDiv(divName) {
                                var printContents = document.getElementById(divName).innerHTML;
                                var originalContents = document.body.innerHTML;

                                document.body.innerHTML = printContents;

                                window.print();

                                document.body.innerHTML = originalContents;
                            }
                        </script>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include "./footer.php" ?>