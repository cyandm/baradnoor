<?php

/*Template Name: Blog Page */
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$posts_in_blog_page = new WP_Query(
	[
		'post_type' => 'post',
		'posts_per_page' => 18,
		'orderby' => 'id',
		'paged' => $paged

	]
);
$posts_in_slider = new WP_Query(
	[
		'post_type' => 'post',
		'posts_per_page' => 3

	]
);


?>



<?php

class Walker_custom_CategoryDropdown extends Walker_CategoryDropdown
{

	public function start_el(&$output, $category, $depth = 0, $args = array(), $id = 0)
	{
		$pad = str_repeat('&nbsp;', $depth * 3);

		/** This filter is documented in wp-includes/category-template.php */
		$cat_name = apply_filters('list_cats', $category->name, $category);

		if (isset($args['value_field']) && isset($category->{$args['value_field']})) {
			$value_field = $args['value_field'];
		} else {
			$value_field = 'term_id';
		}

		$output .= "\t<option class=\"level-$depth\" value=\"" . esc_attr($category->{$value_field}) . "\"";

		// Type-juggling causes false matches, so we force everything to a string.
		if ((string) $category->{$value_field} === (string) $args['selected'])
			$output .= ' selected="selected"';

		$output .= ' data-uri="' . get_term_link($category) . '" '; /* Custom */

		$output .= '>';
		$output .= $pad . $cat_name;
		if ($args['show_count'])
			$output .= '&nbsp;&nbsp;(' . number_format_i18n($category->count) . ')';
		$output .= "</option>\n";
	}
}
?>

<?php get_header() ?>

<main class="blog-page">
	<div class="blog-page-content">

		<div class="slider-blogs">
			<?php
			if ($posts_in_slider->have_posts()) : ?>
				<div class="slider-blog">
					<div class="swiper mySwiper" id="swiperSlideBlog">
						<div class="swiper-wrapper">
							<?php
							while ($posts_in_slider->have_posts()) {
								$posts_in_slider->the_post();
								get_template_part('/templates/card/slider', 'component');
							}
							?>
						</div>
						<div class="container container-pagination">
							<div class="swiper-pagination"></div>
						</div>
					</div>
				</div>
			<?php
			endif;
			?>
		</div>


		<div class="title-category-search-container not-in-mobile-show">
			<div class="title-and-category-container">
				<div class="category-title">دنبال چی میگردی ؟</div>
				<div class="category-blog-container">
					<ul>
						<?php wp_list_categories(
							[
								'orderby' => 'id',
								'hide_empty' => false,
								'title_li' => "",
								'current_category' => 1

							]
						) ?>

					</ul>
				</div>
			</div>
		</div>

		<div class="title-category-search-container-mobile not-in-desktop-show">
			<div class="title-and-category-container-mobile">
				<div class="category-title-mobile">دنبال چی میگردی ؟</div>
				<div class="category-blog-container-mobile border-gradient">
					<?php wp_dropdown_categories(
						[
							'orderby' => 'id',
							'hide_empty' => false,
							'title_li' => "",
							'current_category' => 0,
							'walker' => new Walker_custom_CategoryDropdown
						]
					); ?>


				</div>
			</div>
		</div>

		<?php
		if ($posts_in_blog_page->have_posts()) : ?>
			<div class="container blog-group-content">
				<h2>همه مقالات</h2>
				<div class="container-blog-card-group">
					<div class="posts-content">
						<?php
						while ($posts_in_blog_page->have_posts()) {

							$posts_in_blog_page->the_post();
							get_template_part('/templates/card/card', 'blog');
						}

						?>
					</div>
					<?php
					if ($posts_in_blog_page->found_posts > 18) {
						echo "<div class='pagination-for-blog cyn-pagination border-gradient'>" . paginate_links(
							array(
								'total' => $posts_in_blog_page->max_num_pages,
								'next_text' => __('<i class="next-or-prev"></i>'),
								'prev_text' => __('<i class="next-or-prev"></i>'),
								'prev_next' => false
							)
						) . "</div>";
					}
					?>

				</div>
			</div>
		<?php
		endif;

		?>


	</div>
</main>


<?php get_footer() ?>