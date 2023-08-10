<?php

/*Template Name: Inspiration Page */ ?>

<?php

$all_cats = get_categories([
    'taxonomy' => 'inspiration-cat'
]);


?>


<?php get_header() ?>

<main class="container inspiration">

    <?php
    foreach ($all_cats as $index => $inspiration_term_object) {

        $inspiration_query = new WP_Query([
            'posts_per_page' => 4,
            'post_type' => 'inspiration',
            'tax_query' => [
                [
                    'taxonomy' => 'inspiration-cat',
                    'field' => 'term_id',
                    'terms' => $inspiration_term_object->term_id
                ]
            ]
        ]);

        printf('<h2>%s</h2>', $inspiration_term_object->name);


        echo '<div class="inspiration-cat-group">';

        while ($inspiration_query->have_posts()) {
            $inspiration_query->the_post();
            get_template_part('templates/card/card', 'inspiration', ['card_type' => '1']);
        }
        wp_reset_postdata();

        echo '</div>';
    }


    ?>

</main>
<?php get_footer() ?>