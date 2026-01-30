# Research & Decisions: dynamic-properties

**Feature**: 001-dynamic-properties
**Date**: 2026-01-27

## 1. AJAX Implementation for Filtering
*   **Decision**: Implement property filtering using standard WordPress AJAX hooks (`wp_ajax_filter_properties` and `wp_ajax_nopriv_filter_properties`).
*   **Rationale**:
    *   Provides a seamless user experience without page reloads.
    *   Standard WordPress pattern for dynamic content.
    *   Allows reuse of the same filtering logic for both logged-in and guest users.
*   **Alternatives Considered**:
    *   *GET Parameter Page Reloads*: Simpler to implement but offers a poorer UX (full page refresh on every filter change).
    *   *REST API*: Overkill for this specific theme-bound feature; `admin-ajax.php` is sufficient and integrates easily with existing nonce helpers.

## 2. Favorites Logic
*   **Decision**: Store favorites in User Meta (`favorite_properties` key) as an array of Post IDs.
*   **Rationale**:
    *   Persistent storage for logged-in users.
    *   Easy to query using `post__in` in `WP_Query`.
    *   Low overhead compared to a custom table.
*   **Alternatives Considered**:
    *   *Cookies/Local Storage*: Good for guests, but requirement is specifically for "logged in user" persistence. Guest users are redirected to login.

## 3. Code Reusability (Property Card)
*   **Decision**: Extract the property card HTML into `template-parts/property/card.php`.
*   **Rationale**:
    *   The property card design is identical in `taxonomy-destination.php` (Archive) and `page-favourites.php`.
    *   Reduces code duplication and maintenance effort.
    *   Simplifies the AJAX response (can just `get_template_part` loop).

## 4. Testing Strategy
*   **Decision**: Manual Testing.
*   **Rationale**:
    *   No automated testing framework (PHPUnit, Jest, etc.) is currently configured in `composer.json` or `package.json`.
    *   "Quick Start" guide will include a manual test checklist.

## 5. Date Handling
*   **Decision**: Capture "Check-in" and "Check-out" dates in the search form and pass them as URL parameters / AJAX payload, but do **not** use them in `meta_query` for now.
*   **Rationale**:
    *   Explicitly "Out of Scope" for logic in the spec.
    *   Preserves user intent for future implementation.

## 6. Unknowns Resolved
*   **Testing**: Confirmed manual.
*   **Filter Logic**: Confirmed custom AJAX implementation needed (existing `filter.js` is UI-only).
