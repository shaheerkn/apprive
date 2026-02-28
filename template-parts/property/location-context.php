<?php
/**
 * Template part for displaying property location context
 *
 * Displays location details with subtitle, location text, and features list.
 * Includes optional seasonal images.
 *
 * @package ArPrive
 * @since 1.0.0
 */

$prop_location_context = get_field( 'prop_location_context' );

// Check if there is location context content to display
if ( ! $prop_location_context ) {
	return;
}

// Get location context fields
$title = $prop_location_context['prop_location_context_title'];
$subtitle = $prop_location_context['prop_location_context_subtitle'];
$location_text = $prop_location_context['prop_location_context_location'];
$features = $prop_location_context['prop_location_context_features'];
$map = $prop_location_context['prop_location_context_map'];
?>

<section class="key-features location-context">
	<div class="key-features__container">
		<?php if ( $title ) : ?>
			<h2 class="key-features-title"><span class="title-text"><?php echo esc_html( $title ); ?></span> <span></span> </h2>
		<?php endif; ?>

		<?php if ( $subtitle ) : ?>
			<h4 class="location-context__subTitle"><?php echo esc_html( $subtitle ); ?></h4>
		<?php endif; ?>

		<?php if ( $location_text ) : ?>
			<p class="location-context__text"><?php echo esc_html( $location_text ); ?></p>
		<?php endif; ?>

		<?php if ( $features && is_array( $features ) && count( $features ) > 0 ) : ?>
			<div class="key-features__list">
				<ul>
					<?php foreach ( $features as $feature ) : ?>
						<?php if ( ! empty( $feature['feature_text'] ) ) : ?>
							<li>
								<span>
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M12 0L15.2411 8.75891L24 12L15.2411 15.2411L12 24L8.75891 15.2411L0 12L8.75891 8.75891L12 0Z" fill="#66A1B1"/>
									</svg>
								</span>
								<?php echo esc_html( $feature['feature_text'] ); ?>
							</li>
						<?php endif; ?>
					<?php endforeach; ?>
				</ul>

			<?php if ( $map && isset( $map['lat'], $map['lng'] ) ) : ?>
				<div class="location-context__map">
					<iframe
						width="100%"
						height="480"
						frameborder="0"
						style="border:0;"
						src="https://www.google.com/maps?q=<?php echo esc_attr( $map['lat'] ); ?>,<?php echo esc_attr( $map['lng'] ); ?>&amp;hl=en&amp;t=m&amp;z=14&amp;output=embed"
						allowfullscreen
						aria-label="Google Map location">
					</iframe>
				</div>
			<?php endif; ?>


			</div>
		<?php endif; ?>
	</div>
</section>
