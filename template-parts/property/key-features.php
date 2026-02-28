<?php
/**
 * Template part for displaying property key features
 *
 * Displays key features repeater (prop_key_features) with icons and labels.
 * Part of User Story 3: Amenities and Features Organization
 *
 * @package ArPrive
 * @since 1.0.0
 */

// Check if there are any key features to display
if ( ! ar_property_has_content( 'prop_key_features' ) ) {
	return;
}
?>

<section class="key-features">
	<div class="key-features__container">
		<h2 class="key-features-title"><span class="title-text">Key Features</span> <span></span> </h2>

		<div class="key-features__list">
			<?php
			// Split features into two columns for layout
			$features = get_field( 'prop_key_features' );
			if ( $features && is_array( $features ) ) :
				$total = count( $features );
				$mid_point = ceil( $total / 2 );
				$first_column = array_slice( $features, 0, $mid_point );
				$second_column = array_slice( $features, $mid_point );
				?>

				<ul>
					<?php foreach ( $first_column as $feature ) : ?>
						<li>
							<?php if ( ! empty( $feature['feature_icon'] ) ) : ?>
								<span>
									<?php echo file_get_contents( get_attached_file( $feature['feature_icon'] ) ); ?>
								</span>
							<?php endif; ?>
							<?php echo esc_html( $feature['feature_label'] ); ?>
						</li>
					<?php endforeach; ?>
				</ul>

				<?php if ( ! empty( $second_column ) ) : ?>
					<ul>
						<?php foreach ( $second_column as $feature ) : ?>
							<li>
								<?php if ( ! empty( $feature['feature_icon'] ) ) : ?>
									<span>
										<?php echo file_get_contents( get_attached_file( $feature['feature_icon'] ) ); ?>
									</span>
								<?php endif; ?>
								<?php echo esc_html( $feature['feature_label'] ); ?>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
