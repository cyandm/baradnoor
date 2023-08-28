<?php

/*Template Name: Contact-us Page */ ?>

<?php get_header(); ?>
<main class="contact-us-page">

    <div class="container">
        <div class="contact-us">

            <div class="contact-us-content">
                <div class="contact-us-text">با ما در ارتباط باشید</div>
                <div class="question-text">چه چیزی هست که میخوای با ما در میون بذاری ؟</div>
                <form>
                    <div class="container-border border-gradient">
                        <i class="icon-comment"></i>
                        <textarea rows="5" class="text-area-contact-us " placeholder="اینجا بنویس"></textarea>
                    </div>
                    <div class="container-border border-gradient">
                        <i class="icon-user"></i>
                        <input type="text" placeholder="نام شما" class="border-gradient" />
                    </div>
                    <div class="container-border border-gradient">
                        <i class="icon-email"></i>
                        <input type="email" placeholder="ایمیل شما" />
                    </div>
                    <div class="btn-contact-us"><i class="icon-send"></i><a href="#">ارسال درخواست</a></div>
                </form>
            </div>
        </div>
        <div class="image-light-contact-us">
            <img src="<?php echo get_stylesheet_directory_uri() . '/imgs/contact-us.svg'  ?>" />

        </div>
    </div>
</main>
<?php get_footer(); ?>