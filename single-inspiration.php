<?php get_header() ?>


<main class="container single-inspiration">

    <div class="page-single-inspiration">
        <div class="bread-crumb-single-inspiration">
            <span><a href="#">برای ایده</a></span>
            <span> > </span>
            <span> <?php the_title() ?> </span>
        </div>

        <div class="container-image-text-inspiration">
            <div class="img-single-inspiration">
                <?= wp_get_attachment_image(get_post_thumbnail_id(), 'full', false, ['class' => 'feature-image']) ?>
            </div>
            <div class="content-of-title-single-inspiration">
                <div class="title-single-inspiration"><?= get_the_title() ?></div>
                <div class="expert-single-inspiration">
                    <?= get_the_content() ?>
                </div>
            </div>


        </div>
    </div>


</main>
<?php get_footer() ?>