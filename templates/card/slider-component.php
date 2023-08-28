<div class="swiper-slide">
    <?= wp_get_attachment_image(get_post_thumbnail_id(), 'full', false, ['class' => 'feature-image']) ?>
    <div class="container content-of-slider">
        <div class="container-slider-info">
            <div class="title-slider"> <?php the_title() ?>
            </div>
            <div class="expert-slider"> <?php the_excerpt() ?></div>
            <div class="author-date-button-slider">
                <div class="author-date-container-slider">
                    <div class="author-slider"><?php the_author() ?></div>
                    <div class="date-slider"><?php the_date() ?></div>
                </div>
                <div class="button-post-card"><a href="<?php the_permalink() ?>">ادامه مقاله</a></div>
            </div>
        </div>
    </div>
</div>