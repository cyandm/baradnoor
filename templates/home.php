<?php get_header() ?>
<?php

/*Template Name: Home Page */ ?>


<?php


$posts_in_home_page = new WP_Query(
    [
        'post_type' => 'post',
        'posts_per_page' => 4

    ]
);

$inspiration_in_home_page = new WP_Query(
    [
        'post_type' => 'inspiration',
        'posts_per_page' => 4, 'tax_query' => [
            [
                'taxonomy' => 'inspiration-cat',
                'field' => 'slug',
                'terms' => 'جدیدترین-ها'
            ]
        ]
    ]
);

$product_in_home_page = new WP_Query(
    [
        'post_type' => 'product',
        'posts_per_page' => 8
    ]
);


$faq_in_home_page = new WP_Query(
    [
        'post_type' => 'faq',
        'posts_per_page' => 5
    ]
);


?>
<main class="container home">
    <?php
    if ($inspiration_in_home_page->have_posts()) : ?>
        <section>
            <div class="container-blog-and-news-button-see-all">
                <div class="blog-text">نورپردازی</div>
                <div class="see-all-button only-desktop "><a href="#">مشاهده همه </a></div>

            </div>
            <div class="inspiration-content">
                <?php
                while ($inspiration_in_home_page->have_posts()) {

                    $inspiration_in_home_page->the_post();
                    get_template_part('/templates/card/card', 'inspiration', ['card_type' => '1']);
                }

                ?>
            </div>

            <div class="button-show-all-mobile on-mobile-show">
                <a href="#">مشاهده همه</a>
            </div>
        </section>
    <?php
    endif;
    ?>

    <?php
    if ($product_in_home_page->have_posts()) : ?>
        <section>
            <div class="container-blog-and-news-button-see-all">
                <div class="blog-text">محصولات جدید</div>
            </div>
            <div class="container-cat-product only-desktop ">
                <ul class="category-product border-gradient">
                    <?php wp_list_categories(
                        [
                            'taxonomy' => 'product-cat',
                            'orderby' => 'id',
                            'hide_empty' => false,
                            'title_li' => "",
                            'current_category'    => 1
                        ]
                    ) ?>
                </ul>
            </div>
            <div class="container-cat-product border-gradient on-mobile-show drop-down-cat">
                <?php wp_dropdown_categories(
                    [
                        'taxonomy' => 'product-cat',
                        'orderby' => 'id',
                        'hide_empty' => false,
                        'title_li' => "",
                        'current_category'    => 1,
                        'value_field' => 'term_id'

                    ]
                ) ?>
            </div>

            <div class="container-blog-and-news-button-see-all">
                <div class="type-of-product-text">براکت ها</div>
                <div class="see-all-button only-desktop "><a href="#">مشاهده همه </a></div>
            </div>
            <div class="product-content">
                <?php
                while ($product_in_home_page->have_posts()) {

                    $product_in_home_page->the_post();
                    get_template_part('/templates/card/card', 'product');
                }

                ?>
            </div>
            <div class="button-show-all-mobile on-mobile-show">
                <a href="#">مشاهده همه</a>
            </div>
        </section>
    <?php
    endif;
    ?>
    <section class="image-light-top">
        <div class="image-light on-mobile-show">

            <img src="<?php echo get_stylesheet_directory_uri() . '/imgs/image-light-home.png'  ?>" alt="light">

            <img src="<?php echo get_stylesheet_directory_uri() . '/imgs/image-light-home.png'  ?>" alt="light">
        </div>

    </section>

    <section class="image-light-top">
        <div class="image-light only-desktop ">

            <img src="<?php echo get_stylesheet_directory_uri() . '/imgs/image-light-home.png'  ?>" alt="light">

            <img src="<?php echo get_stylesheet_directory_uri() . '/imgs/image-light-home.png'  ?>" alt="light">

            <img src="<?php echo get_stylesheet_directory_uri() . '/imgs/image-light-home.png'  ?>" alt="light">

            <img src="<?php echo get_stylesheet_directory_uri() . '/imgs/image-light-home.png'  ?>" alt="light">

            <img src="<?php echo get_stylesheet_directory_uri() . '/imgs/image-light-home.png'  ?>" alt="light">
        </div>

    </section>


    <?php
    if ($posts_in_home_page->have_posts()) : ?>
        <section>
            <div class="container-blog-and-news-button-see-all">
                <div class="blog-text">اخبار و مقالات</div>
                <div class="see-all-button only-desktop "><a href="#">مشاهده همه </a></div>
            </div>
            <div class="posts-content">
                <?php
                while ($posts_in_home_page->have_posts()) {

                    $posts_in_home_page->the_post();
                    get_template_part('/templates/card/card', 'blog');
                }

                ?>
            </div>
            <div class="button-show-all-mobile on-mobile-show">
                <a href="#">مشاهده همه</a>
            </div>
        </section>
    <?php
    endif;

    ?>
    <?php
    if ($faq_in_home_page->have_posts()) : ?>
        <section>
            <div class="container-blog-and-news-button-see-all">
                <div class="blog-text">سوالات متداول</div>
                <div class="see-all-button only-desktop "><a href="#">تماس با ما </a></div>
            </div>
            <div class="container-cat-faq only-desktop">
                <ul class="category-faq border-gradient">
                    <?php wp_list_categories(
                        [
                            'taxonomy' => 'faq-cat',
                            'orderby' => 'id',
                            'hide_empty' => false,
                            'title_li' => "",
                            'current_category'    => 1
                        ]
                    ) ?>
                </ul>
            </div>
            <div class="container-cat-faq border-gradient on-mobile-show drop-down-cat">
                <?php wp_dropdown_categories(
                    [
                        'taxonomy' => 'faq-cat',
                        'orderby' => 'id',
                        'hide_empty' => false,
                        'title_li' => "",
                        'current_category'    => 1,
                        'value_field' => 'term_id'

                    ]
                ) ?>
            </div>
            <div class="faq-content">
                <?php
                while ($faq_in_home_page->have_posts()) {

                    $faq_in_home_page->the_post();
                    get_template_part('/templates/card/card', 'faq');
                }

                ?>
            </div>
            <div class="button-show-all-mobile on-mobile-show">
                <a href="#">تماس با ما</a>
            </div>
        </section>
    <?php
    endif;
    ?>
    <section>
        <div class="button-exer">
            <div data-tab="1" class="button"></div>
            <div data-tab="2" class="button"></div>
            <div data-tab="3" class="button"></div>
        </div>
        <div class="div-container-exer">
            <div data-tab="1" class="div">div 1</div>
            <div data-tab="2" class="div">div 2</div>
            <div data-tab="3" class="div">div 3</div>
        </div>

    </section>

</main>




<?php get_footer() ?>