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
?>
<main class="container home">
    <?php
    if ($inspiration_in_home_page->have_posts()) : ?>
        <section>
            <div class="container-blog-and-news-button-see-all">
                <div class="blog-text">نورپردازی</div>
                <div class="see-all-button"><a href="#">مشاهده همه </a></div>

            </div>
            <div class="inspiration-content">
                <?php
                while ($inspiration_in_home_page->have_posts()) {

                    $inspiration_in_home_page->the_post();
                    get_template_part('/templates/card/card', 'inspiration');
                }

                ?>
            </div>
        </section>
    <?php
    endif;
    ?>

    <section>
        <div class="image-light">

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
                <div class="see-all-button"><a href="#">مشاهده همه </a></div>
            </div>
            <div class="posts-content">
                <?php
                while ($posts_in_home_page->have_posts()) {

                    $posts_in_home_page->the_post();
                    get_template_part('/templates/card/card', 'blog');
                }

                ?>
            </div>
        </section>
    <?php
    endif;

    ?>

</main>




<?php get_footer() ?>