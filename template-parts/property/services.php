<?php
/**
 * Template part for displaying property in-chalet services
 *
 * Displays services repeater (prop_services) with icons and service names.
 * Part of User Story 3: Amenities and Features Organization
 *
 * @package ArPrive
 * @since 1.0.0
 */

// Check if there are any services to display
if ( ! ar_property_has_content( 'prop_services' ) ) {
	return;
}
?>

<section class="details key-features details--services">
	<div class="key-features__container">
		<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/servicee-water-mark.svg' ); ?>" alt="water-mark">
		<h2 class="key-features-title"><span class="title-text">IN-CHALET SERVICES</span> <span></span> </h2>

		<h4 class="details__title">Available services (through AR PRIVÉ concierge)</h4>

		<div class="key-features__list details__list">
			<?php
			// Split services into two columns for layout
			$services = get_field( 'prop_services' );
			if ( $services && is_array( $services ) ) :
				$total = count( $services );
				$mid_point = ceil( $total / 2 );
				$first_column = array_slice( $services, 0, $mid_point );
				$second_column = array_slice( $services, $mid_point );
				?>

				<ul>
					<?php foreach ( $first_column as $service ) : ?>
						<li>
							<?php if ( ! empty( $service['service_icon'] ) ) : ?>
								<span>
									<?php echo file_get_contents( get_attached_file( $service['service_icon'] ) ); ?>
								</span>
							<?php endif; ?>
							<?php echo esc_html( $service['service_label'] ); ?>
						</li>
					<?php endforeach; ?>
				</ul>

				<?php if ( ! empty( $second_column ) ) : ?>
					<ul>
						<?php foreach ( $second_column as $service ) : ?>
							<li>
								<?php if ( ! empty( $service['service_icon'] ) ) : ?>
									<span>
										<?php echo file_get_contents( get_attached_file( $service['service_icon'] ) ); ?>
									</span>
								<?php endif; ?>
								<?php echo esc_html( $service['service_label'] ); ?>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
