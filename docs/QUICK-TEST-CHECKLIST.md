# Quick Testing Checklist - Phase 3 (T050-T053)

## Before You Start

1. Open WordPress Admin: `http://apprive.local/wp-admin`
2. Navigate to: **Properties** > **Add New**
3. You should see "Property Fields" meta box with 5 tabs

---

## ✅ T050: Full Data Test (5 min)

**Create property with ALL fields filled**

**Quick Fill Guide**:
```
Property Name: Test Property - Full Data

[Basic Information Tab]
- Location Display Name: Courchevel 1850
- Destination/Location: Courchevel (select/create)
- Maximum Guests: 12
- Bedroom Count: 6
- Bathroom Count: 6
- Size (sqm): 450
- Access Type: Ski-in/Ski-out
- Staff Availability: Full-time staff included

[Pricing Tab]
- Starting Price: 25000
- Currency: €
- Price Period: /week

[Booking Tab]
- Availability Link: https://example.com/availability
- Chat Link: https://wa.me/1234567890
```

**Publish > View Property**

**Check Front-End**:
- ✅ Title: "Test Property - Full Data"
- ✅ Location: "(Courchevel 1850)"
- ✅ Price: "€25,000/week"
- ✅ All 7 specs show: Guests, Bedrooms, Bathroom, Size, Location, Access, Staff
- ✅ Both contact buttons appear

---

## ✅ T051: Minimal Data Test (5 min)

**Create property with ONLY required fields**

**Quick Fill Guide**:
```
Property Name: Test Property - Minimal Data

[Basic Information Tab]
- Location Display Name: Val d'Isère
- Destination/Location: Val d'Isère (select/create)
- Maximum Guests: 8
- Bedroom Count: 4
- Bathroom Count: 3
- Size (sqm): [LEAVE EMPTY]
- Access Type: [LEAVE EMPTY]
- Staff Availability: [LEAVE EMPTY]

[Pricing Tab]
- Starting Price: 15000
- Currency: €
- Price Period: /week

[Booking Tab]
- Availability Link: [LEAVE EMPTY]
- Chat Link: [LEAVE EMPTY]
```

**Publish > View Property**

**Check Front-End**:
- ✅ Only shows: Guests (8), Bedrooms (4), Bathroom (3), Location (Val d'Isère)
- ✅ NOT shown: Size, Access, Staff rows
- ✅ Contact buttons section completely hidden
- ✅ No empty placeholders or blank sections

---

## ✅ T052: Long Location Test (3 min)

**Create property with very long location name**

**Quick Fill Guide**:
```
Property Name: Test Property - Long Location

[Basic Information Tab]
- Location Display Name: Courchevel 1850 - Exclusive Alpine Luxury Resort in the Heart of the French Alps
- Destination/Location: Courchevel
- Maximum Guests: 10
- Bedroom Count: 5
- Bathroom Count: 5

[Pricing Tab]
- Starting Price: 20000
- Currency: €
- Price Period: /week
```

**Publish > View Property**

**Check Front-End**:
- ✅ Long location text wraps properly (no overflow)
- ✅ No horizontal scrolling
- ✅ Text doesn't overlap action buttons
- ✅ Layout remains intact

---

## ✅ T053: Validation Test (5 min)

**Test ACF required field enforcement**

**Quick Tests** (each should BLOCK save):

1. **Test Missing Location**:
   - Property Name: Validation Test
   - Leave "Location Display Name" empty
   - Fill everything else
   - Click Publish
   - ✅ **Error should appear** - property should NOT save

2. **Test Missing Guests**:
   - Fill Location Display Name
   - Leave "Maximum Guests" empty
   - Click Publish
   - ✅ **Error should appear** - property should NOT save

3. **Test Missing Bedrooms**:
   - Fill Maximum Guests
   - Leave "Bedroom Count" empty
   - Click Publish
   - ✅ **Error should appear** - property should NOT save

4. **Test Missing Bathrooms**:
   - Fill Bedroom Count
   - Leave "Bathroom Count" empty
   - Click Publish
   - ✅ **Error should appear** - property should NOT save

5. **Test Missing Price**:
   - Fill Bathroom Count
   - Leave "Starting Price" empty
   - Click Publish
   - ✅ **Error should appear** - property should NOT save

6. **Test All Fields Filled**:
   - Fill ALL required fields
   - Click Publish
   - ✅ **Should save successfully**

---

## Final Checklist

- [ ] T050 PASS - Full data displays correctly
- [ ] T051 PASS - Optional fields hide gracefully
- [ ] T052 PASS - Long text wraps properly
- [ ] T053 PASS - Validation blocks incomplete properties

**All Tests Pass?** → Mark T050-T053 complete in tasks.md

---

## If Tests Fail

1. Check error details in: `/Users/ahsan/Local Sites/apprive/app/public/wp-content/themes/arprive/specs/acf-property-fields/TESTING-PHASE3.md`
2. Enable WordPress debug mode
3. Check browser console for JavaScript errors
4. Verify ACF Pro is active and up to date

---

## After Testing Complete

Run this command to mark tasks complete:
```bash
# Edit tasks.md and change:
# [ ] T050 → [x] T050
# [ ] T051 → [x] T051
# [ ] T052 → [x] T052
# [ ] T053 → [x] T053
```

Then proceed to **Phase 4** (T054-T079): Amenities and Features
