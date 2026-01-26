---
id: 004
title: WordPress Theme Constitution Created
stage: constitution
date: 2026-01-26
surface: agent
model: claude-opus-4-5-20251101
feature: none
branch: wp-theme
user: ahsan
command: /sp.constitution
labels: ["constitution", "wordpress", "theme-architecture", "acf", "scss"]
links:
  spec: null
  ticket: null
  adr: null
  pr: null
files:
  - .specify/memory/constitution.md
  - history/prompts/constitution/004-wordpress-theme-constitution-created.constitution.prompt.md
tests:
  - null
---

## Prompt

Create principles focused on maintaining the existing WordPress theme architecture, using PHP for backend, SCCSS for styling, and also ACF advanced custom fields for meta fields and post types.

## Response snapshot

Created Arprive WordPress Theme Constitution v1.0.0 with six core principles:

1. **WordPress Theme Architecture** - Template hierarchy, hooks/filters, template parts organization
2. **PHP Backend Standards** - WordPress coding standards, `ar_` prefix, escaping/sanitization, translation functions
3. **SCSS Styling Architecture** - Organized `/scss/` directory with base/components/layout structure, BEM naming, mobile-first
4. **ACF Custom Fields & Post Types** - ACF for meta fields, JSON sync for version control, proper field access patterns
5. **Template Hierarchy Compliance** - WordPress template naming conventions, The Loop usage, conditional tags
6. **Performance & Security** - Proper enqueueing, nonce verification, capability checks, transients caching

Added Technology Stack section documenting PHP 7.4+, WordPress 6.0+, SCSS, ACF Pro, and text domain `ar`.

Added Development Workflow with code organization structure and review checklist.

## Outcome

- Impact: Established foundational governance for Arprive WordPress theme development
- Tests: N/A (documentation artifact)
- Files: 1 created (.specify/memory/constitution.md)
- Next prompts: Run `/sp.plan` or `/sp.specify` to create feature specs aligned with constitution
- Reflection: Constitution covers all requested technologies (PHP, SCSS, ACF) with actionable, testable principles

## Evaluation notes (flywheel)

- Failure modes observed: None
- Graders run and results (PASS/FAIL): Manual review - PASS
- Prompt variant (if applicable): N/A
- Next experiment (smallest change to try): Validate principles against existing codebase compliance
