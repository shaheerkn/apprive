<?php
/**
 * Single Property Template
 *
 * Displays a single property post with dynamic breadcrumbs, ACF fields, and modular template parts.
 *
 * @package arprive
 */

get_header();

// Get destination taxonomy for breadcrumbs (T098-T100)
$destination = get_field( 'prop_location_taxonomy' );

// Get pricing for sidebar (used by template-parts/property/header and sidebar block)
$pricing = ar_get_property_pricing();
?>

<section class="breadcrumb breadcrumb__modifier">
	<div class="container single-chalet__links">
		<!-- Home breadcrumb link (T097) -->
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="breadcrumb__home">
			<svg width="19" height="22" viewBox="0 0 19 22" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M1.33333 19.718H6.25633V11.872H12.4103V19.718H17.3333V7.718L9.33333 1.66667L1.33333 7.718V19.718ZM0 21.0513V7.05133L9.33333 0L18.6667 7.05133V21.0513H11.077V13.2053H7.58967V21.0513H0Z" fill="#1F1F1F"/>
			</svg>
		</a>

		<?php if ( $destination && ! is_wp_error( $destination ) ) : ?>
			<!-- Breadcrumb arrow separator -->
			<span class="breadcrumb__arrow">
				<svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M6.13333 7.077L0 0.943667L0.943667 0L8.02067 7.077L0.943667 14.154L0 13.2103L6.13333 7.077Z" fill="black"/>
				</svg>
			</span>

			<!-- Destination breadcrumb (T098-T100, T103) -->
			<a href="<?php echo esc_url( get_term_link( $destination ) ); ?>" class="breadcrumb__current">
				<?php echo esc_html( $destination->name ); ?>
			</a>
		<?php endif; ?>

		<!-- Breadcrumb arrow separator -->
		<span class="breadcrumb__arrow">
			<svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M6.13333 7.077L0 0.943667L0.943667 0L8.02067 7.077L0.943667 14.154L0 13.2103L6.13333 7.077Z" fill="black"/>
			</svg>
		</span>

		<!-- Property name breadcrumb (T101, T103) -->
		<span class="breadcrumb__current"><?php the_title(); ?></span>

		<!-- Mobile back arrow -->
		<?php if ( $destination && ! is_wp_error( $destination ) ) : ?>
			<a href="<?php echo esc_url( get_term_link( $destination ) ); ?>" class="breadcrumb-arrow__mobile">
				<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M1.60104 6.25L6.42792 11.0769L5.83333 11.6667L0 5.83333L5.83333 0L6.42792 0.589792L1.60104 5.41667H11.6667V6.25H1.60104Z" fill="#1F1F1F"/>
				</svg>
			</a>
		<?php else : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="breadcrumb-arrow__mobile">
				<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M1.60104 6.25L6.42792 11.0769L5.83333 11.6667L0 5.83333L5.83333 0L6.42792 0.589792L1.60104 5.41667H11.6667V6.25H1.60104Z" fill="#1F1F1F"/>
				</svg>
			</a>
		<?php endif; ?>
	</div>
</section>

<div class="main-product-wrapper container">
	<div class="product-detail__main-content">
		<section class="product-detail section">
			<div class="container">
				<?php
				/**
				 * Property Header Template Part
				 * Displays: title, location, action buttons (favorite/share), pricing, and specifications
				 * Implemented in T038-T049: User Story 1 - Property Information Display
				 */
				get_template_part( 'template-parts/property/header' );
				?>

					<div class="product-detail__content product-detail__content--mobile">
						<?php if ( $pricing ) : ?>
							<div class="product-detail__price">
								<p class="product-detail__price-label">Starting Price From</p>
								<p class="product-detail__price-amount">
									<?php
									$formatted_price = esc_html( $pricing['formatted'] );
									echo preg_replace( '/(\/(?:week|month|night|year))/', '<span>$1</span>', $formatted_price );
									?>
								</p>
							</div>
						<?php endif; ?>

						<!-- Specifications will be loaded from separate template part -->
						<?php get_template_part( 'template-parts/property/specifications' ); ?>
				</div>
			</div>
		</section>

		<?php
		/**
		 * Key Features Template Part
		 * Displays key features from prop_key_features repeater with icons
		 * Implemented in T054-T061: User Story 3 - Amenities and Features Organization
		 */
		get_template_part( 'template-parts/property/key-features' );
		?>

		<?php
		/**
		 * About the Chalet Template Part
		 * Displays post content (the_content) for About the Chalet section
		 * Implemented in T067-T069: User Story 3 - Amenities and Features Organization
		 */
		get_template_part( 'template-parts/property/about' );
		?>

		<?php
		/**
		 * Room & Space Details Template Part
		 * Displays room details from prop_room_details repeater with icons and optional gallery
		 * Implemented in T062-T064, T072: User Story 3 - Amenities and Features Organization
		 */
		get_template_part( 'template-parts/property/room-details' );
		?>

		<?php
		/**
		 * In-Chalet Services Template Part
		 * Displays services from prop_services repeater with icons
		 * Implemented in T065-T066, T073: User Story 3 - Amenities and Features Organization
		 */
		get_template_part( 'template-parts/property/services' );
		?>

		<?php
		/**
		 * Location Context Template Part
		 * Displays location details with subtitle, features list, and optional seasonal images
		 */
		get_template_part( 'template-parts/property/location-context' );
		?>

		<?php
		/**
		 * Information (Good to Know) Template Part
		 * Displays useful information items in two-column layout with decorative watermark
		 */
		get_template_part( 'template-parts/property/information' );
		?>

		<?php
		/**
		 * Featured Properties Template Part
		 * Displays related/featured properties in a swiper carousel
		 */
		get_template_part( 'template-parts/property/featured-properties' );
		?>
	</div>

	<div class="product-detail__content product-detail__content--desktop">
			<?php if ( $pricing ) : ?>
				<div class="product-detail__price">
					<p class="product-detail__price-label">Starting Price From</p>
					<p class="product-detail__price-amount">
						<?php
						$formatted_price = esc_html( $pricing['formatted'] );
						echo preg_replace( '/(\/(?:week|month|night|year))/', '<span>$1</span>', $formatted_price );
						?>
					</p>
				</div>
			<?php endif; ?>

			<!-- Specifications will be loaded from separate template part -->
			<?php get_template_part( 'template-parts/property/specifications' ); ?>
	</div>
</div>

<?php get_footer(); ?>
