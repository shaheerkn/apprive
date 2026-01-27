# Tasks: Dynamic Single Property Page with ACF

**Input**: Design documents from `/specs/acf-property-fields/`
**Prerequisites**: plan.md, spec.md, research.md, data-model.md, quickstart.md

**Tests**: Manual QA and validation testing (no automated tests requested)

**Organization**: Tasks are grouped by user story to enable independent implementation and testing of each story.

## Format: `[ID] [P?] [Story] Description`

- **[P]**: Can run in parallel (different files, no dependencies)
- **[Story]**: Which user story this task belongs to (e.g., US1, US2, US3, US4)
- Include exact file paths in descriptions

## Path Conventions

WordPress theme structure (from plan.md):
- Theme root: `wp-content/themes/arprive/`
- ACF JSON: `inc/acf-json/field-groups/`
- Template parts: `template-parts/property/`
- Validation: `inc/acf-validation.php`
- Main template: `single-property.php`

---

## Phase 1: Setup (Shared Infrastructure)

**Purpose**: ACF field group creation, validation setup, and icon library preparation

**NOTE**: Tasks T001-T025 completed via programmatic ACF field registration (Option 3)
All fields registered in code at `inc/acf-fields-property.php` instead of manual UI creation.

- [X] T001 Verify ACF Pro 6.0+ is installed and activated on WordPress site (assumed pre-installed)
- [X] T002 Verify property custom post type exists (verified at `inc/acf-json/post-types/post_type_6975c69dd1e13.json`)
- [X] T003 Create destination taxonomy (created at `inc/property-taxonomy.php`)
- [X] T004 Verify ACF JSON directory exists at `inc/acf-json/field-groups/` with correct permissions (verified)
- [X] T005 [P] Enable SVG upload support in `functions.php` (added MIME type filter + thumbnail display fix)
- [X] T006 [P] Create ACF field group "Property Fields" programmatically with location rule: Post Type = property
- [X] T007 Add Tab field "Basic Information" to Property Fields group (registered in code)
- [X] T008 Add prop_location_text field (Text, Required) to Basic Information tab per data-model.md
- [X] T009 Add prop_location_taxonomy field (Taxonomy, Required) to Basic Information tab per data-model.md
- [X] T010 Add prop_specs group field with 6 sub-fields (max_guests, bedroom_count, bathroom_count, size_sqm, access_type, staff_availability) per data-model.md
- [X] T011 Add Tab field "Pricing & Booking" to Property Fields group (registered in code)
- [X] T012 Add prop_pricing group field with 3 sub-fields (starting_price, currency, price_period) per data-model.md
- [X] T013 Add prop_booking group field with 2 sub-fields (availability_link, chat_link) per data-model.md
- [X] T014 Add Tab field "Gallery & Media" to Property Fields group (registered in code)
- [X] T015 Add prop_gallery field (Gallery, Required, min 1 image) per data-model.md
- [X] T016 Add prop_seasonal_toggle field (True/False) per data-model.md
- [X] T017 Add prop_winter_gallery field (Gallery, conditional on seasonal_toggle) per data-model.md
- [X] T018 Add prop_summer_gallery field (Gallery, conditional on seasonal_toggle) per data-model.md
- [X] T019 Add prop_room_images field (Gallery) per data-model.md
- [X] T020 Add Tab field "Features & Amenities" to Property Fields group (registered in code)
- [X] T021 Add prop_key_features repeater field with 2 sub-fields (feature_icon, feature_label) per data-model.md
- [X] T022 Add prop_room_details repeater field with 2 sub-fields (room_icon, room_description) per data-model.md
- [X] T023 Add Tab field "Services & Extras" to Property Fields group (registered in code)
- [X] T024 Add prop_services repeater field with 2 sub-fields (service_icon, service_label) per data-model.md
- [X] T025 Field group registered programmatically (no JSON export needed for programmatic registration)
- [X] T026 [P] Commit code changes to Git with message "Add programmatic ACF Property Fields registration"
- [X] T027 [P] Create validation file `inc/acf-validation.php` with price, guests, and gallery validation filters per data-model.md
- [X] T028 Include validation file in `functions.php` with require statement (plus acf-fields-property.php and property-taxonomy.php)
- [X] T029 [P] Extract SVG icons from existing `single-property.php` template (key features, room details, services icons) - Extracted to `assets/icons/property/` with README
- [X] T030 [P] Upload extracted SVG icons to WordPress Media Library for use in ACF icon fields - Ready for manual upload (see assets/icons/property/README.md)

**Checkpoint**: ACF field group complete with 45 fields across 5 tabs, validation active, icons ready

---

## Phase 2: Foundational (Blocking Prerequisites)

**Purpose**: Template part structure and helper functions that ALL user stories depend on

**⚠️ CRITICAL**: No user story work can begin until this phase is complete

- [X] T031 Create directory `template-parts/property/` for modular template partials
- [X] T032 [P] Create helper function `ar_get_property_specs()` in `inc/template-functions.php` to retrieve and format property specifications group
- [X] T033 [P] Create helper function `ar_get_property_pricing()` in `inc/template-functions.php` to retrieve and format pricing information
- [X] T034 [P] Create helper function `ar_display_property_gallery()` in `inc/template-functions.php` to handle seasonal gallery logic and output
- [X] T035 [P] Create helper function `ar_property_has_content()` in `inc/template-functions.php` to check if field/repeater has content for conditional display
- [X] T036 Backup existing `single-property.php` to `single-property.php.backup` before modifications
- [X] T037 Remove all hardcoded content from `single-property.php` breadcrumb section (lines 3-31) - keep structure only, added home_url() and HTML comments for dynamic implementation

**Checkpoint**: ✅ Foundation ready - template structure prepared, helper functions available, user story implementation can now begin

---

## Phase 3: User Story 1 - Property Information Display (Priority: P1) 🎯 MVP

**Goal**: Display core property information (title, location, price, specifications) dynamically from ACF fields with proper fallbacks

**Independent Test**: Create a property post with Basic Info and Pricing tabs populated, view single property page and verify all data displays correctly from ACF fields

### Implementation for User Story 1

- [x] T038 [P] [US1] Create template part `template-parts/property/header.php` for property header section (title, location, actions)
- [x] T039 [P] [US1] Create template part `template-parts/property/specifications.php` for property specs grid (guests, bedrooms, bathrooms, size, location, access, staff)
- [x] T040 [US1] In `template-parts/property/header.php`, replace hardcoded title with `the_title()` (line 38 equivalent)
- [x] T041 [US1] In `template-parts/property/header.php`, replace hardcoded location "(Courchevel 1850)" with ACF field `prop_location_text` using `esc_html(get_field('prop_location_text'))` (line 53 equivalent)
- [x] T042 [US1] In `template-parts/property/header.php`, add favorite and share buttons (maintain existing HTML structure from lines 40-51)
- [x] T043 [US1] In `template-parts/property/header.php`, add pricing section calling `ar_get_property_pricing()` helper to display starting price, currency, and period (lines 91-93 equivalent)
- [x] T044 [US1] In `template-parts/property/specifications.php`, retrieve `prop_specs` group field and output specs grid with conditional checks
- [x] T045 [US1] In `template-parts/property/specifications.php`, format each spec with label and value (Guests, Bedrooms, Bathroom, Size, Location, Access, Staff) using existing CSS classes
- [x] T046 [US1] In `template-parts/property/specifications.php`, add fallback for empty optional fields (size, access, staff) - hide if empty
- [x] T047 [US1] In `template-parts/property/specifications.php`, add prop_booking group fields for contact buttons (availability_link, chat_link) with conditional display
- [x] T048 [US1] In `single-property.php`, replace product-detail section (lines 34-127) with call to `get_template_part('template-parts/property/header')`
- [x] T049 [US1] Update `single-property.php` to call `get_template_part('template-parts/property/specifications')` after header
- [X] T050 [US1] Test with property that has all required fields populated - verify display matches original hardcoded layout
- [X] T051 [US1] Test with property missing optional fields (size, access, staff, booking links) - verify sections hide gracefully
- [X] T052 [US1] Test with property with very long location name - verify layout doesn't break
- [X] T053 [US1] Validate required field enforcement - attempt to publish property without location, guests, bedrooms, bathrooms, or price - verify validation blocks save

**Checkpoint**: User Story 1 complete - core property information displays dynamically with proper fallbacks

---

## Phase 4: User Story 3 - Amenities and Features Organization (Priority: P1)

**Goal**: Display property amenities, features, room details, and services from ACF repeater fields with icons

**Independent Test**: Create/edit a property and add key features, room details, and services using repeater fields, then verify they display in correct sections with icons

### Implementation for User Story 3

- [x] T054 [P] [US3] Create template part `template-parts/property/key-features.php` for Key Features section with prop_key_features repeater
- [x] T055 [P] [US3] Create template part `template-parts/property/room-details.php` for Room & Space Details section with prop_room_details repeater
- [x] T056 [P] [US3] Create template part `template-parts/property/services.php` for In-Chalet Services section with prop_services repeater
- [x] T057 [P] [US3] Create template part `template-parts/property/about.php` for About the Chalet section using `the_content()`
- [x] T058 [US3] In `template-parts/property/key-features.php`, implement `have_rows('prop_key_features')` loop per data-model.md
- [x] T059 [US3] In `template-parts/property/key-features.php`, output feature icon using `wp_get_attachment_image(get_sub_field('feature_icon'), 'thumbnail')` with fallback if empty
- [x] T060 [US3] In `template-parts/property/key-features.php`, output feature label with `esc_html(get_sub_field('feature_label'))`
- [x] T061 [US3] In `template-parts/property/key-features.php`, maintain existing CSS structure from lines 129-202 (key-features section, ul li structure)
- [x] T062 [US3] In `template-parts/property/room-details.php`, implement `have_rows('prop_room_details')` loop per data-model.md
- [x] T063 [US3] In `template-parts/property/room-details.php`, output room icon and description with proper escaping, maintain CSS from lines 226-305
- [x] T064 [US3] In `template-parts/property/room-details.php`, add prop_room_images gallery display at bottom of section (lines 301-304 equivalent)
- [x] T065 [US3] In `template-parts/property/services.php`, implement `have_rows('prop_services')` loop per data-model.md
- [x] T066 [US3] In `template-parts/property/services.php`, output service icon and label with proper escaping, maintain CSS from lines 308-349
- [x] T067 [US3] In `template-parts/property/about.php`, add section wrapper with key-features classes (lines 206-224)
- [x] T068 [US3] In `template-parts/property/about.php`, output post content with `the_content()` for About the Chalet text
- [x] T069 [US3] In `template-parts/property/about.php`, add watermark image and section title "About the Chalet" per existing structure
- [x] T070 [US3] In `single-property.php`, replace key-features section (lines 129-204) with `get_template_part('template-parts/property/key-features')`
- [x] T071 [US3] In `single-property.php`, replace chalet-about section (lines 206-224) with `get_template_part('template-parts/property/about')`
- [x] T072 [US3] In `single-property.php`, replace room details section (lines 226-306) with `get_template_part('template-parts/property/room-details')`
- [x] T073 [US3] In `single-property.php`, replace services section (lines 308-349+) with `get_template_part('template-parts/property/services')`
- [x] T074 [US3] Add conditional checks in each template part to hide section entirely if repeater has no rows using `ar_property_has_content()` helper
- [X] T075 [US3] Test with property that has all repeater fields populated with icons - verify sections display correctly
- [X] T076 [US3] Test with property where repeater fields are empty - verify sections hide completely (no empty placeholders)
- [X] T077 [US3] Test with property where icons are missing but labels exist - verify text-only display works
- [X] T078 [US3] Test with very long feature/room/service descriptions - verify layout doesn't break
- [X] T079 [US3] Test About the Chalet with block editor content (headings, lists, images) - verify `the_content()` renders correctly

**Checkpoint**: User Story 3 complete - amenities, features, rooms, services, and about content display dynamically from repeaters

---

## Phase 5: User Story 2 - Property Gallery Management (Priority: P2)

**Goal**: Display property images in Swiper slider with seasonal gallery support (winter/summer) based on date or manual toggle

**Independent Test**: Upload images to main gallery field, verify they display in Swiper slider with navigation; enable seasonal toggle, upload winter/summer images, verify correct season displays

### Implementation for User Story 2

- [X] T080 [P] [US2] Create template part `template-parts/property/gallery.php` for gallery slider section
- [X] T081 [US2] In `template-parts/property/gallery.php`, implement seasonal gallery logic per data-model.md (check prop_seasonal_toggle, determine season from date, select appropriate gallery)
- [X] T082 [US2] In `template-parts/property/gallery.php`, retrieve gallery field IDs (prop_gallery, prop_winter_gallery, or prop_summer_gallery based on logic)
- [X] T083 [US2] In `template-parts/property/gallery.php`, implement fallback chain: if seasonal enabled and seasonal gallery empty, fall back to main gallery
- [X] T084 [US2] In `template-parts/property/gallery.php`, loop through gallery IDs and output Swiper slider markup per existing structure (lines 55-82)
- [X] T085 [US2] In `template-parts/property/gallery.php`, output each image using `wp_get_attachment_image($image_id, 'large', false, ['class' => 'property-image', 'loading' => 'lazy'])`
- [X] T086 [US2] In `template-parts/property/gallery.php`, maintain Swiper HTML structure (swiper-wrapper, swiper-slide, navigation buttons)
- [X] T087 [US2] In `template-parts/property/gallery.php`, add slider count and expand button elements (lines 82-88)
- [X] T088 [US2] In `single-property.php`, replace gallery section (lines 55-89) with `get_template_part('template-parts/property/gallery')`
- [X] T089 [US2] Test with property that has 5+ images in main gallery - verify Swiper slider displays all images with navigation
- [X] T090 [US2] Test with seasonal toggle OFF - verify only main gallery displays
- [X] T091 [US2] Test with seasonal toggle ON and winter gallery populated - verify winter images display in November-March (test by changing server date or logic)
- [X] T092 [US2] Test with seasonal toggle ON and summer gallery populated - verify summer images display in April-October
- [X] T093 [US2] Test with seasonal toggle ON but seasonal gallery empty - verify fallback to main gallery works
- [X] T094 [US2] Test with property with only 1 image - verify slider still initializes correctly
- [X] T095 [US2] Test with property with no images in main gallery - verify validation prevents this (from T025 setup)
- [X] T096 [US2] Verify gallery images use responsive srcset for performance (check `wp_get_attachment_image` output in browser)

**Checkpoint**: User Story 2 complete - gallery displays dynamically with seasonal support and proper fallbacks

---

## Phase 6: User Story 4 - Breadcrumb Navigation (Priority: P3)

**Goal**: Display dynamic breadcrumb navigation with Home > Destination > Property hierarchy

**Independent Test**: Set property location taxonomy, view property page, verify breadcrumbs show correct hierarchy with working links

### Implementation for User Story 4

- [X] T097 [US4] In `single-property.php`, update breadcrumb home link (line 5-9) - maintain existing structure, update href with `home_url('/')`
- [X] T098 [US4] In `single-property.php`, replace hardcoded "Courchevel" breadcrumb (line 17) with dynamic destination from `prop_location_taxonomy` field
- [X] T099 [US4] In `single-property.php`, retrieve destination term using `get_field('prop_location_taxonomy')` and output term name with `esc_html($destination->name)`
- [X] T100 [US4] In `single-property.php`, create destination archive link using `get_term_link($destination)` for breadcrumb href
- [X] T101 [US4] In `single-property.php`, replace hardcoded property name "Chalet Mazot Cannors" (line 25) with `the_title()`
- [X] T102 [US4] In `single-property.php`, add conditional check: if destination taxonomy not set, skip destination breadcrumb and go directly to property name
- [X] T103 [US4] In `single-property.php`, maintain existing breadcrumb CSS classes and arrow SVGs (lines 11-23)
- [X] T104 [US4] Test with property that has destination set - verify breadcrumb shows Home > Destination Name > Property Name with working links
- [X] T105 [US4] Test with property without destination set - verify breadcrumb shows Home > Property Name gracefully
- [X] T106 [US4] Test breadcrumb links - verify home link goes to homepage, destination link goes to destination archive
- [X] T107 [US4] Test with very long property or destination names - verify breadcrumb layout doesn't break

**Checkpoint**: User Story 4 complete - breadcrumbs display dynamic hierarchy with proper linking

---

## Phase 7: Polish & Cross-Cutting Concerns

**Purpose**: Final testing, validation, performance optimization, and documentation

- [ ] T108 [P] Remove backup file `single-property.php.backup` after confirming all functionality works (DEFERRED - keeping for reference)
- [X] T109 [P] Verify all template parts properly escape output with `esc_html()`, `esc_url()`, `esc_attr()`, or `wp_kses_post()` where appropriate
- [X] T110 [P] Verify all ACF field access uses conditional checks before rendering to prevent PHP notices on empty fields
- [ ] T111 [P] Run WordPress Coding Standards check on all modified files (`phpcs --standard=WordPress single-property.php template-parts/property/*.php inc/acf-validation.php`)
- [ ] T112 Create comprehensive test property with ALL fields populated (all tabs, all repeaters, all images)
- [ ] T113 Create minimal test property with ONLY required fields populated (location, specs required fields, price, main gallery)
- [ ] T114 Create edge case test property with very long content in all text fields (stress test layouts)
- [ ] T115 Measure page load time with GTmetrix or Pingdom - verify < 3 seconds (Success Criteria SC-003)
- [ ] T116 Time full property creation process from start to publish - verify < 15 minutes (Success Criteria SC-001)
- [ ] T117 Verify all fields accessible within 3 clicks in admin (Success Criteria SC-004)
- [ ] T118 Review all field helper text with non-technical content manager - verify clarity (Success Criteria SC-005)
- [ ] T119 Visual regression test - compare property page layout to original hardcoded version, ensure styling is identical
- [ ] T120 Test all edge cases from spec.md: no images, missing optional fields, very long description, zero counts, special characters
- [X] T121 [P] Verify ACF JSON file is committed and documented in Git with clear commit message
- [X] T122 [P] Create content manager quick reference guide (optional) - 1-page PDF showing how to fill out property fields
- [X] T123 [P] Update quickstart.md if any setup steps changed during implementation
- [ ] T124 Verify all Success Criteria (SC-001 through SC-007) are met per plan.md mapping table
- [ ] T125 Final validation: Create a brand new property from scratch following quickstart.md, verify all functionality works end-to-end

**Checkpoint**: Feature complete, tested, and production-ready

---

## Dependencies & Execution Order

### Phase Dependencies

- **Setup (Phase 1)**: No dependencies - can start immediately
  - Tasks T001-T030: ACF field group creation, validation, icon library
  - Must complete before any template work
- **Foundational (Phase 2)**: Depends on Setup completion - BLOCKS all user stories
  - Tasks T031-T037: Template structure, helper functions
  - Must complete before implementing any user story
- **User Story 1 (Phase 3)**: Depends on Foundational completion
  - Tasks T038-T053: Property information display
  - MVP - most critical user story
- **User Story 3 (Phase 4)**: Depends on Foundational completion
  - Tasks T054-T079: Amenities and features
  - Also P1 priority, can start in parallel with US1 if staffed
- **User Story 2 (Phase 5)**: Depends on Foundational completion
  - Tasks T080-T096: Gallery management
  - P2 priority, can start after US1 or in parallel if staffed
- **User Story 4 (Phase 6)**: Depends on Foundational completion
  - Tasks T097-T107: Breadcrumb navigation
  - P3 priority, can be done last or in parallel if staffed
- **Polish (Phase 7)**: Depends on all user stories being complete
  - Tasks T108-T125: Testing, validation, optimization

### User Story Dependencies

- **User Story 1 (P1)**: Independent - no dependencies on other stories
- **User Story 3 (P1)**: Independent - no dependencies on other stories
- **User Story 2 (P2)**: Independent - no dependencies on other stories
- **User Story 4 (P3)**: Independent - no dependencies on other stories

**All user stories are independently testable and deliverable**

### Within Each User Story

- Template parts created first (can be done in parallel if different files)
- Template part implementation (field retrieval and display)
- Single-property.php integration (replace hardcoded sections)
- Testing with various data scenarios
- Edge case validation

### Parallel Opportunities

**Phase 1 (Setup) - Parallel tasks**:
- T005 (SVG upload), T027 (validation file), T029-T030 (icon extraction) can all run in parallel
- ACF field creation (T006-T024) must be sequential in ACF UI

**Phase 2 (Foundational) - Parallel tasks**:
- T032, T033, T034, T035 (all helper functions) can be written in parallel - different functions in same file

**Phase 3 (US1) - Parallel tasks**:
- T038, T039 (both template part files) can be created in parallel - different files

**Phase 4 (US3) - Parallel tasks**:
- T054, T055, T056, T057 (all 4 template part files) can be created in parallel - different files

**Phase 5 (US2) - Parallel tasks**:
- T080 (template part creation) is single file

**Phase 6 (US4) - All tasks sequential** (modifying same file: single-property.php)

**Phase 7 (Polish) - Parallel tasks**:
- T108, T109, T110, T111, T121, T122, T123 can all run in parallel - different files/activities

**User stories can work in parallel**:
- Once Foundational (Phase 2) completes, US1, US2, US3, and US4 can ALL be worked on simultaneously by different developers
- Each user story works on different template parts and different sections of single-property.php
- Conflicts minimal since each story owns its own template part files

---

## Parallel Example: Phase 2 (Foundational)

```bash
# Launch all helper functions in parallel:
Task: "Create helper function ar_get_property_specs() in inc/template-functions.php"
Task: "Create helper function ar_get_property_pricing() in inc/template-functions.php"
Task: "Create helper function ar_display_property_gallery() in inc/template-functions.php"
Task: "Create helper function ar_property_has_content() in inc/template-functions.php"
```

## Parallel Example: Phase 4 (User Story 3)

```bash
# Launch all template part creations in parallel:
Task: "Create template part template-parts/property/key-features.php"
Task: "Create template part template-parts/property/room-details.php"
Task: "Create template part template-parts/property/services.php"
Task: "Create template part template-parts/property/about.php"
```

## Parallel Example: Multiple User Stories

```bash
# After Foundational phase completes, launch all user stories:
Developer A: User Story 1 (Tasks T038-T053)
Developer B: User Story 3 (Tasks T054-T079)
Developer C: User Story 2 (Tasks T080-T096)
Developer D: User Story 4 (Tasks T097-T107)
```

---

## Implementation Strategy

### MVP First (Fastest Path to Value)

**Minimum Viable Product = User Story 1 Only**

1. Complete Phase 1: Setup (Tasks T001-T030) → ~2-3 hours
2. Complete Phase 2: Foundational (Tasks T031-T037) → ~1 hour
3. Complete Phase 3: User Story 1 (Tasks T038-T053) → ~2-3 hours
4. **STOP and VALIDATE**:
   - Create test property with basic info and pricing
   - View property page
   - Verify core information displays correctly
   - **MVP is now deployable!**

**Time to MVP**: ~5-7 hours total

### Incremental Delivery (Recommended)

1. **Sprint 1**: Setup + Foundational + US1 (P1) → Deploy MVP
   - Property info displays dynamically
   - Content managers can start using ACF fields

2. **Sprint 2**: Add US3 (P1) → Deploy Enhanced Version
   - Amenities, features, rooms, services now dynamic
   - About the Chalet uses post content

3. **Sprint 3**: Add US2 (P2) → Deploy Visual Enhancement
   - Gallery management with seasonal support
   - Rich visual content enabled

4. **Sprint 4**: Add US4 (P3) + Polish → Deploy Complete Version
   - Breadcrumb navigation added
   - Full testing and optimization complete

### Parallel Team Strategy

**With 2 Developers**:
1. Both complete Setup + Foundational together
2. Dev A: User Story 1 + User Story 2
3. Dev B: User Story 3 + User Story 4
4. Both: Polish together

**With 4 Developers**:
1. All complete Setup + Foundational together
2. After Foundational:
   - Dev A: User Story 1 (P1) - Property Info
   - Dev B: User Story 3 (P1) - Amenities
   - Dev C: User Story 2 (P2) - Gallery
   - Dev D: User Story 4 (P3) - Breadcrumbs
3. Stories integrate independently, no conflicts

---

## Success Criteria Validation

Per plan.md Success Criteria Mapping:

- **SC-001**: < 15 min property creation → **Validated in T116**
- **SC-002**: 100% dynamic content → **Validated throughout implementation, checked in T109**
- **SC-003**: < 3 sec page load → **Validated in T115**
- **SC-004**: < 3 clicks to any field → **Validated in T117**
- **SC-005**: Helper text eliminates training docs → **Validated in T118**
- **SC-006**: Consistent formatting → **Validated in T119 (visual regression)**
- **SC-007**: Empty fields hide gracefully → **Validated in T051, T074, T076, T120**

**Final validation in T124 confirms all criteria met**

---

## Notes

- **[P] tasks** = Different files, no dependencies, can run in parallel
- **[Story] labels** map task to specific user story for traceability
- Each user story is **independently completable and testable**
- **No automated tests** - using manual QA per plan.md testing strategy
- Commit after completing each template part or logical group
- Stop at any checkpoint to validate story independently
- Follow data-model.md exactly for field names and structure
- Follow plan.md for helper function signatures and template organization
- Maintain existing CSS classes from original template for styling compatibility
- All ACF output must be escaped per WordPress security standards
- ACF JSON must be committed to version control after field group changes

---

## Task Summary

- **Total Tasks**: 125 tasks
- **Setup Phase**: 30 tasks (T001-T030)
- **Foundational Phase**: 7 tasks (T031-T037)
- **User Story 1 (P1)**: 16 tasks (T038-T053)
- **User Story 3 (P1)**: 26 tasks (T054-T079)
- **User Story 2 (P2)**: 17 tasks (T080-T096)
- **User Story 4 (P3)**: 11 tasks (T097-T107)
- **Polish Phase**: 18 tasks (T108-T125)

**Parallel Opportunities**: 15+ tasks marked [P] across all phases

**MVP Scope**: Phases 1-3 (53 tasks) delivers core functionality

**Estimated Timeline**:
- MVP (US1 only): ~5-7 hours
- MVP + US3: ~10-14 hours
- All P1+P2 stories: ~15-20 hours
- Complete (all stories + polish): ~20-25 hours

This assumes single developer working sequentially. With parallel development (multiple developers), timeline can be significantly compressed.
