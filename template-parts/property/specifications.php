<?php
/**
 * Template part for displaying property specifications
 *
 * Displays property specs grid (guests, bedrooms, bathrooms, size, location, access, staff)
 * and contact buttons (availability, chat).
 * Part of User Story 1: Property Information Display
 *
 * @package ArPrive
 * @since 1.0.0
 */

// Get property specifications and booking info
$specs = ar_get_property_specs();
$booking = get_field( 'prop_booking' );
$location_text = get_field( 'prop_location_text' );
?>

<?php if ( $specs ) : ?>
	<ul class="product-detail__specs">
		<?php if ( $specs['max_guests'] ) : ?>
			<li class="product-detail__spec">
				Guests: <span class="product-detail__spec-value"><?php echo esc_html( $specs['max_guests'] ); ?></span>
			</li>
		<?php endif; ?>

		<?php if ( isset( $specs['bedroom_count'] ) ) : ?>
			<li class="product-detail__spec">
				Bedrooms: <span class="product-detail__spec-value"><?php echo esc_html( $specs['bedroom_count'] ); ?></span>
			</li>
		<?php endif; ?>

		<?php if ( isset( $specs['bathroom_count'] ) ) : ?>
			<li class="product-detail__spec">
				Bathroom: <span class="product-detail__spec-value"><?php echo esc_html( $specs['bathroom_count'] ); ?></span>
			</li>
		<?php endif; ?>

		<?php if ( ! empty( $specs['size_sqm'] ) ) : ?>
			<li class="product-detail__spec">
				Size: <span class="product-detail__spec-value"><?php echo esc_html( $specs['size_sqm'] ); ?>m²</span>
			</li>
		<?php endif; ?>

		<?php if ( $location_text ) : ?>
			<li class="product-detail__spec">
				Location: <span class="product-detail__spec-value"><?php echo esc_html( $location_text ); ?></span>
			</li>
		<?php endif; ?>

		<?php if ( ! empty( $specs['access_type'] ) ) : ?>
			<li class="product-detail__spec">
				Access: <span class="product-detail__spec-value"><?php echo esc_html( get_term( $specs['access_type'] )->name ); ?></span>
			</li>
		<?php endif; ?>

		<?php if ( ! empty( $specs['staff_availability'] ) ) : ?>
			<li class="product-detail__spec">
				Staff: <span class="product-detail__spec-value"><?php echo esc_html( $specs['staff_availability'] ); ?></span>
			</li>
		<?php endif; ?>
	</ul>
<?php endif; ?>

<?php
	$whatsapp_message = rawurlencode( 'Hi, I am interested in ' . get_the_title() );
	$whatsapp_url = 'https://wa.me/393349051603?text=' . $whatsapp_message;
?>
	<div class="product-detail__contacts">
		<a class="product-detail__contact product-detail__contact--availability" href="<?php echo esc_url( $whatsapp_url ); ?>" target="_blank">
			Contact us for private availability
		</a>

		<a class="product-detail__contact product-detail__contact--chat" href="<?php echo esc_url( $whatsapp_url ); ?>" target="_blank">
			Chat with us
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<g clip-path="url(#clip0_144_72)">
					<path d="M0.100313 11.8527C0.0996563 13.9417 0.649687 15.981 1.69537 17.7786L0 23.9207L6.33478 22.2726C8.08022 23.2168 10.0454 23.7147 12.0451 23.7154H12.0502C18.636 23.7154 23.9972 18.3975 24 11.8621C24.0011 8.69488 22.7591 5.71656 20.5031 3.47609C18.2468 1.23591 15.2468 0.00130233 12.0502 0C5.46337 0 0.102938 5.31721 0.100313 11.8527ZM3.87291 17.469L3.63637 17.0965C2.64206 15.5277 2.11725 13.7149 2.118 11.8534C2.12006 6.4213 6.57544 2.00186 12.054 2.00186C14.7071 2.00298 17.2005 3.02921 19.0759 4.89116C20.9512 6.7533 21.9831 9.22865 21.9824 11.8614C21.98 17.2935 17.5245 21.7135 12.0502 21.7135H12.0463C10.2638 21.7126 8.51569 21.2376 6.99113 20.34L6.62831 20.1265L2.86912 21.1045L3.87291 17.469Z" fill="#5A98C0"/>
					<path d="M9.06334 6.89746C8.83965 6.40416 8.60425 6.39421 8.39153 6.38556C8.21734 6.37811 8.01821 6.37867 7.81928 6.37867C7.62015 6.37867 7.29662 6.453 7.02315 6.74928C6.7494 7.04583 5.97803 7.76249 5.97803 9.22007C5.97803 10.6776 7.048 12.0864 7.19715 12.2843C7.3465 12.4817 9.26275 15.5686 12.2976 16.7562C14.8199 17.743 15.3332 17.5468 15.8806 17.4973C16.4281 17.448 17.6472 16.7808 17.8959 16.089C18.1448 15.3973 18.1448 14.8043 18.0702 14.6804C17.9956 14.557 17.7964 14.4829 17.4978 14.3348C17.1992 14.1867 15.7312 13.4698 15.4576 13.371C15.1838 13.2722 14.9848 13.2229 14.7857 13.5195C14.5865 13.8157 14.0147 14.4829 13.8405 14.6804C13.6664 14.8785 13.4921 14.9031 13.1936 14.755C12.8948 14.6063 11.9332 14.2938 10.7924 13.2846C9.90475 12.4993 9.3055 11.5296 9.13131 11.2329C8.95712 10.9367 9.11265 10.7762 9.26237 10.6285C9.39653 10.4958 9.56106 10.2826 9.7105 10.1096C9.85937 9.93663 9.90906 9.81318 10.0086 9.6156C10.1083 9.41783 10.0584 9.24481 9.98387 9.09663C9.90906 8.94844 9.32884 7.48323 9.06334 6.89746Z" fill="#5A98C0"/>
				</g>
				<defs>
					<clipPath id="clip0_144_72">
						<rect width="24" height="24" fill="white"/>
					</clipPath>
				</defs>
			</svg>
		</a>
	</div>
