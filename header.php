<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head() ?>

</head>
<?php
$pageID = get_option( 'page_on_front' );
$url_instagram = get_field( 'url_instagram', $pageID );
$url_telegram = get_field( 'url_telegram', $pageID );
$url_ita = get_field( 'url_ita', $pageID );
?>

<body>

	<header class="site-header">
		<div class="container desktop-header">
			<div class="header-content">
				<div class="desktop-menu">
					<?php wp_nav_menu( [ 'theme_location' => 'header-menu' ] ) ?>
				</div>

				<div class="container-logo-search">
					<div class="search-wrapper border-gradient">
						<i class="icon-search"></i>
						<form action="/">
							<input class="search" type="search" placeholder="جستجو"
								value="<?php the_search_query(); ?>" name="s" id="search" />
						</form>
					</div>
					<div class="logo">
						<?php the_custom_logo() ?>
					</div>
				</div>
			</div>
		</div>



		<div class="mobile-header">
			<div class="background-do-search">
				<div class="do-search border-gradient-solid-white">
					<div class="container-search-box-icon-search">
						<i class="icon-search"></i>
						<input type="search" placeholder="جستجو" class="do-search-mobile"
							value="<?php the_search_query(); ?>">
					</div>
					<i class="icon-close button-close-search-header"></i>
				</div>
			</div>

			<div class="menu-mobile">
				<div class="container-search-logo-mobile">
					<div class="logo-search-mobile">
						<?php the_custom_logo() ?>
					</div>
					<div class="close-button-search"><i class="icon-close"></i></div>
				</div>

				<div class="actived-menu">
					<?php wp_nav_menu( [ 'theme_location' => 'header-menu' ] ) ?>
				</div>


				<div class="social-network">
					<div class="eitaa border-gradient"><a href="<?php echo $url_ita ?>"><i class="icon-ita"></i></a>
					</div>
					<div class="telegram border-gradient"><a href="<?php echo $url_telegram ?>"><i
								class="icon-telegram"></i></a></div>
					<div class="instagram border-gradient"><a href="<?php echo $url_instagram ?>"><i
								class="icon-insta"></i></a></div>
				</div>

			</div>
			<div class="mobile-container">
				<div class="hamburger-menu">
					<i class="icon-hamburger-menu"></i>
					<?php wp_nav_menu( [ 'menu' => 'Header' ] ) ?>
				</div>
				<div class="mobile-logo">
					<?php the_custom_logo() ?>
				</div>
				<div class="mobile-search">
					<i class="icon-search"></i>
				</div>
			</div>

		</div>
	</header>