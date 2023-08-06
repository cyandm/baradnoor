<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head() ?>

</head>

<body>

	<header class="site-header">
		<div class="container desktop-header">
			<div class="header-content">
				<div class="desktop-menu">
					<?php wp_nav_menu(['theme_location' => 'header-menu']) ?>
				</div>

				<div class="container-logo-search">
					<div class="search-wrapper border-gradient">
						<input class="search" type="search" placeholder="جستجو" value="<?php the_search_query(); ?>" name="s" id="search" />
					</div>
					<div class="logo">
						<?php the_custom_logo() ?>
					</div>
				</div>
			</div>
		</div>



		<div class="mobile-header">
			<div class="background-do-search">
				<div class="do-search">
					<input type="search" placeholder="جستجو" class="do-search-mobile" value="<?php the_search_query(); ?>">
				</div>
			</div>

			<div class="menu-mobile">
				<div class="container-search-logo-mobile">
					<div class="logo-search-mobile"><?php the_custom_logo() ?></div>

					<div class="close-button-search"></div>
				</div>

				<div class="actived-menu">
					<?php wp_nav_menu(['theme_location' => 'header-menu']) ?>
				</div>


				<div class="social-network">
					<div class="eitaa"></div>
					<div class="telegram"></div>
					<div class="instagram"></div>
				</div>

			</div>
			<div class="mobile-container">

				<div class="hamburger-menu">
					<?php wp_nav_menu(['menu' => 'Header']) ?>
				</div>

				<div class="mobile-logo">
					<?php the_custom_logo() ?>
				</div>


				<div class="mobile-search">

				</div>
			</div>

		</div>
	</header>