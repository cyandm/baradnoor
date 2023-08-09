<div class="card-product border-gradient">
    <div class="image-product-card">
        <?php the_post_thumbnail(); ?>
    </div>
    <div class="title-product-card">
        <?php the_title(); ?>
    </div>
    <div class="code-product-card">
        کد کالا :
        <?php the_excerpt(); ?>
    </div>

    <div class="button-product-card-container button-post-card">
        <a href="<?php the_permalink(); ?>" class="button-product-card">مشاهده محصول</a>
        <i class=""></i>
    </div>
</div>