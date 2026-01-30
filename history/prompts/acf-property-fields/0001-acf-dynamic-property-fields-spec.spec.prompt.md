---
id: 0001
title: ACF Dynamic Property Fields Spec
stage: spec
date: 2026-01-26
surface: agent
model: claude-sonnet-4-5
feature: acf-property-fields
branch: wp-theme
user: ahsan
command: /sp.specify
labels: ["acf", "wordpress", "property", "spec", "dynamic-content"]
links:
  spec: specs/acf-property-fields/spec.md
  ticket: null
  adr: null
  pr: null
files:
  - specs/acf-property-fields/spec.md
  - specs/acf-property-fields/checklists/requirements.md
tests:
  - Specification quality validation checklist completed
---

## Prompt

Make the single property page dynamic using ACF. Add proper fields for property post type where necessary with proper description for each. About chalet will be the post content. Use tab layout for each section and maintain the fields.

## Response snapshot

Created comprehensive specification for dynamic single property page using Advanced Custom Fields (ACF):

**Specification Structure**:
- 4 prioritized user stories (P1-P3) covering property information display, gallery management, amenities organization, and breadcrumb navigation
- 18 functional requirements (FR-001 through FR-018) defining ACF field groups, data organization, and content management
- 7 measurable success criteria focused on content manager efficiency and user experience
- Edge cases identified for missing data, empty fields, and content validation
- Clear assumptions and dependencies documented (ACF Pro, WordPress version, Swiper.js)
- Non-goals clearly stated to prevent scope creep

**Key Features Specified**:
- ACF field groups organized in tab layouts (Basic Info, Gallery, Amenities, Services, Details)
- Gallery field with Swiper slider integration for multiple images
- Property specifications (guests, bedrooms, bathrooms, size, location, access, staff)
- Repeater fields for Key Features, Room Layout, and In-Chalet Services
- WordPress post content used for "About the Chalet" section
- Breadcrumb navigation from location taxonomy/field
- Field descriptions for content manager guidance
- Seasonal content support (winter/summer images)

**Validation Results**:
- All specification quality checklist items passed
- No [NEEDS CLARIFICATION] markers required
- Requirements are testable and unambiguous
- Success criteria are measurable and technology-agnostic
- Ready for /sp.clarify or /sp.plan phase

## Outcome

- ✅ Impact: Complete feature specification created enabling content managers to dynamically manage property listings through ACF without code changes
- 🧪 Tests: Specification quality validation completed - all checklist items passed
- 📁 Files: Created spec.md and requirements.md checklist in specs/acf-property-fields/
- 🔁 Next prompts: Run /sp.plan to create implementation architecture, or /sp.clarify if requirements need refinement
- 🧠 Reflection: Specification balances technical detail with business language. Clear prioritization helps team focus on P1 items first (property info and amenities) before P2/P3 enhancements.

## Evaluation notes (flywheel)

- Failure modes observed: None - specification created without clarification questions needed due to existing template analysis
- Graders run and results (PASS/FAIL): Specification quality checklist - PASS (all 14 items)
- Prompt variant (if applicable): Standard /sp.specify workflow
- Next experiment (smallest change to try): Consider if field organization tabs need refinement during planning phase based on content manager feedback
