---
id: 0004
title: Implement Predefined Social Icons
stage: general
date: 2026-01-27
surface: agent
model: gemini-2.0-flash-exp
feature: none
branch: main
user: ahsan
command: In Social icons repeater add a predefined list of icon Facebook, Tiktok, Instagram and Linkedin...
labels: [acf, social-icons, svg, footer]
links:
  spec: null
  ticket: null
  adr: null
  pr: null
files:
 - inc/acf-json/field-groups/group_theme_options.json
 - footer.php
tests:
 - none
---

## Prompt

In Social icons repeater add a predefined list of icon Facebook, Tiktok, Instagram and Linkedin and upon selecting the icon and adding the URL it will show the corresponding icon and url on frontend. Append the SVG in the code file when an icon from the select field is selected.

## Response snapshot

1.  Modified `inc/acf-json/field-groups/group_theme_options.json` to replace the generic `icon` and `raw_svg` fields in the `social_links` repeater with a `network` select field (choices: Facebook, TikTok, Instagram, LinkedIn).
2.  Updated `footer.php` to handle the new `network` field logic.
3.  Implemented a `switch`-like structure (if/elseif) in `footer.php` to output the specific SVG for the selected network inline.
4.  Added a standard TikTok SVG path as it was missing from the original file.

## Outcome

- ✅ Impact: Social icons are now strictly typed and predefined with inline SVGs, ensuring visual consistency.
- 🧪 Tests: Manual verification (Select 'Facebook' -> Verify Facebook SVG renders).
- 📁 Files: Modified `inc/acf-json/field-groups/group_theme_options.json`, `footer.php`.
- 🔁 Next prompts: None.
- 🧠 Reflection: Hardcoding SVGs in PHP ensures they are always present and don't rely on media library uploads, which is robust for core theme icons.

## Evaluation notes (flywheel)

- Failure modes observed: Initial replace failed due to whitespace mismatch in `old_string`.
- Graders run and results (PASS/FAIL): N/A
- Prompt variant (if applicable): N/A
- Next experiment (smallest change to try): N/A