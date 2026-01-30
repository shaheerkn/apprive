# ACF Implementation Research: Best Practices for WordPress Property Fields

**Date**: 2026-01-26
**Feature**: Dynamic Single Property Page with ACF
**Target**: WordPress 6.0+ and ACF Pro 6.0+
**Status**: Research Complete

## Executive Summary

This document compiles best practices and architectural decisions for implementing Advanced Custom Fields (ACF) in a real estate/property theme context. Research focuses on field organization, performance optimization, version control workflows, and content management strategies specifically for complex content types like property listings.

---

## 1. ACF Field Group Organization Strategies

### 1.1 Tab Layout Implementation

**Decision**: Use Tab Fields for logical section grouping in complex field sets.

**Rationale**:
- Tab fields simplify complex admin interfaces by categorizing related fields
- Reduces visual clutter and cognitive load for content managers
- Allows editors to focus on one section at a time (Content, Layout, Media, etc.)

**Recommended Tab Structure for Property Post Type**:
```
- Tab: Basic Information
  - Property title/location fields
  - Pricing information
  - Specifications (guests, bedrooms, bathrooms)

- Tab: Media Gallery
  - Main property gallery
  - Seasonal images (winter/summer)
  - Room layout images

- Tab: Features & Amenities
  - Key features (checkboxes/repeater)
  - Wellness/spa facilities
  - Room & space details

- Tab: Services & Contact
  - In-chalet services
  - Contact/booking information
  - Availability settings
```

**Best Practice**: Set tab layout to **Block** format for visual grouping, where sub-fields display inside a visually distinct box with padding.

**Alternative Considered**: Accordion fields - rejected because tabs provide better overview and allow faster navigation between sections.

**Sources**:
- [ACF Group Fields Complete Guide](https://wpbuilderaddons.com/tutorial/acf-group-fields-complete-guide/)
- [8 Best Practices for Advanced Custom Fields](https://medium.com/@virgiliuweb/8-best-practices-for-advanced-custom-fields-acf-8d005068e2d8)
- [ACF Tab Resource](https://www.advancedcustomfields.com/resources/tab/)

---

### 1.2 Group Fields for Related Data

**Decision**: Use Group fields to bundle logically related information.

**Rationale**:
- Groups create clean parent-child relationships in data structure
- Simplifies template code by accessing related data as a single object
- Improves admin UI organization without requiring separate field groups

**Implementation Pattern**:
```php
// Property Specifications Group
$specs = get_field('property_specs');
$guests = $specs['max_guests'];
$bedrooms = $specs['bedroom_count'];
$bathrooms = $specs['bathroom_count'];
```

**Best Practice**: Use Group fields when you want to logically bundle related information together that always appears as a unit (e.g., all property specifications, all contact details).

**Sources**:
- [ACF Group Field Guide - Savvy](https://savvy.co.il/en/blog/wordpress-development/acf-group-field-guide/)
- [Advanced Custom Fields Guide 2026](https://mantraideas.com/advanced-custom-fields-wordpress-guide/)

---

### 1.3 Local JSON for Performance & Version Control

**Decision**: MUST enable Local JSON feature for all ACF field groups.

**Rationale**:
- Saves field groups as JSON files in theme directory
- Reduces database queries by loading fields from files
- Enables version control and synchronization across environments
- Critical for team development workflows

**Implementation**:
```bash
# Create directory in theme root
mkdir acf-json
chmod 755 acf-json
```

**Workflow**:
1. Development: Edit field groups on local environment
2. Git: Commit JSON files to repository
3. Production: Sync field groups via ACF admin interface

**Performance Impact**: Loading field groups from JSON files is significantly faster than database queries, especially with large field configurations.

**Sources**:
- [ACF Local JSON Resource](https://www.advancedcustomfields.com/resources/local-json/)
- [Improving ACF Performance](https://www.advancedcustomfields.com/resources/improving-acf-performance/)

---

## 2. Repeater vs Flexible Content: Decision Matrix

### 2.1 When to Use Repeater Fields

**Use Case**: Fixed-structure repeating data where every row has identical fields.

**Property Theme Examples**:
- Room layout list (bedroom name, bed type, count)
- Amenity list (icon, feature name, description)
- Service items (service name, availability, price)

**Characteristics**:
- Table-like interface with consistent columns
- Enforces uniform data structure
- Simpler for content managers to understand
- Better performance than Flexible Content

**Template Pattern**:
```php
<?php if( have_rows('room_details') ): ?>
    <ul class="room-list">
    <?php while( have_rows('room_details') ): the_row();
        $room_name = get_sub_field('room_name');
        $room_type = get_sub_field('room_type');
        ?>
        <li><?php echo esc_html($room_name . ' - ' . $room_type); ?></li>
    <?php endwhile; ?>
    </ul>
<?php endif; ?>
```

**Decision for Property Fields**: Use Repeaters for:
- Room & Space Details (fixed structure: name, type, description)
- Key Features list (fixed structure: icon, title, description)
- Service items (fixed structure: service name, icon, availability)

**Sources**:
- [Difference between Repeater & Flexible Content](https://support.advancedcustomfields.com/forums/topic/difference-between-repeater-flexible-content-field/)
- [ACF Repeater & Flexible Content Fields - DEV](https://dev.to/leanminmachine/wordpress-acf-repeater--flexible-content-fields-4dpa)

---

### 2.2 When to Use Flexible Content

**Use Case**: Variable-structure content where rows can have different layouts/fields.

**Property Theme Examples**:
- Page builder sections (NOT needed for single property)
- Multi-format content blocks (hero, text, gallery, video)
- Landing page construction

**Characteristics**:
- Each row can be a different "layout" with unique fields
- Greater editorial flexibility
- More complex for content managers
- Higher performance overhead

**Decision for Property Fields**: **NOT recommended** for this implementation because:
1. Property data has consistent, predictable structure
2. Repeater fields are sufficient and more performant
3. Content managers benefit from consistent field patterns
4. Flexible Content adds unnecessary complexity

**When to Reconsider**: If future requirements include fully customizable property page layouts with varying section types, Flexible Content becomes appropriate.

**Sources**:
- [ACF Flexible Content Resource](https://www.advancedcustomfields.com/resources/flexible-content/)
- [Using ACF Flexible Content in WordPress](https://www.wpallimport.com/acf-flexible-content/)

---

## 3. ACF Field Naming Conventions

### 3.1 Prefix Strategy

**Decision**: Use `prop_` prefix for all property-related top-level fields.

**Rationale**:
- Prevents conflicts with other plugins/themes
- Creates clear namespace for property fields
- Enables quick identification in database queries
- Follows ACF best practices for uniqueness

**Naming Pattern**:
```
prop_gallery           (top-level field)
prop_price_amount      (top-level field)
prop_specs             (group field)
  ├─ max_guests        (sub-field - no prefix needed)
  ├─ bedroom_count     (sub-field)
  └─ bathroom_count    (sub-field)
```

**Why Sub-fields Don't Need Prefix**: ACF automatically prefixes sub-field meta keys with parent field name, creating unique keys like `prop_specs_0_max_guests`.

**Sources**:
- [Best practices for naming fields - ACF Support](https://support.advancedcustomfields.com/forums/topic/best-practice-for-name-the-fields/)
- [Best Practices when Designing Custom Fields](https://www.advancedcustomfields.com/blog/best-practices-designing-custom-fields/)

---

### 3.2 Naming Convention Rules

**Established Standards**:

1. **Use lowercase with underscores**: `prop_room_details` ✅ not `propRoomDetails` ❌
2. **Be descriptive but concise**: `prop_max_guests` ✅ not `prop_maximum_number_of_guests` ❌
3. **Avoid redundancy in sub-fields**:
   - Parent: `staff_members`, Child: `thumbnail` ✅
   - Parent: `staff_members`, Child: `staff_members_thumbnail` ❌ (creates `staff_members_0_staff_members_thumbnail`)
4. **Use consistent terminology**: If using "bedroom_count", don't also use "num_bathrooms"
5. **Prefix all top-level fields**: Ensures uniqueness across all post types

**Real-World Example for Property Fields**:
```
prop_gallery               // Gallery repeater
prop_seasonal_winter       // Seasonal gallery
prop_seasonal_summer       // Seasonal gallery
prop_price_amount          // Number field
prop_price_period          // Text field
prop_specs                 // Group field
  ├─ max_guests
  ├─ bedroom_count
  ├─ bathroom_count
  ├─ size_sqm
prop_features              // Repeater field
  ├─ icon
  ├─ title
  ├─ description
```

**Critical Warning**: Changing field names after deployment causes data disconnection. There is no safe way to rename fields and update all existing content automatically.

**Sources**:
- [Naming convention for WordPress custom fields](https://kamilgrzegorczyk.com/2017/10/12/best-practices-naming-convention-for-wordpress-custom-fields/)
- [Naming Conventions / Cleaning Up - ACF Support](https://support.advancedcustomfields.com/forums/topic/naming-conventions-cleaning-up/)

---

## 4. Performance Considerations

### 4.1 Local JSON Implementation (Required)

**Status**: MANDATORY for production deployment.

**Benefits**:
- **Performance**: Eliminates database queries for field configuration
- **Version Control**: JSON files can be tracked in Git
- **Deployment**: Automatic sync across environments
- **Team Collaboration**: Field changes are code-reviewable

**Setup Steps**:
```bash
# In theme root directory
mkdir acf-json
chmod 755 acf-json
```

ACF automatically saves/loads field groups from this directory when present.

**Sources**:
- [ACF Local JSON Resource](https://www.advancedcustomfields.com/resources/local-json/)
- [Improving ACF Performance](https://www.advancedcustomfields.com/resources/improving-acf-performance/)

---

### 4.2 Autoload Settings for Options Pages

**Decision**: Autoload property-related global options.

**Context**: If creating ACF Options pages for global property settings (e.g., default currency, booking URL), enable autoloading for frequently accessed data.

**Implementation**:
```php
acf_add_options_page(array(
    'page_title' => 'Property Settings',
    'menu_slug'  => 'property-settings',
    'autoload'   => true  // For data used on every page load
));
```

**Caution**: Only autoload data that appears on most/all pages (headers, footers). Don't autoload property-specific data.

**Sources**:
- [Improving ACF Performance](https://www.advancedcustomfields.com/resources/improving-acf-performance/)
- [Optimizing Advanced Custom Fields for Fast WordPress Sites](https://acfcopilotplugin.com/blog/optimizing-advanced-custom-fields-for-fast-wordpress-sites/)

---

### 4.3 Image Optimization & Lazy Loading

**Decisions**:

1. **Use WordPress Image Sizes**: Register appropriate thumbnail sizes for property images
   ```php
   add_image_size('property-gallery', 1200, 800, true);
   add_image_size('property-thumbnail', 400, 300, true);
   ```

2. **Return Image ID, Not URL**: Configure ACF image fields to return ID
   ```php
   $image_id = get_field('prop_gallery_image');
   echo wp_get_attachment_image($image_id, 'property-gallery', false, ['loading' => 'lazy']);
   ```

3. **Native Browser Lazy Loading**: Use WordPress `loading="lazy"` attribute (supported in WP 5.5+)

**Performance Impact**: Proper image sizing reduces page weight by 60-80% compared to full-size images.

**Sources**:
- [Lazy Loading ACF Fields with Shortcodes](https://acfcopilotplugin.com/blog/lazy-loading-acf-fields-with-shortcodes-for-faster-page-loads/)
- [Optimizing Advanced Custom Fields](https://acfcopilotplugin.com/blog/optimizing-advanced-custom-fields-for-fast-wordpress-sites/)

---

### 4.4 Field Group Location Rules

**Decision**: Use specific location rules to load field groups only where needed.

**Implementation**:
```php
// Only load on Property post type
'location' => array(
    array(
        array(
            'param'    => 'post_type',
            'operator' => '==',
            'value'    => 'property',
        ),
    ),
)
```

**Performance Benefit**: Prevents ACF from loading unnecessary field configurations on other post types/pages.

**Sources**:
- [Speeding up Advanced Custom Fields](https://stevencotterill.com/articles/speeding-up-advanced-custom-fields/)
- [Tips & Tricks for Optimizing ACF Performance](https://wpfieldwork.com/optimizing-acf-performance/)

---

## 5. ACF JSON Sync & Version Control Workflows

### 5.1 Recommended Git Workflow

**Process**:

1. **Development**:
   ```bash
   # Edit field groups in WordPress admin (local environment only)
   # ACF automatically writes to /acf-json/
   git status  # Shows modified JSON files
   git add acf-json/
   git commit -m "Update property field groups: add seasonal gallery fields"
   ```

2. **Code Review**:
   - JSON files are human-readable and diff-friendly
   - Reviewers can see field changes without database access

3. **Deployment to Staging/Production**:
   ```bash
   git pull origin main
   # Navigate to WordPress Admin > Custom Fields
   # Click "Sync available" for modified field groups
   ```

**Critical Rule**: Only edit field groups in development environment. Lock field editing on production by setting:
```php
// In wp-config.php for production
define('WP_LOCAL_DEV', false);

// In functions.php
if (!defined('WP_LOCAL_DEV') || !WP_LOCAL_DEV) {
    add_filter('acf/settings/show_admin', '__return_false');
}
```

**Sources**:
- [Using Advanced Custom Fields with version control](https://www.billerickson.net/acf-json-with-git/)
- [Git deploy workflow for ACF Local JSON](https://support.advancedcustomfields.com/forums/topic/git-deploy-workflow-for-acf-local-json-only-sync-on-production/)

---

### 5.2 Avoiding Merge Conflicts

**Problem**: ACF JSON files include `modified` timestamps that change on every save, causing merge conflicts.

**Solution - Team Workflow**:

1. **Communicate Field Changes**: Alert team when committing field group updates
2. **Immediate Sync**: After pulling changes, sync immediately in WordPress admin
3. **Revert Timestamp Changes**: After sync, discard local JSON timestamp changes
   ```bash
   git pull
   # Sync in WordPress admin
   git checkout acf-json/  # Revert auto-generated timestamp updates
   ```

4. **Use Feature Branches**: Create field groups in separate branches to minimize conflicts

**Advanced Option - Force Sync (ACF Extended)**:
Install ACF Extended plugin to enable automatic JSON synchronization without manual clicking.

**Sources**:
- [How to avoid conflicts when using ACF Local JSON](https://www.awesomeacf.com/how-to-avoid-conflicts-when-using-the-acf-local-json-feature/)
- [The acf-json workflow](https://support.advancedcustomfields.com/forums/topic/the-acf-json-workflow/)
- [ACF Field Groups Force Sync - ACF Extended](https://www.acf-extended.com/features/field-groups/force-sync)

---

### 5.3 Storage Location Best Practices

**Decision**: Store ACF JSON in theme directory (`/acf-json/`) for this project.

**Rationale**:
- Property field structure is tightly coupled with theme templates
- Field groups are theme-specific, not site-wide functionality
- Simplifies theme deployment and version control

**Alternative Considered**: Core functionality plugin
- **Use Case**: Multi-theme sites or when field groups should persist across theme changes
- **Not Applicable**: Property fields are specifically designed for this theme's single-property.php template

**Implementation**:
```
/wp-content/themes/arprive/
  ├─ acf-json/
  │   ├─ group_property_basic_info.json
  │   ├─ group_property_gallery.json
  │   ├─ group_property_features.json
  │   └─ group_property_services.json
  ├─ single-property.php
  └─ functions.php
```

**Sources**:
- [ACF Synchronized JSON](https://www.advancedcustomfields.com/resources/synchronized-json/)
- [Easily sync your ACF fields using acf-json](https://www.starboardmedia.co.uk/easily-sync-your-acf-fields-using-acf-json/)

---

## 6. Fallback Handling for Empty ACF Fields

### 6.1 Conditional Display Pattern

**Decision**: Use conditional checks before displaying any ACF field value.

**Standard Template Pattern**:
```php
<?php if( get_field('prop_price_amount') ): ?>
    <div class="property-price">
        €<?php the_field('prop_price_amount'); ?> / <?php the_field('prop_price_period'); ?>
    </div>
<?php endif; ?>
```

**Rationale**:
- Prevents empty HTML elements from rendering
- Maintains clean markup
- Avoids accessibility issues with empty containers

**Sources**:
- [ACF - Hiding empty fields](https://www.advancedcustomfields.com/resources/hiding-empty-fields/)
- [Display if not empty - ACF Support](https://support.advancedcustomfields.com/forums/topic/display-if-not-empty/)

---

### 6.2 Fallback Values Strategy

**Decision**: Provide default values for critical fields, hide optional fields when empty.

**Critical Fields (Require Fallback)**:
```php
// Property title with fallback
$property_title = get_field('prop_custom_title') ?: get_the_title();

// Guest count with fallback
$max_guests = get_field('prop_specs')['max_guests'] ?: 'Contact for details';

// Gallery with fallback to featured image
$gallery = get_field('prop_gallery');
if (!$gallery && has_post_thumbnail()) {
    $gallery = [get_post_thumbnail_id()];
}
```

**Optional Fields (Hide When Empty)**:
```php
// Wellness section - hide entire block if no content
<?php if( get_field('prop_wellness_description') || get_field('prop_wellness_facilities') ): ?>
    <section class="wellness-section">
        <?php if( get_field('prop_wellness_description') ): ?>
            <p><?php the_field('prop_wellness_description'); ?></p>
        <?php endif; ?>
        <!-- facilities list -->
    </section>
<?php endif; ?>
```

**Best Practice**: Set default values in ACF field configuration when appropriate (e.g., default currency "EUR", default price period "night").

**Sources**:
- [Custom link with fallback if empty?](https://support.advancedcustomfields.com/forums/topic/custom-link-with-fallback-if-empty/)
- [How to Display ACF Fields in WordPress Templates](https://wowwp.com/how-to-display-acf-fields-in-wordpress-templates/)

---

### 6.3 Security & Escaping

**Decision**: ALWAYS escape output based on context.

**Escaping Rules**:
```php
// Plain text
echo esc_html($property_title);

// Attributes
echo '<div class="' . esc_attr($class_name) . '">';

// URLs
echo '<a href="' . esc_url($booking_link) . '">Book Now</a>';

// Rich text (WYSIWYG)
echo wp_kses_post($property_description);

// Numbers
echo absint($bedroom_count);
```

**Validation for User Input** (if using acf_form on frontend):
```php
add_filter('acf/validate_value/name=prop_price_amount', 'validate_price', 10, 4);
function validate_price($valid, $value, $field, $input) {
    if ($valid && !is_numeric($value)) {
        $valid = 'Price must be a number';
    }
    return $valid;
}
```

**Sources**:
- [How to Display ACF Fields in WordPress Templates](https://wowwp.com/how-to-display-acf-fields-in-wordpress-templates/)

---

## 7. Icon Selection & Management

### 7.1 Icon Field Options Analysis

**Available Solutions**:

1. **ACF Icon Picker Field (Official)**
   - Native ACF Pro field type (ACF 6.3+)
   - Supports: Dashicons, Media Library, URL
   - **Pros**: Built-in, no dependencies, simple
   - **Cons**: Limited icon libraries, Dashicons dated

2. **ACF Font Awesome Field Plugin**
   - Third-party plugin integrating Font Awesome
   - Custom icon set builder available
   - **Pros**: Large icon library, regularly updated
   - **Cons**: External dependency, CDN or local files needed

3. **ACF Open Icons**
   - Access to Lucide, Tabler, Heroicons
   - **Pros**: SVG stored directly in field data, zero external dependencies, no performance impact
   - **Cons**: Requires plugin installation

**Sources**:
- [ACF Icon Picker Resource](https://www.advancedcustomfields.com/resources/icon-picker/)
- [ACF Open Icons](https://acfopenicons.com/)
- [Advanced Custom Fields: Font Awesome Field Plugin](https://wordpress.org/plugins/advanced-custom-fields-font-awesome/)

---

### 7.2 Recommended Approach for Property Theme

**Decision**: Use **ACF Icon Picker (Official)** with SVG files from Media Library.

**Rationale**:
1. **No External Dependencies**: Icons stored in theme/media library
2. **Full Control**: Custom SVG icons match brand design
3. **Performance**: No CDN requests or font loading
4. **Flexibility**: Easy to add custom icons as needed

**Implementation**:
```php
// Field configuration
'type' => 'icon_picker',
'label' => 'Feature Icon',
'tabs' => 'library,url',  // Allow Media Library and URL
'return_format' => 'array',

// Template usage
$icon = get_sub_field('icon');
if ($icon) {
    if ($icon['type'] === 'library') {
        echo wp_get_attachment_image($icon['id'], 'thumbnail');
    } elseif ($icon['type'] === 'url') {
        echo '<img src="' . esc_url($icon['url']) . '" alt="">';
    }
}
```

**Icon Library Setup**:
```
/wp-content/themes/arprive/assets/icons/
  ├─ spa.svg
  ├─ pool.svg
  ├─ chef.svg
  ├─ ski.svg
  └─ ...
```

Upload all icons to Media Library with consistent naming: "Property Icon - Spa", "Property Icon - Pool"

**Alternative for Simple Icons**: If only using basic icons, store icon class names (e.g., "icon-spa") in a Select field and use CSS/icon font.

**Sources**:
- [ACF Icon Picker Resource](https://www.advancedcustomfields.com/resources/icon-picker/)
- [ACF Icon Picker - WP Dev Design](https://wpdevdesign.com/acf-icon-picker/)

---

## 8. Seasonal Content Handling

### 8.1 Approaches Comparison

**Option A: Date-Based Automation**
- **Implementation**: PHP logic checks current date and displays winter (Nov-Apr) or summer (May-Oct) images
- **Pros**: Fully automated, no manual management
- **Cons**: Requires maintenance if seasons change, assumes fixed seasonal dates

**Option B: Manual Toggle**
- **Implementation**: True/False field to switch between seasonal galleries
- **Pros**: Full editorial control, works for non-date-based seasons (e.g., events)
- **Cons**: Requires manual updates, risk of forgetting to toggle

**Option C: Combined Approach** ⭐ **RECOMMENDED**
- **Implementation**: Store both seasonal galleries + automatic date logic with manual override
- **Pros**: Best of both worlds - automated with editorial control
- **Cons**: Slightly more complex setup

**Sources**:
- [ACF Conditional Logic Resource](https://www.advancedcustomfields.com/resources/conditional-logic/)
- [ACF Conditional Blocks](https://www.advancedcustomfields.com/blog/wordpress-conditional-content/)
- [Block Visibility Plugin](https://wordpress.org/plugins/block-visibility/)

---

### 8.2 Recommended Implementation

**Decision**: Combined approach with date-based default and manual override.

**Field Structure**:
```
prop_seasonal_mode       // Select: auto | winter | summer
prop_winter_gallery      // Gallery field
prop_summer_gallery      // Gallery field
```

**Template Logic**:
```php
$seasonal_mode = get_field('prop_seasonal_mode') ?: 'auto';
$current_month = date('n');

// Determine which season to show
if ($seasonal_mode === 'auto') {
    $is_winter = ($current_month >= 11 || $current_month <= 4);
    $season = $is_winter ? 'winter' : 'summer';
} else {
    $season = $seasonal_mode;
}

// Get appropriate gallery
$gallery_field = ($season === 'winter') ? 'prop_winter_gallery' : 'prop_summer_gallery';
$gallery = get_field($gallery_field);

// Fallback to opposite season if current season empty
if (!$gallery) {
    $fallback_field = ($season === 'winter') ? 'prop_summer_gallery' : 'prop_winter_gallery';
    $gallery = get_field($fallback_field);
}
```

**Benefits**:
- Automatic seasonal switching (default)
- Manual override for special cases (e.g., early snow, late spring)
- Graceful fallback if one season has no images
- Clear to content managers (3 options in dropdown)

**Alternative for Simple Use Case**: If properties don't actually change seasonally, use a single gallery with optional "alternate gallery" field and toggle instead.

**Sources**:
- [Advanced Customizations with Conditional Logic](https://acfcopilotplugin.com/blog/advanced-customizations-with-conditional-logic-in-acf-and-shortcodes/)
- [ACF date as conditional - Beaver Builder Forum](https://community.wpbeaverbuilder.com/t/acf-date-as-conditional/12171)

---

## 9. Required Field Validation

### 9.1 Built-in Validation

**Decision**: Use ACF's native "Required?" checkbox for essential fields.

**Required Fields for Property**:
- Property Title (or use post title)
- Location/Destination
- Maximum Guests
- Bedroom Count
- Starting Price

**Implementation**: Simply toggle "Required?" in field settings. ACF will prevent publishing until filled.

**Sources**:
- [ACF acf/validate_save_post Resource](https://www.advancedcustomfields.com/resources/acf-validate_save_post/)
- [ACF 6.3.0 Release - Blocks Validation](https://www.advancedcustomfields.com/blog/acf-6-3-0-released/)

---

### 9.2 Custom Validation Rules

**Decision**: Implement custom validation for complex field requirements.

**Use Cases**:
- Price must be greater than 0
- Guest count must be at least 1
- Size in m² must be positive number
- Contact URL must be valid URL format

**Implementation Pattern**:
```php
add_filter('acf/validate_value/name=prop_price_amount', 'validate_price', 10, 4);
function validate_price($valid, $value, $field, $input) {
    if ($valid && (!is_numeric($value) || $value <= 0)) {
        return 'Price must be a positive number';
    }
    return $valid;
}

add_filter('acf/validate_value/name=prop_specs', 'validate_guest_count', 10, 4);
function validate_guest_count($valid, $value, $field, $input) {
    if ($valid && isset($value['max_guests']) && $value['max_guests'] < 1) {
        return 'Property must accommodate at least 1 guest';
    }
    return $valid;
}
```

**Best Practice**: Use `acf/validate_value` filter for field-specific validation rather than global `acf/validate_save_post` action.

**User Experience**: Validation errors display inline next to the field, preventing form submission until resolved.

**Sources**:
- [ACF acf/validate_value Resource](https://www.advancedcustomfields.com/resources/acf-validate_value/)
- [Advanced Validation - ACF Extended](https://www.acf-extended.com/features/field-settings/advanced-validation)
- [Custom Validation - ACF Support](https://support.advancedcustomfields.com/forums/topic/custom-validation/)

---

### 9.3 Conditional Required Fields

**Use Case**: Make fields required only under certain conditions (e.g., if "Has Spa" is checked, require "Spa Description").

**Implementation**:
```php
add_filter('acf/validate_value/name=prop_wellness_description', 'validate_wellness', 10, 4);
function validate_wellness($valid, $value, $field, $input) {
    // Get wellness checkbox value
    $has_wellness = isset($_POST['acf']['prop_has_wellness']) ? $_POST['acf']['prop_has_wellness'] : 0;

    // If wellness is enabled but description empty
    if ($valid && $has_wellness && empty($value)) {
        return 'Wellness description is required when wellness facilities are available';
    }
    return $valid;
}
```

**Alternative**: Use ACF's Conditional Logic to show/hide fields, making validation cleaner:
```
Field: prop_wellness_description
Conditional Logic: Show if prop_has_wellness equals 1
Required: Yes
```

**Sources**:
- [ACF Conditional Logic Resource](https://www.advancedcustomfields.com/resources/conditional-logic/)
- [Required fields validation - ACF Support](https://support.advancedcustomfields.com/forums/topic/required-fields-validation/)

---

## 10. Real Estate Specific Best Practices

### 10.1 Common Field Patterns

**Property Specifications Group**:
```
Group: prop_specs
  ├─ Number: max_guests (min: 1, required)
  ├─ Number: bedroom_count (min: 0)
  ├─ Number: bathroom_count (min: 0)
  ├─ Number: size_sqm (append: m²)
  ├─ Select: access_type (options: Gondola, Ski-in/Ski-out, etc.)
  └─ True/False: staff_included
```

**Pricing Group**:
```
Group: prop_pricing
  ├─ Number: price_amount (required)
  ├─ Select: currency (default: EUR)
  ├─ Text: price_period (default: night)
  └─ URL: availability_link
```

**Amenities Pattern** (Checkbox vs Repeater Decision):
- **Use Checkbox**: For fixed, predefined list (WiFi, Parking, Pool, Spa)
- **Use Repeater**: For custom features that need descriptions/icons

**Sources**:
- [Using ACF checkbox for property features list](https://support.advancedcustomfields.com/forums/topic/using-acf-checkbox-to-create-property-features-list-for-real-estate-website/)
- [Create a Real Estate WordPress Website Using ACF & Elementor](https://elementor.com/academy/create-a-real-estate-wordpress-website-using-acf-elementor/)

---

### 10.2 Tab Organization for Properties

**Recommended Structure** (5 tabs):

**Tab 1: Basic Information**
- Property Title (optional - can use post title)
- Location/Destination
- Short Description (optional - can use excerpt)
- Property Specifications Group

**Tab 2: Pricing & Booking**
- Pricing Group
- Availability Link
- Contact/Chat Link
- Booking Terms (optional)

**Tab 3: Gallery & Media**
- Main Gallery
- Seasonal Galleries (winter/summer)
- Room Layout Images
- Video Tour URL (optional)

**Tab 4: Features & Amenities**
- Key Features (Repeater with icon/title/description)
- Wellness Facilities Group
- Room & Space Details (Repeater)

**Tab 5: Services & Extras**
- In-Chalet Services (Repeater or Checkboxes)
- Additional Services
- Staff Information

**Rationale**: This structure mirrors the natural content creation flow and groups related fields logically.

**Sources**:
- [Advanced Custom Fields Pro & Elementor Pro - Real Estate Tutorial](https://wptuts.co.uk/advanced-custom-fields-pro-elementor-pro-real-estate-website/)
- [ACF Tab Resource](https://www.advancedcustomfields.com/resources/tab/)

---

### 10.3 Helper Text Best Practices

**Decision**: Every field MUST include clear instructions in the "Instructions" field setting.

**Examples**:
```
Field: prop_price_amount
Instructions: Enter the starting price per night in euros (numbers only, no symbols)

Field: prop_seasonal_mode
Instructions: Choose "Auto" to automatically switch between winter and summer galleries based on date, or manually select which season to display.

Field: prop_features (Repeater)
Instructions: Add key property features. Each feature should have an icon, short title, and brief description. These display in the "Key Features" section.

Field: prop_max_guests
Instructions: Maximum number of guests the property can accommodate (required)
```

**Benefit**: Reduces training time and support requests from content managers.

**Best Practice**: Write instructions from content manager's perspective, not developer's perspective. Avoid technical jargon.

**Sources**:
- [Best Practices when Designing Custom Fields](https://www.advancedcustomfields.com/blog/best-practices-designing-custom-fields/)
- [8 Best Practices for Advanced Custom Fields](https://medium.com/@virgiliuweb/8-best-practices-for-advanced-custom-fields-acf-8d005068e2d8)

---

## 11. Summary of Architectural Decisions

### 11.1 Field Organization
- ✅ **Use Tab fields** for 5 logical sections: Basic Info, Pricing, Gallery, Features, Services
- ✅ **Use Group fields** for related data (specs, pricing, wellness)
- ✅ **Use Repeater fields** for uniform lists (features, rooms, services)
- ❌ **Avoid Flexible Content** - unnecessary complexity for this use case

### 11.2 Naming & Structure
- ✅ **Prefix**: `prop_` for all top-level property fields
- ✅ **Convention**: lowercase_with_underscores
- ✅ **Sub-fields**: No prefix needed (auto-prefixed by parent)
- ⚠️ **Warning**: Field names cannot be safely changed after deployment

### 11.3 Performance
- ✅ **Local JSON**: MANDATORY - store in `/acf-json/`
- ✅ **Image fields**: Return ID, not URL
- ✅ **Location rules**: Load only on Property post type
- ✅ **Lazy loading**: Use native browser lazy loading for images

### 11.4 Version Control
- ✅ **Edit in dev only**: Lock field editing on production
- ✅ **Git workflow**: Commit JSON files, sync on production
- ✅ **Team protocol**: Alert on field changes, sync immediately after pull
- ✅ **Conflict resolution**: Revert timestamp changes after sync

### 11.5 Content Management
- ✅ **Validation**: Mark critical fields as required (location, guests, price)
- ✅ **Fallbacks**: Provide defaults for essential data, hide optional empty fields
- ✅ **Icons**: Use ACF Icon Picker with Media Library SVGs
- ✅ **Seasonal content**: Combined approach (auto date logic + manual override)
- ✅ **Helper text**: Every field includes clear instructions

---

## 12. Implementation Checklist

### Phase 1: Setup
- [ ] Create `/acf-json/` directory in theme root (755 permissions)
- [ ] Verify ACF Pro 6.0+ is installed and activated
- [ ] Lock field editing on production environment
- [ ] Prepare icon SVG library and upload to Media Library

### Phase 2: Field Group Creation
- [ ] Create field group: Basic Information (location rule: post_type == property)
- [ ] Create field group: Gallery & Media (same location)
- [ ] Create field group: Features & Amenities (same location)
- [ ] Create field group: Services & Contact (same location)
- [ ] Add helper text to all fields

### Phase 3: Validation & Testing
- [ ] Set required fields: location, max_guests, bedroom_count, price_amount
- [ ] Add custom validation for price (must be > 0)
- [ ] Add custom validation for guest count (must be >= 1)
- [ ] Test field group with sample property data

### Phase 4: Template Integration
- [ ] Update single-property.php to use ACF fields
- [ ] Add conditional checks for all optional fields
- [ ] Implement fallback logic for empty fields
- [ ] Add proper escaping functions for all outputs
- [ ] Test seasonal gallery logic

### Phase 5: Version Control
- [ ] Commit ACF JSON files to Git
- [ ] Document sync workflow for team
- [ ] Test sync process on staging environment
- [ ] Verify field groups load from JSON (not database)

### Phase 6: Documentation
- [ ] Create content manager guide for adding properties
- [ ] Document seasonal content management process
- [ ] Document icon selection process
- [ ] Create troubleshooting guide for common issues

---

## 13. References & Sources

### Official ACF Documentation
- [Getting Started with ACF Custom Fields & Field Groups](https://www.advancedcustomfields.com/resources/getting-started-with-acf-custom-fields-field-groups/)
- [ACF Local JSON Resource](https://www.advancedcustomfields.com/resources/local-json/)
- [ACF Conditional Logic Resource](https://www.advancedcustomfields.com/resources/conditional-logic/)
- [ACF Icon Picker Resource](https://www.advancedcustomfields.com/resources/icon-picker/)
- [ACF Flexible Content Resource](https://www.advancedcustomfields.com/resources/flexible-content/)
- [ACF Tab Resource](https://www.advancedcustomfields.com/resources/tab/)
- [Improving ACF Performance](https://www.advancedcustomfields.com/resources/improving-acf-performance/)
- [ACF Validate Value Filter](https://www.advancedcustomfields.com/resources/acf-validate_value/)
- [ACF Validate Save Post Action](https://www.advancedcustomfields.com/resources/acf-validate_save_post/)
- [Best Practices when Designing Custom Fields](https://www.advancedcustomfields.com/blog/best-practices-designing-custom-fields/)
- [ACF 6.3.0 Release - Blocks Validation](https://www.advancedcustomfields.com/blog/acf-6-3-0-released/)

### Field Organization & Best Practices
- [8 Best Practices for Advanced Custom Fields (ACF)](https://medium.com/@virgiliuweb/8-best-practices-for-advanced-custom-fields-acf-8d005068e2d8)
- [A Complete Guide on ACF Group Field in WordPress](https://wpbuilderaddons.com/tutorial/acf-group-fields-complete-guide/)
- [ACF Group Field Guide - Savvy](https://savvy.co.il/en/blog/wordpress-development/acf-group-field-guide/)
- [Advanced Custom Fields Guide 2026](https://mantraideas.com/advanced-custom-fields-wordpress-guide/)

### Naming Conventions
- [Best practices for naming fields - ACF Support](https://support.advancedcustomfields.com/forums/topic/best-practice-for-name-the-fields/)
- [Best practices - naming convention for WordPress custom fields](https://kamilgrzegorczyk.com/2017/10/12/best-practices-naming-convention-for-wordpress-custom-fields/)
- [Naming Conventions / Cleaning Up - ACF Support](https://support.advancedcustomfields.com/forums/topic/naming-conventions-cleaning-up/)

### Repeater vs Flexible Content
- [Difference between Repeater & Flexible Content field - ACF Support](https://support.advancedcustomfields.com/forums/topic/difference-between-repeater-flexible-content-field/)
- [Repeater vs Flexible Content - ACF Support](https://support.advancedcustomfields.com/forums/topic/repeater-vs-flexible-content/)
- [ACF Repeater & Flexible Content Fields - DEV Community](https://dev.to/leanminmachine/wordpress-acf-repeater--flexible-content-fields-4dpa)
- [Using ACF Flexible Content in WordPress - WP All Import](https://www.wpallimport.com/acf-flexible-content/)

### Performance Optimization
- [Lazy Loading ACF Fields with Shortcodes for Faster Page Loads](https://acfcopilotplugin.com/blog/lazy-loading-acf-fields-with-shortcodes-for-faster-page-loads/)
- [Optimizing Advanced Custom Fields for Fast WordPress Sites](https://acfcopilotplugin.com/blog/optimizing-advanced-custom-fields-for-fast-wordpress-sites/)
- [Speeding up Advanced Custom Fields](https://stevencotterill.com/articles/speeding-up-advanced-custom-fields/)
- [Tips & Tricks for Optimizing ACF Performance](https://wpfieldwork.com/optimizing-acf-performance/)

### Version Control & JSON Sync
- [Easily sync your ACF fields using acf-json - Starboard](https://www.starboardmedia.co.uk/easily-sync-your-acf-fields-using-acf-json/)
- [Using Advanced Custom Fields with version control - Bill Erickson](https://www.billerickson.net/acf-json-with-git/)
- [Git deploy workflow for ACF Local JSON - ACF Support](https://support.advancedcustomfields.com/forums/topic/git-deploy-workflow-for-acf-local-json-only-sync-on-production/)
- [Sync ACF JSON Field Groups: Best Practices - CriticalWP](https://criticalwp.com/acf/sync-acf-json-field-groups-in-wordpress/)
- [ACF Synchronized JSON](https://www.advancedcustomfields.com/resources/synchronized-json/)
- [How to avoid conflicts when using ACF Local JSON](https://www.awesomeacf.com/how-to-avoid-conflicts-when-using-the-acf-local-json-feature/)
- [ACF Field Groups Force Sync - ACF Extended](https://www.acf-extended.com/features/field-groups/force-sync)

### Empty Field Handling
- [ACF - Hiding empty fields](https://www.advancedcustomfields.com/resources/hiding-empty-fields/)
- [Custom link with fallback if empty? - ACF Support](https://support.advancedcustomfields.com/forums/topic/custom-link-with-fallback-if-empty/)
- [How to Display ACF Fields in WordPress Templates - WOW WP](https://wowwp.com/how-to-display-acf-fields-in-wordpress-templates/)
- [Display if not empty - ACF Support](https://support.advancedcustomfields.com/forums/topic/display-if-not-empty/)

### Icon Picker Solutions
- [ACF Icon Picker - WP Dev Design](https://wpdevdesign.com/acf-icon-picker/)
- [ACF Open Icons](https://acfopenicons.com/)
- [Advanced Custom Fields: Font Awesome Field Plugin](https://wordpress.org/plugins/advanced-custom-fields-font-awesome/)

### Conditional Logic & Seasonal Content
- [ACF Conditional Blocks: Control Content Visibility in WordPress](https://www.advancedcustomfields.com/blog/wordpress-conditional-content/)
- [Advanced Customizations with Conditional Logic in ACF and Shortcodes](https://acfcopilotplugin.com/blog/advanced-customizations-with-conditional-logic-in-acf-and-shortcodes/)
- [Block Visibility Plugin](https://wordpress.org/plugins/block-visibility/)
- [ACF date as conditional - Beaver Builder Forum](https://community.wpbeaverbuilder.com/t/acf-date-as-conditional/12171)

### Validation
- [Advanced Validation - ACF Extended](https://www.acf-extended.com/features/field-settings/advanced-validation)
- [Custom Validation - ACF Support](https://support.advancedcustomfields.com/forums/topic/custom-validation/)
- [Required fields validation - ACF Support](https://support.advancedcustomfields.com/forums/topic/required-fields-validation/)

### Real Estate Specific
- [Using ACF checkbox for property features list - ACF Support](https://support.advancedcustomfields.com/forums/topic/using-acf-checkbox-to-create-property-features-list-for-real-estate-website/)
- [Create a Real Estate WordPress Website Using ACF & Elementor](https://elementor.com/academy/create-a-real-estate-wordpress-website-using-acf-elementor/)
- [Advanced Custom Fields Pro & Elementor Pro Tutorial](https://wptuts.co.uk/advanced-custom-fields-pro-elementor-pro-real-estate-website/)
- [Advanced Custom Fields Pro & Elementor Pro - Advanced Real Estate Website](https://wptuts.co.uk/advanced-custom-fields-pro-elementor-pro-advanced-real-estate-website/)

### Extensions & Tools
- [Advanced Custom Fields: Extended Plugin](https://wordpress.org/plugins/acf-extended/)
- [Advanced Custom Fields Extensions & Resources - Awesome ACF](https://www.awesomeacf.com/)

---

## 14. Next Steps

1. **Review this research with stakeholders** - Confirm decisions align with project needs
2. **Create detailed plan.md** - Architectural design based on these findings
3. **Generate tasks.md** - Break down implementation into testable tasks
4. **Begin Phase 1** - Setup ACF JSON and field group structure
5. **Create PHR** - Document this research process for future reference

---

**Document Status**: Research Complete
**Ready for**: Planning Phase
**Estimated Implementation Time**: 2-3 days for field creation + 2-3 days for template integration
