<?php include "./header.php";
if (!isset($_SESSION['user_ID'])) {
    if (basename($_SERVER['PHP_SELF']) != 'login.php') {
        header("Location: login.php");
        exit();
    }
}

if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = mysqli_real_escape_string($conn, $_GET['type']);
    if ($type == 'status') {
        $operation = mysqli_real_escape_string($conn, $_GET['operation']);
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        if ($operation == 'active') {
            $status = '1';
        } else {
            $status = '0';
        }

        $update_status_sql = "UPDATE users SET status= '$status' WHERE id='$id'";
        mysqli_query($conn, $update_status_sql);
    }

    //Update KYC STATUS
    if ($type == 'kyc') {
        $operation = mysqli_real_escape_string($conn, $_GET['operation']);
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        if ($operation == 'active') {
            $kyc_status = '1';
        } else {
            $kyc_status = '0';
        }

        $update_kyc_sql = "UPDATE users SET kyc= '$kyc_status' WHERE id='$id'";
        mysqli_query($conn, $update_kyc_sql);
    }

    if ($type == 'delete') {
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $delete_status_sql = "DELETE from users WHERE id='$id'";
        mysqli_query($conn, $delete_status_sql);
    }
}

//products.type = 1 means Public Product  
$sql = "SELECT * FROM users Where role = '0' LIMIT 100";
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
                        <h1 class="h3 mb-0 text-gray-800">Manage Users</h1>
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
                                                    <th>Image</th>
                                                    <th>Mobile</th>
                                                    <th>Aadhar No.</th>
                                                    <th>Address</th>
                                                    <th>Gender</th>
                                                    <th>KYC Image</th>
                                                    <th>KYC Action</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php while ($row = mysqli_fetch_assoc($res)) { ?>
                                                    <tr>
                                                        <td><?php echo $row['id']; ?></td>
                                                        <td><?php echo $row['name']; ?></td>
                                                        <td><?php echo $row['email']; ?></td>
                                                        <td><img class="img-fluid" style="width:100px;height:100px" src="./../uploaded/<?php echo $row['img']; ?>" /></td>
                                                        <td><?php echo $row['mobile']; ?></td>
                                                        <td><?php echo $row['aadhar']; ?></td>
                                                        <td><?php echo $row['address']; ?></td>
                                                        <td><?php echo $row['gender']; ?></td>
                                                        <td>
                                                            <?php if (!empty($row['kyc_img'])) : ?>
                                                                <img class="img-fluid" style="width:100px;height:100px" src="./../kycImg/<?php echo $row['kyc_img']; ?>" />
                                                            <?php else : ?>
                                                                <a target="_blank" href="./../img/doc-default.jpg"><img class="img-fluid" style="width:100px;height:100px" src="./../img/doc-default.jpg" /></a> 
                                                            <?php endif; ?>
                                                        </td>

                                                        <td>
                                                            <?php
                                                            if ($row['kyc'] == '1') {
                                                                echo "<a href='?type=kyc&operation=deactive&id=" . $row['id'] . "'><button class='btn btn-success'>Complete</button></a>&nbsp;";
                                                            } else {
                                                                echo "<a href='?type=kyc&operation=active&id=" . $row['id'] . "'><button class='btn btn-danger'>Not Complate</button></a>&nbsp;";
                                                            }
                                                            ?>
                                                        </td>

                                                        <td>
                                                            <?php
                                                            if ($row['status'] == '1') {
                                                                echo "<a href='?type=status&operation=deactive&id=" . $row['id'] . "'><button class='btn btn-success'>Approved</button></a>&nbsp;";
                                                            } else {
                                                                echo "<a href='?type=status&operation=active&id=" . $row['id'] . "'><button class='btn btn-danger'>Not Approved</button></a>&nbsp;";
                                                            }
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