<?php get_header(); ?>
<main class="container page-notfound">
	<section>
		<div class="not-found-content">
			<div class="text-and-image-not-found">
				<img src="<?= get_stylesheet_directory_uri() ?>/assets/imgs/404-image.svg" alt="404">
				<div class="text-not-found">صفحه مورد نظر شما یافت نشد</div>
			</div>
			<img src="<?= get_stylesheet_directory_uri() ?>/assets/imgs/404.svg" alt="404" class="image-404">
			<div class="button-post-card btn-404"><a href="/">بازگشت به صفحه اصلی</a></div>
		</div>
	</section>
</main>
<?php get_footer(); ?>