<div class="card-post border-gradient">
    <div class="image-post-card">
        <?php the_post_thumbnail(); ?>
    </div>
    <div class="container-title-expert-author-date-button">
        <div class="title-post-card">
            <?php the_title(); ?>
        </div>

        <div class="expert-post-card">
            <?php the_excerpt(); ?>
        </div>
        <div class="author-date-button-postcard-container">
            <div class="author-date-sction">
                <div class="author-post-card">
                    <?php the_author(); ?>
                </div>

                <div class="date-post-card">
                    <?php the_date(); ?>
                </div>
            </div>
            <div class="button-post-card-container">
                <a href="<?= get_the_permalink(); ?>" class="button-post-card">ادامه مقاله</a>
            </div>
        </div>
    </div>
</div>