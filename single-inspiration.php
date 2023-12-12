<?php get_header() ?>

<?php


$worked_inspiration = get_field('inspiration_object');

$related_products = get_field('product_object');

$inspiration_link_template = [
    'post_type' => 'page',
    'fields' => 'ids',
    'nopaging' => true,
    'meta_key' => '_wp_page_template',
    'meta_value' => 'templates/inspiration.php'
];
$page_inspiration = get_posts($inspiration_link_template);

?>


<main class="container single-inspiration">
    <div class="page-single-inspiration">
        <div class="bread-crumb-single-inspiration">
            <span><a href="<?= get_permalink($page_inspiration[0]); ?>">برای ایده</a></span>
            <span> > </span>
            <span> <?php the_title() ?> </span>
        </div>

        <div class="container-image-title-text-inspiration">
            <div class="img-single-inspiration">
                <?= wp_get_attachment_image(get_post_thumbnail_id(), 'full', false, ['class' => 'feature-image']) ?>
            </div>
            <div class="content-of-title-text-single-inspiration">
                <div class="title-single-inspiration"><?= get_the_title() ?></div>
                <div class="expert-single-inspiration"><?= get_the_content() ?></div>
            </div>
        </div>



        <?php
        if ($worked_inspiration != null) : ?>
            <div class="worked-examples-inspiration">
                <span class="worked-examples-title">نمونه های کار شده</span>
                <div class="inspiration-worked-content">
                    <?php foreach ($worked_inspiration as $index => $worked_inspiration_id) {
                        get_template_part('/templates/card/card', 'inspiration', ['card_type' => '2', 'post_id' => $worked_inspiration_id]);
                    }
                    ?>
                </div>
            </div>

        <?php endif; ?>

        <?php
        if ($related_products != null) : ?>
            <div class="related-product-for-inspiration">
                <span>محصولات مرتبط</span>
                <div class="related-product-for-inspiration-content">
                    <?php foreach ($related_products as $index => $related_products_id) {
                        get_template_part('/templates/card/card', 'product', ['product_id' => $related_products_id]);
                    }
                    ?>
                </div>
            </div>
        <?php endif; ?>

    </div>
</main>
<?php get_footer() ?>