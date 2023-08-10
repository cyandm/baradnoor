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
    }
}

?>