# Testing Checklist: Phase 5 - User Story 2 (Property Gallery Management)

**Date**: 2026-01-27
**Feature**: Dynamic Single Property Page with ACF
**Phase**: Phase 5 - User Story 2 (Property Gallery Management)
**Status**: Implementation Complete - Ready for Testing

## Implementation Summary

**Completed Tasks:**
- ✅ T080: Created `template-parts/property/gallery.php` template part
- ✅ T081-T083: Implemented seasonal gallery logic with fallback chain
- ✅ T084-T087: Implemented Swiper slider markup with navigation and controls
- ✅ T088: Integrated gallery template part into property header

**Files Modified:**
- Created: `template-parts/property/gallery.php`
- Modified: `template-parts/property/header.php` (integrated gallery template part)

## Test Cases (T089-T096)

### T089: Test with 5+ images in main gallery
**Status**: ⏳ Pending Manual Test

**Test Steps:**
1. Create or edit a property post
2. Upload 5 or more images to the "Main Property Gallery" field (prop_gallery)
3. Ensure "Use Seasonal Galleries" toggle is OFF
4. Save and view the property page

**Expected Results:**
- [ ] All gallery images display in the Swiper slider
- [ ] Navigation arrows (prev/next) are visible and functional
- [ ] Slider count shows correct number of images
- [ ] Images load with lazy loading attribute
- [ ] Images are responsive (check srcset in browser inspector)
- [ ] Gallery maintains existing CSS styling

---

### T090: Test with seasonal toggle OFF
**Status**: ⏳ Pending Manual Test

**Test Steps:**
1. Edit a property post
2. Ensure "Use Seasonal Galleries" toggle is OFF (disabled)
3. Upload images to main gallery only
4. Save and view the property page

**Expected Results:**
- [ ] Only main gallery images display
- [ ] Winter/summer gallery fields are hidden in admin (conditional logic)
- [ ] Gallery functions normally with navigation

---

### T091: Test with seasonal toggle ON and winter gallery populated
**Status**: ⏳ Pending Manual Test

**Test Steps:**
1. Edit a property post
2. Enable "Use Seasonal Galleries" toggle
3. Upload different images to:
   - Main gallery: 3-5 images
   - Winter gallery: 3-5 different images
   - Leave summer gallery empty or with different images
4. Save the property
5. **Test during winter months (November-March)**:
   - Option A: Change server date to a winter month (e.g., December 15)
   - Option B: Manually test during actual winter months

**Expected Results:**
- [ ] Winter gallery images display (NOT main gallery)
- [ ] Images are from the winter gallery field
- [ ] Slider navigation works correctly
- [ ] Slider count reflects winter gallery image count

---

### T092: Test with seasonal toggle ON and summer gallery populated
**Status**: ⏳ Pending Manual Test

**Test Steps:**
1. Edit a property post
2. Enable "Use Seasonal Galleries" toggle
3. Upload different images to:
   - Main gallery: 3-5 images
   - Summer gallery: 3-5 different images
   - Leave winter gallery empty or with different images
4. Save the property
5. **Test during summer months (April-October)**:
   - Option A: Change server date to a summer month (e.g., July 15)
   - Option B: Manually test during actual summer months

**Expected Results:**
- [ ] Summer gallery images display (NOT main gallery)
- [ ] Images are from the summer gallery field
- [ ] Slider navigation works correctly
- [ ] Slider count reflects summer gallery image count

---

### T093: Test seasonal fallback to main gallery
**Status**: ⏳ Pending Manual Test

**Test Steps:**
1. Edit a property post
2. Enable "Use Seasonal Galleries" toggle
3. Upload images ONLY to main gallery (3-5 images)
4. Leave BOTH winter and summer galleries empty
5. Save and view the property page

**Expected Results:**
- [ ] Main gallery images display (fallback works)
- [ ] No errors or empty placeholders
- [ ] Slider functions normally
- [ ] This works regardless of current season

---

### T094: Test with only 1 image
**Status**: ⏳ Pending Manual Test

**Test Steps:**
1. Create a new property post
2. Upload only 1 image to main gallery (minimum required)
3. Leave seasonal toggle OFF
4. Save and view the property page

**Expected Results:**
- [ ] Single image displays in slider container
- [ ] Swiper slider initializes correctly (no JavaScript errors)
- [ ] Navigation arrows may hide or be disabled (check Swiper behavior)
- [ ] No layout breaking or console errors
- [ ] Image displays with proper sizing

---

### T095: Test validation prevents no images
**Status**: ⏳ Pending Manual Test

**Test Steps:**
1. Create a new property post
2. Fill out all required fields EXCEPT the main gallery
3. Attempt to publish/save the post

**Expected Results:**
- [ ] Validation error appears: "Please upload at least 1 image to the main gallery"
- [ ] Post cannot be published/saved without at least 1 image
- [ ] Error message is clear and actionable
- [ ] User is redirected to the Gallery & Media tab

**Validation Code Location:** `inc/acf-validation.php` (function `ar_validate_property_gallery`)

---

### T096: Verify responsive srcset for performance
**Status**: ⏳ Pending Manual Test

**Test Steps:**
1. Create a property with gallery images
2. View the property page in browser
3. Open browser DevTools (Inspect Element)
4. Find a gallery image in the HTML
5. Check the `<img>` tag attributes

**Expected Results:**
- [ ] `srcset` attribute is present with multiple image sizes
- [ ] `sizes` attribute is present
- [ ] `loading="lazy"` attribute is present
- [ ] `class="property-image"` is applied
- [ ] WordPress generates appropriate image sizes (thumbnail, medium, large)

**Example Expected HTML:**
```html
<img
  src="image-large.jpg"
  srcset="image-thumbnail.jpg 150w, image-medium.jpg 300w, image-large.jpg 1024w"
  sizes="(max-width: 1024px) 100vw, 1024px"
  class="property-image"
  loading="lazy"
  alt="Property description"
>
```

---

## Seasonal Logic Reference

**Winter Season:** November (month 11) - March (month 3)
**Summer Season:** April (month 4) - October (month 10)

**Logic Flow:**
1. Check if `prop_seasonal_toggle` is enabled
2. If enabled:
   - Get current month (1-12)
   - Determine if winter: `month >= 11 OR month <= 3`
   - Get appropriate seasonal gallery field
   - If seasonal gallery has images → use seasonal gallery
   - If seasonal gallery is empty → **fallback to main gallery**
3. If disabled:
   - Use main gallery only

**Code Location:** `template-parts/property/gallery.php` lines 14-32

---

## Edge Cases & Additional Testing

### Additional Scenarios to Test:

1. **Very large galleries (15-20 images)**
   - [ ] Performance is acceptable
   - [ ] All images load with lazy loading
   - [ ] Slider navigation remains functional

2. **Mixed image sizes/orientations**
   - [ ] Portrait and landscape images both display correctly
   - [ ] No layout breaking with different aspect ratios
   - [ ] Images maintain aspect ratio (no stretching)

3. **Different image formats**
   - [ ] JPG images work
   - [ ] PNG images work
   - [ ] WebP images work (if supported)

4. **Mobile responsive testing**
   - [ ] Gallery displays correctly on mobile devices
   - [ ] Touch swipe gestures work on mobile
   - [ ] Navigation buttons are accessible on touch devices

5. **Browser compatibility**
   - [ ] Chrome/Edge
   - [ ] Firefox
   - [ ] Safari
   - [ ] Mobile browsers (iOS Safari, Chrome Android)

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

After completing Phase 5 testing:
- [ ] Proceed to **Phase 6: User Story 4 - Breadcrumb Navigation** (Tasks T097-T107)
- [ ] Or proceed to **Phase 7: Polish & Cross-Cutting Concerns** (Tasks T108-T125) if all user stories are complete
