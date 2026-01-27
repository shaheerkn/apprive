# Implementation Plan: Dynamic Single Property Page with ACF

**Branch**: `wp-theme` | **Date**: 2026-01-26 | **Spec**: [spec.md](./spec.md)
**Input**: Feature specification from `/specs/acf-property-fields/spec.md`

## Summary

Convert the hardcoded single-property.php template to a fully dynamic, ACF-powered property listing system. The implementation will create organized ACF field groups with tab layouts enabling content managers to easily manage property information, galleries, amenities, and services. The solution maintains the existing template structure and styling while replacing all hardcoded content with dynamic ACF field calls, implementing proper fallbacks, security escaping, and graceful handling of empty fields.

**Primary Approach**: Create 1 main ACF field group with 5 tab sections, organized by content type (Basic Info, Pricing & Booking, Gallery & Media, Features & Amenities, Services & Extras). Use repeater fields for variable content (features, room details, services), group fields for related data (specifications, pricing), and gallery fields for images. Implement ACF JSON sync for version control and use date-based logic with manual override for seasonal content.

## Technical Context

**Language/Version**: PHP 7.4+ (WordPress theme requirement)
**Primary Dependencies**:
- Advanced Custom Fields Pro 6.0+ (required for repeater, gallery, and tab fields)
- WordPress 6.0+ (for full block editor and ACF compatibility)
- Existing theme dependencies (Swiper.js for gallery slider)

**Storage**:
- ACF field definitions: JSON files in `/inc/acf-json/field-groups/`
- Field data: WordPress post meta (automatically managed by ACF)
- Media: WordPress Media Library with standard attachment tables

**Testing**:
- Manual QA: Create test property posts with all fields populated, partially populated, and empty
- Validation testing: Attempt to publish with missing required fields
- Visual regression: Compare template output before/after implementation
- Performance: Measure page load time with ACF vs hardcoded content

**Target Platform**: WordPress 6.0+ on standard LAMP/LEMP stack (Linux, Apache/Nginx, MySQL, PHP 7.4+)

**Project Type**: WordPress theme modification (single codebase, theme-centric)

**Performance Goals**:
- Page load time: < 3 seconds on standard broadband (SC-003)
- Admin field navigation: < 3 clicks to any field (SC-004)
- Property creation time: < 15 minutes for complete listing (SC-001)
- Zero additional database queries for field group loading (ACF JSON)

**Constraints**:
- Must maintain existing template structure and CSS classes for styling compatibility
- Cannot modify WordPress core or plugin files
- Must follow WordPress coding standards and security practices (escaping, sanitization)
- ACF JSON files must be committed to version control
- Field names cannot be changed after deployment without data migration

**Scale/Scope**:
- Single field group with ~40-50 total fields
- 5 tab sections for organization
- 3 repeater field groups (features, rooms, services)
- ~10-20 properties expected initially, scalable to hundreds
- 1 custom post type (property - assumed existing or to be created)

## Constitution Check

*GATE: Must pass before Phase 0 research. Re-check after Phase 1 design.*

### WordPress Theme Architecture (Principle I) ✅

- ✅ Using existing `single-property.php` template (follows WordPress template hierarchy)
- ✅ ACF field registration will use WordPress hooks (`acf/init`, `acf/include_fields`)
- ✅ No modifications to WordPress core or theme hierarchy
- ✅ Template will use `get_field()` and `the_field()` (WordPress/ACF standard functions)

### PHP Backend Standards (Principle II) ✅

- ✅ All ACF output will use proper escaping (`esc_html()`, `esc_url()`, `wp_kses_post()`)
- ✅ No custom database queries required (ACF handles post meta automatically)
- ✅ Field value sanitization handled by ACF with additional validation where needed
- ✅ Text domain `ar` will be used for any helper text or labels
- ✅ Function prefix `ar_` for any custom helper functions

### SCSS Styling Architecture (Principle III) ✅

- ✅ No SCSS modifications required (maintaining existing CSS classes)
- ✅ If admin styling needed, will follow `/scss/` structure with new admin partial

### ACF Custom Fields & Post Types (Principle IV) ✅

- ✅ ACF JSON save points configured per constitution:
  - Field groups → `/inc/acf-json/field-groups/`
- ✅ Field naming: `prop_` prefix with snake_case (e.g., `prop_price`, `prop_max_guests`)
- ✅ Sub-fields in groups/repeaters: no prefix needed (auto-prefixed by parent)
- ✅ Location rules: Specific to property post type only
- ✅ Using `get_field()` and `the_field()` with fallback value parameters
- ✅ Repeaters using `have_rows()` / `the_row()` iteration pattern

### Template Hierarchy Compliance (Principle V) ✅

- ✅ Maintaining `single-property.php` structure with `get_header()` and `get_footer()`
- ✅ Using `the_content()` for "About the Chalet" section (FR-006)
- ✅ Conditional checks for empty fields before rendering sections
- ✅ No custom queries needed (working within The Loop)

### Performance & Security (Principle VI) ✅

- ✅ ACF JSON enabled for zero additional database queries for field definitions
- ✅ Images using `wp_get_attachment_image()` for responsive srcset support
- ✅ Gallery field returning image IDs (not URLs) for WordPress image size functions
- ✅ All user-editable content properly escaped on output
- ✅ Required field validation preventing invalid data entry
- ✅ No external resources or AJAX needed for this implementation

**GATE STATUS**: ✅ PASS - All constitution principles satisfied. No violations requiring justification.

## Project Structure

### Documentation (this feature)

```text
specs/acf-property-fields/
├── spec.md              # Feature specification
├── plan.md              # This file (implementation architecture)
├── research.md          # ACF best practices research (completed)
├── data-model.md        # Field structure definitions (next)
├── quickstart.md        # Setup and testing guide (next)
├── contracts/           # ACF field group JSON schemas
│   └── property-fields.json  # Complete field group export
└── checklists/
    └── requirements.md  # Spec validation checklist
```

### Source Code (theme root)

```text
wp-content/themes/arprive/
├── inc/
│   ├── acf-json/
│   │   └── field-groups/
│   │       └── group_[hash]-property-fields.json  # Auto-generated by ACF
│   ├── template-functions.php  # ACF save/load hooks (already configured)
│   └── acf-validation.php      # NEW: Custom validation rules
├── template-parts/
│   └── property/                # NEW: Reusable property partials
│       ├── header.php           # Property header (title, location, price)
│       ├── gallery.php          # Gallery slider section
│       ├── specifications.php   # Property specs grid
│       ├── key-features.php     # Key features with icons
│       ├── about.php            # About the chalet (post content)
│       ├── room-details.php     # Room & space details section
│       └── services.php         # In-chalet services section
├── single-property.php          # MODIFIED: Main property template
├── functions.php                # MODIFIED: Include acf-validation.php
└── style.css                    # No changes required
```

**Structure Decision**: Using WordPress theme structure with modular template parts. Breaking single-property.php into template partials improves maintainability and follows WordPress best practices. All ACF field group JSON files auto-save to `/inc/acf-json/field-groups/` per constitution's ACF save/load hooks already configured in `inc/template-functions.php`.

**Template Part Strategy**: Each major section becomes a template part that can be independently tested and reused. This follows WordPress template part conventions and makes the codebase more maintainable.

## Complexity Tracking

> **Not applicable** - No constitution violations. All implementation follows established WordPress and theme architecture standards.

---

## Phase 0: Research ✅ COMPLETE

**Status**: Research completed and documented in [research.md](./research.md)

### Key Findings Applied to This Plan

1. **Tab Organization**: 5 tabs (Basic Info, Pricing & Booking, Gallery & Media, Features & Amenities, Services & Extras)
2. **Field Types**:
   - Group fields for related data (specifications, pricing)
   - Repeater fields for variable content (features, rooms, services)
   - Gallery fields for images with IDs (not URLs)
   - Select/checkbox for limited options
3. **Naming Convention**: `prop_` prefix for top-level fields, snake_case throughout
4. **Performance**: ACF JSON mandatory, image IDs with WordPress image functions
5. **Version Control**: JSON files in `/inc/acf-json/field-groups/`, commit to Git
6. **Seasonal Content**: Date-based automation (months 11-3 = winter, 4-10 = summer) + manual override toggle
7. **Icon Management**: ACF Icon Picker with Media Library SVGs (no external dependencies)
8. **Validation**: Built-in required fields + custom validation for numeric ranges
9. **Fallbacks**: Hide sections when optional fields empty, provide defaults for critical fields

---

## Phase 1: Design & Contracts

### 1.1 Data Model

**Output**: [data-model.md](./data-model.md) - Complete field structure with all sub-fields, types, and relationships

**Structure Overview**:

#### Property Field Group
- **Location Rule**: Post Type is equal to Property
- **Style**: Default (left-aligned labels)
- **Label Placement**: Top for better mobile UX

#### Tab 1: Basic Information
- `prop_location_text` (Text) - Location display name (e.g., "Courchevel 1850")
- `prop_location_taxonomy` (Taxonomy) - Relationship to destination taxonomy (for breadcrumbs)
- `prop_specs` (Group) - Property specifications
  - `max_guests` (Number, Required)
  - `bedroom_count` (Number, Required)
  - `bathroom_count` (Number, Required)
  - `size_sqm` (Number) - Property size in m²
  - `access_type` (Text) - e.g., "Ski-in/Ski-out"
  - `staff_availability` (Text) - e.g., "Available on request"

#### Tab 2: Pricing & Booking
- `prop_pricing` (Group) - Pricing information
  - `starting_price` (Number, Required) - Base price
  - `currency` (Text, Default: "€") - Currency symbol
  - `price_period` (Text, Default: "/week") - Period text
- `prop_booking` (Group) - Contact/booking links
  - `availability_link` (URL) - Link to availability page
  - `chat_link` (URL) - Link to chat/contact

#### Tab 3: Gallery & Media
- `prop_gallery` (Gallery, Required) - Main property images (returns array of IDs)
- `prop_seasonal_toggle` (True/False) - Manual seasonal override (default: false = auto)
- `prop_winter_gallery` (Gallery) - Winter-specific images
- `prop_summer_gallery` (Gallery) - Summer-specific images
- `prop_room_images` (Gallery) - Room detail/layout photos

#### Tab 4: Features & Amenities
- `prop_key_features` (Repeater) - Highlighted amenities
  - `feature_icon` (Image/Icon Picker) - SVG icon
  - `feature_label` (Text, Required) - Display text
- `prop_room_details` (Repeater) - Room layout breakdown
  - `room_icon` (Image/Icon Picker) - SVG icon
  - `room_description` (Text, Required) - e.g., "1 Master bedroom (king size, en-suite)"

#### Tab 5: Services & Extras
- `prop_services` (Repeater) - In-chalet services
  - `service_icon` (Image/Icon Picker) - SVG icon
  - `service_label` (Text, Required) - Service name

**Detailed schema** documented in data-model.md with validation rules, conditional logic, and helper text for each field.

---

### 1.2 API Contracts

**Output**: [contracts/property-fields.json](./contracts/property-fields.json) - Complete ACF field group export

This will be the exported JSON from ACF after field group creation, serving as:
- **Contract** for template developers (documents available field names and structure)
- **Backup** for field group configuration
- **Documentation** for expected data structure

**Template Access Pattern** (documented in quickstart.md):

```php
// Basic field access
$location = get_field('prop_location_text');
$max_guests = get_field('prop_specs')['max_guests'];

// Gallery handling
$gallery_ids = get_field('prop_gallery');
foreach ($gallery_ids as $image_id) {
    echo wp_get_attachment_image($image_id, 'large');
}

// Repeater iteration
if (have_rows('prop_key_features')) {
    while (have_rows('prop_key_features')) {
        the_row();
        $icon = get_sub_field('feature_icon');
        $label = get_sub_field('feature_label');
        // Render feature
    }
}

// Seasonal gallery logic
$is_winter = (date('n') >= 11 || date('n') <= 3);
$manual_override = get_field('prop_seasonal_toggle');
$current_season = $manual_override ? 'winter' : ($is_winter ? 'winter' : 'summer');
$gallery_key = 'prop_' . $current_season . '_gallery';
$seasonal_images = get_field($gallery_key);
```

---

### 1.3 Quickstart Guide

**Output**: [quickstart.md](./quickstart.md)

Contents:
1. **Prerequisites Check**: ACF Pro installed, Property post type exists
2. **Field Group Creation**: Step-by-step instructions for manual setup OR JSON import
3. **Icon Library Setup**: Instructions for uploading SVG icons to Media Library
4. **Test Property Creation**: Create sample property with all fields populated
5. **Template Integration Testing**: Verify each section displays correctly
6. **Validation Testing**: Attempt to save with missing required fields
7. **Empty Field Testing**: Create property with minimal data, verify sections hide gracefully
8. **Seasonal Content Testing**: Manually change server date or toggle to test winter/summer galleries
9. **Performance Verification**: Check page load times, confirm ACF JSON is loading
10. **Troubleshooting**: Common issues and solutions

---

### 1.4 Agent Context Update

**Action**: Run `.specify/scripts/bash/update-agent-context.sh claude` after completing data model

This will update the agent context file with:
- ACF Pro 6.0+ as a technology dependency
- WordPress 6.0+ theme development patterns
- ACF field naming conventions (`prop_` prefix)
- Template part structure in `/template-parts/property/`

**Note**: Preserves existing context, only adds new technology references specific to this feature.

---

## Phase 2: Constitution Re-Check

*Performed after completing data model and contracts in Phase 1*

### Post-Design Verification ✅

- ✅ Data model follows ACF best practices (repeaters, groups, proper field types)
- ✅ Field naming convention uses `prop_` prefix per constitution and research
- ✅ JSON export path matches constitution: `/inc/acf-json/field-groups/`
- ✅ Template access uses `get_field()` with proper escaping
- ✅ No additional database queries introduced (ACF JSON handles caching)
- ✅ Fallback logic for empty fields prevents broken UI
- ✅ Required field validation enforces data quality
- ✅ Seasonal content logic uses PHP date functions (no external dependencies)

**FINAL GATE STATUS**: ✅ PASS - Design maintains constitution compliance. Ready for task generation (`/sp.tasks`).

---

## Implementation Phases (Task Breakdown Preview)

The following phases will be detailed in [tasks.md](./tasks.md) (created by `/sp.tasks` command):

### Phase 1: Setup & Configuration
- Create ACF field group with tab structure
- Configure all fields per data-model.md
- Set up validation rules
- Export JSON and commit to repository
- Prepare icon library (SVG uploads)

### Phase 2: Template Integration
- Create template parts in `/template-parts/property/`
- Refactor `single-property.php` to use template parts with ACF fields
- Implement seasonal gallery logic
- Add fallback handling for empty fields
- Ensure proper escaping on all outputs

### Phase 3: Validation & Testing
- Create test properties (full, partial, empty data)
- Test required field validation
- Verify seasonal content switching
- Performance testing (page load times)
- Visual regression testing
- Edge case testing (special characters, very long content, missing images)

### Phase 4: Documentation & Handoff
- Content manager guide (field descriptions already in ACF, but create overview doc)
- Developer documentation (template part usage, extending field group)
- Git workflow documentation (JSON sync process)
- Troubleshooting guide

---

## Risk Assessment

| Risk | Likelihood | Impact | Mitigation |
|------|-----------|--------|------------|
| ACF Pro not installed/activated | Low | High | Add prerequisite check in quickstart; fail fast with clear error message |
| Property post type doesn't exist | Medium | High | Document post type creation in quickstart; provide registration code if needed |
| Field name conflicts with existing meta | Low | Medium | Use unique `prop_` prefix; document in data model |
| Content managers confused by field organization | Medium | Medium | Use clear helper text on every field; create training video or guide |
| Seasonal gallery logic breaks in southern hemisphere | Low | Low | Document manual override toggle prominently; consider adding timezone/location settings in future |
| Performance degradation with many properties | Low | Medium | ACF JSON eliminates field group queries; recommend object caching plugin for large sites |
| Git conflicts on ACF JSON files | Medium | Low | Document workflow: only edit fields in dev environment, sync immediately after pulling changes |
| Missing icons break layout | Low | High | Implement fallback: if icon empty, render text-only feature; validate icon upload in quickstart |

---

## Dependencies & Assumptions Validation

**From Spec - Confirmed**:
- ✅ ACF Pro 6.0+ (required for repeaters, gallery fields, tabs)
- ✅ WordPress 6.0+ (confirmed compatible)
- ✅ Property post type exists (assumed - will document creation in quickstart)
- ✅ Swiper.js already enqueued (confirmed in existing template)
- ✅ Template structure maintained (design preserves all CSS classes)
- ✅ Icons as SVGs in Media Library (using ACF Icon Picker)
- ✅ Destination taxonomy or text field (using both: text for display + taxonomy for breadcrumbs)
- ✅ Seasonal content date-based with toggle (confirmed approach in research)

**From Spec - Adjusted**:
- Currency field: Default "€" but editable (allows other currencies if needed)
- Icon selection: Using ACF Icon Picker + Media Library (not hardcoded SVGs in theme)

---

## Success Criteria Mapping

| Spec Criteria | Implementation Approach | Verification Method |
|---------------|------------------------|---------------------|
| SC-001: < 15 min property creation | 5 tabs, clear labels, helper text on every field | Time actual property creation during testing |
| SC-002: 100% dynamic content | Replace all hardcoded values with `get_field()` calls | Code review: search for hardcoded strings in template |
| SC-003: < 3 sec page load | ACF JSON (no field definition queries), image IDs with WordPress image functions | GTmetrix/Pingdom testing |
| SC-004: < 3 clicks to any field | Tab-based organization, max 2 levels deep | Manual navigation testing in admin |
| SC-005: Helper text eliminates training docs | Every field has instructions parameter with clear guidance | Review with non-technical content manager |
| SC-006: Consistent formatting regardless of content | Fallback logic, conditional section display | Test with very short and very long content |
| SC-007: Empty fields hide sections gracefully | Conditional checks before rendering sections | Create property with minimal data, verify UI |

---

## Next Steps

1. ✅ **Research complete** - [research.md](./research.md) documents all findings
2. 📝 **Create data-model.md** - Detailed field structure with all attributes
3. 📝 **Create quickstart.md** - Setup and testing guide
4. 📝 **Generate contracts/property-fields.json** - Schema documentation (placeholder until ACF export available)
5. 🔄 **Update agent context** - Run update script with new technology references
6. ➡️ **Generate tasks** - Run `/sp.tasks` command to create implementation task breakdown

**Command to proceed**: `/sp.tasks` (generates tasks.md with testable, ordered implementation steps)
