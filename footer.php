<?php
$pageID = get_option( 'page_on_front' );
$telephone_num = get_field( 'telephone_number', $pageID );
$telephone_num_two = get_field( 'telephone_number_two', $pageID );

$url_instagram = get_field( 'url_instagram', $pageID );
$url_telegram = get_field( 'url_telegram', $pageID );
$url_ita = get_field( 'url_ita', $pageID );

?>


<footer class="site-footer container">
	<div class="container-footer">
		<div class="footer-col-one">
			<?php wp_nav_menu( [ 'theme_location' => 'footer-menu' ] ) ?>
		</div>
		<div class="footer-col-two">
			<?php wp_nav_menu( [ 'theme_location' => 'footer-menu-two' ] ) ?>
			<?php
			if ( $telephone_num != null ) : ?>

				<span class="phone-numbers">
					<a href="tel: <?= $telephone_num ?>">
						<?php echo $telephone_num; ?>
					</a>
				</span>

			<?php endif; ?>
			<?php
			if ( $telephone_num_two != null ) : ?>

				<span class="phone-numbers">
					<a href="tel: <?= $telephone_num_two ?>">
						<?php echo $telephone_num_two; ?>
					</a>
				</span>

			<?php endif; ?>
		</div>
		<div class="footer-col-three">
			<ul>
				<li>آدرس</li>
			</ul>
			<address>لاله زار جنوبی پاساژ بهار پلاک ۱۲+۲</address>
			<ul class="location-container">
				<li>لوکیشن</li>
			</ul>
			<iframe class="location"
				src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12961.851433019636!2d51.4223912!3d35.6902259!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f8e018fb2a5417d%3A0xfcdcb284be05b19e!2z2b7Yp9iz2KfamCDYqNmH2KfYsQ!5e0!3m2!1sen!2s!4v1694334333706!5m2!1sen!2s"
				style="border:0;" allowfullscreen="" loading="lazy"
				referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>
		<div class="footer-col-four">
			<div class="img-light-footer">
				<img src="<?php echo get_stylesheet_directory_uri() . '/imgs/light better.png' ?>" alt="light">
			</div>
			<div class="social-network-footer">
				<div class="eitaa border-gradient"><a href="<?php echo $url_ita ?>"><i class="icon-ita"></i></a></div>
				<div class="telegram border-gradient"><a href="<?php echo $url_telegram ?>"><i
							class="icon-telegram"></i></a></div>
				<div class="instagram border-gradient"><a href="<?php echo $url_instagram ?>"><i
							class="icon-insta"></i></a></div>
			</div>
		</div>
	</div>

</footer>

<div class="wp-footer">
	<?php wp_footer() ?>
	<?php if ( is_front_page() && ! $_COOKIE['preloader'] ) : ?>
		<script>
			const Engine = Matter.Engine;
			const World =
				Matter.World;
			const Bodies = Matter.Bodies;
			const Body = Matter.Body;

			let engine;
			let words = [];
			let ground, wallLeft, wallRight;
			let wordsToDisplay = [
				'ارسال سریع',
				'خدمات پس از فروش',
				'مشاوره رایگان',
				'کیفیت بالا',
				'خدمات نصب',
				'باراد نور'
			];

			class Word {
				constructor(x, y, word) {
					this.body = Bodies.rectangle(x, y, word.length * 20, 60, 60);
					this.word = word;
					World.add(
						engine.world, this.body);
				}

				show() {
					let pos = this.body.position;
					let angle = this.body.angle;

					push();
					translate(pos.x, pos.y);
					rotate(angle);
					rectMode(CENTER);
					fill('#1F1F1F');
					rect(0, -5, this.word.length * 20, 60, 60);
					noStroke();
					textFont('Peyda');
					fill('#fff');
					textSize(20);
					text(this.word, -50, 0)
					textAlign(CENTER);
					pop();
				}
			}

			function setup() {
				const canvas = createCanvas(windowWidth, windowHeight - 60);
				canvas.parent('home_first_slide');
				background('transparent');

				engine = Engine.create();

				ground = Bodies.rectangle(width / 2, height - 20, width, 10, {
					isStatic: true,
				});
				wallLeft = Bodies.rectangle(0, height / 2, 10, height, {
					isStatic: true,
				});

				wallRight = Bodies.rectangle(width, height / 2, 10, height, {
					isStatic: true,
				});

				World.add(
					engine.world, [ground, wallLeft, wallRight]);

				setTimeout(() => {
					for (let i = 0; i < 1; i++) {
						for (let i = 0; i < wordsToDisplay.length; i++) {
							words.push(new Word(random(width), -200, wordsToDisplay[i]));
						}
					}
				}, 3500)

			}

			function draw() {
				background('#070707');
				Engine.update(engine);
				words.forEach((word) => word.show());
			}

			function mouseMoved() {
				for (let word of words) {
					if (dist(mouseX, mouseY, word.body.position.x, word.body.position.y) < 120) {
						Body.applyForce(
							word.body, {
							x: word.body.position.x,
							y: word.body.position.y
						}, {
							x: random(-0.2, 0.2),
							y: random(-0.2, 0.2)
						}
						);
					}
				}
			}
		</script>
	<?php endif; ?>
</div>

</body>

</html>