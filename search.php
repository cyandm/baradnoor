<?php get_header(); ?>

<?php
global $wp_query;

?>

<main class="search container">

	<?php if ( have_posts() ) : ?>

		<h1>
			<?= 'نتیجه جستجو برای' . ' "' . $wp_query->query_vars['s'] . '"' ?>
		</h1>

		<section class="have-post">

			<?php
			while ( have_posts() ) {
				the_post();
				$postType = get_post_type();

				if ( $postType === 'post' ) {
					get_template_part( '/templates/card/card', 'blog' );
				}

				if ( $postType === 'product' ) {
					get_template_part( '/templates/card/card', 'product' );
				}
			}
			?>

		</section>

		<?php
		echo "<div class='pagination-for-search border-gradient'>" . paginate_links(
			array(
				'total' => $wp_query->max_num_pages,
				'next_text' => __( '<i class="next-or-prev"></i>' ),
				'prev_text' => __( '<i class="next-or-prev"></i>' ),
				'prev_next' => false
			)
		) . "</div>";
		?>

	<?php else : ?>

		<section class="not_found">
			<img src=<?= get_stylesheet_directory_uri() . '/imgs/not_found_search.svg' ?> alt="">
		</section>


	<?php endif; ?>

</main>

<?php get_footer(); ?>