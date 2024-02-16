<?php include "./header.php" ?>

<body class="">
    <div id="wrapper" class="clearfix">
        <!-- preloader -->
        <!--<div id="preloader">
    <div id="spinner">
      <img class="floating" src="images/preloaders/17.gif?id=12" alt="" style='width:70px;height:70px;'>
      <h5 class="line-height-50 font-18 ml-15">धीरे से लोडिंग हो रहा है सम्पूर्ण पेज लोड होने में थोड़ा समय  लगेगा !...</h5>
    </div>
    <div id="disable-preloader" class="btn btn-default btn-sm">यहाँ क्लिक करें तेजी से लोड होगा!</div>
  </div>--> <!-- Header -->
        <header id="header" class="header">
            <div class="header-top border-bottom sm-text-center p-0 bg-theme-colored">
                <div class="container pt-5 pb-5">
                    <div class="row">
                        <div class="col-md-6 sm-text-center">
                            <div class="widget no-border m-0">
                                <ul class="list-inline xs-text-center m-0">
                                    <li class="m-0 pl-10 pr-10">
                                        <a href="#" class="text-white"><i class="fa fa-phone"></i> 9454743202</a>
                                    </li>
                                    <li class="m-0 pl-10 pr-10">
                                        <a href="#" class="text-white"><i class="fa fa-envelope-o mr-5"></i> bharathindumunch@gmail.com</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- <div class="col-md-6 text-right flip sm-text-center">
                            <div class="widget no-border m-0">
                                <p class="mb-0 text-white">
                                    <select style='background-color: orange;' onChange="changeLanguage(this.value)">
                                        <option value="0">Select Language:</option>
                                        <option value="Hindi">हिंदी</option>
                                        <option value="English">English</option>
                                    </select>
                                </p>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
           <!-- Navbar -->
           <?php include "./navbar.php" ?>
        </header>
        
        <!-- Start main-content -->
        <div class="main-content">
            <!-- Section: inner-header -->
            <section class="inner-header divider layer-overlay overlay-dark-8" data-bg-img="images/image-1.jpg?id=21">
                <div class="container pt-90 pb-40">
                    <!-- Section Content -->
                    <div class="section-content">
                        <div class="row">
                            <div class="col-md-6">
                                <h2 class="text-white font-36">Link</h2>
                                <ol class="breadcrumb text-left mt-10 white">
                                    <li><i class="fa fa-home"></i> <a href="index.php">Home</a></li>
                                    <li><a href="#">Page</a></li>
                                    <li class="active">Contact us</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Divider: Contact -->
            <section class="divider">
                <div class="container pt-30 pb-60">
                    <div class="row pt-30">
                        <div class="col-md-5">
                            <h3 class="line-bottom mt-0 mb-30">Contact Form</h3>

                            <!-- Contact Form -->
                            <form id="contact_form" name="contact_form" class="" action="contact_success.php" method="post">

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Name <small>*</small></label>
                                            <input name="name" class="form-control" type="text" placeholder="Enter Your Name" required="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Email <small>*</small></label>
                                            <input name="email" class="form-control required email" type="email" placeholder="Enter Your Email">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Subject <small>*</small></label>
                                            <input name="form_subject" class="form-control required" type="text" placeholder="Enter Your Subject">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input name="mobile" class="form-control" type="text" placeholder="Enter Your Phone Number">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea name="comments" class="form-control required" rows="5" placeholder="Enter Your Message"></textarea>
                                </div>
                                <div class="form-group">
                                    <input name="form_botcheck" class="form-control" type="hidden" value="" />
                                    <button type="submit" class="btn btn-dark btn-theme-colored btn-flat mr-5" data-loading-text="Please wait...">Submit</button>
                                    <button type="reset" class="btn btn-default btn-flat btn-theme-colored">Reset</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-7">
                            <div class="row">
                                <h3 class="line-bottom mt-0 mb-50 ml-15">Our Address</h3>
                                <div class="col-md-12">
                                    <p class="lead">Bharat Hindu Ekta Sanghatan !</p>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="icon-box media border-1px bg-silver-light p-30 mb-20"> <a class="media-left pull-left flip" href="#"> <i class="fa fa-address-card"></i></a>
                                        <div class="media-body">
                                            <h5 class="mt-0">Office Address : </h5>
                                            <p>Varanasi, UP, INDIA</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="icon-box media border-1px bg-silver-light p-30 mb-20"> <a class="media-left pull-left flip" href="#"> <i class="fa fa-phone"></i></a>
                                        <div class="media-body">
                                            <h5 class="mt-0">Contact Number:</h5>
                                            <p>+91-9454743202</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="icon-box media border-1px bg-silver-light p-30 mb-20"> <a class="media-left pull-left flip" href="#"> <i class="fa fa-envelope"></i></a>
                                        <div class="media-body">
                                            <h5 class="mt-0">Email</h5>
                                            <p>bharathindumunch@gmail.com</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="icon-box media border-1px bg-silver-light p-30 mb-20"> <a class="media-left pull-left flip" href="#"> <i class="pe-7s-chat text-theme-colored"></i></a>
                                        <div class="media-body">
                                            <h5 class="mt-0">Skype</h5>
                                            <p>BHESSkype</p>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Divider: Google Map -->
            <section>
                <div class="container-fluid pt-0 pb-0">
                    <div class="row">

                        <!-- Google Map HTML Codes -->

                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115408.24588673442!2d82.90870742136556!3d25.320739742586518!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x398e2db76febcf4d%3A0x68131710853ff0b5!2sVaranasi%2C%20Uttar%20Pradesh!5e0!3m2!1sen!2sin!4v1707131101596!5m2!1sen!2sin" width="960" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </section>
        </div>
        <!-- end main-content -->
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
<script>
    $(document).ready(function() {
        $("#contact_form").validate({
            submitHandler: function(form) {
                var form_btn = $(form).find('button[type="submit"]');
                var form_result_div = '#form-result';
                $(form_result_div).remove();
                form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                var form_btn_old_msg = form_btn.html();
                form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                $(form).ajaxSubmit({
                    url: 'ajax/contact.php',
                    dataType: 'json',
                    success: function(data) {
                        if (data.status == 'true') {
                            $(form).find('.form-control').val('');
                        }
                        form_btn.prop('disabled', false).html(form_btn_old_msg);
                        $(form_result_div).html(data.message).fadeIn('slow');
                        setTimeout(function() {
                            $(form_result_div).fadeOut('slow');
                        }, 3000);
                    },
                    error: function(data) {
                        $(form).find('.form-control').val('');
                        form_btn.prop('disabled', false).html(form_btn_old_msg);
                        $(form_result_div).html('Error occurred. Please try again.').fadeIn('slow');
                        setTimeout(function() {
                            $(form_result_div).fadeOut('slow');
                        }, 3000);
                    }
                });
            }
        });
    });
</script>


        <!-- footer start -->
        <?php include "./footer.php" ?>