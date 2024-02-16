<?php include "./header.php";
if (!isset($_SESSION['user_ID'])) {
    if (basename($_SERVER['PHP_SELF']) != 'login.php') {
        header("Location: login.php");
        exit();
    }
}

if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = mysqli_real_escape_string($conn, $_GET['type']);
    if ($type == 'delete') {
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $delete_status_sql = "DELETE from contacts WHERE id='$id'";
        mysqli_query($conn, $delete_status_sql);
    }
}


$sql = "SELECT * FROM contacts LIMIT 100";
$res = mysqli_query($conn, $sql);
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
                        <h1 class="h3 mb-0 text-gray-800">Manage Contacts</h1>
                    </div>

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">

                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Mobile</th>
                                                    <th>Subject</th>
                                                    <th>Message</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($row = mysqli_fetch_assoc($res)) { ?>
                                                    <tr>
                                                        <td><?php echo $row['id']; ?></td>
                                                        <td><?php echo $row['name']; ?></td>
                                                        <td><?php echo $row['email']; ?></td>
                                                        <td><?php echo $row['mobile']; ?></td>
                                                        <td><?php echo $row['subject']; ?></td>
                                                        <td><?php echo $row['comments']; ?></td>
                                                        <td><?php echo $row['dt']; ?></td>
                                                        <td>
                                                            <?php
                                                            echo "<a href='?type=delete&id=" . $row['id'] . "'><button class='btn btn-danger'>Delete <i class='fa-solid fa-trash'></i></button></a>&nbsp;";
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php include "./footer.php" ?>