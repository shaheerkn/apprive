<?php
/**
 * Template part for displaying property gallery
 *
 * Implements User Story 2: Property Gallery Management
 * - Displays main gallery in Swiper slider
 * - Supports seasonal galleries (winter/summer) based on date or manual toggle
 * - Falls back to main gallery if seasonal gallery is empty
 *
 * @package arprive
 */

// Get gallery configuration
$use_seasonal = get_field( 'prop_seasonal_toggle' );
$winter_ids = array();
$summer_ids = array();
$gallery_ids = array();
$has_seasonal = false;

if ( $use_seasonal ) {
	// Get both seasonal galleries
	$winter_ids = get_field( 'prop_winter_gallery' );
	$summer_ids = get_field( 'prop_summer_gallery' );

	// Check if we have valid seasonal galleries
	$has_winter = $winter_ids && is_array( $winter_ids ) && count( $winter_ids ) > 0;
	$has_summer = $summer_ids && is_array( $summer_ids ) && count( $summer_ids ) > 0;

	// Use seasonal galleries if at least one has images
	if ( $has_winter || $has_summer ) {
		$has_seasonal = true;
	}
}

// Fallback to main gallery if no seasonal galleries
if ( ! $has_seasonal ) {
	$gallery_ids = get_field( 'prop_gallery' );
}

// Exit if no gallery images at all
if ( ! $has_seasonal && ( ! $gallery_ids || ! is_array( $gallery_ids ) || count( $gallery_ids ) === 0 ) ) {
	return;
}
?>

<div class="product-detail__gallery">
	<div class="swiper chalet-gallery-swiper">
		<div class="swiper-wrapper">
			<?php if ( $has_seasonal ) : ?>
				<?php
				// Output winter gallery images with for-winter class
				if ( ! empty( $winter_ids ) && is_array( $winter_ids ) ) :
					foreach ( $winter_ids as $image_id ) :
						?>
						<div class="swiper-slide">
							<?php
							echo wp_get_attachment_image(
								$image_id,
								'large',
								false,
								array(
									'class'   => 'for-winter',
									'loading' => 'lazy',
								)
							);
							?>
						</div>
						<?php
					endforeach;
				endif;

				// Output summer gallery images with for-summer class
				if ( ! empty( $summer_ids ) && is_array( $summer_ids ) ) :
					foreach ( $summer_ids as $image_id ) :
						?>
						<div class="swiper-slide">
							<?php
							echo wp_get_attachment_image(
								$image_id,
								'large',
								false,
								array(
									'class'   => 'for-summer',
									'loading' => 'lazy',
								)
							);
							?>
						</div>
						<?php
					endforeach;
				endif;
				?>
			<?php else : ?>
				<?php
				// Output main gallery (non-seasonal)
				foreach ( $gallery_ids as $image_id ) :
					?>
					<div class="swiper-slide">
						<?php
						echo wp_get_attachment_image(
							$image_id,
							'large',
							false,
							array(
								'loading' => 'lazy',
							)
						);
						?>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
		<div class="swiper-button-next"></div>
		<div class="swiper-button-prev"></div>
	</div>

	<div class="Slider-count product-detail__count"></div>

	<button class="swiper-expend product-detail__expand" aria-label="Expand gallery">
		<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M24.1667 27.4997H30.8333V20.833H29.1667V25.833H24.1667V27.4997ZM9.16667 19.1663H10.8333V14.1663H15.8333V12.4997H9.16667V19.1663ZM7.6925 31.6663C6.92528 31.6663 6.28472 31.4094 5.77083 30.8955C5.25694 30.3816 5 29.7411 5 28.9738V11.0255C5 10.2583 5.25694 9.61773 5.77083 9.10384C6.28472 8.58995 6.92528 8.33301 7.6925 8.33301H32.3075C33.0747 8.33301 33.7153 8.58995 34.2292 9.10384C34.7431 9.61773 35 10.2583 35 11.0255V28.9738C35 29.7411 34.7431 30.3816 34.2292 30.8955C33.7153 31.4094 33.0747 31.6663 32.3075 31.6663H7.6925ZM7.6925 29.9997H32.3075C32.5642 29.9997 32.7993 29.8929 33.0129 29.6793C33.2265 29.4656 33.3333 29.2305 33.3333 28.9738V11.0255C33.3333 10.7688 33.2265 10.5337 33.0129 10.3201C32.7993 10.1065 32.5642 9.99967 32.3075 9.99967H7.6925C7.43583 9.99967 7.20069 10.1065 6.98708 10.3201C6.77347 10.5337 6.66667 10.7688 6.66667 11.0255V28.9738C6.66667 29.2305 6.77347 29.4656 6.98708 29.6793C7.20069 29.8929 7.43583 29.9997 7.6925 29.9997Z" fill="white"/>
		</svg>
	</button>
</div>
