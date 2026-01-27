---
id: 0001
title: Make Brand Values and Header Footer Dynamic via ACF Options
stage: general
date: 2026-01-27
surface: agent
model: gemini-2.0-flash-exp
feature: none
branch: main
user: ahsan
command: Make this brand values section dynamic and add a global section in options page...
labels: [acf, theme-options, header, footer]
links:
  spec: null
  ticket: null
  adr: null
  pr: null
files:
 - inc/acf-options.php
 - functions.php
 - header.php
 - footer.php
tests:
 - none
---

## Prompt

Make this brand values section dynamic and add a global section in options page to be accessible on all the pages as this is in the footer. Also when adding an options page offcourse from ACF, Make Header and footer dynamic as well. Add proper fields for the content images and logo. Add tabs for the Header Footer and Brand values in the option page.

## Response snapshot

Implemented ACF Options page with tabs for Header, Brand Values, and Footer. Updated `functions.php` to include the options definition. Modified `header.php` and `footer.php` to fetch data from these global options, making the Logo, Brand Values, Booking text, Social links, and Contact info dynamic.

## Outcome

- ✅ Impact: Brand values, Header, and Footer are now fully dynamic and manageable via ACF Options Page.
- 🧪 Tests: Manual verification (implied).
- 📁 Files: Created `inc/acf-options.php`, modified `functions.php`, `header.php`, `footer.php`.
- 🔁 Next prompts: Verify styles or add more fields if needed.
- 🧠 Reflection: Successfully integrated global theme settings using ACF.

## Evaluation notes (flywheel)

- Failure modes observed: None
- Graders run and results (PASS/FAIL): N/A
- Prompt variant (if applicable): N/A
- Next experiment (smallest change to try): N/A