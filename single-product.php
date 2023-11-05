<?php get_header();

$phone_number = get_field( 'telephone_number' );

$worked_inspiration = get_field( 'inspiration_object' );

$favourite_products = get_field( 'product_object' );

$technical_info_property = get_field_object( 'technical_info_property_group' );
$technical_info_property_subfields = isset( $technical_info_property['sub_fields'] ) ? $technical_info_property['sub_fields'] : [];
$technical_info_property_value = isset( $technical_info_property['value'] ) ? $technical_info_property['value'] : [];

$product_id = get_queried_object_id();
$images_slider = get_field( 'images_slider_group', $product_id );

$group = acf_get_fields( 'images_slider_group' );


function swiper_slider( $images_slider ) {
	if ( is_array( $images_slider ) ) :
		foreach ( $images_slider as $slider_image ) :
			if ( ( $slider_image != null ) && ! empty( $slider_image ) ) : ?>
				<div class="swiper-slide">
					<?= wp_get_attachment_image( $slider_image, 'full', false, [ 'class' => 'feature-image' ] ) ?>
				</div>
			<?php endif;
		endforeach;
	endif;
}
?>
<main class="single-product-page">
	<div class="bread-crumb-single-product container">
		<span><a href="<?= site_url() . '/محصولات/' ?>">محصولات</a></span>
		<span> > </span>
		<span>
			<?php the_title() ?>
		</span>
	</div>


	<div class="single-product-info container">
		<div class="title-slider-container-product">
			<h2>
				<?php the_title() ?>
			</h2>
			<div class="slider">
				<div class="border-gradient-orange container-border">
					<div class="swiper swiper2-single-product">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								<?= wp_get_attachment_image( get_post_thumbnail_id(), 'full', false, [ 'class' => 'feature-image' ] ) ?>
							</div>

							<?php swiper_slider( $images_slider ); ?>
						</div>
						<div class="swiper-button-next"></div>
						<div class="swiper-button-prev"></div>
					</div>
				</div>

				<?php if ( is_array( $images_slider ) && ! empty( $slider_image ) ) : ?>

					<div>
						<div thumbsSlider="" class="swiper swiper1-single-product">
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									<?= wp_get_attachment_image( get_post_thumbnail_id(), 'full', false, [ 'class' => 'feature-image' ] ) ?>
								</div>
								<?php swiper_slider( $images_slider ); ?>

							</div>
						</div>
					</div>

				<?php endif; ?>

			</div>

		</div>
		<div class="technical-specifications-of-product border-gradient">
			<div class="title-technical-info">مشخصات فنی محصول</div>
			<div class="container-values-properties">

				<?php if ( $technical_info_property !== false ) : ?>

					<?php for ( $i = 0; $i < count( $technical_info_property_subfields ); $i++ ) : ?>
						<?php
						$currentField = $technical_info_property_subfields[ $i ];
						$currentValue = $technical_info_property_value[ $currentField['name'] ];
						?>

						<?php if ( isset( $currentValue ) && ! empty( $currentValue ) ) : ?>
							<div class="container-technical-info-and-value">
								<div class="name-property">
									<?= $currentField['label'] ?>
								</div>
								<div class="value-property">
									<?= $currentValue ?>
								</div>
							</div>
						<?php endif; ?>
					<?php endfor; ?>
				<?php endif ?>

			</div>
		</div>
	</div>

	<div class="container-icons-single-product container">
		<div class="icons-right">
			<div class="icon-container">
				<img src=" <?php echo get_stylesheet_directory_uri() . '/assets/imgs/iran.svg' ?>" alt="iran-icon">
				<p>ساخت ایران</p>
			</div>
			<div class="icon-container">
				<img src=" <?php echo get_stylesheet_directory_uri() . '/assets/imgs/18 guarantee.svg' ?>"
					alt="iran-icon">
				<p>18 ماه گارانتی</p>
			</div>
			<div class="icon-container">
				<img src=" <?php echo get_stylesheet_directory_uri() . '/assets/imgs/eye.svg' ?>" alt="iran-icon">
				<p>بدون سوسو زدن</p>
			</div>
		</div>
		<div class="icons-left">
			<div>
				<img src=" <?php echo get_stylesheet_directory_uri() . '/assets/imgs/eye2.svg' ?>" alt="iran-icon">
			</div>
			<div>
				<img src=" <?php echo get_stylesheet_directory_uri() . '/assets/imgs/standard.svg' ?>" alt="iran-icon">
			</div>
			<div>
				<img src=" <?php echo get_stylesheet_directory_uri() . '/assets/imgs/iso.svg' ?>" alt="iran-icon">
			</div>
		</div>
	</div>
	<div class="container-call-info-product">
		<div class="container text-phone-call">
			<p class="text-more-info">برای اطلاعات بیشتر واطلاع از قیمت تماس بگیرید</p>
			<div class="button-post-card button-more-info"><a href='tel:"<?php echo $phone_number ?>" '>تماس بگیرید</a>
			</div>
		</div>
	</div>

	<div class="container">
		<?php
		if ( $worked_inspiration != null ) : ?>
			<div class="worked-examples-inspiration">
				<span class="worked-examples-title">نمونه های کار شده</span>
				<div class="inspiration-worked-content">
					<?php
					foreach ( $worked_inspiration as $index => $worked_inspiration_id )
						get_template_part( '/templates/card/card', 'inspiration', [ 'card_type' => '2', 'post_id' => $worked_inspiration_id ] );
					?>
				</div>
			</div>

		<?php endif; ?>

		<?php
		if ( $favourite_products != null ) : ?>
			<div class="favourire-product-for-inspiration">
				<span>شاید بپسندید</span>
				<div class="favourire-product-for-inspiration-content">
					<?php
					foreach ( $favourite_products as $index => $favourite_products_id )
						get_template_part( '/templates/card/card', 'product', [ 'product_id' => $favourite_products_id ] );
					?>
				</div>
			</div>
		<?php endif; ?>


	</div>
</main>


<?php get_footer() ?>