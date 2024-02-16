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

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">
                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Complete KYC</h6>
                                </div>
                                <div class="p-4">
                                    <form id="addForm" enctype='multipart/form-data'>
                                        <div class="mb-3">
                                            <h5 style="font-weight: bold;">KYC Documents Individuals</h5>
                                            <h6>Individuals (Documents acceptable as proof of identity/address)</h6>
                                            <ul>
                                                <li class="cont-text-li">Passport</li>
                                                <li class="cont-text-li">Voter's Identity Card</li>
                                                <li class="cont-text-li">Driving Licence</li>
                                                <li class="cont-text-li">Aadhaar Letter/Card</li>

                                            </ul>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col">
                                                <label for="image">Select Document</label>
                                                <input type="file" id="image" name="image" class="form-control" required='true'>
                                            </div>
                                            <div class="col">
                                                <label for="exampleInputName1">Document Preview</label>
                                                <img id="photoPreview" src="./../img/doc-default.jpg" alt="Photo Preview" style="width:100px;height:100px;" class="rounded-circle">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <script>
                // image preview
                var ImageInput = document.getElementById('image');
                var photoPreview = document.getElementById('photoPreview');

                // Add event listener to the file input
                ImageInput.addEventListener('change', function() {
                    // Check if a file is selected
                    if (ImageInput.files && ImageInput.files[0]) {
                        var reader = new FileReader();

                        // Set up the FileReader to display the image preview
                        reader.onload = function(e) {
                            photoPreview.src = e.target.result;
                        };

                        // Read the selected file as a data URL
                        reader.readAsDataURL(ImageInput.files[0]);
                    }
                });
            </script>

            <script>
                var userId = <?php echo $user_id; ?>;
                //Update KYC img. ie. INSERT
                $(document).ready(function() {
                    $('#addForm').submit(function(e) {
                        e.preventDefault(); // Prevent form submission

                        var formData = new FormData(this);
                        formData.append('user_id', userId);

                        $.ajax({
                            url: 'ajax/update_kyc_img.php',
                            type: 'POST',
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function(response) {
                                alert(response);
                                // Clear form fields
                                $('#addForm')[0].reset();
                                // Reset the image preview
                                $('#photoPreview').attr('src', './../img/doc-default.jpg');

                                // Redirect to dashboard
                                window.location.href = 'index.php';
                            },
                            error: function(xhr, status, error) {
                                console.error(error);
                                // Handle error
                            }
                        });
                    });
                });
            </script>

            <!-- Footer -->
            <?php include "./footer.php" ?>