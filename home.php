<?php get_header() ?>

    <?php 
    $posts_in_home_page = new WP_Query(
        [
            'post_type' => 'post',
            'posts_per_page' => 4
        ]
    );
    ?>
    <main class="container">
        <section class="posts-content">

                <?php 
                    if($posts_in_home_page->have_posts()) {

                        while($posts_in_home_page->have_posts()) {

                            $posts_in_home_page->the_post();
                           get_template_part('/templates/card/card' , 'blog');

                        }

                    }
                ?>

        </section>
    </main>
    



<?php get_footer()?>