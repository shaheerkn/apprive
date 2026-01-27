# Data Model: Property ACF Fields

**Feature**: Dynamic Single Property Page with ACF
**Date**: 2026-01-26
**Status**: Design Complete

## Overview

This document defines the complete ACF field structure for the Property post type. All fields are organized within a single field group using tab layouts for logical sectioning.

## Field Group Configuration

**Group Name**: Property Fields
**Key**: `group_property_fields` (ACF auto-generates hash on creation)
**Location Rule**: Post Type is equal to `property`
**Position**: Normal (after title)
**Style**: Default
**Label Placement**: Top
**Instruction Placement**: Label
**Hide on Screen**: None

---

## Tab 1: Basic Information

### prop_location_text
- **Type**: Text
- **Label**: Location Display Name
- **Instructions**: The location text shown on the property page (e.g., "Courchevel 1850"). This appears in the header and breadcrumbs.
- **Required**: Yes
- **Default Value**: None
- **Placeholder**: e.g., Courchevel 1850
- **Character Limit**: 100
- **Validation**: Not empty

### prop_location_taxonomy
- **Type**: Taxonomy
- **Label**: Destination/Location
- **Instructions**: Select the destination for this property. Used for breadcrumb navigation and property filtering.
- **Taxonomy**: `destination` (or appropriate location taxonomy)
- **Field Type**: Select
- **Allow Multiple**: No
- **Required**: Yes
- **Add Term**: No (managed by admin)
- **Load Terms**: Yes
- **Save Terms**: Yes
- **Return Format**: Object

### prop_specs (Group)
- **Type**: Group
- **Label**: Property Specifications
- **Instructions**: Enter the core specifications for this property. These display in the specifications grid.
- **Layout**: Block
- **Sub Fields**:

#### prop_specs > max_guests
- **Type**: Number
- **Label**: Maximum Guests
- **Instructions**: Maximum number of guests this property can accommodate.
- **Required**: Yes
- **Default Value**: None
- **Min**: 1
- **Max**: 50
- **Step**: 1
- **Prepend**: None
- **Append**: guests

#### prop_specs > bedroom_count
- **Type**: Number
- **Label**: Number of Bedrooms
- **Instructions**: Total number of bedrooms in the property.
- **Required**: Yes
- **Default Value**: None
- **Min**: 0
- **Max**: 20
- **Step**: 1
- **Append**: bedrooms

#### prop_specs > bathroom_count
- **Type**: Number
- **Label**: Number of Bathrooms
- **Instructions**: Total number of bathrooms in the property.
- **Required**: Yes
- **Default Value**: None
- **Min**: 0
- **Max**: 20
- **Step**: 1
- **Append**: bathrooms

#### prop_specs > size_sqm
- **Type**: Number
- **Label**: Property Size
- **Instructions**: Total property size in square meters.
- **Required**: No
- **Default Value**: None
- **Min**: 1
- **Max**: 10000
- **Step**: 1
- **Append**: m²

#### prop_specs > access_type
- **Type**: Text
- **Label**: Access Type
- **Instructions**: Type of property access (e.g., "Ski-in/Ski-out", "5 min walk to slopes").
- **Required**: No
- **Default Value**: None
- **Placeholder**: e.g., Ski-in/Ski-out
- **Character Limit**: 100

#### prop_specs > staff_availability
- **Type**: Text
- **Label**: Staff Availability
- **Instructions**: Staff availability information (e.g., "Available on request", "Included").
- **Required**: No
- **Default Value**: Available on request
- **Placeholder**: e.g., Available on request
- **Character Limit**: 100

---

## Tab 2: Pricing & Booking

### prop_pricing (Group)
- **Type**: Group
- **Label**: Pricing Information
- **Instructions**: Enter pricing details for this property. Starting price is the base weekly rate shown on the property page.
- **Layout**: Block
- **Sub Fields**:

#### prop_pricing > starting_price
- **Type**: Number
- **Label**: Starting Price
- **Instructions**: Base price for this property. Do not include currency symbol.
- **Required**: Yes
- **Default Value**: None
- **Min**: 0
- **Step**: 1

#### prop_pricing > currency
- **Type**: Text
- **Label**: Currency Symbol
- **Instructions**: Currency symbol to display with the price (e.g., €, $, £).
- **Required**: No
- **Default Value**: €
- **Placeholder**: €
- **Character Limit**: 5

#### prop_pricing > price_period
- **Type**: Text
- **Label**: Price Period
- **Instructions**: The period this price covers (e.g., "/week", "/night", "/month").
- **Required**: No
- **Default Value**: /week
- **Placeholder**: /week
- **Character Limit**: 20

### prop_booking (Group)
- **Type**: Group
- **Label**: Contact & Booking Links
- **Instructions**: Links for availability inquiries and chat/contact. Leave empty to hide these buttons.
- **Layout**: Block
- **Sub Fields**:

#### prop_booking > availability_link
- **Type**: URL
- **Label**: Availability Link
- **Instructions**: URL for the "Contact us for private availability" button. Leave empty to hide this button.
- **Required**: No
- **Default Value**: None
- **Placeholder**: https://example.com/contact

#### prop_booking > chat_link
- **Type**: URL
- **Label**: Chat Link
- **Instructions**: URL for the "Chat with us" button (e.g., WhatsApp link). Leave empty to hide this button.
- **Required**: No
- **Default Value**: None
- **Placeholder**: https://wa.me/1234567890

---

## Tab 3: Gallery & Media

### prop_gallery
- **Type**: Gallery
- **Label**: Main Property Gallery
- **Instructions**: Upload images for the main property slider. Images will be displayed in the order shown here. Minimum 3 images recommended.
- **Required**: Yes
- **Min**: 1
- **Max**: 20
- **Insert**: Append
- **Library**: All
- **Return Format**: Array (image IDs)
- **Preview Size**: Medium

### prop_seasonal_toggle
- **Type**: True / False
- **Label**: Use Seasonal Galleries
- **Instructions**: Enable this to show different images for winter and summer seasons. When enabled, winter gallery shows from November-March, summer gallery shows April-October. When disabled, only the main gallery above is used.
- **Required**: No
- **Default Value**: 0 (false)
- **Message**: Show seasonal galleries (winter/summer)
- **UI**: Toggle

### prop_winter_gallery
- **Type**: Gallery
- **Label**: Winter Gallery
- **Instructions**: Images shown during winter season (November - March). Only used if "Use Seasonal Galleries" is enabled.
- **Required**: No
- **Min**: 0
- **Max**: 20
- **Insert**: Append
- **Library**: All
- **Return Format**: Array (image IDs)
- **Preview Size**: Medium
- **Conditional Logic**: Show if `prop_seasonal_toggle` equals 1

### prop_summer_gallery
- **Type**: Gallery
- **Label**: Summer Gallery
- **Instructions**: Images shown during summer season (April - October). Only used if "Use Seasonal Galleries" is enabled.
- **Required**: No
- **Min**: 0
- **Max**: 20
- **Insert**: Append
- **Library**: All
- **Return Format**: Array (image IDs)
- **Preview Size**: Medium
- **Conditional Logic**: Show if `prop_seasonal_toggle` equals 1

### prop_room_images
- **Type**: Gallery
- **Label**: Room & Layout Images
- **Instructions**: Images showing room details and property layout. These appear in the "Room & Space Details" section.
- **Required**: No
- **Min**: 0
- **Max**: 10
- **Insert**: Append
- **Library**: All
- **Return Format**: Array (image IDs)
- **Preview Size**: Medium

---

## Tab 4: Features & Amenities

### prop_key_features
- **Type**: Repeater
- **Label**: Key Features
- **Instructions**: Add the highlighted features for this property. Each feature will be displayed in the "Key Features" section with an icon.
- **Required**: No
- **Min**: 0
- **Max**: 10
- **Layout**: Table
- **Button Label**: Add Feature
- **Sub Fields**:

#### prop_key_features > feature_icon
- **Type**: Image
- **Label**: Icon
- **Instructions**: Upload an SVG icon for this feature. Recommended size: 40x40px. Use consistent icon style across all features.
- **Required**: No
- **Return Format**: ID
- **Preview Size**: Thumbnail
- **Library**: All
- **Mime Types**: svg

#### prop_key_features > feature_label
- **Type**: Text
- **Label**: Feature Text
- **Instructions**: The text describing this feature (e.g., "Private Spa & Sauna", "Indoor heated pool").
- **Required**: Yes
- **Placeholder**: e.g., Private Spa & Sauna
- **Character Limit**: 100

### prop_room_details
- **Type**: Repeater
- **Label**: Room & Space Details
- **Instructions**: Detailed breakdown of rooms and spaces in the property. These appear in the "Room & Space Details" section.
- **Required**: No
- **Min**: 0
- **Max**: 20
- **Layout**: Table
- **Button Label**: Add Room Detail
- **Sub Fields**:

#### prop_room_details > room_icon
- **Type**: Image
- **Label**: Icon
- **Instructions**: Upload an SVG icon for this room type. Recommended size: 27x27px.
- **Required**: No
- **Return Format**: ID
- **Preview Size**: Thumbnail
- **Library**: All
- **Mime Types**: svg

#### prop_room_details > room_description
- **Type**: Text
- **Label**: Room Description
- **Instructions**: Description of this room or space (e.g., "1 Master bedroom (king size, en-suite bathroom, balcony)", "Large living room with fireplace").
- **Required**: Yes
- **Placeholder**: e.g., 1 Master bedroom (king size, en-suite)
- **Character Limit**: 200

---

## Tab 5: Services & Extras

### prop_services
- **Type**: Repeater
- **Label**: In-Chalet Services
- **Instructions**: Services available for this property (e.g., Private chef, Housekeeping, Butler). These appear in the "In-Chalet Services" section.
- **Required**: No
- **Min**: 0
- **Max**: 15
- **Layout**: Table
- **Button Label**: Add Service
- **Sub Fields**:

#### prop_services > service_icon
- **Type**: Image
- **Label**: Icon
- **Instructions**: Upload an SVG icon for this service. Recommended size: 30x30px.
- **Required**: No
- **Return Format**: ID
- **Preview Size**: Thumbnail
- **Library**: All
- **Mime Types**: svg

#### prop_services > service_label
- **Type**: Text
- **Label**: Service Name
- **Instructions**: Name of the service (e.g., "Private chef", "Housekeeping staff", "Butler / host").
- **Required**: Yes
- **Placeholder**: e.g., Private chef
- **Character Limit**: 100

---

## Custom Validation Rules

### Required Field Validation

```php
// File: inc/acf-validation.php

/**
 * Validate pricing fields
 */
function ar_validate_property_price($valid, $value, $field, $input) {
    if (!$valid) {
        return $valid;
    }

    if ($value < 1) {
        $valid = 'Starting price must be greater than 0';
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
        $valid = 'Maximum guests must be at least 1';
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
        $valid = 'Please upload at least 1 image to the main gallery';
    }

    return $valid;
}
add_filter('acf/validate_value/name=prop_gallery', 'ar_validate_property_gallery', 10, 4);
```

---

## Data Access Patterns

### Basic Field Access

```php
// Text fields
$location = get_field('prop_location_text');
echo esc_html($location);

// Group field access
$specs = get_field('prop_specs');
if ($specs) {
    $guests = $specs['max_guests'];
    $bedrooms = $specs['bedroom_count'];
    $bathrooms = $specs['bathroom_count'];
    echo esc_html($guests . ' guests, ' . $bedrooms . ' bedrooms, ' . $bathrooms . ' bathrooms');
}

// Pricing
$pricing = get_field('prop_pricing');
if ($pricing && $pricing['starting_price']) {
    $price = number_format($pricing['starting_price']);
    $currency = $pricing['currency'] ?: '€';
    $period = $pricing['price_period'] ?: '/week';
    echo esc_html($currency . ' ' . $price . ' ' . $period);
}
```

### Gallery Handling

```php
// Main gallery
$gallery_ids = get_field('prop_gallery');
if ($gallery_ids) {
    foreach ($gallery_ids as $image_id) {
        echo wp_get_attachment_image($image_id, 'large', false, [
            'class' => 'property-gallery-image',
            'loading' => 'lazy'
        ]);
    }
}

// Seasonal gallery logic
$use_seasonal = get_field('prop_seasonal_toggle');
if ($use_seasonal) {
    $current_month = date('n'); // 1-12
    $is_winter = ($current_month >= 11 || $current_month <= 3);
    $seasonal_key = $is_winter ? 'prop_winter_gallery' : 'prop_summer_gallery';
    $seasonal_images = get_field($seasonal_key);

    if ($seasonal_images) {
        // Use seasonal gallery
        $gallery_ids = $seasonal_images;
    }
}
```

### Repeater Iteration

```php
// Key features
if (have_rows('prop_key_features')) {
    echo '<ul class="key-features__list">';
    while (have_rows('prop_key_features')) {
        the_row();
        $icon_id = get_sub_field('feature_icon');
        $label = get_sub_field('feature_label');

        echo '<li>';
        if ($icon_id) {
            echo '<span>' . wp_get_attachment_image($icon_id, 'thumbnail') . '</span>';
        }
        echo esc_html($label);
        echo '</li>';
    }
    echo '</ul>';
}

// Room details
if (have_rows('prop_room_details')) {
    echo '<ul class="details__list">';
    while (have_rows('prop_room_details')) {
        the_row();
        $icon_id = get_sub_field('room_icon');
        $description = get_sub_field('room_description');

        echo '<li>';
        if ($icon_id) {
            echo '<span>' . wp_get_attachment_image($icon_id, 'thumbnail') . '</span>';
        }
        echo esc_html($description);
        echo '</li>';
    }
    echo '</ul>';
}

// Services
if (have_rows('prop_services')) {
    echo '<ul class="services__list">';
    while (have_rows('prop_services')) {
        the_row();
        $icon_id = get_sub_field('service_icon');
        $label = get_sub_field('service_label');

        echo '<li>';
        if ($icon_id) {
            echo '<span>' . wp_get_attachment_image($icon_id, 'thumbnail') . '</span>';
        }
        echo esc_html($label);
        echo '</li>';
    }
    echo '</ul>';
}
```

### Fallback Handling

```php
// Hide section if no features
if (have_rows('prop_key_features')) {
    // Render key features section
} else {
    // Don't render section at all - no empty placeholder
}

// Provide defaults for critical fields
$location = get_field('prop_location_text');
if (empty($location)) {
    $location = get_the_title(); // Fallback to post title
}

// Conditional display for optional fields
$pricing = get_field('prop_pricing');
if ($pricing && !empty($pricing['starting_price'])) {
    // Display pricing section
}

$booking = get_field('prop_booking');
if ($booking && !empty($booking['availability_link'])) {
    // Display availability link button
}
```

---

## Database Schema

ACF stores all field data in the WordPress `wp_postmeta` table:

```sql
-- Example meta keys stored:
meta_key: prop_location_text
meta_value: "Courchevel 1850"

meta_key: prop_specs_max_guests
meta_value: "10"

meta_key: prop_pricing_starting_price
meta_value: "3500"

meta_key: prop_gallery
meta_value: a:3:{i:0;s:3:"123";i:1;s:3:"124";i:2;s:3:"125";} (serialized array of attachment IDs)

meta_key: prop_key_features
meta_value: "3" (row count)

meta_key: prop_key_features_0_feature_label
meta_value: "Private Spa & Sauna"

meta_key: prop_key_features_0_feature_icon
meta_value: "145" (attachment ID)
```

**Note**: ACF handles all database operations automatically. No custom SQL queries needed.

---

## Entity Relationships

```
Property Post (post_type: property)
├── Meta Fields (wp_postmeta)
│   ├── prop_location_text (string)
│   ├── prop_location_taxonomy (term_id → wp_terms)
│   ├── prop_specs (serialized group)
│   ├── prop_pricing (serialized group)
│   ├── prop_booking (serialized group)
│   ├── prop_gallery (array of attachment_ids → wp_posts where post_type=attachment)
│   ├── prop_seasonal_toggle (boolean)
│   ├── prop_winter_gallery (array of attachment_ids)
│   ├── prop_summer_gallery (array of attachment_ids)
│   ├── prop_room_images (array of attachment_ids)
│   ├── prop_key_features (repeater with sub-fields)
│   ├── prop_room_details (repeater with sub-fields)
│   └── prop_services (repeater with sub-fields)
└── Post Content (wp_posts.post_content)
    └── About the Chalet text (WordPress block editor content)

Destination Taxonomy (wp_terms)
└── Term relationship (wp_term_relationships → property posts)
```

---

## Field Group Export Preview

```json
{
  "key": "group_property_fields",
  "title": "Property Fields",
  "fields": [
    {
      "key": "field_tab_basic_info",
      "label": "Basic Information",
      "name": "",
      "type": "tab",
      "placement": "top"
    },
    {
      "key": "field_prop_location_text",
      "label": "Location Display Name",
      "name": "prop_location_text",
      "type": "text",
      "required": 1,
      "instructions": "The location text shown on the property page...",
      "maxlength": 100
    },
    // ... additional fields
  ],
  "location": [
    [
      {
        "param": "post_type",
        "operator": "==",
        "value": "property"
      }
    ]
  ],
  "style": "default",
  "label_placement": "top",
  "instruction_placement": "label"
}
```

**Note**: Complete JSON export will be generated after field group creation in ACF UI and saved to `/inc/acf-json/field-groups/`.

---

## Performance Considerations

1. **ACF JSON**: Field definitions loaded from JSON file (1 file read vs N database queries)
2. **Image IDs**: Storing IDs instead of URLs allows WordPress to generate responsive srcset
3. **Lazy Loading**: All images should use native lazy loading attribute
4. **Conditional Sections**: Only query and render repeater fields if they have rows
5. **Caching**: Consider object caching for sites with 100+ properties (not required initially)

---

## Migration Notes

If adding these fields to existing properties with hardcoded data:

1. **No automatic migration** - fields will be empty for existing properties
2. **Manual data entry required** OR
3. **Write custom migration script** to populate fields from hardcoded template values
4. **Field names are permanent** - renaming after data exists requires custom SQL update

Recommendation: Start with new properties, gradually migrate high-priority existing properties manually.

---

## Summary

- **Total Fields**: ~45 fields (including sub-fields)
- **Repeater Fields**: 3 (features, room details, services)
- **Group Fields**: 3 (specs, pricing, booking)
- **Gallery Fields**: 4 (main, winter, summer, room images)
- **Required Fields**: 7 (location, max guests, bedrooms, bathrooms, price, gallery, post content)
- **Conditional Fields**: 2 (winter/summer galleries - show when seasonal toggle enabled)
- **Validation Rules**: 3 custom validators (price > 0, guests >= 1, min 1 gallery image)

This data model provides comprehensive content management while maintaining simplicity and performance.
