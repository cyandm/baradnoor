<?php get_header() ?>

<?php
$author_name = get_the_author_meta('display_name', get_post_field('post_author', get_the_ID()));

$posts_in_home_page = new WP_Query(
    [
        'post_type' => 'post',
        'posts_per_page' => 4
    ]
);
?>
<main class="container">
    <div class="page-single-post">
        <div class="bread-crumb-single-blog">
            <span>

            </span>
            <span>

            </span>
        </div>

        <div class="single-post-content">
            <div class="container-search-favorite border-gradient">
                <div class="search-in-single-post border-gradient">
                    <input class="search-box-in-single-post" type="search" placeholder="جستجو در مقالات" />
                </div>
                <div class="favorite-blog">
                    <span> دنبال چی میگردی ؟</span>
                    <ul>
                        <?php wp_list_categories(
                            [
                                'orderby' => 'id',
                                'hide_empty' => false,
                                'title_li' => "",
                                'current_category'    => 0
                            ]
                        ) ?>
                    </ul>
                </div>
            </div>
            <div class="container-image-text">
                <div class="img-single-blog">
                    <?= wp_get_attachment_image(get_post_thumbnail_id(), 'full', false, ['class' => 'feature-image']) ?>
                </div>
                <div class="content-of-title-author-date-single-post">
                    <div class="title-single-blog"><?= get_the_title() ?></div>
                    <div class="author-single-blog"><?= $author_name ?></div>
                    <div class="date-single-blog"><?= get_the_date() ?></div>
                </div>
                <div class="expert-single-blog">
                    <?= get_the_content() ?>
                </div>
                <div>
                    <?php wp_list_comments() ?>
                </div>
            </div>
        </div>
    </div>
</main>




<?php get_footer() ?>