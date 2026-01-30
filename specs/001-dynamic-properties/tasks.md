# Tasks: dynamic-properties

**Feature**: 001-dynamic-properties
**Status**: Pending
**Spec**: [specs/001-dynamic-properties/spec.md](../specs/001-dynamic-properties/spec.md)

## Phase 1: Setup
**Goal**: Initialize project structure and register necessary scripts/hooks.

- [x] T001 Create `inc/ajax-filters.php` and `inc/ajax-favorites.php` empty files
- [x] T002 Create `js/properties-filter.js` and `js/favorites.js` empty files
- [x] T003 Create `template-parts/property` directory
- [x] T004 Register and enqueue new JS files in `functions.php` with localization (ajaxurl, nonces)
- [x] T005 Include new PHP files in `functions.php`

## Phase 2: Foundational
**Goal**: Create reusable components for property display.

- [x] T006 Extract single property card HTML from `taxonomy-destination.php` to `template-parts/property/card.php`
- [x] T007 Replace static data in `template-parts/property/card.php` with dynamic ACF fields (`prop_location_text`, `starting_price`, `max_guests`, etc.)
- [x] T008 Implement image handling in `template-parts/property/card.php` (Gallery first image or Featured Image fallback)

## Phase 3: User Story 1 (Viewing a Destination)
**Goal**: Make the destination archive page dynamic using real database content.

- [x] T009 [US1] Refactor `taxonomy-destination.php` to identify current taxonomy term
- [x] T010 [US1] Implement `WP_Query` in `taxonomy-destination.php` to fetch properties for current destination
- [x] T011 [US1] Loop through query results and include `template-parts/property/card.php`
- [x] T012 [US1] Implement standard WordPress pagination links in `taxonomy-destination.php`
- [x] T013 [US1] Populate "Search Station" (Destination) dropdown dynamically from `destination` taxonomy terms

## Phase 4: User Story 2 (Filtering & Sorting)
**Goal**: Implement dynamic AJAX filtering and sorting.

- [x] T014 [US2] Update `inc/ajax-filters.php` to handle `wp_ajax_filter_properties` and `nopriv` hooks
- [x] T015 [US2] Implement `WP_Query` args construction in `inc/ajax-filters.php` based on POST data (tax_query, meta_query)
- [x] T016 [US2] Implement JSON response in `inc/ajax-filters.php` (HTML render of cards + pagination data)
- [x] T017 [US2] Update `taxonomy-destination.php` search bar forms to capture inputs (Guests, Dates)
- [x] T018 [US2] Update `taxonomy-destination.php` filter popup to populate checkboxes dynamically from taxonomies (Amenities, Wellness, Property Type, Access Type)
- [x] T019 [P] [US2] Implement `js/properties-filter.js` to collect form data and send AJAX request on change/search
- [x] T020 [P] [US2] Implement JS logic to replace grid content and pagination with AJAX response
- [x] T021 [US2] Implement Sorting logic in `inc/ajax-filters.php` (orderby `meta_value_num` for price) and JS handler

## Phase 5: User Story 3 (Managing Favorites)
**Goal**: Allow logged-in users to toggle favorite properties.

- [x] T022 [US3] Update `template-parts/property/card.php` to show correct heart state (filled/empty) based on user meta
- [x] T023 [US3] Implement `wp_ajax_toggle_favorite` handler in `inc/ajax-favorites.php` (check login, verify nonce, update user meta)
- [x] T024 [P] [US3] Implement `js/favorites.js` click handler to send AJAX request
- [x] T025 [P] [US3] Implement guest user redirection to login URL in `js/favorites.js`

## Phase 6: User Story 4 (Viewing Favorites Page)
**Goal**: Display user's saved properties.

- [x] T026 [US4] Refactor `page-templates/page-favourites.php` to fetch user's favorite post IDs
- [x] T027 [US4] Implement `WP_Query` using `post__in` args with favorite IDs
- [x] T028 [US4] Render property grid using `template-parts/property/card.php`
- [x] T029 [US4] Handle empty state (no favorites found)
- [x] T030 [US4] Ensure AJAX filtering works on Favorites page (or disable filters if not in scope - assume basic grid display per spec)

## Phase 7: Polish
**Goal**: Final cleanup and testing.

- [x] T031 Validate all forms inputs are sanitized
- [x] T032 Ensure responsive layout holds up with dynamic data lengths
- [x] T033 Verify Date inputs are passed to URL (even if not used for filtering)

## Dependencies

1.  **T006-T008 (Card Template)** MUST complete before **T011 (Archive Loop)** and **T028 (Favorites Grid)**.
2.  **T014-T016 (AJAX Backend)** MUST complete before **T019-T020 (JS Frontend)** integration.
3.  **T023 (Favorites Backend)** MUST complete before **T024 (Favorites JS)** integration.

## Implementation Strategy

1.  **MVP**: Complete Phases 1, 2, and 3. This gives a functional static archive page driven by the DB.
2.  **Increment 1**: Phase 4. Adds interactivity (filtering).
3.  **Increment 2**: Phases 5 & 6. Adds User personalization (Favorites).
