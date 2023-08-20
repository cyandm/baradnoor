<?php get_header();

$phone_number = get_field('telephone_number');

$worked_inspiration = get_field('inspiration_object');

$favourite_products = get_field('product_object');

?>

<main class="single-product-page">


    <div class="bread-crumb-single-product container">
        <span><a href="<?= site_url() . '/محصولات/' ?>">محصولات</a></span>
        <span> > </span>
        <span> <?php the_title() ?> </span>

    </div>


    <div class="single-product-info container">
        <div class="title-slider-container-product">
            <h2><?php the_title() ?></h2>

        </div>
        <div class="technical-specifications-of-product"></div>
    </div>

    <div class="container-icons-single-product container">
        <div class="icons-right">
            <div class="icon-container">
                <img src=" <?php echo get_stylesheet_directory_uri() . '/imgs/iran.svg'  ?>" alt="iran-icon">
                <p>ساخت ایران</p>
            </div>
            <div class="icon-container">
                <img src=" <?php echo get_stylesheet_directory_uri() . '/imgs/18 guarantee.svg'  ?>" alt="iran-icon">
                <p>18 ماه گارانتی</p>
            </div>
            <div class="icon-container">
                <img src=" <?php echo get_stylesheet_directory_uri() . '/imgs/eye.svg'  ?>" alt="iran-icon">
                <p>بدون سوسو زدن</p>
            </div>
        </div>
        <div class="icons-left">
            <img src=" <?php echo get_stylesheet_directory_uri() . '/imgs/eye2.svg'  ?>" alt="iran-icon">
            <img src=" <?php echo get_stylesheet_directory_uri() . '/imgs/standard.svg'  ?>" alt="iran-icon">
            <img src=" <?php echo get_stylesheet_directory_uri() . '/imgs/iso.svg'  ?>" alt="iran-icon">



        </div>
    </div>
    <div class="container-call-info-product">
        <div class="container text-phone-call">
            <p class="text-more-info">برای اطلاعات بیشتر واطلاع از قیمت تماس بگیرید</p>
            <div class="button-post-card button-more-info"><a href='tel:"<?php echo $phone_number ?>" '>تماس بگیرید</a></div>
        </div>
    </div>

    <div class="container">
        <?php
        if ($worked_inspiration != null) : ?>
            <div class="worked-examples-inspiration">
                <span class="worked-examples-title">نمونه های کار شده</span>
                <div class="inspiration-worked-content">
                    <?php foreach ($worked_inspiration as $index => $worked_inspiration_id) {
                        get_template_part('/templates/card/card', 'inspiration', ['card_type' => '2', 'post_id' => $worked_inspiration_id]);
                    }
                    ?>
                </div>
            </div>

        <?php endif; ?>

        <?php
        if ($favourite_products != null) : ?>
            <div class="favourire-product-for-inspiration">
                <span>شاید بپسندید</span>
                <div class="favourire-product-for-inspiration-content">
                    <?php foreach ($favourite_products as $index => $favourite_products_id) {
                        get_template_part('/templates/card/card', 'product', ['product_id' => $favourite_products_id]);
                    }
                    ?>
                </div>
            </div>
        <?php endif; ?>


    </div>
</main>


<?php get_footer()  ?>