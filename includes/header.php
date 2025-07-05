<?php $contact_boxData = $query->select('contact_box'); ?>
<?php $contactData = $query->select('contact'); ?>

<header id="header" class="header sticky-top">


    <div class="container d-flex justify-content-center justify-content-md-between">

    </div>

    </div>
    </div>

    <div class="branding">
        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="/assets/img/logoRP.png" class="logo d-flex align-items-center">
                <img src="/assets/img/logo.png" alt="RP">

                <h1 class="sitename">REDIKO PERMATA<br></h1>
            </a>

            <?php $current_page = basename($_SERVER['PHP_SELF']); ?>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="./" class="<?= ($current_page == 'index.php') ? 'active' : ''; ?>">Home</a></li>
                    <li><a href="about.php" class="<?= ($current_page == 'about.php') ? 'active' : ''; ?>">About Us</a>
                    </li>

                    <li><a href="products.php"
                            class="<?= ($current_page == 'products.php') ? 'active' : ''; ?>">Products</a></li>
                    <li><a href="contact.php"
                            class="<?= ($current_page == 'contact.php') ? 'active' : ''; ?>">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </div>

</header>