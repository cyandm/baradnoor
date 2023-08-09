<?php get_header() ?>

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
        'posts_per_page' => 4
    ]
);

$product_in_home_page = new WP_Query(
    [
        'post_type' => 'product',
        'posts_per_page' => 8
    ]
);


$fqa_in_home_page = new WP_Query(
    [
        'post_type' => 'fqa',
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
                <div class="see-all-button only-mobile"><a href="#">مشاهده همه </a></div>

            </div>
            <div class="inspiration-content">
                <?php
                while ($inspiration_in_home_page->have_posts()) {

                    $inspiration_in_home_page->the_post();
                    get_template_part('/templates/card/card', 'inspiration');
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
            <div class="container-cat-product only-mobile">
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
                <div class="see-all-button only-mobile"><a href="#">مشاهده همه </a></div>
            </div>
            <div class="product-content">
                <?php
                while ($product_in_home_page->have_posts()) {

                    $product_in_home_page->the_post();
                    get_template_part('/templates/card/card', 'product');
                }

                ?>
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
        <div class="image-light only-mobile">

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
                <div class="see-all-button only-mobile"><a href="#">مشاهده همه </a></div>
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
    if ($fqa_in_home_page->have_posts()) : ?>
        <section>
            <div class="container-blog-and-news-button-see-all">
                <div class="blog-text">سوالات متداول</div>
                <div class="see-all-button only-mobile"><a href="#">تماس با ما </a></div>
            </div>
            <div class="container-cat-fqa only-mobile">
                <ul class="category-fqa border-gradient">
                    <?php wp_list_categories(
                        [
                            'taxonomy' => 'fqa-cat',
                            'orderby' => 'id',
                            'hide_empty' => false,
                            'title_li' => "",
                            'current_category'    => 1
                        ]
                    ) ?>
                </ul>
            </div>
            <div class="container-cat-fqa border-gradient on-mobile-show drop-down-cat">
                <?php wp_dropdown_categories(
                    [
                        'taxonomy' => 'fqa-cat',
                        'orderby' => 'id',
                        'hide_empty' => false,
                        'title_li' => "",
                        'current_category'    => 1,
                        'value_field' => 'term_id'

                    ]
                ) ?>
            </div>
            <div class="fqa-content">
                <?php
                while ($fqa_in_home_page->have_posts()) {

                    $fqa_in_home_page->the_post();
                    get_template_part('/templates/card/card', 'fqa');
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


</main>




<?php get_footer() ?>