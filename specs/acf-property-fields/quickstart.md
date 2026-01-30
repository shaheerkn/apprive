# Quickstart Guide: ACF Property Fields Implementation

**Feature**: Dynamic Single Property Page with ACF
**Date**: 2026-01-27 (Updated after Phase 7 completion)
**Audience**: Developers implementing the field structure

## Prerequisites

Before starting, verify the following are in place:

### 1. WordPress Environment
- [ ] WordPress 6.0 or higher installed
- [ ] Theme "Arprive" active
- [ ] PHP 7.4 or higher

### 2. Required Plugins
- [ ] Advanced Custom Fields Pro 6.0+ installed and activated
- [ ] ACF Pro license key activated

### 3. Post Type Verification
- [ ] Property custom post type exists (`property`)
  - If not, see [Creating Property Post Type](#creating-property-post-type-optional)

### 4. Destination Taxonomy (Required)
- [ ] Destination taxonomy exists for breadcrumb navigation
  - See [Step 4: Include Destination Taxonomy](#step-4-include-destination-taxonomy)
  - This is **required** for breadcrumb functionality in Phase 6

---

## Setup Process

### Step 1: Verify ACF JSON Configuration

The theme already has ACF JSON save/load points configured in `inc/template-functions.php`. Verify the directory exists:

```bash
# From theme root
ls -la inc/acf-json/field-groups/

# If directory doesn't exist:
mkdir -p inc/acf-json/field-groups
chmod 755 inc/acf-json/field-groups
```

**Verification**: In WordPress admin, go to Custom Fields. You should see "Sync available" notifications if JSON files exist but aren't yet synced to database.

---

### Step 2: Create Field Group (Method A: JSON Import)

**Recommended for exact replication**

1. Download the field group JSON from: `specs/acf-property-fields/contracts/property-fields.json`
2. Copy file to: `wp-content/themes/arprive/inc/acf-json/field-groups/`
3. In WordPress admin:
   - Go to **Custom Fields**
   - Click **Sync** tab
   - Find "Property Fields" and click **Sync**
4. Verify fields appeared by editing a Property post

---

### Step 2: Create Field Group (Method B: Manual Creation)

**Alternative if JSON not available**

1. Go to **Custom Fields > Add New**
2. Set **Field Group Title**: "Property Fields"
3. Configure location rule:
   - Show this field group if: **Post Type** is equal to **property**
4. Set **Settings**:
   - Position: Normal (after content)
   - Style: Default
   - Label Placement: Top
5. Add fields according to [data-model.md](./data-model.md)

**Tab Structure**:
- Add Tab field named "Basic Information"
- Add all basic info fields
- Add Tab field named "Pricing & Booking"
- Add all pricing fields
- Add Tab field named "Gallery & Media"
- Add all gallery fields
- Add Tab field named "Features & Amenities"
- Add all feature fields
- Add Tab field named "Services & Extras"
- Add all service fields

6. Click **Publish**
7. Verify JSON file was created: `inc/acf-json/field-groups/group_[hash].json`
8. Commit JSON file to Git

---

### Step 3: Include Destination Taxonomy

The destination taxonomy is **required** for breadcrumb navigation (Phase 6). The taxonomy file already exists at `inc/property-taxonomy.php` but needs to be included.

**Add to `functions.php`:**

```php
/**
 * Property Destination Taxonomy
 */
require get_template_directory() . '/inc/property-taxonomy.php';
```

**Verify taxonomy registration:**
1. Go to **Properties** menu in WordPress admin
2. You should see a **Destinations** submenu item
3. If not, check for PHP errors and verify the file was included correctly

**Create initial destination terms:**
1. Go to **Properties > Destinations**
2. Add destination terms like:
   - Courchevel
   - Val d'Isère
   - Méribel
   - Chamonix

---

### Step 4: Prepare Icon Library

The template uses SVG icons for features, rooms, and services. You have two options:

#### Option A: Upload Existing Icons

1. Collect all SVG icons from current template:
   - Key Features icons (currently hardcoded in template)
   - Room Detail icons
   - Service icons
2. Go to **Media > Add New**
3. Upload all SVG files
4. Note: WordPress may block SVG uploads. If so, add to `functions.php`:

```php
// Allow SVG uploads
function ar_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'ar_mime_types');

// Sanitize SVG on upload (security)
function ar_svg_upload_check($checked, $file, $filename, $mimes) {
    if (!$checked['type']) {
        $wp_filetype = wp_check_filetype($filename, $mimes);
        $ext = $wp_filetype['ext'];
        $type = $wp_filetype['type'];
        $proper_filename = $filename;

        if ($type && 0 === strpos($type, 'image/') && $ext !== 'svg') {
            $ext = $type = false;
        }
        $checked = compact('ext', 'type', 'proper_filename');
    }
    return $checked;
}
add_filter('wp_check_filetype_and_ext', 'ar_svg_upload_check', 10, 4);
```

#### Option B: Extract from Template

```bash
# From theme root, find all inline SVG
grep -r "<svg" single-property.php | wc -l

# Extract SVGs to individual files
# (Manual process - copy each SVG to .svg file and upload)
```

---

### Step 5: Create Validation File

Create `inc/acf-validation.php`:

```php
<?php
/**
 * ACF Custom Validation Rules
 *
 * @package Arprive
 */

// Prevent direct access
defined('ABSPATH') || exit;

/**
 * Validate pricing fields
 */
function ar_validate_property_price($valid, $value, $field, $input) {
    if (!$valid) {
        return $valid;
    }

    if ($value < 1) {
        $valid = __('Starting price must be greater than 0', 'ar');
    }

    return $valid;
}
add_filter('acf/validate_value/name=starting_price', 'ar_validate_property_price', 10, 4);

/**
 * Validate guest count
 */
function ar_validate_property_guests($valid, $value, $field, $input) {
    if (!$valid) {
        return $valid;
    }

    if ($value < 1) {
        $valid = __('Maximum guests must be at least 1', 'ar');
    }

    return $valid;
}
add_filter('acf/validate_value/name=max_guests', 'ar_validate_property_guests', 10, 4);

/**
 * Validate gallery has minimum images
 */
function ar_validate_property_gallery($valid, $value, $field, $input) {
    if (!$valid) {
        return $valid;
    }

    if (empty($value) || count($value) < 1) {
        $valid = __('Please upload at least 1 image to the main gallery', 'ar');
    }

    return $valid;
}
add_filter('acf/validate_value/name=prop_gallery', 'ar_validate_property_gallery', 10, 4);
```

**Include in functions.php**:

```php
// ACF Custom Validation
require get_template_directory() . '/inc/acf-validation.php';
```

---

### Step 6: Verify Template Parts Structure

The implementation uses modular template parts for better organization. These should already exist in your theme:

**Required Template Parts** (in `/template-parts/property/`):
- `header.php` - Property header with location, pricing, and gallery integration
- `gallery.php` - Property gallery with Swiper slider and seasonal support
- `specifications.php` - Property specs grid (guests, bedrooms, bathrooms, etc.)
- `key-features.php` - Key features repeater with icons
- `room-details.php` - Room details repeater with images
- `services.php` - Services repeater with icons
- `about.php` - About the property content area

**Verify files exist:**
```bash
ls -la template-parts/property/
```

**Expected output:**
```
about.php
gallery.php
header.php
key-features.php
room-details.php
services.php
specifications.php
```

These template parts are included in `single-property.php` using `get_template_part()`.

---

### Step 7: Configure Gallery JavaScript

The seasonal gallery toggle requires JavaScript to show/hide images based on the winter/summer toggle in the header.

**Verify Swiper.js is enqueued** (should already be in `functions.php`):
```php
// Swiper library from CDN
wp_enqueue_style( 'ar-swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css', array(), _S_VERSION );
wp_enqueue_script( 'ar-swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js', array(), _S_VERSION, true );

// Gallery script with seasonal toggle support
wp_enqueue_script( 'ar-single-chalet-gallery', get_template_directory_uri() . '/js/single-chalet-gallery.js', array('ar-swiper-js'), _S_VERSION, true );
```

**How Seasonal Gallery Works:**
1. PHP outputs ALL winter images with `class="for-winter"`
2. PHP outputs ALL summer images with `class="for-summer"`
3. CSS hides/shows slides based on body class (`color-scheme-winter` or `color-scheme-summer`)
4. JavaScript listens to header toggle and updates slide visibility
5. Swiper reinitializes to show only visible slides
6. Navigation automatically jumps to first visible slide on toggle

**File: `js/single-chalet-gallery.js`** - Should already exist with:
- `updateSlideVisibility()` - Shows/hides slides based on season
- `handleSeasonChange()` - Reinitializes Swiper on toggle
- Event listeners for header and mobile toggle switches

---

### Step 8: Create Test Property

1. Go to **Properties > Add New** (or appropriate post type menu)
2. Enter **Title**: "Test Property - Chalet Example"
3. Fill in **Basic Information** tab:
   - Location Display Name: "Courchevel 1850"
   - Select Destination taxonomy
   - Max Guests: 10
   - Bedrooms: 5
   - Bathrooms: 6
   - Size: 450
   - Access Type: "Ski-in/Ski-out"
   - Staff: "Available on request"

4. Fill in **Pricing & Booking** tab:
   - Starting Price: 3500
   - Currency: €
   - Price Period: /week
   - (Leave links empty for now)

5. Fill in **Gallery & Media** tab:
   - Upload 5-7 test images to Main Gallery
   - Leave seasonal toggle off for now

6. Fill in **Features & Amenities** tab:
   - Add 4-5 key features with icons
   - Add 4-5 room details with descriptions

7. Fill in **Services & Extras** tab:
   - Add 3-4 services

8. Add **Post Content** (About the Chalet):
   - Use block editor to add 2-3 paragraphs

9. **Publish**

---

### Step 9: Verify Field Data

Before modifying template, verify data is saving correctly:

1. Edit the test property you just created
2. Confirm all fields retained their values
3. Check JSON file was updated: `inc/acf-json/field-groups/group_[hash].json`
4. Use ACF's built-in field inspector:
   - While editing property, append `?acf_debug=1` to URL
   - Shows all field values being saved

---

## Testing Checklist

### Functional Testing

- [ ] **Field Group Visibility**: Fields appear when editing Property post type
- [ ] **Tab Navigation**: All 5 tabs are clickable and show correct fields
- [ ] **Required Fields**: Cannot publish without location, guests, bedrooms, bathrooms, price, gallery
- [ ] **Validation**: Price must be > 0, guests must be >= 1
- [ ] **Gallery Upload**: Can upload multiple images to main gallery
- [ ] **Repeater Fields**: Can add/remove feature rows, room rows, service rows
- [ ] **Group Fields**: All specification fields display correctly
- [ ] **Conditional Logic**: Winter/summer galleries only show when seasonal toggle is enabled
- [ ] **Helper Text**: All fields show clear instruction text

### Data Persistence

- [ ] **Save Draft**: Fields retain values when saving as draft
- [ ] **Publish**: Fields retain values after publishing
- [ ] **Update**: Existing field values persist when updating post
- [ ] **JSON Sync**: Field group JSON file exists in `inc/acf-json/field-groups/`

### Admin UX

- [ ] **Load Time**: Field group loads in < 2 seconds
- [ ] **Navigation**: Can find any field within 3 clicks
- [ ] **Instructions**: Helper text is clear and actionable
- [ ] **Layout**: Fields are logically organized by tab

---

## Troubleshooting

### Issue: SVG upload blocked

**Symptom**: "Sorry, this file type is not permitted for security reasons."

**Solution**: Add SVG MIME type support (see [Step 4: Prepare Icon Library](#step-4-prepare-icon-library))

---

### Issue: Field group not appearing

**Symptoms**:
- No ACF fields when editing property post
- Empty field group in ACF admin

**Solutions**:
1. Check post type: Verify you're editing a "property" post
2. Check location rules: Custom Fields > Edit "Property Fields" > Location tab
3. Check ACF Pro activation: Plugins page should show "Advanced Custom Fields PRO" active
4. Re-sync JSON: Custom Fields > Sync tab > Sync "Property Fields"

---

### Issue: JSON file not being created

**Symptom**: No file in `inc/acf-json/field-groups/`

**Solutions**:
1. Check directory permissions:
   ```bash
   chmod 755 inc/acf-json/field-groups
   ```
2. Verify save path filter is active:
   ```bash
   grep -r "ar_acf_field_groups_save_folder" inc/template-functions.php
   ```
3. Check PHP error log for permission errors

---

### Issue: Changes not syncing between environments

**Symptom**: Field changes made in dev don't appear in production

**Solution**: Use this workflow:
1. **Dev environment**: Make field changes in ACF UI
2. **Dev environment**: JSON file auto-updates in `/inc/acf-json/field-groups/`
3. **Commit to Git**: `git add inc/acf-json/ && git commit -m "Update property fields"`
4. **Production**: `git pull`
5. **Production**: Go to Custom Fields > Sync tab
6. **Production**: Click "Sync" next to "Property Fields"
7. **Never edit fields directly in production** (changes will be overwritten by JSON)

---

### Issue: Seasonal gallery not switching

**Symptom**: Winter images show in summer or vice versa, or toggle doesn't switch galleries

**Solutions**:

1. **Check seasonal toggle is enabled in ACF:**
   - Edit the property
   - Go to Gallery & Media tab
   - Verify "Use Seasonal Galleries?" is checked
   - Verify both Winter Gallery and Summer Gallery have images uploaded

2. **Verify body classes are changing:**
   - Open browser DevTools (F12)
   - Inspect `<body>` element
   - Toggle winter/summer in header
   - Body class should switch between `color-scheme-winter` and `color-scheme-summer`

3. **Check JavaScript console for errors:**
   - Open browser console (F12)
   - Look for errors in `single-chalet-gallery.js`
   - Should see: "Season changed!" log when toggling

4. **Verify ACF field return format:**
   - Go to Custom Fields > Edit "Property Fields"
   - Find "Winter Gallery" and "Summer Gallery" fields
   - Return Format should be: **Array** (not Image URL or Image ID)

5. **Check CSS classes on images:**
   - Inspect gallery slide images in DevTools
   - Winter images should have: `class="for-winter"`
   - Summer images should have: `class="for-summer"`
   - Regular images should have neither class

6. **Verify Swiper is initialized:**
   - Console should NOT show "swiperInstance is null" errors
   - Check that `js/single-chalet-gallery.js` is loaded
   - Check that Swiper CDN libraries are loaded

7. **Test toggle event listeners:**
   - Add console.log to `handleSeasonChange()` function
   - Toggle header switch and verify function is called
   - Check both desktop and mobile toggles

**Common Issue: Gallery shows wrong count or wrong slides**

This usually means `updateSlideVisibility()` isn't running correctly:
- Check that body class is being set by header toggle
- Verify Swiper `update()` is being called after visibility changes
- Check timing: `setTimeout()` may need adjustment for slower browsers

---

### Issue: Validation not working

**Symptom**: Can publish property with invalid data

**Solutions**:
1. Verify `inc/acf-validation.php` exists
2. Check it's included in `functions.php`
3. Verify filter names match field names exactly:
   - `starting_price` (not `prop_pricing_starting_price`)
   - `max_guests` (not `prop_specs_max_guests`)
4. Clear any caching plugins

---

## Optional: Creating Property Post Type

If property post type doesn't exist, add to `functions.php`:

```php
/**
 * Register Property Custom Post Type
 */
function ar_register_property_post_type() {
    $labels = array(
        'name'                  => _x('Properties', 'Post Type General Name', 'ar'),
        'singular_name'         => _x('Property', 'Post Type Singular Name', 'ar'),
        'menu_name'             => __('Properties', 'ar'),
        'add_new_item'          => __('Add New Property', 'ar'),
        'edit_item'             => __('Edit Property', 'ar'),
        'view_item'             => __('View Property', 'ar'),
        'all_items'             => __('All Properties', 'ar'),
    );

    $args = array(
        'label'               => __('Property', 'ar'),
        'labels'              => $labels,
        'supports'            => array('title', 'editor', 'thumbnail'),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-admin-home',
        'show_in_rest'        => true,
        'has_archive'         => true,
        'rewrite'             => array('slug' => 'properties'),
    );

    register_post_type('property', $args);
}
add_action('init', 'ar_register_property_post_type', 0);
```

After adding, flush rewrite rules:
1. Go to **Settings > Permalinks**
2. Click **Save Changes** (no changes needed)

---

## Optional: Destination Taxonomy Advanced Configuration

The destination taxonomy is already included via `inc/property-taxonomy.php` (see Step 3). This section covers advanced customization options.

**File Location:** `/inc/property-taxonomy.php`

**Default Configuration:**
- **Hierarchical:** Yes (can have parent/child destinations)
- **Public:** Yes (has archive pages)
- **Show in REST:** Yes (Block Editor support)
- **Slug:** `destination` (URLs like `/destination/courchevel/`)

**To Customize:**
Edit `/inc/property-taxonomy.php` and modify the `$args` array:

```php
$args = array(
    'labels'            => $labels,
    'hierarchical'      => true,        // Set to false for tag-like behavior
    'public'            => true,
    'show_admin_column' => true,        // Shows in property list table
    'rewrite'           => array(
        'slug'         => 'destination', // Change URL slug if needed
        'hierarchical' => true,
    ),
);
```

**Creating Hierarchical Destinations:**
Example structure for nested locations:
```
Courchevel (parent)
├── Courchevel 1850 (child)
├── Courchevel 1650 (child)
└── Courchevel 1550 (child)
```

1. Go to **Properties > Destinations**
2. Add parent term: "Courchevel"
3. Add child terms and select "Courchevel" as parent

---

## Implementation Status

**Completed Implementation (Phases 1-7):**

1. ✅ **Phase 1-3**: Field groups created and tested
2. ✅ **Phase 4**: Template integration in `single-property.php`
3. ✅ **Phase 5**: Template parts created in `/template-parts/property/`
4. ✅ **Phase 6**: Breadcrumb navigation with dynamic destination
5. ✅ **Phase 7**: Code review, validation, and testing documentation
6. ✅ **Gallery System**: Swiper slider with seasonal winter/summer toggle
7. ✅ **All User Stories**: Header, Gallery, Features/Services, Breadcrumbs

**Remaining Manual Testing:**

See [PHASE7-SUMMARY.md](./PHASE7-SUMMARY.md) for comprehensive testing checklists:
- T111: WordPress Coding Standards (PHPCS)
- T112-T114: Create test properties (comprehensive, minimal, edge cases)
- T115: Performance testing (< 3 second page load)
- T116-T118: User experience testing (creation time, accessibility, helper text)
- T119-T120: Visual regression and edge case testing
- T121: Commit ACF JSON to Git
- T124-T125: Success criteria validation and end-to-end testing

**For detailed task breakdown:** See [tasks.md](./tasks.md)

---

## Reference Links

- [ACF Documentation](https://www.advancedcustomfields.com/resources/)
- [ACF Local JSON](https://www.advancedcustomfields.com/resources/local-json/)
- [ACF Repeater Field](https://www.advancedcustomfields.com/resources/repeater/)
- [ACF Gallery Field](https://www.advancedcustomfields.com/resources/gallery/)
- [WordPress Template Hierarchy](https://developer.wordpress.org/themes/basics/template-hierarchy/)
- [Data Model Documentation](./data-model.md)
- [Implementation Plan](./plan.md)

---

## Support

If you encounter issues not covered in troubleshooting:

1. Check ACF support forum: https://support.advancedcustomfields.com/
2. Review WordPress debug log: `wp-content/debug.log` (if WP_DEBUG enabled)
3. Verify plugin/WordPress versions meet requirements
4. Test with default WordPress theme to isolate theme-specific issues
