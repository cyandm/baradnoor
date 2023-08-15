<?php


isset($args['post_id']) ? $post_id = $args['post_id'] : $post_id = get_the_ID();



if ($args) {
    if ($args['card_type'] === '1') {

?>
        <div class="card-inspiration">
            <div class="image-inspiration-card">
                <a href="<?php echo get_the_permalink($post_id); ?>"> <?= wp_get_attachment_image(get_post_thumbnail_id($post_id, 'thumbnail'), 'full', false, ['class' => 'feature-image']) ?>
                </a>
            </div>
        </div>
    <?php
    } else if ($args['card_type'] === '2') {
    ?>
        <div class="card-inspiration-two">
            <div class="image-inspiration-card">
                <a href="<?php echo get_the_permalink($post_id); ?>"><?= get_the_post_thumbnail($post_id, 'thumbnail'); ?></a>
            </div>
            <div class="btn-inspiration-see-post"><a href="<?php echo get_the_permalink($post_id); ?>">مشاهده</a></div>
        </div>
<?php
    }
}

?>