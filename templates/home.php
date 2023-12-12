<?php

/*Template Name: Home Page */ ?>

<?php
$i = 0;
$j = 0;


$telephone_num = get_field('telephone_number');
$posts_in_home_page = new WP_Query(
	[
		'post_type' => 'post',
		'posts_per_page' => 4
	]
);
$inspiration_in_home_page = new WP_Query(
	[
		'post_type' => 'inspiration',
		'posts_per_page' => 4,
		'tax_query' => [
			[
				'taxonomy' => 'inspiration-cat',
				'field' => 'slug',
				'terms' => 'جدیدترین-ها'
			]
		]
	]
);
$faq_in_home_page = new WP_Query(
	[
		'post_type' => 'faq',
		'posts_per_page' => 5,
		'tax_query' => [
			[
				'taxonomy' => 'faq-cat',
				'field' => 'slug',
				'terms' => 'سوالات-کلی'
			]
		]
	]
);
$faq_in_home_page_two = new WP_Query(
	[
		'post_type' => 'faq',
		'posts_per_page' => 5,
		'tax_query' => [
			[
				'taxonomy' => 'faq-cat',
				'field' => 'slug',
				'terms' => 'سوالات-فنی-تر'
			]
		]
	]
);

$inspiration_link_template = [
	'post_type' => 'page',
	'fields' => 'ids',
	'nopaging' => true,
	'meta_key' => '_wp_page_template',
	'meta_value' => 'templates/inspiration.php'
];
$page_inspiration = get_posts($inspiration_link_template);
$product_link_template = [
	'post_type' => 'page',
	'fields' => 'ids',
	'nopaging' => true,
	'meta_key' => '_wp_page_template',
	'meta_value' => 'templates/product.php'
];
$page_product = get_posts($product_link_template);
$blog_link_template = [
	'post_type' => 'page',
	'fields' => 'ids',
	'nopaging' => true,
	'meta_key' => '_wp_page_template',
	'meta_value' => 'templates/blog.php'
];
$page_blog = get_posts($blog_link_template);

$banners = get_field('gallery');


?>


<?php get_header() ?>


<?php if (!isset($_COOKIE['preloader'])) : ?>

	<div class="preloader">
		<div class="preloader-image"></div>
		<div class="preloader_lamps">
			<div class="preloader_lamps_item"></div>
			<div class="preloader_lamps_item"></div>
			<div class="preloader_lamps_item"></div>
			<div class="preloader_lamps_item"></div>
			<div class="preloader_lamps_item"></div>
		</div>
		<div class="preloader_title_group">
			<span class="preloader_title"></span>
			<span class="preloader_title"></span>
		</div>
	</div>

	<div class="home_first_slide active" id="home_first_slide">

		<div class="bg_fixer">

		</div>

		<div>
			<h1>حس خوب روشنایی</h1>

			<div class="scroll_down">
				<span>...&nbsp&nbsp&nbsp&nbsp برو پایین</span>
				<i class=" "></i>
			</div>
		</div>

		<span class="cursor"></span>
	</div>

<?php endif; ?>

<main class="container home">

	<section>
		<div class="show-all-product-home-page on-mobile-show border-gradient-orange"><a href="#productsHomePage"><i class="icon-arrow1"></i>مشاهده محصولات</a>
		</div>
	</section>

	<?php if ($inspiration_in_home_page->have_posts()) : ?>
		<section>
			<div class="container-blog-and-news-button-see-all">
				<div class="blog-text">نورپردازی</div>
				<div class="see-all-button only-desktop "><a href="<?php echo get_permalink($page_inspiration[0]); ?>">مشاهده همه </a></div>

			</div>
			<div class="inspiration-content">
				<?php
				while ($inspiration_in_home_page->have_posts()) {

					$inspiration_in_home_page->the_post();
					get_template_part('/templates/card/card', 'inspiration', ['card_type' => '1']);
				}

				?>
			</div>

			<div class="button-show-all-mobile on-mobile-show">
				<a href="<?php echo get_permalink($page_inspiration[0]); ?>">مشاهده همه</a>
			</div>
		</section>
	<?php endif; ?>


	<section class="archive-products-banner" id="productsHomePage">
		<div class="container-blog-and-news-button-see-all">
			<div class="blog-text">محصولات باراد نور</div>
			<div class="see-all-button only-desktop">
				<a href=<?= get_permalink($page_product[0]) ?>>مشاهده همه</a>
			</div>
		</div>

		<div class="banners">
			<?php foreach ($banners as $banner_item) : ?>
				<a href=<?= $banner_item['url'] ?>>
					<div class="img-wrapper">
						<?= wp_get_attachment_image($banner_item['img'], 'full') ?>
					</div>
				</a>
			<?php endforeach; ?>
		</div>

		<div class="button-show-all-mobile on-mobile-show">
			<a href="<?php echo get_permalink($page_product[0]); ?>">مشاهده همه</a>
		</div>
	</section>


	<section class="image-light-top">
		<div class="image-light on-mobile-show">

			<img src="<?php echo get_stylesheet_directory_uri() . '/assets/imgs/image-light-home.png' ?>" alt="light">

			<img src="<?php echo get_stylesheet_directory_uri() . '/assets/imgs/image-light-home.png' ?>" alt="light">
		</div>

	</section>

	<section class="image-light-top">
		<div class="image-light only-desktop ">

			<img src="<?php echo get_stylesheet_directory_uri() . '/assets/imgs/image-light-home.png' ?>" alt="light">

			<img src="<?php echo get_stylesheet_directory_uri() . '/assets/imgs/image-light-home.png' ?>" alt="light">

			<img src="<?php echo get_stylesheet_directory_uri() . '/assets/imgs/image-light-home.png' ?>" alt="light">

			<img src="<?php echo get_stylesheet_directory_uri() . '/assets/imgs/image-light-home.png' ?>" alt="light">

			<img src="<?php echo get_stylesheet_directory_uri() . '/assets/imgs/image-light-home.png' ?>" alt="light">
		</div>

	</section>

	<?php if ($posts_in_home_page->have_posts()) : ?>
		<section>
			<div class="container-blog-and-news-button-see-all">
				<div class="blog-text">اخبار و مقالات</div>
				<div class="see-all-button only-desktop "><a href="<?php echo get_permalink($page_blog[0]); ?>">مشاهده همه
					</a></div>
			</div>
			<div class="posts-content">
				<?php
				while ($posts_in_home_page->have_posts()) {

					$posts_in_home_page->the_post();
					get_template_part('/templates/card/card', 'blog');
				}

				?>
			</div>
			<div class="button-show-all-mobile on-mobile-show">
				<a href="<?php echo get_permalink($page_blog[0]); ?>">مشاهده همه</a>
			</div>
		</section>
	<?php endif; ?>

	<?php if ($faq_in_home_page->have_posts() || $faq_in_home_page_two->have_posts()) : ?>
		<section>
			<div class="container-blog-and-news-button-see-all">
				<div class="blog-text">سوالات متداول</div>
				<div class="see-all-button only-desktop "><a href="tel: <?= $telephone_num ?>">تماس با ما </a></div>
			</div>
			<div class="container-cat-faq only-desktop">
				<div class="category-faq border-gradient">
					<?php

					$cats = get_categories([
						'taxonomy' => 'faq-cat',
						'orderby' => 'id',
						'hide_empty' => false,
					]);

					foreach ($cats as $cat) {
						$i = $i + 1;
						echo "<div data-tab='$i' class='cat-faq ";
						if ($i === 1)
							echo 'current-cat';
						echo " ' >$cat->name</div>";
					}
					?>
				</div>
			</div>
			<div class="container-cat-faq border-gradient on-mobile-show drop-down-cat">
				<?php wp_dropdown_categories(
					[
						'taxonomy' => 'faq-cat',
						'orderby' => 'id',
						'hide_empty' => false,
						'title_li' => "",
						'value_field' => 'term_id'

					]
				) ?>
			</div>

			<div class="faq-content show" data-tab='1' data-tabid="<?php echo $cats[0]->term_id ?>">
				<?php if ($faq_in_home_page->have_posts()) : ?>
					<?php
					while ($faq_in_home_page->have_posts()) {

						$faq_in_home_page->the_post();
						get_template_part('/templates/card/card', 'faq');
					}


				else : ?>
					<div class="not-found-category-product-in-home">
						<div> در این دسته بندی فعلا سوالی وجود ندارد</div>
						<img src="<?php echo get_stylesheet_directory_uri() . '/assets/imgs/not found category.svg' ?>">
					</div>
				<?php endif; ?>
			</div>
			<div class="faq-content" data-tab='2' data-tabid="<?php echo $cats[1]->term_id ?>">
				<?php if ($faq_in_home_page_two->have_posts()) :

					while ($faq_in_home_page_two->have_posts()) {

						$faq_in_home_page_two->the_post();
						get_template_part('/templates/card/card', 'faq');
					}
				else : ?>
					<div class="not-found-category-product-in-home">
						<div> در این دسته بندی فعلا سوالی وجود ندارد</div>
						<img src="<?php echo get_stylesheet_directory_uri() . '/assets/imgs/not found category.svg' ?>">
					</div>
				<?php endif; ?>
			</div>

			<div class=" button-show-all-mobile on-mobile-show">
				<a href="tel: <?= $telephone_num ?>">تماس با ما</a>
			</div>
		</section>
	<?php endif; ?>


</main>

<?php get_footer() ?>