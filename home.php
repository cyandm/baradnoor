<?php get_header() ?>

    <?php 
    $posts_in_home_page = new WP_Query(
        [
            'post_type' => 'post',
            'posts_per_page' => 3
        ]
    );
    ?>
    <main class="container">
        <section class="posts-content">

                <?php 
                    if($posts_in_home_page->have_posts()) :

                        while($posts_in_home_page->have_posts()) :

                            $posts_in_home_page->the_post();
                            ?>

                                <div class="card-post">
                                    <div class="image-post-card">
                                        <?php the_post_thumbnail(); ?>
                                    </div>

                                    <div class="title-post-card">
                                        <?php the_title();?>
                                    </div>
                                    <div>
                                        <div class="author-post-card">
                                            <?php the_author(); ?>
                                        </div>

                                        <div class="date-post-card">
                                            <?php the_date();?>
                                        </div>

                                        <div class="button-post-card">
                                            <a>salam</a>
                                        </div>
                                    </div>
                                    <br>
                                </div>



                            <?php 

                        endwhile;

                    endif;
                ?>

        </section>
    </main>
    



<?php get_footer()?>