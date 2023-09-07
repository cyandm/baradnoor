<?php

/*Template Name: Inspiration Page */ ?>

<?php

$all_cats = get_categories([
    'taxonomy' => 'inspiration-cat'
]);

$inspiration_in_single = new WP_Query(
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

?>


<?php get_header() ?>

<main class="container inspiration">
    <?php
    if ($inspiration_in_single->have_posts()) : ?>
        <div class="title-inspiration-posts">جدیدترین ها</div>
        <div class="inspiration-content">
            <?php
            while ($inspiration_in_single->have_posts()) {

                $inspiration_in_single->the_post();
                get_template_part('/templates/card/card', 'inspiration', ['card_type' => '1']);
            }
            ?>
        </div>


    <?php
    endif;
    ?>

    <?php
    foreach ($all_cats as $index => $inspiration_term_object) {

        if ($inspiration_term_object->cat_name === 'جدیدترین ها') {
            continue;
        }


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


        printf('<div class="title-inspiration-posts">%s</div>', $inspiration_term_object->name);


        echo '<div class="inspiration-cat-group">';

        while ($inspiration_query->have_posts()) {
            $inspiration_query->the_post();
            get_template_part('templates/card/card', 'inspiration', ['card_type' => '2']);
        }
        wp_reset_postdata();

        echo '</div>';
    }


    ?>

</main>
<?php get_footer() ?>