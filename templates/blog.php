<?php get_header() ?>
<?php

/*Template Name: Blog Page */
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$posts_in_blog_page = new WP_Query(
    [
        'post_type' => 'post',
        'posts_per_page' => 1,
        'orderby' => 'id',
        'paged' => $paged

    ]
);
$posts_in_slider = new WP_Query(
    [
        'post_type' => 'post',
        'posts_per_page' => 3

    ]
);


?>

<main class="blog-page">
    <div class="blog-page-content">
        <div class="image-and-slider-blogs">
            <div class="image-blogs-container">
                <img src="<?php echo get_stylesheet_directory_uri() . '/imgs/blog-image.svg'  ?>" />
            </div>



            <?php
            if ($posts_in_slider->have_posts()) : ?>
                <div class="slider-blog  container border-gradient">
                    <div class="swiper mySwiper" id="swiperSlideBlog">
                        <div class="swiper-wrapper">
                            <?php
                            while ($posts_in_slider->have_posts()) {
                                $posts_in_slider->the_post();
                                get_template_part('/templates/card/slider', 'component');
                            }
                            ?>
                        </div>
                        <div class="swiper-pagination"></div>


                    </div>

                </div>
            <?php
            endif;
            ?>



        </div>
        <div class="title-category-search-container not-in-mobile-show">
            <div class="title-and-category-container">
                <div class="category-title">دنبال چی میگردی ؟</div>
                <div class="category-blog-container">
                    <ul>
                        <?php wp_list_categories(
                            [
                                'orderby' => 'id',
                                'hide_empty' => false,
                                'title_li' => "",
                                'current_category'    => 1

                            ]
                        ) ?>
                    </ul>
                </div>
            </div>
            <div class="search-wrapper border-gradient">
                <input class="search" type="search" placeholder="جستجو در مقالات" />
            </div>
        </div>

        <div class="title-category-search-container-mobile not-in-desktop-show">
            <div class="title-and-category-container-mobile">
                <div class="category-title-mobile">دنبال چی میگردی ؟</div>
                <div class="category-blog-container-mobile border-gradient">
                    <?php wp_dropdown_categories(
                        [
                            'orderby' => 'id',
                            'hide_empty' => false,
                            'title_li' => "",
                            'current_category'    => 1

                        ]
                    ) ?>
                </div>
            </div>
            <div class="search-wrapper-mobile border-gradient">
                <input class="search" type="search" placeholder="جستجو در مقالات" />
            </div>
        </div>

        <?php
        if ($posts_in_blog_page->have_posts()) : ?>
            <div class="container blog-group-content">
                <h2>همه مقالات</h2>
                <div class="container-blog-card-group">
                    <div class="posts-content">
                        <?php
                        while ($posts_in_blog_page->have_posts()) {

                            $posts_in_blog_page->the_post();
                            get_template_part('/templates/card/card', 'blog');
                        }

                        ?>
                    </div>
                    <?php
                    echo "<div class='pagination-for-blog border-gradient'>" . paginate_links(
                        array(
                            'total' => $posts_in_blog_page->max_num_pages,
                            'next_text' => __('<i class="next-or-prev"></i>'),
                            'prev_text' => __('<i class="next-or-prev"></i>'),
                            'prev_next' => false
                        )
                    ) . "</div>";
                    ?>

                </div>
            </div>
        <?php
        endif;

        ?>


    </div>
</main>


<?php get_footer() ?>