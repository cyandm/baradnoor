<?php

isset($args['product_id']) ? $product_id = $args['product_id'] : $product_id = get_the_ID();
?>

<div class="card-product border-gradient">
    <div class="image-product-card">
        <a href="<?php echo get_the_permalink($product_id); ?>"><?php echo get_the_post_thumbnail($product_id); ?></a>
    </div>
    <div class="container-title-code-button-product">
        <div class="title-product-card">
            <?php echo get_the_title($product_id); ?>
        </div>
        <div class="code-product-card">
            کد کالا :
            <?php echo get_the_excerpt($product_id); ?>
        </div>

        <div class="button-product-card-container button-post-card">
            <a href="<?php echo get_the_permalink($product_id); ?>" class="button-product-card">مشاهده محصول</a>
        </div>
    </div>
</div>