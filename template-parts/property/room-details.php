<?php
/**
 * Template part for displaying property room and space details
 *
 * Displays room details repeater (prop_room_details) with icons and descriptions,
 * plus optional room images gallery at the bottom.
 * Part of User Story 3: Amenities and Features Organization
 *
 * @package ArPrive
 * @since 1.0.0
 */

// Check if there are any room details to display
if ( ! ar_property_has_content( 'prop_room_details' ) ) {
	return;
}
?>

<section class="details key-features">
	<div class="key-features__container">
		<h2 class="key-features-title"><span class="title-text">ROOM & SPACE DETAILS</span> <span></span> </h2>
		<h4 class="details__title">Layout</h4>

		<div class="key-features__list details__list">
			<?php
			// Split room details into two columns for layout
			$room_details = get_field( 'prop_room_details' );
			if ( $room_details && is_array( $room_details ) ) :
				$total = count( $room_details );
				$mid_point = ceil( $total / 2 );
				$first_column = array_slice( $room_details, 0, $mid_point );
				$second_column = array_slice( $room_details, $mid_point );
				?>

				<ul>
					<?php foreach ( $first_column as $room ) : ?>
						<li>
							<?php if ( ! empty( $room['room_icon'] ) ) : ?>
								<span>
									<?php echo file_get_contents( get_attached_file( $room['room_icon'] ) ); ?>
								</span>
							<?php endif; ?>
							<?php echo esc_html( $room['room_description'] ); ?>
						</li>
					<?php endforeach; ?>
				</ul>

				<?php if ( ! empty( $second_column ) ) : ?>
					<ul>
						<?php foreach ( $second_column as $room ) : ?>
							<li>
								<?php if ( ! empty( $room['room_icon'] ) ) : ?>
									<span>
										<?php echo file_get_contents( get_attached_file( $room['room_icon'] ) ); ?>
									</span>
								<?php endif; ?>
								<?php echo esc_html( $room['room_description'] ); ?>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			<?php endif; ?>
		</div>

		<?php
		// Display room images gallery if available
		$room_images = get_field( 'prop_room_images' );
		if ( $room_images && is_array( $room_images ) && count( $room_images ) > 0 ) :
			?>
			<figure class="details__garllery">
				<?php
				foreach ( $room_images as $image_id ) :
					echo wp_get_attachment_image( $image_id, 'large', false, array( 'loading' => 'lazy' ) );
				endforeach;
				?>
			</figure>
		<?php endif; ?>
	</div>
</section>
