# Testing Checklist: Phase 6 - User Story 4 (Breadcrumb Navigation)

**Date**: 2026-01-27
**Feature**: Dynamic Single Property Page with ACF
**Phase**: Phase 6 - User Story 4 (Breadcrumb Navigation)
**Status**: Implementation Complete - Ready for Testing

## Implementation Summary

**Completed Tasks:**
- ✅ T097: Home breadcrumb link uses `home_url('/')`
- ✅ T098-T100: Dynamic destination breadcrumb from `prop_location_taxonomy` field
- ✅ T101: Property name uses `the_title()`
- ✅ T102: Conditional logic - skips destination if not set
- ✅ T103: Maintained existing breadcrumb CSS classes and SVG arrows

**Files Modified:**
- Modified: `single-property.php` (lines 1-63 - breadcrumb section rewritten)

## Breadcrumb Structure

### With Destination Set:
```
Home Icon > Destination Name > Property Title
```

### Without Destination:
```
Home Icon > Property Title
```

## Test Cases (T104-T107)

### T104: Property with destination set
**Status**: ⏳ Pending Manual Test

**Test Steps:**
1. Edit a property post
2. Ensure "Destination/Location" field (`prop_location_taxonomy`) is set to a valid term (e.g., "Courchevel")
3. Save the property
4. View the property page

**Expected Results:**
- [ ] Breadcrumb shows: Home Icon > Destination Name > Property Title
- [ ] Home icon links to homepage
- [ ] Destination name is clickable and links to destination archive page
- [ ] Property title is displayed but not a link (current page)
- [ ] All arrow separators display between items
- [ ] Mobile back arrow links to destination archive

---

### T105: Property without destination set
**Status**: ⏳ Pending Manual Test

**Test Steps:**
1. Edit a property post
2. Leave "Destination/Location" field (`prop_location_taxonomy`) empty or unset
3. Save the property
4. View the property page

**Expected Results:**
- [ ] Breadcrumb shows: Home Icon > Property Title
- [ ] Destination breadcrumb is completely hidden (no empty space)
- [ ] Only one arrow separator shows (between home and property)
- [ ] Home icon links to homepage
- [ ] Property title displays correctly
- [ ] Mobile back arrow links to homepage (fallback)

---

### T106: Breadcrumb link functionality
**Status**: ⏳ Pending Manual Test

**Test Steps:**
1. View a property page with destination set
2. Click the home icon in breadcrumb
3. Navigate back to the property
4. Click the destination name in breadcrumb
5. Check both desktop and mobile breadcrumbs

**Expected Results:**
- [ ] Home icon click navigates to site homepage
- [ ] Destination name click navigates to destination archive/taxonomy page
- [ ] Links open in same window (no `target="_blank"`)
- [ ] No JavaScript errors in console
- [ ] Mobile back arrow works correctly (links to destination or home)

---

### T107: Very long names
**Status**: ⏳ Pending Manual Test

**Test Steps:**
1. Create/edit a property with:
   - Very long property title (50+ characters)
   - Destination with long name (30+ characters)
2. Save and view the property page
3. Test on different screen sizes (desktop, tablet, mobile)

**Expected Results:**
- [ ] Breadcrumb layout doesn't break
- [ ] Text wraps appropriately or truncates with ellipsis (check CSS)
- [ ] Arrow separators remain visible
- [ ] Mobile view handles long names gracefully
- [ ] No text overflow outside breadcrumb container

---

## Technical Implementation Details

### PHP Logic (single-property.php:1-63)

**Destination Retrieval:**
```php
$destination = get_field( 'prop_location_taxonomy' );
```

**Conditional Display:**
```php
<?php if ( $destination && ! is_wp_error( $destination ) ) : ?>
    <!-- Show destination breadcrumb -->
<?php endif; ?>
```

**Link Generation:**
- Home: `home_url('/')`
- Destination: `get_term_link($destination)`
- Property: No link (current page)

**Output Escaping:**
- URLs: `esc_url()`
- Text: `esc_html()`

### Breadcrumb Elements

1. **Home Icon** (always shown)
   - SVG house icon
   - Links to homepage
   - Class: `breadcrumb__home`

2. **Destination** (conditional)
   - Shows if `prop_location_taxonomy` is set
   - Links to term archive page
   - Class: `breadcrumb__current`

3. **Property Title** (always shown)
   - Displays current property name
   - Not a link (current page indicator)
   - Class: `breadcrumb__current`
   - Uses: `the_title()`

4. **Arrow Separators**
   - SVG chevron icons
   - Displayed between breadcrumb items
   - Class: `breadcrumb__arrow`
   - Changed to `<span>` (non-clickable)

5. **Mobile Back Arrow**
   - Links to destination (if set) or homepage (fallback)
   - Class: `breadcrumb-arrow__mobile`

---

## Edge Cases to Test

### 1. Invalid Destination Term
**Scenario:** Destination taxonomy term was deleted after being assigned to property

**Expected:**
- Conditional `! is_wp_error($destination)` prevents display
- Breadcrumb falls back to: Home > Property Title

### 2. Special Characters in Names
**Test:** Property or destination name contains: `& < > " '`

**Expected:**
- `esc_html()` properly escapes special characters
- No HTML injection or breaking

### 3. Multilingual/Unicode Characters
**Test:** Property name in different languages (French, Arabic, Chinese, etc.)

**Expected:**
- Characters display correctly
- No encoding issues

### 4. Empty Property Title
**Test:** Property post has no title

**Expected:**
- `the_title()` returns empty string
- Breadcrumb might show blank (edge case)
- WordPress shouldn't allow posts without titles normally

---

## Accessibility Considerations

- [ ] **Keyboard Navigation:** Tab through breadcrumbs, ensure all links are focusable
- [ ] **Screen Readers:** Breadcrumb structure announced correctly
- [ ] **ARIA Labels:** Consider adding `aria-label="Breadcrumb navigation"` to section
- [ ] **Focus Indicators:** Links show visible focus state on keyboard navigation

---

## Browser Compatibility

Test breadcrumbs on:
- [ ] Chrome/Edge (latest)
- [ ] Firefox (latest)
- [ ] Safari (desktop)
- [ ] Safari (iOS)
- [ ] Chrome (Android)

---

## Mobile Responsiveness

- [ ] Breadcrumbs display correctly on screens < 768px
- [ ] Mobile back arrow is visible and functional
- [ ] Text sizes are readable
- [ ] Touch targets are large enough (minimum 44x44px)

---

## Known Issues / Notes

_Document any issues discovered during testing here_

---

## Testing Sign-off

**Tester Name:** _________________
**Date Completed:** _________________
**Overall Status:** ⬜ Pass | ⬜ Fail | ⬜ Pass with Issues

**Issues Found:**
_List any issues or bugs discovered during testing_

---

## Next Steps

After completing Phase 6 testing:
- [ ] Proceed to **Phase 7: Polish & Cross-Cutting Concerns** (Tasks T108-T125)
- [ ] Final validation and production readiness checks
