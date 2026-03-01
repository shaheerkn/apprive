<?php
/**
 * Template part for displaying featured/related properties (You May Also Like)
 *
 * Displays a swiper carousel of related properties with images and details.
 * Uses relationship field to select featured properties.
 *
 * @package ArPrive
 * @since 1.0.0
 */

$prop_featured = get_field( 'prop_featured' );

// Check if there are featured properties to display
if ( ! $prop_featured ) {
	return;
}

// Get featured properties fields
$title = $prop_featured['prop_featured_title'];
$featured_properties = $prop_featured['prop_featured_properties'];
?>

<section class="featured key-features">
	<div class="key-features__container">
		<?php if ( $title ) : ?>
			<h2 class="key-features-title"><span class="title-text"><?php echo esc_html( $title ); ?></span> <span></span> </h2>
		<?php else : ?>
			<h2 class="key-features-title">YOU MAY ALSO LIKE</h2>
		<?php endif; ?>

		<?php if ( $featured_properties && is_array( $featured_properties ) && count( $featured_properties ) > 0 ) : ?>
			<div class="swiper featured-swiper">
				<div class="swiper-wrapper">
					<?php foreach ( $featured_properties as $property_post ) : ?>
						<?php
						// Get property data
						$property_id = $property_post->ID;
						$property_title = get_the_title( $property_id );
						$property_link = get_permalink( $property_id );

						// Get property specifications
						$specs = ar_get_property_specs( $property_id );
						$max_guests = $specs ? $specs['max_guests'] : 0;

						// Get property location (from taxonomy or ACF)
						$location = get_field( 'prop_location_text', $property_id );

						// Get property key features for amenities display (first 3)
						$key_features = get_field( 'prop_key_features', $property_id );
						$amenities_list = array();
						if ( $key_features && is_array( $key_features ) ) {
							$amenities_list = array_slice( array_column( $key_features, 'feature_label' ), 0, 3 );
						}
						$amenities_text = ! empty( $amenities_list ) ? implode( ' · ', $amenities_list ) : '';

						// Get featured image (or first gallery image)
						$featured_image = get_the_post_thumbnail_url( $property_id, 'large' );
						if ( ! $featured_image ) {
							$gallery = ar_display_property_gallery( $property_id );
							if ( $gallery && is_array( $gallery ) ) {
								$featured_image = wp_get_attachment_image_url( $gallery[0], 'large' );
							}
						}
						?>

						<div class="swiper-slide">
							<article class="showcase__item">
								<div class="showcase__image-wrap">
									<a href="<?php echo esc_url( $property_link ); ?>" class="item-image">
										<?php if ( $featured_image ) : ?>
											<img src="<?php echo esc_url( $featured_image ); ?>" alt="<?php echo esc_attr( $property_title ); ?>" class="showcase__image">
										<?php endif; ?>
									</a>
								</div>

								<div class="showcase__details">
									<div class="showcase__info">
										<div class="showcase__info-text">
											<h6 class="text"><?php echo esc_html( $property_title ); ?></h6>
											<?php if ( $amenities_text ) : ?>
												<p class="showcase__amenities"><?php echo esc_html( $amenities_text ); ?></p>
											<?php endif; ?>
										</div>

										<?php if ( $max_guests > 0 ) : ?>
											<div class="showcase__capacity">
												<?php
												$is_favorite = false; // Active state is set via JS from localStorage
												?>
												<button class="listing-grid-fav <?php echo $is_favorite ? 'active' : ''; ?>" data-id="<?php echo esc_attr( $property_id ); ?>" aria-label="<?php echo $is_favorite ? 'Remove from favorites' : 'Add to favorites'; ?>">
													<?php if ( $is_favorite ) : ?>
														<svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
													<?php else : ?>
														<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/fav-black.svg" alt="favorites">
													<?php endif; ?>
												</button>

												<p><?php echo esc_html( $max_guests ); ?> Guests</p>
											</div>
										<?php endif; ?>
									</div>
								</div>
							</article>
						</div>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="pagination">
				<div class="swiper-button-prev"></div>
				<div class="swiper-button-next"></div>
			</div>
		<?php endif; ?>
	</div>
</section>
