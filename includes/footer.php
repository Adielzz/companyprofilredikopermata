<footer id="footer" class="footer position-relative dark-background">

    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 col-sm-12 footer-about mb-4">
                <a href="./" class="d-flex align-items-center">
                    <span class="sitename">REDIKO PERMATA</span>
                </a>
                <div class="footer-contact pt-3">
                    <p><strong>Location:</strong> <?php echo  $contact_boxData[0]['value']; ?></p>
                    <p class="mt-3"><strong>Phone:</strong> <span
                            onclick="window.location.href='tel:<?php echo trim($contact_boxData[2]['value']); ?>'"><?php echo $contact_boxData[1]['value']; ?></span>
                    </p>
                    <p><strong>Email:</strong> <span
                            onclick="window.location.href='mailto:<?php echo $contact_boxData[2]['value']; ?>'"><?php echo  $contact_boxData[2]['value']; ?></span>
                    </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 footer-links mb-4">
                <h4>Useful Links</h4>
                <ul>
                    <li><i class="bi bi-chevron-right"></i> <a href="./">Home</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="about.php">About Us</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="products.php">Products</a></li>

                    <li><i class="bi bi-chevron-right"></i> <a href="contact.php">Contact</a></li>
                </ul>
            </div>


        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename"> <a href="INI ISI LINK/">
                    REDIKO PERMATA</a></strong> <span>All rights reserved</span></p>
    </div>

    <style>
    footer .sitename {
        color: var(--accent-color);
    }

    .footer-contact p span:hover {
        color: var(--accent-color);
    }
    </style>

</footer>