<?php

/*Template Name: Product Page */
?>
<?php get_header();
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$product_in_product_page = new WP_Query(
    [
        'post_type' => 'product',
        'posts_per_page' => 16,
        'paged' => $paged

    ]
);
$posts_in_slider = new WP_Query(
    [
        'post_type' => 'inspiration',
        'posts_per_page' => 3

    ]
);

?>


<main class="product-page">
    <div class="container-title-slider-product-page">
        <div class="container">
            <h1>محصولات داغ امروز</h1>
        </div>


        <div class="slider-blogs">
            <?php
            if ($posts_in_slider->have_posts()) : ?>
                <div class="slider-blog">
                    <div class="swiper mySwiper" id="swiperSlideBlog">
                        <div class="swiper-wrapper">
                            <?php
                            while ($posts_in_slider->have_posts()) {
                                $posts_in_slider->the_post();
                                get_template_part('/templates/card/slider', 'component', ['title' => 'محصولات داغ امروز']);
                            }
                            ?>
                        </div>

                        <div class="container container-pagination">
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                </div>
            <?php
            endif;
            ?>
        </div>


    </div>
    <?php
    if ($product_in_product_page->have_posts()) : ?>
        <div class="container">
            <section>
                <div class="text-all-product">همه محصولات</div>




                <div class="product-content">
                    <?php
                    while ($product_in_product_page->have_posts()) {

                        $product_in_product_page->the_post();
                        get_template_part('/templates/card/card', 'product');
                    }

                    ?>
                </div>
                <?php
                echo "<div class='pagination-for-product border-gradient'>" . paginate_links(
                    array(
                        'total' => $product_in_product_page->max_num_pages,
                        'next_text' => __('<i class="next-or-prev"></i>'),
                        'prev_text' => __('<i class="next-or-prev"></i>'),
                        'prev_next' => false
                    )
                ) . "</div>";
                ?>
            </section>
        </div>
    <?php
    endif;
    ?>
</main>

<?php get_footer()  ?>