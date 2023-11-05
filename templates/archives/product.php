<?php get_header() ?>

<main class="product-archive container">
	<?php
	if ( have_posts() ) : ?>
		<section class="posts-loop-con">
			<?php while ( have_posts() ) :
				the_post();
				get_template_part( "templates/card/card", "product" );
			endwhile; ?>
		</section>
		<div class='cyn-pagination border-gradient'>
			<?= paginate_links(
				[ 
					'total' => $wp_query->max_num_pages,
					'next_text' => __( '<i class="next-or-prev"></i>' ),
					'prev_text' => __( '<i class="next-or-prev"></i>' ),
					'prev_next' => false
				]
			);
			?>
		</div>



	<?php else :
		echo 'not found';
	endif;
	?>
</main>

<?php get_footer() ?>