<footer id="footer" class="footer" data-bg-img="images/footer-bg.png" data-bg-color="#262E3B">
    <div class="container pt-70 pb-40">
        <div class="row border-bottom-black">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="widget dark"> <img alt="footer logo" style="width: 100px;height:100px" src="img/logo.png">
                    <p class="font-13 mt-20 mb-10">Welcome to the Bharat Hindu Ekta Sanghatan. Bharat Hindu Ekta Sangathan, translated as "Indian Hindu Unity Organization," is a socio-cultural organization in India that aims to promote unity, cultural preservation, and social welfare among Hindus across the nation.<a class="text-theme-colored" href="./about.php">Learn More..</a> </p>
                    <ul class="list-inline mt-5">
                        <!-- <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-theme-colored mr-5"></i> <a class="text-gray" href="#">7280095596,8288946781</a> </li> -->
                        <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-theme-colored mr-5"></i> <a class="text-gray" href="#">bharathindumunch@gmail.com</a> </li>
                        <li class="m-0 pl-10 pr-10"> <i class="fa fa-globe text-theme-colored mr-5"></i> <a class="text-gray" href="index.php">www.bhes.org.in</a> </li>
                    </ul>
                </div>
            </div>
          
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="widget dark">
                    <h5 class="widget-title line-bottom">Contact Form</h5>
                    <form id="footer_quick_contact_form" name="footer_quick_contact_form" class="quick-contact-form" method="post">
                        <div class="form-group">
                            <input id="form_email" name="form_email" class="form-control" type="text" required="" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <textarea id="form_message" name="form_message" class="form-control" required="" placeholder="Enter Message" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="" />
                            <button type="submit" style="background-color: #ffffff;" class="btn btn-default btn-transparent btn-xs btn-flat mt-0" data-loading-text="Please wait...">Submit</button>
                        </div>
                    </form>

                    <!-- Quick Contact Form Validation-->
                    <script type="text/javascript">
                        $("#footer_quick_contact_form").validate({
                            submitHandler: function(form) {
                                var form_btn = $(form).find('button[type="submit"]');
                                var form_result_div = '#form-result';
                                $(form_result_div).remove();
                                form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                                var form_btn_old_msg = form_btn.html();
                                form_btn.html(form_btn.prop('disabled', true).data("loading-text"));

                                $(form).ajaxSubmit({
                                    dataType: 'json',
                                    url : "ajax/mail.php",
                                    success: function(data) {
                                        alert("Form Submit Successfully");

                                        if (data.status == 'true') {
                                            $(form).find('.form-control').val('');
                                        }

                                        form_btn.prop('disabled', false).html(form_btn_old_msg);
                                        $(form_result_div).html(data.message).fadeIn('slow');
                                        setTimeout(function() {
                                            $(form_result_div).fadeOut('slow')
                                        }, 6000);
                                    },
                                    error: function error(data1) {
                                        alert(data1.status);
                                    }
                                });

                            }
                        });
                    </script>
                </div>
            </div>
        </div>
        <div class="row mt-10">
            <div class="col-md-3">
                <div class="widget dark">
                    <h5 class="widget-title mb-10">Contacts</h5>
                    <div class="text-gray">
                        +91-9454743202 <br>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="widget dark">
                    <h5 class="widget-title mb-10">Social Media</h5>
                    <ul class="styled-icons icon-sm icon-bordered icon-circled clearfix">
                        <li><a href="https://www.facebook.com/profile.php?id=61556067413665&mibextid=2JQ9oc"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="widget dark">
                    <h5 class="widget-title mb-10">Subscribe Us</h5>
                    <!-- Mailchimp Subscription Form Starts Here -->
                    <form id="mailchimp-subscription-form-footer" class="newsletter-form">
                        <div class="input-group">
                            <input type="email" value="" name="EMAIL" placeholder="Your Email" class="form-control input-lg font-16" data-height="45px" id="mce-EMAIL-footer" style="height: 45px;">
                            <span class="input-group-btn">
                                <button data-height="45px" class="btn btn-colored btn-theme-colored btn-xs m-0 font-14" type="submit">Subscribe</button>
                            </span>
                        </div>
                    </form>
                    <!-- Mailchimp Subscription Form Validation-->
                    <script type="text/javascript">
                        $('#mailchimp-subscription-form-footer').ajaxChimp({
                            callback: mailChimpCallBack,
                            url: '//thememascot.us9.list-manage.com/subscribe/post?u=a01f440178e35febc8cf4e51f&amp;id=49d6d30e1e'
                        });

                        function mailChimpCallBack(resp) {
                            // Hide any previous response text
                            var $mailchimpform = $('#mailchimp-subscription-form-footer'),
                                $response = '';
                            $mailchimpform.children(".alert").remove();
                            console.log(resp);
                            if (resp.result === 'success') {
                                $response = '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + resp.msg + '</div>';
                            } else if (resp.result === 'error') {
                                $response = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + resp.msg + '</div>';
                            }
                            $mailchimpform.prepend($response);
                        }
                    </script>
                    <!-- Mailchimp Subscription Form Ends Here -->
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom" data-bg-color="#242730">
        <div class="container pt-15 pb-15">
            <div class="row">
                <div class="col-md-6">
                    <p class="font-12 text-black-777 m-0 sm-text-center">&copy;2024 All Right Reserved. Developed by <a target="_blank" href="http://innovilla.in">Innovilla</a></p>
                </div>
                <!-- <div class="col-md-6 text-right">
                    <div class="widget no-border m-0">
                        <ul class="list-inline sm-text-center font-12">
                            <li>
                                <a href="#">सामान्य प्र</a>
                            </li>
                            <li>|</li>
                            <li>
                                <a href="#">सहायता केंद्र</a>
                            </li>
                            <li>|</li>
                            <li>
                                <a href="#">सहयोग</a>
                            </li>
                        </ul>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</footer>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {},
        Tawk_LoadStart = new Date();
    (function() {
        var s1 = document.createElement("script"),
            s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/60ca013865b7290ac636475b/1f8ah9hqi';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>

<!--End of Tawk.to Script--> <!-- END Footer -->
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- end wrapper -->

<script src="js/custom.js"></script>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyAYWE4mHmR9GyPsHSOVZrSCOOljk8DU9B4"></script>
<script src="js/google-map-init-multilocation.js"></script>

<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.carousel.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.video.min.js"></script>

</body>

</html>