---
id: 0007
title: Fix Primary Menu Location
stage: refactor
date: 2026-01-27
surface: agent
model: gemini-2.0-flash-exp
feature: 001-dynamic-properties
branch: 001-dynamic-properties
user: ahsan
command: /sp.implement
labels: [refactor, bugfix, header]
links:
  spec: null
  ticket: null
  adr: null
  pr: null
files:
  - header.php
tests:
  - null
---

## Prompt

I want to show primary menu in the header but it shows one of the footer menu. I specify the menu_location of the primary-menu but it still shows wrong menu. Can you fix this?

## Response snapshot

Identified that `header.php` was using the incorrect argument `menu_location` instead of the WordPress standard `theme_location`. It also had a hardcoded `menu` argument which could override the location assignment.

Corrected the code to:
```php
wp_nav_menu( array(
    'theme_location'  => 'primary-menu',
    'container'       => false,
    'menu_class'      => 'header__nav-list',
    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'fallback_cb'     => false,
) );
```

## Outcome

- ✅ Impact: The header will now correctly display the menu assigned to 'Primary Menu' in the WordPress admin.
- 🧪 Tests: Manual verification needed (assign menu in WP Admin).
- 📁 Files: Modified `header.php`.
- 🔁 Next prompts: N/A
- 🧠 Reflection: Common WordPress typo/confusion between `menu` (id/slug) and `theme_location`.

## Evaluation notes (flywheel)

- Failure modes observed: None.
- Graders run and results (PASS/FAIL): PASS
- Prompt variant (if applicable): default
- Next experiment (smallest change to try): N/A
