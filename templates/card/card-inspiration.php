<?php
if ($args) {
    if ($args['card_type'] === '1') {

?>
        <div class="card-inspiration">
            <div class="image-inspiration-card">
                <a href="<?php echo get_the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
            </div>
        </div>
    <?php
    } else if ($args['card_type'] === '2') {
    ?>
        <div class="card-inspiration-two">
            <div class="image-inspiration-card">
                <a href="<?php echo get_the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
            </div>
            <div class="btn-inspiration-see-post"><a href="<?php echo get_the_permalink(); ?>">مشاهده</a></div>
        </div>
<?php
    }
}

?>