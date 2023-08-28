<?php
$pageID = get_option('page_on_front');
$telephone_num = get_field('telephone_number', $pageID);
$telephone_num_two = get_field('telephone_number_two', $pageID);

$url_instagram = get_field('url_instagram', $pageID);
$url_telegram = get_field('url_telegram', $pageID);
$url_ita = get_field('url_ita', $pageID);

?>


<footer class="site-footer container">
    <div class="container-footer">
        <div class="footer-col-one">
            <?php wp_nav_menu(['theme_location' => 'footer-menu']) ?>
        </div>
        <div class="footer-col-two">
            <?php wp_nav_menu(['theme_location' => 'footer-menu-two']) ?>
            <?php
            if ($telephone_num != null) : ?>

                <span class="phone-numbers">
                    <a href="tel: <?= $telephone_num ?>">
                        <?php echo $telephone_num; ?>
                    </a>
                </span>

            <?php endif; ?>
            <?php
            if ($telephone_num_two != null) : ?>

                <span class="phone-numbers">
                    <a href="tel: <?= $telephone_num_two ?>">
                        <?php echo $telephone_num_two; ?>
                    </a>
                </span>

            <?php endif; ?>
        </div>
        <div class="footer-col-three">
            <ul>
                <li>آدرس</li>
            </ul>
            <address>لاله زار جنوبی پاساژ بهار پلاک ۱۲+۲</address>
            <ul class="location-container">
                <li>لوکیشن</li>
            </ul>
            <iframe class="location" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25911.077556183685!2d51.4204698!3d35.7290542!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f8e06b8bf7dcf45%3A0x53276abe33744f45!2sDay%20General%20Hospital!5e0!3m2!1sen!2s!4v1690718658761!5m2!1sen!2s" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="footer-col-four">
            <div class="img-light-footer">
                <img src="<?php echo get_stylesheet_directory_uri() . '/imgs/light better.png'  ?>" alt="light">
            </div>
            <div class="social-network-footer">
                <div class="eitaa border-gradient"><a href="<?php echo $url_ita ?>"><i class="icon-ita"></i></a></div>
                <div class="telegram border-gradient"><a href="<?php echo $url_telegram ?>"><i class="icon-telegram"></i></a></div>
                <div class="instagram border-gradient"><a href="<?php echo $url_instagram ?>"><i class="icon-insta"></i></a></div>
            </div>
        </div>
    </div>

</footer>
<div class="wp-footer">
    <?php wp_footer() ?>
</div>
</body>

</html>