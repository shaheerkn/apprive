# Specification: Dynamic Property Listing & Favorites

## 1. Overview

**Feature Name:** dynamic-properties
**Version:** 0.1.0
**Status:** Draft

### 1.1 Goal
Make the `taxonomy-destination.php` page fully dynamic, serving property data from the database based on the current destination. Implement a dynamic search/filter experience using existing taxonomies and meta fields, handle pagination and sorting, and introduce a "Favorites" feature for logged-in users.

### 1.2 Scope
*   **In Scope:**
    *   Refactoring `taxonomy-destination.php` to use `WP_Query`.
    *   Dynamic Search Bar (Destination, Guests, Dates).
    *   Dynamic Filter Popup (Price, Bedrooms, Wellness, Amenities, Property Type, Location/Access).
    *   Property Grid Listing (Dynamic data: Images, Title, Location, Specs, Price).
    *   Sorting functionality.
    *   Pagination.
    *   "Add to Favorites" toggle on properties.
    *   Dedicated "Favorites" page for logged-in users.
*   **Out of Scope:**
    *   Complex booking/availability logic (Dates are UI-only/placeholders for now).
    *   Payment integration.
    *   User registration/login flows (assuming users exist).
    *   Modifying the visual design (using existing HTML/CSS structure).

### 1.3 Definitions
*   **Property:** Custom Post Type `property`.
*   **Destination:** Taxonomy `destination`.
*   **Amenities:** Taxonomy `amenity`.
*   **Wellness:** Taxonomy `wellness-and-leisure`.
*   **Property Type:** Taxonomy `property-type`.
*   **Access Type:** Taxonomy `access-type` (Mapped to "Location" filters).
*   **Meta Fields:** ACF fields defined in `group_property_fields.json`.

---

## 2. User Scenarios

### 2.1 Viewing a Destination
*   **Actor:** Guest / User
*   **Trigger:** Navigates to a Destination page (e.g., /destination/courchevel).
*   **Flow:**
    1.  System identifies the current `destination` term.
    2.  System queries `property` posts associated with this destination.
    3.  System displays the "Search Bar" pre-filled with the current destination.
    4.  System displays the list of properties with their main image, title, location, specs (spa, fireplace, etc.), and price.
    5.  Pagination is shown if results exceed the limit.

### 2.2 Filtering Properties
*   **Actor:** Guest / User
*   **Trigger:** Uses the Search Bar or opens the "Filters" popup.
*   **Flow:**
    1.  **Search Bar:**
        *   User changes "Destination" -> Redirects or updates query.
        *   User selects "Guests" -> Filters properties where `max_guests` >= selected value.
        *   User picks "Dates" -> (Future placeholder: No effect on results currently).
    2.  **Filter Popup:**
        *   User adjusts "Price Range" -> Filters by `starting_price`.
        *   User selects "Bedrooms" -> Filters by `bedroom_count`.
        *   User selects "Wellness" / "Amenities" / "Property Type" / "Location" -> Filters by respective taxonomies (`wellness-and-leisure`, `amenity`, `property-type`, `access-type`).
    3.  User clicks "Search".
    4.  System updates the property grid to show matching results.

### 2.3 Sorting Properties
*   **Actor:** Guest / User
*   **Trigger:** Selects an option from the "Sort by" dropdown.
*   **Flow:**
    1.  User selects "Price: Low to High".
    2.  System re-orders the current results by `starting_price` ascending.
    3.  User selects "Price: High to Low".
    4.  System re-orders results by `starting_price` descending.

### 2.4 Managing Favorites
*   **Actor:** Logged-in User
*   **Trigger:** Clicks the "Heart" icon on a property card.
*   **Flow:**
    1.  **Add:** If not favorite, system adds property ID to user's `favorite_properties` meta. Icon fills.
    2.  **Remove:** If already favorite, system removes ID. Icon outlines.
    3.  **Guest User:** If not logged in, clicking might prompt login or do nothing (TBD - assumed no-op or alert).

### 2.5 Viewing Favorites Page
*   **Actor:** Logged-in User
*   **Trigger:** Navigates to `/favorites` (or similar).
*   **Flow:**
    1.  System retrieves the list of property IDs from user meta.
    2.  System queries and displays these properties in the standard grid layout.

---

## 3. Functional Requirements

### 3.1 Data Retrieval
*   **FR-01:** Queries must respect the current `destination` taxonomy term when on a destination archive.
*   **FR-02:** Queries must fetch standard WP `property` posts.
*   **FR-03:** "Guests" filter must compare against ACF field `max_guests` (numeric comparison).
*   **FR-04:** "Price" filter must compare against ACF field `starting_price` (numeric range).
*   **FR-05:** "Bedrooms" filter must compare against ACF field `bedroom_count`.
*   **FR-06:** Taxonomy filters (Wellness, Amenities, Property Type, Access Type) must use `tax_query`.
*   **FR-07:** **Beds Filter:** The "Beds" filter in the popup will map to the `max_guests` field (sleeping capacity), while the "Bedrooms" filter uses `bedroom_count`.

### 3.2 Dynamic UI Components
*   **FR-08:** **Destination Dropdown:** Must populate dynamically from all existing `destination` terms.
*   **FR-09:** **Guest Dropdown:** Should populate with a reasonable range (e.g., 1-20) or distinct values from DB.
*   **FR-10:** **Filter Checkboxes:** All filter groups in the popup (Wellness, Amenities, etc.) must dynamically list all non-empty terms from their respective taxonomies.
*   **FR-11:** **Date Pickers:** Dates selected in the search bar must be preserved as URL parameters (e.g., `?checkin=YYYY-MM-DD`) on search, even though they do not currently filter the results.
*   **FR-12:** **Property Card:**
    *   Image: Use `prop_gallery` (first image) or Featured Image.
    *   Title: Post Title.
    *   Location: `prop_location_text`.
    *   Features: Display first 3 items from `prop_key_features` or specific taxonomies.
    *   Price: `starting_price` with `currency` and `price_period`.
    *   Link: Permalink to single property.

### 3.3 Favorites
*   **FR-13:** Toggle favorites via AJAX to avoid page reloads.
*   **FR-14:** Store favorites in User Meta key `favorite_properties` (array of integers).
*   **FR-15:** Favorites page template must query `post__in` using the stored IDs.
*   **FR-16:** If a non-logged-in (guest) user clicks the favorite icon, they must be redirected to the WordPress login page.

### 3.4 Sorting & Pagination
*   **FR-17:** Implement standard WP pagination links (Previous, Numbers, Next).
*   **FR-18:** Sort options: Default (Menu Order/Date), Price Low-High, Price High-Low.

---

## 4. Technical Considerations (Non-Functional)
*   **Performance:** Use efficient `WP_Query` arguments (limit fields if possible, though WP usually fetches full object).
*   **Security:** Sanitize all filter inputs (`$_GET`) before passing to `WP_Query`. Validate nonces for Favorites AJAX.
*   **Maintainability:** Use a separate file or function for the query logic to be reused between Archive and Favorites page if possible.

---

## 5. Success Criteria
*   **SC-01:** Destination page displays correct properties for that destination.
*   **SC-02:** Changing filters updates the property list correctly.
*   **SC-03:** "Favorites" persist across sessions for logged-in users.
*   **SC-04:** No broken layout when fields are missing (graceful degradation).
*   **SC-05:** Pagination works correctly with active filters (filters persist on page change).

---

## 6. Assumptions
*   The "Beds" filter effectively means "Sleeping Capacity" (`max_guests`) for this iteration.
*   "Location" filters in the popup correspond to the `access-type` taxonomy.
*   Users are already managed by WordPress; no new auth system needed.

---

## 7. Clarifications Required
*   **Resolved (Q1):** "Beds" filter maps to `max_guests`.
*   **Resolved (Q2):** Dates are passed to URL params but do not filter query.
*   **Resolved (Q3):** Guest users are redirected to login on favorite click.