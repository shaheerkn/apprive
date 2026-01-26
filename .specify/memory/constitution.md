<!--
SYNC IMPACT REPORT
==================
Version change: 1.0.0 → 1.1.0
Modified principles:
  - IV. ACF Custom Fields & Post Types (expanded JSON save/load points)
Added sections:
  - None
Removed sections:
  - None
Modified sections:
  - Development Workflow > Code Organization (updated acf-json structure)
Templates requiring updates:
  - .specify/templates/plan-template.md (pending - consider WordPress defaults)
  - .specify/templates/spec-template.md (no changes needed)
  - .specify/templates/tasks-template.md (pending - WordPress path conventions)
Follow-up TODOs: None
-->

# Arprive WordPress Theme Constitution

## Core Principles

### I. WordPress Theme Architecture

All development MUST follow WordPress theme architecture standards and conventions. The theme is based on Underscores (_s) starter theme patterns.

- Templates MUST follow WordPress template hierarchy (front-page.php, page-{slug}.php, single-{post_type}.php, archive.php, etc.)
- Custom page templates MUST be placed in the theme root and include proper template header comments
- Template parts MUST be stored in `/template-parts/` directory and loaded via `get_template_part()`
- Functions MUST be organized: core setup in `functions.php`, specialized functionality in `/inc/` directory files
- Theme MUST use WordPress hooks and filters (`add_action`, `add_filter`) instead of direct function modifications
- Child theme compatibility MUST be preserved by using `get_template_directory()` vs `get_stylesheet_directory()` appropriately

**Rationale**: Maintaining WordPress standards ensures compatibility with WordPress core updates, plugin integrations, and developer familiarity.

### II. PHP Backend Standards

All PHP code MUST follow WordPress coding standards and PHP 7.4+ compatibility.

- PHP code MUST use the `ar_` prefix for all custom functions to avoid conflicts
- WordPress functions MUST be used over raw PHP alternatives (e.g., `esc_html()`, `wp_kses()`, `sanitize_text_field()`)
- All user input MUST be sanitized; all output MUST be escaped using appropriate WordPress escaping functions
- Database queries MUST use `$wpdb` prepared statements when custom queries are needed
- AJAX handlers MUST use `wp_ajax_` and `wp_ajax_nopriv_` hooks with nonce verification
- PHP files MUST NOT have closing `?>` tags to prevent whitespace issues
- Translation functions (`__()`, `_e()`, `esc_html__()`) MUST be used for all user-facing strings with text domain `ar`

**Rationale**: WordPress coding standards ensure security, maintainability, and compatibility with the WordPress ecosystem.

### III. SCSS Styling Architecture

All styling MUST use SCSS with an organized, component-based architecture compiled to `/css/main.css`.

- SCSS files MUST be organized in the `/scss/` directory with clear separation:
  - `/scss/base/` - Variables, resets, typography, global styles
  - `/scss/components/` - Reusable UI components (buttons, cards, forms)
  - `/scss/layout/` - Page section and layout-specific styles
- Variables MUST be defined in `/scss/base/_variables.scss` for colors, spacing, typography, and breakpoints
- Component styles MUST use BEM-like naming or clear semantic class names
- Media queries MUST use mobile-first approach with defined breakpoint variables
- Vendor prefixes SHOULD be handled by build tooling; raw SCSS MUST NOT include vendor prefixes
- `main.scss` MUST import all partials in correct dependency order (base first, then components, then layouts)
- Styles MUST NOT use `!important` except for utility classes or third-party override necessities

**Rationale**: Organized SCSS architecture enables maintainable, scalable styling that compiles to optimized CSS.

### IV. ACF Custom Fields & Post Types

Advanced Custom Fields (ACF) MUST be used for all custom meta fields and content structures. ACF JSON exports MUST use organized subdirectories for version control.

**ACF JSON Save/Load Points** (configured in `inc/template-functions.php`):
- Field groups MUST be saved to `/inc/acf-json/field-groups/`
- Post types MUST be saved to `/inc/acf-json/post-types/`
- Taxonomies MUST be saved to `/inc/acf-json/taxonomies/`
- Options pages MUST be saved to `/inc/acf-json/options-pages/`

**Field & Content Standards**:
- Field names MUST use snake_case and be prefixed contextually (e.g., `property_price`, `hero_background_image`)
- Custom Post Types MAY be registered via ACF UI (saved to JSON) or via PHP in `functions.php` / `/inc/post-types.php`
- Taxonomies MAY be registered via ACF UI (saved to JSON) or via `register_taxonomy()` with appropriate post type associations
- ACF fields MUST be accessed using `get_field()` and `the_field()` functions, with fallback values for empty fields
- Repeater and Flexible Content fields MUST use `have_rows()` / `the_row()` pattern for iteration
- Field group location rules MUST be specific to avoid unintended field display

**Implementation Reference** (`inc/template-functions.php`):
- `ar_acf_field_groups_save_folder()` - Save filter for field groups
- `ar_acf_cpt_save_folder()` - Save filter for post types
- `ar_acf_taxonomy_save_folder()` - Save filter for taxonomies
- `ar_acf_options_save_folder()` - Save filter for options pages
- `ar_acf_json_load_point()` - Load filter for all ACF JSON paths

**Rationale**: Organized ACF JSON directories enable clear separation of concerns, easier version control diffs, and better team collaboration when managing field groups, post types, taxonomies, and options pages.

### V. Template Hierarchy Compliance

All templates MUST respect WordPress template hierarchy and maintain consistent structure.

- Every template MUST include `get_header()` and `get_footer()` calls
- Page templates MUST use `page-{slug}.php` naming when specific to a single page
- Custom post type singles MUST use `single-{post_type}.php` naming
- Archive templates MUST use `archive-{post_type}.php` for custom post types
- The Loop MUST be used for displaying posts; direct queries SHOULD use `WP_Query` with `wp_reset_postdata()`
- Conditional template loading MUST use WordPress conditional tags (`is_front_page()`, `is_singular()`, etc.)
- Template parts MUST be reusable and accept parameters via `$args` array (WP 5.5+) or `set_query_var()`

**Rationale**: Template hierarchy compliance ensures WordPress core functionality works correctly and themes remain predictable.

### VI. Performance & Security

All code MUST prioritize performance and security best practices.

- Scripts and styles MUST be enqueued using `wp_enqueue_script()` and `wp_enqueue_style()` with proper dependencies
- Images MUST use WordPress responsive image functions (`wp_get_attachment_image()`, srcset support)
- External resources MUST be loaded asynchronously or deferred where appropriate
- Custom queries MUST be cached using Transients API for expensive operations
- User capabilities MUST be checked before performing privileged operations (`current_user_can()`)
- Nonces MUST be used for all form submissions and AJAX requests
- File paths MUST use WordPress path functions (`get_template_directory()`, `get_template_directory_uri()`)
- Direct file access to PHP files MUST be prevented with `defined('ABSPATH')` checks

**Rationale**: Performance and security are non-negotiable for production WordPress themes serving real users.

## Technology Stack

**Runtime**: PHP 7.4+ on WordPress 6.0+
**Styling**: SCSS compiled to CSS, stored in `/scss/` with output to `/css/`
**JavaScript**: Vanilla JS with WordPress script dependencies, stored in `/js/`
**Custom Content**: Advanced Custom Fields Pro for meta fields, field groups, post types, taxonomies, and options pages
**ACF JSON**: Organized subdirectories in `/inc/acf-json/` (field-groups, post-types, taxonomies, options-pages)
**Build Tools**: SCSS compilation (local or via build script)
**Text Domain**: `ar` for all translatable strings

## Development Workflow

### Code Organization

```text
arprive/
├── css/                    # Compiled CSS output
├── js/                     # JavaScript files
├── scss/                   # SCSS source files
│   ├── base/              # Variables, resets, typography
│   ├── components/        # Reusable UI components
│   └── layout/            # Section/page layouts
├── inc/                    # PHP includes (modular functions)
│   ├── acf-json/          # ACF JSON exports (organized)
│   │   ├── field-groups/  # ACF field group definitions
│   │   ├── post-types/    # ACF-registered post types
│   │   ├── taxonomies/    # ACF-registered taxonomies
│   │   └── options-pages/ # ACF options page definitions
│   ├── template-functions.php  # ACF save/load hooks, body classes
│   ├── template-tags.php       # Custom template tags
│   └── customizer.php          # Theme customizer settings
├── template-parts/         # Reusable template partials
├── languages/             # Translation files
├── functions.php          # Theme setup and core functions
├── header.php             # Site header template
├── footer.php             # Site footer template
├── front-page.php         # Homepage template
├── page-{slug}.php        # Custom page templates
├── single-{post_type}.php # Custom post type singles
└── style.css              # Theme metadata (required)
```

### Review Checklist

Before committing changes:

- [ ] PHP follows WordPress Coding Standards
- [ ] All user output is properly escaped
- [ ] SCSS compiles without errors
- [ ] ACF field changes are synced to appropriate JSON subdirectory
- [ ] No hardcoded URLs or paths
- [ ] Translation functions used for strings
- [ ] Scripts/styles properly enqueued

## Governance

This constitution establishes the foundational principles for the Arprive WordPress theme. All development work MUST comply with these principles.

- **Amendment Process**: Changes to this constitution require documentation of rationale, impact assessment on existing code, and migration plan if breaking changes are introduced
- **Compliance Verification**: All pull requests and code reviews MUST verify adherence to these principles
- **Exceptions**: Any deviation from these principles MUST be documented with justification in the relevant spec or plan file
- **Reference**: For runtime development guidance, refer to theme-specific documentation in `/specs/` and ACF field documentation

**Version**: 1.1.0 | **Ratified**: 2026-01-26 | **Last Amended**: 2026-01-26
