<?php
/**
 * Custom Header Nav Walker
 *
 * @package arprive
 */

class Ar_Header_Nav_Walker extends Walker_Nav_Menu {

    /**
     * Starts the list before the elements are added.
     */
    public function start_lvl( &$output, $depth = 0, $args = null ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = str_repeat( $t, $depth );

        // Default class.
        $classes = array( 'sub-menu' );

        // Custom classes based on depth.
        if ( ! empty( $args->mobile ) ) {
             $classes[] = 'mobile-menu__dropdown';
        } else {
            if ( $depth === 0 ) {
                $classes[] = 'header__mega-menu';
            } elseif ( $depth === 1 ) {
                $classes[] = 'header__mega-menu-sub';
            }
        }

        $class_names = implode( ' ', $classes );

        // Opening tag.
        $output .= "{$n}{$indent}<ul class=\"{$class_names}\">{$n}";
    }

    /**
     * Starts the element output.
     */
    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        
        $is_mobile = ! empty( $args->mobile );

        // Custom Item Classes
        if ( $is_mobile ) {
            $classes[] = 'mobile-menu__item';
        } else {
            if ( $depth === 0 ) {
                $classes[] = 'header__nav-item';
                if ( in_array( 'menu-item-has-children', $classes ) ) {
                    $classes[] = 'header__nav-item--has-dropdown';
                }
            } elseif ( $depth === 1 ) {
                $classes[] = 'header__mega-menu-item';
            }
        }

        $class_names = implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names .'>';

        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

        // Custom Link Classes
        $link_class = '';
        
        if ( $is_mobile ) {
            $link_class = 'mobile-menu__link';
            if ( in_array( 'current-menu-item', $item->classes ) ) {
                $link_class .= ' mobile-menu__link--active';
            }
        } else {
            if ( $depth === 0 ) {
                $link_class = 'header__nav-link';
            } elseif ( $depth === 1 ) {
                $link_class = 'header__mega-menu-link';
                // Check if current item is active/current to add modifier
                if ( in_array( 'current-menu-item', $item->classes ) ) {
                    $link_class .= ' header__mega-menu-link--active';
                }
            } elseif ( $depth === 2 ) {
                $link_class = 'header__mega-menu-sub-link';
            }
        }
        
        $atts['class'] = $link_class;

        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters( 'the_title', $item->title, $item->ID );
        $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . $title . $args->link_after;

        // Append Chevron for items with children
        if ( in_array( 'menu-item-has-children', $item->classes ) ) {
            if ( $is_mobile ) {
                // Mobile Chevron
                $item_output .= '<img src="' . get_template_directory_uri() . '/assets/icons/icon-chevron-right.svg" alt="" class="mobile-menu__chevron-icon">';
            } else {
                // Desktop Chevron
                if ( $depth === 0 ) {
                    $item_output .= '<svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.36667 6.19238L0 0.825708L0.825708 0L7.01808 6.19238L0.825708 12.3848L0 11.559L5.36667 6.19238Z" fill="currentColor"/>
                  </svg>';
                } elseif ( $depth === 1 ) {
                    $item_output .= '<img src="' . get_template_directory_uri() . '/assets/icons/icon-chevron-right.svg" alt="" class="header__chevron">';
                }
            }
        }

        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}
