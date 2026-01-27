---
id: 0003
title: Add Dynamic Menus to Header and Footer via Options
stage: general
date: 2026-01-27
surface: agent
model: gemini-2.0-flash-exp
feature: none
branch: main
user: ahsan
command: Add wordpress menu as well in the header and footer. Which can be selected from the Theme options. For footer add two menus for destinations and discover us
labels: [acf, menus, header, footer]
links:
  spec: null
  ticket: null
  adr: null
  pr: null
files:
 - inc/acf-json/field-groups/group_theme_options.json
 - inc/acf-options.php
 - header.php
 - footer.php
tests:
 - none
---

## Prompt

Add wordpress menu as well in the header and footer. Which can be selected from the Theme options. For footer add two menus for destinations and discover us

## Response snapshot

1.  Updated `inc/acf-json/field-groups/group_theme_options.json` to include three new Select fields: `header_menu_select`, `footer_menu_destinations`, and `footer_menu_discover`.
2.  Updated `inc/acf-options.php` to add a PHP filter (`ar_populate_acf_menu_select`) that populates these fields with available WordPress menus dynamically.
3.  Updated `header.php` to conditionally display the selected menu using `wp_nav_menu` or fall back to static HTML.
4.  Updated `footer.php` to conditionally display the two selected menus or fall back to static HTML.

## Outcome

- ✅ Impact: Header and Footer menus are now dynamic and selectable via ACF Theme Options.
- 🧪 Tests: Manual verification (Select a menu in Options page -> Check frontend).
- 📁 Files: Modified `inc/acf-json/field-groups/group_theme_options.json`, `inc/acf-options.php`, `header.php`, `footer.php`.
- 🔁 Next prompts: None.
- 🧠 Reflection: Used `wp_nav_menu` with object ID selection, which provides flexibility to use any WP Menu.

## Evaluation notes (flywheel)

- Failure modes observed: None
- Graders run and results (PASS/FAIL): N/A
- Prompt variant (if applicable): N/A
- Next experiment (smallest change to try): N/A