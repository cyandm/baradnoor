<?php

/*Template Name: About-us Page */ ?>

<?php get_header();

$title_section_one = get_field('title_section_one');
$title_section_two = get_field('title_section_two');
$title_section_three = get_field('title_section_three');

$sub_title_section_one = get_field('sub_title_section_one');
$sub_title_section_two = get_field('sub_title_section_two');


$text_section_one = get_field('text_section_one');
$text_section_two = get_field('text_section_two');
$text_section_three = get_field('text_section_three');

$image_section_one = get_field('image_section_one');
$image_two_section_one = get_field('image_two_section_one');
$image_three_section_one = get_field('image_three_section_one');
$image_four_section_one = get_field('image_four_section_one');


$image_section_two = get_field('image_section_two');
$image_two_section_two = get_field('image_two_section_two');
$image_three_section_two = get_field('image_three_section_two');
$image_four_section_two = get_field('image_four_section_two');

$name_person_one = get_field('name_person_one');
$name_person_two = get_field('name_person_two');
$name_person_three = get_field('name_person_three');
$name_person_four = get_field('name_person_four');

$job_title_person_one = get_field('job_title_person_one');
$job_title_person_two = get_field('job_title_person_two');
$job_title_person_three = get_field('job_title_person_three');
$job_title_person_four = get_field('job_title_person_four');

$image_section_three = get_field('image_section_three');
$image_two_section_three = get_field('image_two_section_three');

?>


<main class="about-us-page">
    <div class="background-about-us">
        <div class="swiper" id="swiperAboutUs">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="<?php echo get_stylesheet_directory_uri() . '/imgs/background-about-us-1.svg'  ?>" alt="background-slider">
                </div>
                <div class="swiper-slide">
                    <img src="<?php echo get_stylesheet_directory_uri() . '/imgs/background-about-us-2.svg'  ?>" alt="background-slider">
                </div>

            </div>
        </div>
    </div>
    <div class="spacer"></div>
    <div class="container">


        <section class="container-section-one">
            <?php if ($title_section_one != null) : ?>
                <h2 class="titles-section-about-us">
                    <?php echo $title_section_one; ?>
                </h2>
            <?php endif; ?>
            <?php if ($sub_title_section_one != null) : ?>
                <p class="sub-titles-section-about-us">
                    <?php echo $sub_title_section_one; ?>
                </p>
            <?php endif; ?>
            <div class="text-and-images-content-section-one">
                <?php if ($text_section_one != null) : ?>
                    <div class="text-section-one-about-us">
                        <?php echo $text_section_one; ?>
                    </div>
                <?php endif; ?>
                <div class="container-images-section-one">
                    <?= ($image_section_one != null && !empty($image_section_one)) ?  wp_get_attachment_image($image_section_one, 'full', false, ['class' => 'feature-image']) : ''; ?>
                    <?= $image_two_section_one != null ? wp_get_attachment_image($image_two_section_one, 'full', false, ['class' => 'feature-image']) : ''; ?>
                    <?= $image_three_section_one != null ? wp_get_attachment_image($image_three_section_one, 'full', false, ['class' => 'feature-image']) : ''; ?>
                    <?= $image_four_section_one != null ? wp_get_attachment_image($image_four_section_one, 'full', false, ['class' => 'feature-image']) : ''; ?>
                </div>
            </div>
        </section>



        <section class="container-section-two">
            <?php if ($title_section_two != null) : ?>
                <h2 class="titles-section-about-us">
                    <?php echo $title_section_two; ?>
                </h2>
            <?php endif; ?>
            <?php if ($sub_title_section_two != null) : ?>
                <p class="sub-titles-section-about-us">
                    <?php echo $sub_title_section_two; ?>
                </p>
            <?php endif; ?>

            <div class="text-and-images-content-section-two">
                <div class="container-images-section-two">
                    <?php if ($image_section_two) : ?>
                        <div class="container-images-name-job">

                            <?= $image_section_two != null ? wp_get_attachment_image($image_section_two, 'full', false, ['class' => 'feature-image']) : null; ?>
                            <div class="container-name-job-title">
                                <?php if ($name_person_one != null) echo "<div> $name_person_one </div>"; ?>
                                <?php if ($job_title_person_one != null) echo "<div> $job_title_person_one </div>"; ?>

                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($image_two_section_two) : ?>

                        <div class="container-images-name-job">
                            <?= $image_two_section_two != null ? wp_get_attachment_image($image_two_section_two, 'full', false, ['class' => 'feature-image']) : null; ?>
                            <div class="container-name-job-title">
                                <?php if ($name_person_two != null) echo "<div> $name_person_two </div>"; ?>
                                <?php if ($job_title_person_two != null) echo "<div> $job_title_person_two </div>"; ?>

                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($image_three_section_two) : ?>
                        <div class="container-images-name-job">

                            <?= $image_three_section_two != null ? wp_get_attachment_image($image_three_section_two, 'full', false, ['class' => 'feature-image']) : null; ?>
                            <div class="container-name-job-title">
                                <?php if ($name_person_three != null) echo "<div> $name_person_three </div>"; ?>
                                <?php if ($job_title_person_three != null) echo "<div> $job_title_person_three </div>"; ?>

                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($image_four_section_two) : ?>
                        <div class="container-images-name-job">
                            <?= $image_four_section_two != null ? wp_get_attachment_image($image_four_section_two, 'full', false, ['class' => 'feature-image']) : null; ?>
                            <div class="container-name-job-title">
                                <?php if ($name_person_two != null) echo "<div> $name_person_two </div>"; ?>
                                <?php if ($job_title_person_four != null) echo "<div> $job_title_person_four </div>"; ?>

                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if ($text_section_two != null) : ?>
                    <div class="text-section-two-about-us">
                        <?php echo $text_section_two; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>


        <section class="container-section-three">
            <?php if ($title_section_three != null) : ?>
                <h2 class="titles-section-about-us">
                    <?php echo $title_section_three; ?>
                </h2>
            <?php endif; ?>
            <div class="text-and-images-content-section-three">

                <div class="container-images-section-three">
                    <?= $image_section_three != null ?  wp_get_attachment_image($image_section_three, 'full', false, ['class' => 'feature-image']) : ''; ?>
                    <div class="image-two-section-three">
                        <?= $image_two_section_three != null ? wp_get_attachment_image($image_two_section_three, 'full', false, ['class' => 'feature-image']) : ''; ?>
                    </div>
                </div>
                <?php if ($text_section_three != null) : ?>
                    <div class="text-section-three-about-us">
                        <?php echo $text_section_three; ?>
                    </div>
                <?php endif; ?>

            </div>
        </section>
    </div>
</main>
<?php get_footer();
