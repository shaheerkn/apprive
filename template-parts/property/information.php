<?php
/**
 * Template part for displaying property useful information (Good to Know)
 *
 * Displays useful information items in a two-column layout with decorative watermark.
 *
 * @package ArPrive
 * @since 1.0.0
 */

$prop_info = get_field( 'prop_info' );

// Check if there is information content to display
if ( ! $prop_info ) {
	return;
}

// Get information fields
$title = $prop_info['prop_info_title'];
$subtitle = $prop_info['prop_info_subtitle'];
$items = $prop_info['prop_info_items'];
$watermark_image = $prop_info['prop_info_watermark'];
?>

<section class="key-features information">
	<?php if ( $watermark_image ) : ?>
		<img src="<?php echo esc_url( wp_get_attachment_image_url( $watermark_image, 'full' ) ); ?>" alt="water-mark">
	<?php else : ?>
		<img src="<?php echo get_template_directory_uri(); ?>/assets/images/chalet-info__water-mark.svg" alt="water-mark">
	<?php endif; ?>

	<div class="key-features__container">
		<?php if ( $title ) : ?>
			<h2 class="key-features-title"><?php echo esc_html( $title ); ?></h2>
		<?php endif; ?>

		<?php if ( $subtitle ) : ?>
			<h4><?php echo esc_html( $subtitle ); ?></h4>
		<?php endif; ?>

		<?php if ( $items && is_array( $items ) && count( $items ) > 0 ) : ?>
			<div class="key-features__list">
				<?php
				// Split items into two columns for layout
				$total = count( $items );
				$mid_point = ceil( $total / 2 );
				$first_column = array_slice( $items, 0, $mid_point );
				$second_column = array_slice( $items, $mid_point );
				?>

				<ul>
					<?php foreach ( $first_column as $item ) : ?>
						<?php if ( ! empty( $item['item_text'] ) ) : ?>
							<li>
								<span>
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M12 0L15.2411 8.75891L24 12L15.2411 15.2411L12 24L8.75891 15.2411L0 12L8.75891 8.75891L12 0Z" fill="#5A98C0"/>
									</svg>
								</span>
								<?php echo esc_html( $item['item_text'] ); ?>
							</li>
						<?php endif; ?>
					<?php endforeach; ?>
				</ul>

				<?php if ( ! empty( $second_column ) ) : ?>
					<ul>
						<?php foreach ( $second_column as $item ) : ?>
							<?php if ( ! empty( $item['item_text'] ) ) : ?>
								<li>
									<span>
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M12 0L15.2411 8.75891L24 12L15.2411 15.2411L12 24L8.75891 15.2411L0 12L8.75891 8.75891L12 0Z" fill="#5A98C0"/>
										</svg>
									</span>
									<?php echo esc_html( $item['item_text'] ); ?>
								</li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
