---
id: 005
title: ACF JSON Save Load Points
stage: constitution
date: 2026-01-26
surface: agent
model: claude-opus-4-5-20251101
feature: none
branch: wp-theme
user: ahsan
command: /sp.constitution
labels: ["constitution", "acf", "json-sync", "template-functions"]
links:
  spec: null
  ticket: null
  adr: null
  pr: null
files:
  - .specify/memory/constitution.md
  - inc/template-functions.php
tests:
  - null
---

## Prompt

I have updated the template-functions.php regarding php save and load points. Please update the constitutions according to it

## Response snapshot

Updated Constitution from v1.0.0 to v1.1.0 (MINOR bump) to reflect ACF JSON organized save/load points.

**Key Changes to Principle IV (ACF Custom Fields & Post Types)**:

Added documented ACF JSON Save/Load Points:
- `/inc/acf-json/field-groups/` - Field groups
- `/inc/acf-json/post-types/` - Post types
- `/inc/acf-json/taxonomies/` - Taxonomies
- `/inc/acf-json/options-pages/` - Options pages

Added Implementation Reference section documenting the filter functions:
- `ar_acf_field_groups_save_folder()`
- `ar_acf_cpt_save_folder()`
- `ar_acf_taxonomy_save_folder()`
- `ar_acf_options_save_folder()`
- `ar_acf_json_load_point()`

Updated Code Organization tree to reflect the new `/inc/acf-json/` subdirectory structure.

Updated Review Checklist to reference "appropriate JSON subdirectory" for ACF sync.

## Outcome

- Impact: Constitution now accurately reflects the organized ACF JSON structure implemented in template-functions.php
- Tests: N/A (documentation artifact)
- Files: 1 modified (.specify/memory/constitution.md)
- Next prompts: Create ACF JSON directories if not existing; sync existing field groups to new structure
- Reflection: MINOR version bump appropriate since this materially expands guidance without breaking changes

## Evaluation notes (flywheel)

- Failure modes observed: None
- Graders run and results (PASS/FAIL): Manual review - PASS
- Prompt variant (if applicable): N/A
- Next experiment (smallest change to try): Verify ACF JSON directories exist and are properly syncing
