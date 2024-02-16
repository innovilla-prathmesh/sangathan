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
  </div>-->
        <!-- Header -->
        <header id="header" class="header">
            <div class="header-top border-bottom sm-text-center p-0 bg-theme-colored">
                <div class="container pt-5 pb-5">
                    <div class="row">
                        <div class="col-md-6 sm-text-center">
                            <div class="widget no-border m-0">
                                <ul class="list-inline xs-text-center m-0">
                                    <li class="m-0 pl-10 pr-10">
                                        <a href="#" class="text-white"><i class="fa fa-phone"></i> 7280095596,8235811320</a>
                                    </li>
                                    <li class="m-0 pl-10 pr-10">
                                        <a href="#" class="text-white"><i class="fa fa-envelope-o mr-5"></i> info@vhrs.org.in</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                    <li class="active">Gallery</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Gallery Grid 4 -->
            <?php include "./src/components/gallery.php" ?>
        </div>
        <!-- end main-content -->

        <?php include "./footer.php" ?>