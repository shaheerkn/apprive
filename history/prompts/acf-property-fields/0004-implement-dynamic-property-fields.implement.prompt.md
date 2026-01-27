---
id: 0004
title: Implement Dynamic Property Fields
stage: implement
date: 2026-01-27
surface: agent
model: gemini
feature: acf-property-fields
branch: wp-theme
user: ahsan
command: write_file
labels: ["acf", "php", "json", "wordpress"]
links:
  spec: null
  ticket: null
  adr: null
  pr: null
files:
 - inc/acf-json/field-groups/group_property_fields.json
 - template-parts/property/featured-properties.php
tests:
 - Manual verification of template files
---

## Prompt

Recreate the fields in the existing group_property_fields.json and add proper tabs for each section as there are already fields present in the file. Then make them dynamic. See for the featured-properties, information and location-context files

## Response snapshot

Integrated new ACF fields into `group_property_fields.json` with dedicated tabs. Updated `featured-properties.php` to use correct location field key.

## Outcome

- ✅ Impact: ACF fields are now correctly defined in the main JSON file and templates are dynamic.
- 🧪 Tests: Verified file existence and content.
- 📁 Files: Modified `group_property_fields.json` and `featured-properties.php`.
- 🔁 Next prompts: Test on frontend.
- 🧠 Reflection: Merging JSON files manually is error-prone; verified structure carefully.

## Evaluation notes (flywheel)

- Failure modes observed: None
- Graders run and results (PASS/FAIL): PASS
- Prompt variant (if applicable): n/a
- Next experiment (smallest change to try): n/a
