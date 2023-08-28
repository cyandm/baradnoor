<div class="swiper-slide slide-product">
    <div class="container-slider-image">

        <div class="container-image-slider-product">
            <?= wp_get_attachment_image(get_post_thumbnail_id(), 'full', false, ['class' => 'feature-image']) ?>
        </div>

        <div class="container">
            <div class="content-of-silder-info">
                <div class="container-title-expert-author-date-button">
                    <div class="title-slider"> <?php the_title() ?></div>
                    <div class="expert-slider"> <?php the_excerpt() ?></div>
                    <div class="button-slider">
                        <div class="button-post-card"><a href="<?php the_permalink() ?>">مشاهده محصولات</a></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>