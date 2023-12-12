<?php

/*Template Name: Contact-us Page */ ?>

<?php get_header(); ?>
<main class="contact-us-page">

	<div class="container">
		<div class="contact-us">

			<div class="contact-us-content">
				<div class="contact-us-text">با ما در ارتباط باشید</div>
				<div class="question-text">چه چیزی هست که میخوای با ما در میون بذاری ؟</div>
				<form id="contact-us-form">
					<div class="container-border border-gradient">
						<i class="icon-comment"></i>
						<textarea rows="5" class="text-area-contact-us data" name="email-message" placeholder="اینجا بنویس" required></textarea>
					</div>
					<div class="container-border border-gradient">
						<i class="icon-user"></i>
						<input type="text" name="user-name" placeholder="نام شما" class="border-gradient data" required />
					</div>
					<div class="container-border border-gradient">
						<i class="icon-email"></i>
						<input class="data" type="email" name="email" placeholder="ایمیل شما" required />
					</div>
					<button type="submit" id="contact-us-form-submit" class="btn-contact-us"><i class="icon-send"></i>ارسال درخواست</button>
				</form>
			</div>
		</div>
		<div class="image-light-contact-us">
			<img src="<?php echo get_stylesheet_directory_uri() . '/assets/imgs/contact-us.svg' ?>" />

		</div>
	</div>
</main>
<?php get_footer(); ?>