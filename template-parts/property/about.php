<?php
/**
 * Template part for displaying property about section
 *
 * Displays the post content (About the Chalet) using the_content().
 * Uses WordPress block editor content with full formatting support.
 * Part of User Story 3: Amenities and Features Organization
 *
 * @package ArPrive
 * @since 1.0.0
 */

// Check if there is content to display
$content = get_the_content();
if ( empty( trim( $content ) ) ) {
	return;
}
?>

<section class="chalet-about key-features">
	<div class="key-features__container chalet-about__container">
		<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/section-watermark.svg' ); ?>" alt="water-mark">
		<h2 class="key-features-title"><span class="title-text">About the Chalet</span> <span></span> </h2>

		<div class="chalet-about__text">
			<?php the_content(); ?>
		</div>
	</div>
</section>
