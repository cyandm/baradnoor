<?php get_header() ?>

<?php
$author_name = get_the_author_meta('display_name', get_post_field('post_author', get_the_ID()));

$current_post_cats_id = [];
foreach (get_the_category() as $cat) {
    array_push($current_post_cats_id, $cat->term_id);
}

$favorite_blog = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => 2,
    'category__in' => $current_post_cats_id,
    'post__not_in' => [get_the_ID()],
]);

?>
<main class="container">
    <div class="page-single-post">
        <div class="bread-crumb-single-blog">
            <span><a href="#">مقالات</a></span>
            <span> > </span>
            <span> <?php the_title() ?> </span>

        </div>

        <div class="single-post-content">
            <div class="container-search-category-favorite-blog">
                <div class="container-search-category border-gradient">
                    <div class="search-in-single-post border-gradient">
                        <input class="search-box-in-single-post" type="search" placeholder="جستجو در مقالات" />
                    </div>
                    <div class="category-blog">
                        <span> دنبال چی میگردی ؟</span>
                        <ul>
                            <?php wp_list_categories(
                                [
                                    'orderby' => 'id',
                                    'hide_empty' => false,
                                    'title_li' => "",
                                    'current_category'    => 1
                                ]
                            ) ?>
                        </ul>
                    </div>


                </div>

                <?php
                if ($favorite_blog->have_posts()) : ?>
                    <div class="favorite-blog">
                        <span class="may-you-like">شاید بپسندید</span>
                        <div class="posts-content">

                            <?php
                            while ($favorite_blog->have_posts()) {
                                $favorite_blog->the_post();

                                get_template_part('/templates/card/card', 'blog');
                            }
                            ?>
                        </div>

                        <?php wp_reset_postdata() ?>
                    </div>

                <?php endif; ?>


            </div>
            <div class="container-image-text">
                <div class="img-single-blog">
                    <?= wp_get_attachment_image(get_post_thumbnail_id(), 'full', false, ['class' => 'feature-image']) ?>
                </div>
                <div class="content-of-title-author-date-single-post">
                    <div class="title-single-blog"><?= get_the_title() ?></div>
                    <div class="author-and-date-single-post">
                        <div class="author-single-blog"><?= $author_name ?></div>
                        <div class="date-single-blog"><?= get_the_date() ?></div>
                    </div>
                </div>
                <div class="expert-single-blog">
                    <?= get_the_content() ?>
                </div>
                <div class="count-of-comment-text-and-button-comment-single-post">
                    <div class="count-of-comment-and-text">
                        <div><span><?php echo get_comments_number() ?> دیدگاه </span></div>
                        <span>شما هم توی این بحث شرکت کنید</span>
                    </div>
                    <div class="button-send-comment button-post-card"><a href="#"> ارسال دیدگاه</a></div>
                </div>
                <div>
                    <!-- comment section -->
                </div>
            </div>
        </div>
    </div>
</main>




<?php get_footer() ?>