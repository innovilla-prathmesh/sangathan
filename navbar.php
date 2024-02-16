<div class="header-nav">
    <div class="header-nav-wrapper navbar-scrolltofixed bg-white">
        <div class="container">
            <nav id="menuzord-right" class="menuzord default">
                <a class="menuzord-brand pull-left flip xs-pull-center mt-5 pt-5 mt-sm-10 pt-sm-0" href="index">
                    <img style="width:60px;height:60px;max-height: 100px; padding-top:6px" src="./img/logo.png" alt="Logo">
                </a>
                <ul class="menuzord-menu">
                    <li <?php echo (strpos($_SERVER['REQUEST_URI'], 'index.php') !== false) ? 'class="active"' : ''; ?>>
                        <a href="./index.php">Home</a>
                    </li>
                    <li <?php echo (strpos($_SERVER['REQUEST_URI'], 'about.php') !== false) ? 'class="active"' : ''; ?>>
                        <a href="./about.php#purpose">Purpose</a>
                    </li>
                    <li <?php echo (strpos($_SERVER['REQUEST_URI'], 'gallery.php') !== false) ? 'class="active"' : ''; ?>>
                        <a href="./gallery.php">Gallery</a>
                    </li>
                    <li <?php echo (strpos($_SERVER['REQUEST_URI'], 'events.php') !== false) ? 'class="active"' : ''; ?>>
                        <a href="#">Events</a>
                    </li>
                    <li <?php echo (strpos($_SERVER['REQUEST_URI'], 'join.php') !== false) ? 'class="active"' : ''; ?>>
                        <a href="./join.php">Join Us</a>
                    </li>
                    <li <?php echo (strpos($_SERVER['REQUEST_URI'], 'login.php') !== false) ? 'class="active"' : ''; ?>>
                        <a href="./login.php">Login</a>
                    </li>
                    <li <?php echo (strpos($_SERVER['REQUEST_URI'], 'contact.php') !== false) ? 'class="active"' : ''; ?>>
                        <a href="./contact.php">Contact Us</a>
                    </li>
                </ul>

            </nav>
        </div>
    </div>
</div>