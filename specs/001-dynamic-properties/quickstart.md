# Quick Start & Manual Testing Guide

**Feature**: 001-dynamic-properties

## Prerequisites
1.  Local WordPress environment running.
2.  ACF Pro installed and active.
3.  Theme active.

## Setup Data
1.  **Create Terms**:
    *   Go to **Properties > Destinations** and create terms: "Courchevel", "Megeve".
    *   Go to **Properties > Amenities** and create terms: "Wifi", "Parking".
    *   Go to **Properties > Property Types** and create terms: "Chalet", "Apartment".
2.  **Create Properties**:
    *   Create 3-5 Properties.
    *   Assign them different destinations, prices (`starting_price`), guests (`max_guests`), and bedrooms (`bedroom_count`).
    *   Set Featured Images for each.

## Manual Test Cases

### 1. Archive Page Rendering
1.  Navigate to `/destination/courchevel/` (or view page of "Courchevel" term).
2.  **Verify**: Only properties assigned to "Courchevel" are displayed.
3.  **Verify**: Property cards show correct Title, Price, Location text, and Image.

### 2. Filtering
1.  **Guests**: Select a number in "Guests" dropdown (e.g., 4). Click Search.
    *   **Verify**: Only properties with `max_guests >= 4` remain.
2.  **Price**: Open filters popup. Adjust price range slider. Click Search.
    *   **Verify**: Properties outside the price range disappear.
3.  **Amenities**: Check "Wifi". Click Search.
    *   **Verify**: Only properties with "Wifi" amenity remain.

### 3. Sorting
1.  Select "Price: Low to High" from dropdown.
    *   **Verify**: Properties reorder with cheapest first.

### 4. Favorites (Logged In)
1.  Login as a user.
2.  Click the Heart icon on a property.
    *   **Verify**: Heart icon turns solid (filled).
3.  Refresh page.
    *   **Verify**: Heart icon remains filled.
4.  Navigate to `/favorites` page (create a page with "Favourites" template if needed).
    *   **Verify**: The favorited property appears in the grid.

### 5. Favorites (Guest)
1.  Logout.
2.  Click the Heart icon on a property.
    *   **Verify**: You are redirected to the WordPress login page.
