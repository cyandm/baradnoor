<?php get_header() ?>
<?php

/*Template Name: Home Page */ ?>


<?php
$i = 0;
$j = 0;

$all_cats = get_categories([
    'taxonomy' => 'product-cat'
]);

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
        'posts_per_page' => 5, 'tax_query' => [
            [
                'taxonomy' => 'faq-cat',
                'field' => 'slug',
                'terms' => 'سوالات-کلی'
            ]
        ]
    ]
);

$faq_in_home_page_two = new WP_Query(
    [
        'post_type' => 'faq',
        'posts_per_page' => 5, 'tax_query' => [
            [
                'taxonomy' => 'faq-cat',
                'field' => 'slug',
                'terms' => 'سوالات-فنی-تر'
            ]
        ]
    ]
);


$cats = get_categories([
    'taxonomy' => 'product-cat',
    'orderby' => 'id', 'current_category'    => 1,
    'hide_empty' => false,

]);

$cats_name_group = [];
$cats_id_group = [];

foreach ($cats as $cat) {
    array_push($cats_name_group, $cat->name);
    array_push($cats_id_group, $cat->term_id);
}

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

            <div class="container-cat-product only-desktop">
                <div class="category-product border-gradient">
                    <?php


                    foreach ($cats_name_group as $index => $cat_name) {

                        echo "<div data-tab='$index' class='cat-product ";
                        if ($index === 0) echo 'current-cat';
                        echo  " ' >$cat_name</div>";
                    }

                    ?>
                </div>
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


            <?php foreach ($cats_id_group as $index => $cat_id) : ?>

                <div data-tab="<?= $index ?>" class="container-tab-product-group <?php if ($index === 0) {
                                                                                        echo "show";
                                                                                    } ?>">
                    <div class="container-blog-and-news-button-see-all">
                        <div class="type-of-product-text"><?= get_term($cat_id)->name ?></div>
                        <div class="see-all-button only-desktop "><a href="<?= get_term_link($cat_id) ?>">مشاهده همه </a></div>
                    </div>


                    <div class="container-product-home">


                        <?php


                        $product_query = new WP_Query([
                            'posts_per_page' => 8,
                            'post_type' => 'product',
                            'tax_query' => [
                                [
                                    'taxonomy' => 'product-cat',
                                    'field' => 'term_id',
                                    'terms' => $cat_id
                                ]
                            ]
                        ]);


                        if ($product_query->have_posts()) {
                            while ($product_query->have_posts()) {


                                $product_query->the_post();
                                get_template_part('templates/card/card', 'product');
                            }
                        }


                        wp_reset_postdata();

                        ?>
                    </div>

                </div>



            <?php endforeach; ?>




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
    if ($faq_in_home_page->have_posts() || $faq_in_home_page_two->have_posts()) : ?>
        <section>
            <div class="container-blog-and-news-button-see-all">
                <div class="blog-text">سوالات متداول</div>
                <div class="see-all-button only-desktop "><a href="#">تماس با ما </a></div>
            </div>
            <div class="container-cat-faq only-desktop">
                <div class="category-faq border-gradient">
                    <?php

                    $cats = get_categories([
                        'taxonomy' => 'faq-cat',
                        'orderby' => 'id', 'current_category'    => 1,
                        'hide_empty' => false,

                    ]);

                    foreach ($cats as $cat) {
                        // var_dump($cat);
                        $i = $i + 1;
                        echo "<div data-tab='$i' class='cat-faq ";
                        if ($i === 1) echo 'current-cat';
                        echo  " ' >$cat->name</div>";
                    }

                    ?>
                </div>
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

            <div class="faq-content show" data-tab='1'>
                <?php if ($faq_in_home_page->have_posts()) { ?>
                    <?php
                    while ($faq_in_home_page->have_posts()) {

                        $faq_in_home_page->the_post();
                        get_template_part('/templates/card/card', 'faq');
                    }

                    ?>

                <?php  } else {
                    echo "سوالی موجود نیست";
                } ?>
            </div>
            <div class="faq-content" data-tab='2'>
                <?php if ($faq_in_home_page_two->have_posts()) { ?>
                    <?php
                    while ($faq_in_home_page_two->have_posts()) {

                        $faq_in_home_page_two->the_post();
                        get_template_part('/templates/card/card', 'faq');
                    }

                    ?>

                <?php  } else {
                    echo "سوالی موجود نیست";
                } ?>
            </div>

            <div class=" button-show-all-mobile on-mobile-show">
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
            <div data-tab="1" class="div active">div 1</div>
            <div data-tab="2" class="div">div 2</div>
            <div data-tab="3" class="div">div 3</div>
        </div>

    </section>

</main>




<?php get_footer() ?>