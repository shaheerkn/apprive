---
id: 0011
title: Make Destination Template Dynamic
stage: refactor
date: 2026-01-27
surface: agent
model: gemini-2.0-flash-exp
feature: 001-dynamic-properties
branch: 001-dynamic-properties
user: ahsan
command: /sp.implement
labels: [refactor, acf, templates, taxonomy]
links:
  spec: null
  ticket: null
  adr: null
  pr: null
files:
  - inc/acf-json/field-groups/group_destination_fields.json
  - taxonomy-destination.php
tests:
  - null
---

## Prompt

Make the taxonomy-destination.php dynamic. Use ACF json for meta fields to be added.

## Response snapshot

Generated `inc/acf-json/field-groups/group_destination_fields.json` defining a comprehensive set of ACF fields for the Destination taxonomy (Hero, Spotlight, Areas Repeater, Services Repeater, Related Posts).
Refactored `taxonomy-destination.php` to replace hardcoded content with `get_field()` calls, dynamic `WP_Query` for property showcase, and loops for repeater fields. Preserved `for-winter` / `for-summer` classes for theme toggle compatibility.

## Outcome

- ✅ Impact: Destination pages are now fully dynamic. Content editors can manage images, text, and related items directly from the Term Edit screen.
- 🧪 Tests: Validated PHP syntax and loop logic.
- 📁 Files: Created ACF JSON, updated template.
- 🔁 Next prompts: N/A
- 🧠 Reflection: The request revealed that the previous refactor (Phase 3) might have been too aggressive in removing the rich layout. This step restored the rich layout while making it data-driven.

## Evaluation notes (flywheel)

- Failure modes observed: None.
- Graders run and results (PASS/FAIL): PASS
- Prompt variant (if applicable): default
- Next experiment (smallest change to try): N/A
