<?php include "./header-auth.php" ?>

<style>
    #overlay {
        background-color: #ccc;
        /*or semitransparent image*/
        background-image: url("images/preloaders/7.gif");
        background-repeat: no-repeat;
        position: absolute;
        top: 50%;
        left: 50%;
        display: none;
        height: 100%;
        width: 100%;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 100;

    }

    .overlay {
        background-color: #EFEFEF;
        background-image: url("images/preloaders/1.png");
        background-repeat: no-repeat;
        position: fixed;
        width: 100%;
        height: 100%;
        z-index: 1000;
        top: 0px;
        left: 0px;
        opacity: .5;
        /* in FireFox */
        filter: alpha(opacity=50);
        /* in IE */
    }
</style>
<script>
    function closeBro() {
        if (confirm('Do you want to close browser?')) {
            window.close();
        } else {

        }
    }

    var iPhoneVertical = Array(null, 320, "css/responsive/phoneverticald41d.css?" + Date());
    var iPhoneHorizontal = Array(321, 767, "css/responsive/phonehorizontald41d.css?" + Date());
    var iPad = Array(768, 1000, "css/responsive/ipadd41d.css?" + Date());
    var dekstop = Array(1001, null, "css/responsive/desktopd41d.css?" + Date());

    // Legatus Slider Options
    var _legatus_slider_autostart = true; // Autostart Slider (false / true)
    var _legatus_slider_interval = 5000; // Autoslide Interval (Def = 5000)
    var _legatus_slider_loading = true; // Autoslide With Loading Bar (false / true)

    var xmlhttp;
    var xmlhttp1;

    function loadCity(val) {
        // alert(val.options[val.selectedIndex].value);
        //  alert(val.options[val.selectedIndex].text);

        if (window.XMLHttpRequest) {

            xmlhttp1 = new XMLHttpRequest();
        } else {

            xmlhttp1 = new ActiveXObject("Microsoft.XMLHTTP");
        }

        var url1 = "loadCity.php?city_state=" + val;

        xmlhttp1.onreadystatechange = function() {
            if (xmlhttp1.readyState == XMLHttpRequest.DONE) {
                if (xmlhttp1.status == 200) {
                    // alert(xmlhttp1.responseText);
                    document.getElementById("city").innerHTML = xmlhttp1.responseText;
                } else if (xmlhttp1.status == 400) {

                    alert("Waiting running.");
                } else {

                }
            }
        }
        xmlhttp1.open("GET", url1, true);
        xmlhttp1.send();


    }

    function loadCity1(val) {
        // alert(val.options[val.selectedIndex].value);
        //  alert(val.options[val.selectedIndex].text);

        if (window.XMLHttpRequest) {

            xmlhttp1 = new XMLHttpRequest();
        } else {

            xmlhttp1 = new ActiveXObject("Microsoft.XMLHTTP");
        }


        var url1 = "ajax/loadCity.php?city_state=" + val;

        xmlhttp1.onreadystatechange = function() {
            if (xmlhttp1.readyState == XMLHttpRequest.DONE) {
                if (xmlhttp1.status == 200) {
                    // alert(xmlhttp1.responseText);
                    document.getElementById("city1").innerHTML = xmlhttp1.responseText;
                } else if (xmlhttp1.status == 400) {

                    alert("Waiting running.");
                } else {

                }
            }
        }
        xmlhttp1.open("GET", url1, true);
        xmlhttp1.send();


    }

    function stringToBytesFaster(str) {

        var ch, st, re = [],
            j = 0;
        for (var i = 0; i < str.length; i++) {
            ch = str.charCodeAt(i);
            if (ch < 127) {
                re[j++] = ch & 0xFF;
            } else {
                st = []; // clear stack
                do {
                    st.push(ch & 0xFF); // push byte to stack
                    ch = ch >> 8; // shift value down by 1 byte
                }
                while (ch);
                // add stack contents to result
                // done because chars have "wrong" endianness
                st = st.reverse();
                for (var k = 0; k < st.length; ++k)
                    re[j++] = st[k];
            }
        }
        // return an array of bytes
        return re;
    }


    function validateStart() {
        document.getElementById("load").innerHTML = "<center>Please Wait...<img  src='images/load.gif'></center>";
        var div = document.createElement("div");
        div.className += "overlay";
        //document.body.appendChild(div);
        $("#myModal").append(div)
        //insertAfter('#addnewdiv');

        var name1 = document.getElementById("name").value;
        var email1 = document.getElementById("email").value;
        var mobile1 = document.getElementById("mobile").value;
        var state1 = document.getElementById("state").value;
        var city1 = document.getElementById("city").value;
        var address1 = document.getElementById("address").value;
        var profession1 = document.getElementById("profession").value;
        var gender1 = document.getElementById("gender").value;
        var aadhar1 = document.getElementById("aadhar").value;
        var comments1 = document.getElementById("comments").value;
        var father_name = document.getElementById("father_name").value;
        // creates <div class="overlay"></div> and 
        // adds it to the DOM



        if (nameFun(name1) && mobileFun(mobile1) && stateFun(state1) && cityFun(city1) && aadharFun(aadhar1)) {

            var ign = document.getElementById("upload_image").value;

            if (nameFun(ign)) {
                var x = document.getElementById("baba").src;
                var nonBlob = stringToBytesFaster(x).length;
                var imgval = nonBlob / 1000000;
                if (imgval <= 2) {
                    var form_data = new FormData(); // Create a FormData object
                    form_data.append('upload_image', x); // Append all element in FormData  object
                    form_data.append('name', name1);
                    form_data.append('mobile', mobile1);
                    form_data.append('state', state1);
                    form_data.append('city', city1);
                    form_data.append('address', address1);
                    form_data.append('profession', profession1);
                    form_data.append('gender', gender1);
                    form_data.append('aadhar', aadhar1);
                    form_data.append('email', email1);
                    form_data.append('comments', comments1);
                    form_data.append('father_name', father_name);


                    $.ajax({
                        url: 'ajax/register.php', // point to server-side PHP script 
                        dataType: 'text', // what to expect back from the PHP script, if anything
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function(output) {
                            $('.overlay').remove();
                            alert("Register Successfully!");
                            document.getElementById("name").value = "";
                            document.getElementById("email").value = "";
                            document.getElementById("mobile").value = "";
                            document.getElementById("state").value = "";
                            document.getElementById("city").value = "";
                            document.getElementById("address").value = "";
                            document.getElementById("profession").value = "";
                            document.getElementById("gender").value = "";
                            document.getElementById("aadhar").value = "";
                            document.getElementById("comments").value = "";
                            document.getElementById("upload_image").value = "";
                            document.getElementById("father_name").value = "";

                            //$('#load').val(output);   
                            document.getElementById("uploaded_image").innerHTML = "";
                            document.getElementById("load").innerHTML = "";
                            document.getElementById("load").innerHTML = output;
                            // display response from the PHP script, if any
                            //return  true;
                        }
                    });
                    $('#load').val('');
                    return false;
                } else {
                    $('.overlay').remove();
                    alert("Maximum upload file size is 12 MB.");
                    return false;
                }

            } else {
                $('.overlay').remove();
                document.getElementById("load").innerHTML = "";
                alert("Please select profile photo.");
                return false;
            }
        } else {
            document.getElementById("load").innerHTML = "";
            document.getElementById("load").innerHTML = "";
            $('.overlay').remove();
            return false;
        }
        /* Clear the file container */
    }


    function nameFun(nameText) {
        if (nameText != '') {
            return true;
        } else {
            document.getElementById("name").className = "asterisk";
            document.getElementById("name").placeholder = "Please enter full name *";

            return false;
        }
    }

    function emailFun(emailText) {

        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if (emailText != '') {
            if (emailText.match(emailReg)) {

                return true;
            } else {

                document.getElementById("email").className = "asterisk";
                document.getElementById("email").placeholder = "Please enter vailed email *";
                return false;
            }
        } else {

            //document.getElementById("email").className = "asterisk";
            //document.getElementById("email").placeholder = "Please enter email *";

            return true;
        }

    }

    function mobileFun(mobileText) {
        if (mobileText == '') {
            document.getElementById("mobile").className = "asterisk";
            document.getElementById("mobile").placeholder = "Please enter mobile number *";
            alert("Mobile number can't be empty.");
            return false;
        } else if (mobileText.length < 10) {
            document.getElementById("mobile").className = "asterisk";
            document.getElementById("mobile").placeholder = "Please enter mobile number *";
            alert("Enter more than 10 digit mobile no...");
            return false;
        } else {


            return true;;
        }
    }

    function stateFun(stateText) {
        if (stateText != '') {
            return true;
        } else {
            alert("Please select state.");
            document.getElementById("state").className = "asterisk";
            document.getElementById("state").placeholder = "Please select state number *";

            return false;
        }
    }

    function cityFun(cityText) {
        if (cityText != '') {
            return true;
        } else {
            alert("Please select city.");
            document.getElementById("city").className = "asterisk";
            document.getElementById("city").placeholder = "Please select city *";

            return false;
        }
    }

    function aadharFun(aadharText) {
        if (aadharText == '') {
            document.getElementById("aadhar").className = "asterisk";
            document.getElementById("aadhar").placeholder = "Please enter mobile number *";
            alert("Aadhar number can't be empty.");
            return false;
        } else if (aadharText.length < 9) {
            document.getElementById("aadhar").className = "asterisk";
            document.getElementById("aadhar").placeholder = "Enter valied aadhar no *";
            alert("Enter valied aadhar no...");
            return false;
        } else {


            return true;;
        }
    }

    function validateStart1() {
        document.getElementById("load1").innerHTML = "<center>Please Wait...<img  src='images/load.gif'></center>";
        var div = document.createElement("div");
        div.className += "overlay";
        document.body.appendChild(div);
        //$("#myModal").append(div)
        //insertAfter('#addnewdiv');

        var name1 = document.getElementById("name1").value;
        var email1 = document.getElementById("email1").value;
        var mobile1 = document.getElementById("mobile1").value;
        var state1 = document.getElementById("state1").value;
        var city1 = document.getElementById("city1").value;
        var address1 = document.getElementById("address1").value;
        var profession1 = document.getElementById("profession1").value;
        var gender1 = document.getElementById("gender1").value;
        var aadhar1 = document.getElementById("aadhar1").value;
        var comments1 = document.getElementById("comments1").value;
        var father_name = document.getElementById("father_name1").value;
        // creates <div class="overlay"></div> and 
        // adds it to the DOM

        var ign = document.getElementById("upload_image1").value;

        if (nameFun(ign)) {
            var x = document.getElementById("baba").src;
            var nonBlob = stringToBytesFaster(x).length;
            var imgval = nonBlob / 1000000;
            if (imgval <= 2) {



                var form_data = new FormData(); // Create a FormData object
                form_data.append('upload_image', x); // Append all element in FormData  object
                form_data.append('name', name1);
                form_data.append('mobile', mobile1);
                form_data.append('state', state1);
                form_data.append('city', city1);
                form_data.append('address', address1);
                form_data.append('profession', profession1);
                form_data.append('gender', gender1);
                form_data.append('aadhar', aadhar1);
                form_data.append('email', email1);
                form_data.append('comments', comments1);
                form_data.append('father_name', father_name);


                $.ajax({
                    url: 'ajax/register.php', // point to server-side PHP script 
                    dataType: 'text', // what to expect back from the PHP script, if anything
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'post',
                    success: function(output) {
                        $('.overlay').remove();
                        alert("Register Successfully");
                        document.getElementById("name1").value = "";
                        document.getElementById("email1").value = "";
                        document.getElementById("mobile1").value = "";
                        document.getElementById("state1").value = "";
                        document.getElementById("city1").value = "";
                        document.getElementById("address1").value = "";
                        document.getElementById("profession1").value = "";
                        document.getElementById("gender1").value = "";
                        document.getElementById("aadhar1").value = "";
                        document.getElementById("comments1").value = "";
                        document.getElementById("upload_image1").value = "";
                        document.getElementById("father_name1").value = "";

                        //$('#load').val(output);   
                        document.getElementById("uploaded_image1").innerHTML = "";
                        document.getElementById("load1").innerHTML = "";
                        document.getElementById("load1").innerHTML = output;
                        // display response from the PHP script, if any
                        //return  true;
                    }
                });
                $('#load1').val('');
                return false;
            } else {
                $('.overlay').remove();
                alert("The size of the photo should be less than 2 MB.");
                return false;
            }

        } else {
            $('.overlay').remove();
            document.getElementById("load1").innerHTML = "";
            alert("Please select profile photo.");
            return false;
        }

        /* Clear the file container */
    }
</script>


<body class="">
    <div id="wrapper" class="clearfix">
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
                                        <a href="#" class="text-white"><i class="fa fa-envelope-o mr-5"></i> info@bhes.org.in</a>
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
                                    <li class="active">Login</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="job-overview">
                                <dl class="dl-horizontal">
                                    <dt><i class="fa fa-calendar text-theme-colored mt-5 font-15"></i></dt>
                                    <dd>
                                        <h5 class="mt-0">Login Here As Well:</h5>
                                        <p>Click below the link</p>
                                    </dd>
                                </dl>

                                <a class="btn btn-dark mt-20" data-toggle="modal" data-target="#myModal" href="#">Login Now</a>
                                <!-- Modal -->
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" style="overflow-y:auto;">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content p-30 pt-10" id="addnewdiv">
                                            <h3 class="text-center text-theme-colored mb-20">Login: <p id='load' style='color:green;font-size: 13px;'></p>
                                            </h3>
                                            <form id="loginFormm" action="#" method="post" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="form_email">Email <small>*</small></label>
                                                            <input class="form-control" type="email1" name="email1" id="email" placeholder="Enter Your Email" maxlength="100">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label>Password <small>*</small></label>
                                                            <input type="password" name="pass1" id="pass1" placeholder="Enter Your password" required="" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-block btn-dark btn-theme-colored btn-sm mt-20 pt-10 pb-10" data-loading-text="Please wait...">Login</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            $(document).ready(function() {
                                $('#loginFormm').submit(function(e) {
                                    e.preventDefault(); // Prevent form submission
                                    var formData = new FormData(this);
                                    formData.append('form', 'FormModel');

                                    $.ajax({
                                        url: 'ajax/login.php',
                                        type: 'POST',
                                        data: formData,
                                        processData: false,
                                        contentType: false,
                                        dataType: 'json',
                                        success: function(response) {
                                            if (response.status === "1") {
                                                // Perform actions when the status is "1"
                                                // Handle the response from the server
                                                alert(response.message);

                                                // Clear the form fields
                                                $('#loginForm')[0].reset();

                                                // Redirect to the login page
                                                window.location.href = 'dashboard/'; // Change 'login.php' to the URL of your login page
                                            } else {
                                                alert(response.message);
                                            }
                                        }
                                    });
                                });
                            });
                        </script>

                        <div class="col-md-9" style="overflow-y:auto;">


                            <!-- Form Put here  -->
                            <form id="loginForm" action="#" method="post" enctype="multipart/form-data" ">

                                <div class=" icon-box mb-0 p-0">
                                <a href="#" class="icon icon-gray pull-left mb-0 mr-10">
                                    <i class="fa fa-sign-in"></i>
                                </a>

                                <h3 class="icon-box-title pt-15 mt-0 mb-40">Login Form</h3>
                                <p id='load1' style='color:green;font-size: 13px;'></p>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="form_email">Email <small>*</small></label>
                                            <input class="form-control" type="email" name="email" id="email" placeholder="Enter Your Email" maxlength="100">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Password <small>*</small></label>
                                            <input type="password" name="pass" id="pass" placeholder="Enter Your password" required="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-dark btn-theme-colored btn-sm mt-20 pt-10 pb-10" data-loading-text="Please wait...">Login</button>
                        </div>

                        </form>
                    </div>
                </div>
        </div>
        </section>
    </div>

    <script>
        $(document).ready(function() {
            $('#loginForm').submit(function(e) {
                e.preventDefault(); // Prevent form submission
                var formData = new FormData(this);
                formData.append('form', 'FormSimple');

                $.ajax({
                    url: 'ajax/login.php',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === "1") {
                            // Perform actions when the status is "1"
                            // Handle the response from the server
                            alert(response.message);

                            // Clear the form fields
                            $('#loginForm')[0].reset();

                            // Redirect to the login page
                            window.location.href = 'dashboard/'; // Change 'login.php' to the URL of your login page
                        } else {
                            alert(response.message);
                        }
                    }
                });
            });
        });
    </script>
    <!-- end main-content -->

    <!-- Footer -->
    <?php include "./footer.php" ?>