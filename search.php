<?php get_header(); ?>

<?php

$search_query = get_search_query();

$query_args = [
	'post_type' => array("post", "product"),
	's' => $search_query,
	'posts_per_page' => 18
];
$query_result_searched = new WP_Query($query_args);

// echo '<pre dir="ltr">';
// var_dump($query_result_searched);
// echo '</pre>';

// wp_die();

?>

<main class="search container">

	<?php if ($query_result_searched->have_posts()) :	?>

		<h1>
			<?= 'نتیجه جستجو برای' . ' "' . get_search_query() . '"' ?>
		</h1>

		<section class="have-post">

			<?php
			while ($query_result_searched->have_posts()) : $query_result_searched->the_post();

				$postType = get_post_type();

				if ($postType === 'post') {
					get_template_part('/templates/card/card', 'blog');
				}

				if ($postType === 'product') {
					get_template_part('/templates/card/card', 'product');
				}
			endwhile;

			?>

		</section>

		<?php
		echo "<div class='pagination-for-search border-gradient'>" . paginate_links(
			array(
				'total' => $query_result_searched->max_num_pages,
				'next_text' => __('<i class="next-or-prev"></i>'),
				'prev_text' => __('<i class="next-or-prev"></i>'),
				'prev_next' => false
			)
		) . "</div>";
		?>

	<?php else : ?>

		<section class="not_found">
			<img src=<?= get_stylesheet_directory_uri() . '/assets/imgs/not_found_search.svg' ?> alt="not found">
		</section>


	<?php endif; ?>

</main>

<?php get_footer(); ?>