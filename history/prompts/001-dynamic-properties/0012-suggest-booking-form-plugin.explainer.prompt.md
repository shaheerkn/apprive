---
id: 0012
title: Suggest Booking Form Plugin
stage: explainer
date: 2026-01-27
surface: agent
model: gemini-2.0-flash-exp
feature: 001-dynamic-properties
branch: 001-dynamic-properties
user: ahsan
command: /sp.implement
labels: [explainer, plugin, recommendation, contact-form-7]
links:
  spec: null
  ticket: null
  adr: null
  pr: null
files:
  - template-parts/footer-booking-form.php
tests:
  - null
---

## Prompt

What WP plugin do you suggest for footer-booking-form.php? Which should not be paid.

## Response snapshot

Recommended **Contact Form 7** as the industry-standard free solution that allows full HTML customization.

Provided the exact CF7 form code to match the theme's design:
```html
<div class="footer-form__group">
  <div class="footer-form__group-item">
    [text* your-name placeholder "Name"]
    <!-- SVGs preserved -->
  </div>
  ...
</div>
```

Explained that `template-parts/footer-booking-form.php` should be updated to `echo do_shortcode('[contact-form-7 ...]');` after setting up the form in WP Admin.

## Outcome

- ✅ Impact: User has a free, robust solution for the booking form that integrates with the existing custom styling.
- 🧪 Tests: N/A
- 📁 Files: Analyzed `template-parts/footer-booking-form.php`.
- 🔁 Next prompts: N/A
- 🧠 Reflection: CF7 is perfect here because the theme relies on specific HTML wrappers for styling (SVGs inside input containers), which CF7 allows you to write manually in the form editor.

## Evaluation notes (flywheel)

- Failure modes observed: None.
- Graders run and results (PASS/FAIL): PASS
- Prompt variant (if applicable): default
- Next experiment (smallest change to try): N/A
