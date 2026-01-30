# Phase 3 Testing Guide - User Story 1: Property Information Display

**Testing Period**: Manual WordPress testing required
**Tasks Covered**: T050-T053
**Estimated Time**: 15-20 minutes

## Prerequisites

- [ ] WordPress is accessible at local site
- [ ] ACF Pro plugin is active
- [ ] Theme is activated (arprive)
- [ ] Property post type exists
- [ ] ACF field groups are loaded from JSON

## Test Setup Verification

Before starting tests, verify the implementation:

1. **Check Files Exist**:
   - [ ] `template-parts/property/header.php` exists
   - [ ] `template-parts/property/specifications.php` exists
   - [ ] `inc/acf-json/field-groups/group_property_fields.json` exists

2. **Check Helper Functions** (in `inc/template-functions.php`):
   - [ ] `ar_get_property_specs()` function exists (line 110)
   - [ ] `ar_get_property_pricing()` function exists (line 141)

3. **Check Template Integration** (in `single-property.php`):
   - [ ] Line 49: `get_template_part( 'template-parts/property/header' );`

---

## T050: Test with All Required Fields Populated ✅

**Objective**: Verify that when all fields are filled, the display matches the original hardcoded layout.

### Steps:

1. **Create/Edit Test Property**:
   - Go to WordPress Admin > Properties > Add New (or edit existing)
   - Name: "Test Property - Full Data"

2. **Fill Basic Information Tab**:
   - [x] **Location Display Name**: "Courchevel 1850"
   - [x] **Destination/Location**: Select or create "Courchevel"
   - [x] **Property Specifications Group**:
     - Maximum Guests: 12
     - Bedroom Count: 6
     - Bathroom Count: 6
     - Size (sqm): 450
     - Access Type: "Ski-in/Ski-out"
     - Staff Availability: "Full-time staff included"

3. **Fill Pricing Tab**:
   - [x] **Starting Price**: 25000
   - [x] **Currency**: € (Euro)
   - [x] **Price Period**: /week

4. **Fill Booking Tab**:
   - [x] **Availability Link**: `https://example.com/availability`
   - [x] **Chat Link**: `https://wa.me/1234567890`

5. **Publish/Update** the property

6. **View Front-End**:
   - [ ] Visit the property single page
   - [ ] **Check Header Section**:
     - Title displays: "Test Property - Full Data"
     - Location displays: "(Courchevel 1850)"
     - Favorite button (heart icon) present
     - Share button present
   - [ ] **Check Pricing**:
     - Label: "Starting Price From"
     - Amount: "€25,000/week" (with comma formatting)
   - [ ] **Check Specifications Grid**:
     - Guests: 12
     - Bedrooms: 6
     - Bathroom: 6
     - Size: 450m²
     - Location: Courchevel 1850
     - Access: Ski-in/Ski-out
     - Staff: Full-time staff included
   - [ ] **Check Contact Buttons**:
     - "Contact us for private availability" link present
     - "Chat with us" link with WhatsApp icon present

**Expected Result**: All data displays correctly with proper formatting and styling matching original layout.

**Status**: [ ] PASS [ ] FAIL

**Notes/Issues**:
```
(Add any issues or observations here)
```

---

## T051: Test with Optional Fields Missing ✅

**Objective**: Verify that when optional fields are empty, sections hide gracefully without empty placeholders.

### Steps:

1. **Create/Edit Test Property**:
   - Go to WordPress Admin > Properties > Add New
   - Name: "Test Property - Minimal Data"

2. **Fill ONLY Required Fields**:

   **Basic Information Tab**:
   - [x] **Location Display Name**: "Val d'Isère"
   - [x] **Destination/Location**: Select or create "Val d'Isère"
   - [x] **Property Specifications Group**:
     - Maximum Guests: 8
     - Bedroom Count: 4
     - Bathroom Count: 3
     - ⚠️ **Leave Empty**: Size (sqm)
     - ⚠️ **Leave Empty**: Access Type
     - ⚠️ **Leave Empty**: Staff Availability

   **Pricing Tab**:
   - [x] **Starting Price**: 15000
   - [x] **Currency**: € (Euro)
   - [x] **Price Period**: /week

   **Booking Tab**:
   - ⚠️ **Leave Empty**: Availability Link
   - ⚠️ **Leave Empty**: Chat Link

3. **Publish/Update** the property

4. **View Front-End**:
   - [ ] Visit the property single page
   - [ ] **Check Specifications Grid Shows**:
     - Guests: 8
     - Bedrooms: 4
     - Bathroom: 3
     - Location: Val d'Isère
   - [ ] **Verify HIDDEN (not displayed)**:
     - ❌ Size row (should not appear)
     - ❌ Access row (should not appear)
     - ❌ Staff row (should not appear)
   - [ ] **Verify Contact Buttons Section**:
     - ❌ Entire contact buttons section should be hidden (no availability link, no chat button)
   - [ ] **No empty `<li>` tags or empty sections visible**

**Expected Result**: Only populated fields display. Empty optional fields are completely hidden with no visual artifacts.

**Status**: [ ] PASS [ ] FAIL

**Notes/Issues**:
```
(Add any issues or observations here)
```

---

## T052: Test with Very Long Location Name ✅

**Objective**: Verify that the layout doesn't break when location text is very long.

### Steps:

1. **Create/Edit Test Property**:
   - Name: "Test Property - Long Location"

2. **Fill with Long Location**:

   **Basic Information Tab**:
   - [x] **Location Display Name**:
     ```
     Courchevel 1850 - Exclusive Alpine Luxury Resort in the Heart of the French Alps
     ```
   - [x] **Destination/Location**: "Courchevel"
   - [x] **Property Specifications**: (fill minimum required)
     - Maximum Guests: 10
     - Bedroom Count: 5
     - Bathroom Count: 5

   **Pricing Tab**:
   - [x] **Starting Price**: 20000
   - [x] **Currency**: €
   - [x] **Price Period**: /week

3. **Publish/Update** the property

4. **View Front-End**:
   - [ ] Visit the property single page
   - [ ] **Check Location Display**:
     - Full location text displays in parentheses
     - Text wraps properly (doesn't overflow container)
     - Layout remains intact (no horizontal scrolling)
     - No text cutoff or overlap with action buttons
   - [ ] **Check Responsive Behavior** (if possible):
     - Resize browser to mobile width (375px)
     - Verify location text still wraps properly

**Expected Result**: Long location text wraps gracefully without breaking layout or causing overflow.

**Status**: [ ] PASS [ ] FAIL

**Notes/Issues**:
```
(Add any issues or observations here)
```

---

## T053: Validate Required Field Enforcement ✅

**Objective**: Verify that ACF validation prevents publishing properties without required fields.

### Test 1: Missing Location Text

1. **Create New Property**:
   - Name: "Test - Validation Check"
   - **Basic Information Tab**:
     - ⚠️ **Leave Empty**: Location Display Name
     - Fill other required fields (destination, specs, pricing)
   - [ ] Click **Publish** or **Update**
   - [ ] **Expected**: Red validation error appears: "Location Display Name is required"
   - [ ] **Expected**: Property does NOT save/publish

**Status**: [ ] PASS [ ] FAIL

### Test 2: Missing Destination Taxonomy

1. **Edit Same Property**:
   - Fill: Location Display Name = "Test Location"
   - ⚠️ **Leave Empty**: Destination/Location taxonomy
   - Fill other required fields
   - [ ] Click **Publish** or **Update**
   - [ ] **Expected**: Validation error: "Destination/Location is required"
   - [ ] **Expected**: Property does NOT save

**Status**: [ ] PASS [ ] FAIL

### Test 3: Missing Maximum Guests

1. **Edit Same Property**:
   - Fill: Location Display Name
   - Fill: Destination/Location
   - ⚠️ **Leave Empty**: Property Specifications > Maximum Guests
   - Fill other fields (bedrooms, bathrooms, pricing)
   - [ ] Click **Publish** or **Update**
   - [ ] **Expected**: Validation error for Maximum Guests
   - [ ] **Expected**: Property does NOT save

**Status**: [ ] PASS [ ] FAIL

### Test 4: Missing Bedroom Count

1. **Edit Same Property**:
   - Fill all fields except:
   - ⚠️ **Leave Empty**: Property Specifications > Bedroom Count
   - [ ] Click **Publish** or **Update**
   - [ ] **Expected**: Validation error for Bedroom Count
   - [ ] **Expected**: Property does NOT save

**Status**: [ ] PASS [ ] FAIL

### Test 5: Missing Bathroom Count

1. **Edit Same Property**:
   - Fill all fields except:
   - ⚠️ **Leave Empty**: Property Specifications > Bathroom Count
   - [ ] Click **Publish** or **Update**
   - [ ] **Expected**: Validation error for Bathroom Count
   - [ ] **Expected**: Property does NOT save

**Status**: [ ] PASS [ ] FAIL

### Test 6: Missing Starting Price

1. **Edit Same Property**:
   - Fill all Basic Info fields
   - **Pricing Tab**:
   - ⚠️ **Leave Empty**: Starting Price
   - [ ] Click **Publish** or **Update**
   - [ ] **Expected**: Validation error for Starting Price
   - [ ] **Expected**: Property does NOT save

**Status**: [ ] PASS [ ] FAIL

### Test 7: All Required Fields Filled

1. **Edit Same Property**:
   - Fill ALL required fields:
     - Location Display Name
     - Destination/Location
     - Maximum Guests
     - Bedroom Count
     - Bathroom Count
     - Starting Price
   - [ ] Click **Publish** or **Update**
   - [ ] **Expected**: Property saves successfully
   - [ ] **Expected**: Success message appears

**Status**: [ ] PASS [ ] FAIL

---

## Overall Test Results

**T050 Status**: [ ] PASS [ ] FAIL
**T051 Status**: [ ] PASS [ ] FAIL
**T052 Status**: [ ] PASS [ ] FAIL
**T053 Status**: [ ] PASS [ ] FAIL

**Phase 3 Complete**: [ ] YES [ ] NO

---

## Common Issues & Troubleshooting

### Issue: ACF Fields Not Showing in Admin

**Solution**:
1. Go to Custom Fields > Field Groups
2. Verify "Property Fields" group exists
3. Check Location Rules: Post Type = property
4. If missing, check `inc/acf-json/field-groups/group_property_fields.json` exists
5. Deactivate/reactivate ACF Pro plugin to force reload

### Issue: Template Parts Not Loading

**Solution**:
1. Check file paths in `single-property.php` line 49
2. Verify directory structure: `template-parts/property/header.php`
3. Check file permissions (should be 644)
4. Clear any caching plugins

### Issue: Helper Functions Not Found

**Solution**:
1. Verify `inc/template-functions.php` is included in `functions.php`
2. Check for PHP errors in debug.log
3. Enable WP_DEBUG in wp-config.php to see errors

### Issue: Pricing Not Formatted Correctly

**Solution**:
1. Verify `ar_get_property_pricing()` helper in `inc/template-functions.php:141`
2. Check that number_format is using correct parameters
3. Test with different price values (100, 1000, 10000, 100000)

### Issue: Validation Not Working

**Solution**:
1. Verify ACF Pro version is 6.0+
2. Check JSON file has `"required": 1` for fields
3. Try editing field group in admin and re-saving
4. Clear browser cache

---

## Next Steps After Testing

Once ALL tests pass:

1. **Update tasks.md**:
   - Mark T050-T053 as complete: `[x]`

2. **Create Test Properties for Future Development**:
   - Keep "Test Property - Full Data" for reference
   - Keep "Test Property - Minimal Data" for edge case testing

3. **Proceed to Phase 4**: User Story 3 - Amenities and Features (T054-T079)

4. **Document Any Issues**:
   - If any test fails, document in GitHub issues or project notes
   - Fix issues before proceeding to next phase

---

## Testing Sign-off

**Tester Name**: ___________________
**Date Completed**: ___________________
**Overall Result**: [ ] ALL PASS - Ready for Phase 4
**Comments**:
```

```
