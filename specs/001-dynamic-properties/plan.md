# Implementation Plan: dynamic-properties

**Branch**: `001-dynamic-properties` | **Date**: 2026-01-27 | **Spec**: [specs/001-dynamic-properties/spec.md](../specs/001-dynamic-properties/spec.md)
**Input**: Feature specification from `/specs/001-dynamic-properties/spec.md`

**Note**: This template is filled in by the `/sp.plan` command. See `.specify/templates/commands/plan.md` for the execution workflow.

## Summary

Make the `taxonomy-destination.php` page and `page-favourites.php` fully dynamic. Implement an AJAX-based property filter (Destination, Guests, Price, Bedrooms, Amenities) and a "Favorites" feature for logged-in users. Refactor static HTML to use `WP_Query` and ACF fields.

## Technical Context

<!--
  ACTION REQUIRED: Replace the content in this section with the technical details
  for the project. The structure here is presented in advisory capacity to guide
  the iteration process.
-->

**Language/Version**: PHP 7.4+  
**Primary Dependencies**: WordPress 6.0+, Advanced Custom Fields Pro  
**Storage**: MySQL (standard WP DB), User Meta for favorites  
**Testing**: Manual (no automated test suite present in `composer.json` or `package.json`)  
**Target Platform**: Web (WordPress Theme)  
**Project Type**: Web  
**Performance Goals**: Efficient `WP_Query` execution, minimized database hits for filters  
**Constraints**: Use existing HTML/CSS structure, no new auth system  
**Scale/Scope**: Dynamic filtering for properties archive and favorites page

## Constitution Check

*GATE: Must pass before Phase 0 research. Re-check after Phase 1 design.*

- **I. WordPress Theme Architecture**: Compliant. Using standard template hierarchy (`taxonomy-destination.php`) and separate files for functionality.
- **II. PHP Backend Standards**: Compliant. Will use `wp_ajax_` for filters and favorites, sanitization/escaping standard.
- **III. SCSS Styling Architecture**: Compliant. Using existing styles, any new utility classes will follow convention.
- **IV. ACF Custom Fields**: Compliant. Using existing JSON configuration.
- **V. Template Hierarchy**: Compliant.
- **VI. Performance & Security**: Compliant. Nonces for AJAX, `WP_Query` best practices.

**Status**: ✅ Passed

## Project Structure

### Documentation (this feature)

```text
specs/001-dynamic-properties/
├── plan.md              # This file (/sp.plan command output)
├── research.md          # Phase 0 output (/sp.plan command)
├── data-model.md        # Phase 1 output (/sp.plan command)
├── quickstart.md        # Phase 1 output (/sp.plan command)
├── contracts/           # Phase 1 output (/sp.plan command)
└── tasks.md             # Phase 2 output (/sp.tasks command - NOT created by /sp.plan)
```

### Source Code (repository root)
<!--
  ACTION REQUIRED: Replace the placeholder tree below with the concrete layout
  for this feature. Delete unused options and expand the chosen structure with
  real paths (e.g., apps/admin, packages/something). The delivered plan must
  not include Option labels.
-->

```text
/
├── taxonomy-destination.php       # Refactored archive template
├── page-templates/
│   └── page-favourites.php        # Refactored favorites template
├── inc/
│   ├── ajax-filters.php           # New: AJAX handlers for property filtering
│   └── ajax-favorites.php         # New: AJAX handlers for favorites
├── js/
│   ├── properties-filter.js       # New: JS for filter logic
│   └── favorites.js               # New: JS for favorites toggle
└── template-parts/
    └── property/
        └── card.php               # New: Reusable property card template
```

**Structure Decision**: Standard WordPress Theme structure, adding modular PHP includes for AJAX logic and a reusable template part for the property card to ensure consistency between Archive and Favorites pages.

## Complexity Tracking

> **Fill ONLY if Constitution Check has violations that must be justified**

| Violation | Why Needed | Simpler Alternative Rejected Because |
|-----------|------------|-------------------------------------|
| (None) | | |
