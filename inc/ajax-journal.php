<?php
/**
 * AJAX Journal Filter Handler
 *
 * @package arprive
 */

function ar_filter_journal() {
    if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'ar_journal_nonce' ) ) {
        wp_send_json_error( array( 'message' => 'Invalid nonce' ) );
    }

    $category = isset( $_POST['category'] ) ? intval( $_POST['category'] ) : 0;
    $search   = isset( $_POST['search'] ) ? sanitize_text_field( $_POST['search'] ) : '';

    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 12,
        'post_status'    => 'publish',
    );

    if ( $category > 0 ) {
        $args['cat'] = $category;
    }

    if ( $search ) {
        $args['s'] = $search;
    }

    $query = new WP_Query( $args );

    ob_start();
    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            $thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'medium_large' );
            if ( ! $thumb_url ) $thumb_url = get_template_directory_uri() . '/assets/images/placeholder.png';
            $post_categories = get_the_category();
            $cat_name = ! empty( $post_categories ) ? $post_categories[0]->name : '';
            ?>
            <article class="journal-card">
                <a href="<?php the_permalink(); ?>" class="journal-card__image-wrapper">
                    <img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php the_title_attribute(); ?>" class="journal-card__image">
                </a>
                <div class="journal-card__content">
                    <?php if ( $cat_name ) : ?>
                        <span class="journal-card__location"><?php echo esc_html( strtoupper( $cat_name ) ); ?></span>
                    <?php endif; ?>
                    <h3 class="journal-card__title"><?php the_title(); ?></h3>
                    <p class="journal-card__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 18, '...' ) ); ?></p>
                    <a href="<?php the_permalink(); ?>" class="journal-card__link">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.6885 11.7885L0 11.1L10.0807 1H0.7885V0H11.7885V11H10.7885V1.70775L0.6885 11.7885Z" fill="black"/>
                        </svg>
                    </a>
                </div>
            </article>
            <?php
        }
        wp_reset_postdata();
    } else {
        echo '<p class="journal-articles__empty">No articles found.</p>';
    }
    $html = ob_get_clean();

    wp_send_json_success( array( 'html' => $html ) );
}

add_action( 'wp_ajax_filter_journal', 'ar_filter_journal' );
add_action( 'wp_ajax_nopriv_filter_journal', 'ar_filter_journal' );
