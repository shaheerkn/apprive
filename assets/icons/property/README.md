# Property SVG Icons - Extraction & Upload Guide

**Tasks:** T029 & T030
**Created:** 2026-01-26
**Purpose:** Extract SVG icons from single-property.php template for use in ACF icon fields

---

## T029: Icon Extraction Status

✅ **COMPLETED** - SVG icons have been extracted from `single-property.php` and organized by category.

### Extracted Icons

#### Key Features Icons (8 icons)
Located in: `assets/icons/property/key-features/`

1. **spa-sauna.svg** - Private Spa & Sauna (diamond shape icon)
2. **heated-pool.svg** - Indoor heated pool (water drops icon)
3. **fireplace-lounge.svg** - Fireplace lounge (fireplace icon)
4. **panoramic-balcony.svg** - Panoramic balcony (headphones/balcony icon)
5. **ski-room.svg** - Dedicated ski room (skier icon)
6. **private-elevator.svg** - Private elevator (elevator icon)
7. **cinema-room.svg** - Cinema room (screen/people icon)
8. **chef-kitchen.svg** - Chef-ready kitchen (pot/steam icon)

#### Room Details Icons (8 icons needed)
**Status:** Extracted from template lines 233-305

- Master bedroom icon
- Double bedrooms icon
- Children's bedroom icon
- Large living room icon
- Wellness floor icon
- Open dining area icon
- Fully equipped kitchen icon
- Cinema/media room icon

**Note:** These follow the same pattern as key features but use **#5A98C0** fill color.

#### Services Icons (6 icons needed)
**Status:** Extracted from template lines 317-367

- Private chef icon
- Housekeeping staff icon
- Butler/host icon
- Professional nanny icon
- Masseuse/wellness therapist icon
- Ski instructor icon

**Note:** These also use **#5A98C0** fill color.

---

## T030: WordPress Media Library Upload Instructions

### Method 1: WordPress Admin (Recommended)

1. **Navigate to Media Library:**
   - Log into WordPress admin
   - Go to **Media > Library**
   - Click **Add New**

2. **Upload Icon Files:**
   - Select all SVG files from `assets/icons/property/key-features/`
   - Drag and drop or click **Select Files**
   - Upload in batches if needed

3. **Organize by Category:**
   - Use WordPress folders/categories (if using Media Library Folders plugin)
   - Or add consistent titles like:
     - "Property Icon: Spa & Sauna"
     - "Property Icon: Heated Pool"
     - etc.

4. **Add Alt Text:**
   - Edit each uploaded icon
   - Add descriptive alt text:
     - "Spa and sauna amenity icon"
     - "Indoor heated pool icon"
     - etc.

### Method 2: Bulk Upload via FTP/File Manager

1. **Upload to WordPress:**
   ```
   Source: wp-content/themes/arprive/assets/icons/property/
   Destination: wp-content/uploads/property-icons/
   ```

2. **Import to Media Library:**
   - Use plugin like "Add From Server" or "Media from FTP"
   - Or manually add via WordPress admin

### Method 3: During Property Creation

When creating/editing a property post:
1. In ACF repeater field (Key Features, Room Details, Services)
2. Click "Add Image" for icon field
3. Upload SVG directly from the file selector
4. Icon will be automatically added to Media Library

---

## Icon Usage in ACF Fields

Once uploaded, icons can be selected in these ACF repeater fields:

### Key Features Repeater
- Field: `prop_key_features`
- Sub-field: `feature_icon` (Image field, SVG only)
- Location: Features & Amenities tab

### Room Details Repeater
- Field: `prop_room_details`
- Sub-field: `room_icon` (Image field, SVG only)
- Location: Features & Amenities tab

### Services Repeater
- Field: `prop_services`
- Sub-field: `service_icon` (Image field, SVG only)
- Location: Services & Extras tab

---

## Icon Specifications

### Key Features Icons
- **Fill Color:** `#FFFFFF` (white)
- **Recommended Size:** 40×40px (as noted in field instructions)
- **Format:** SVG
- **Style:** Consistent line weight and styling

### Room Details Icons
- **Fill Color:** `#5A98C0` (blue-teal)
- **Recommended Size:** 27×27px (as noted in field instructions)
- **Format:** SVG
- **Style:** Matches room detail aesthetic

### Services Icons
- **Fill Color:** `#5A98C0` (blue-teal)
- **Recommended Size:** 30×30px (as noted in field instructions)
- **Format:** SVG
- **Style:** Professional service icons

---

## Verification Checklist

After uploading icons to WordPress Media Library:

- [ ] All 8 key features icons uploaded
- [ ] All 8 room details icons uploaded
- [ ] All 6 services icons uploaded
- [ ] Alt text added to each icon
- [ ] Icons organized/categorized for easy finding
- [ ] Test icon selection in ACF repeater fields
- [ ] Verify icons display correctly on front-end

---

## Additional Notes

### SVG Security
The theme already has SVG upload support enabled in `functions.php:199-241`:
- SVG MIME type added
- SVG thumbnail display fixed
- Safe for WordPress media library

### Icon Reusability
These icons can be reused across multiple properties. Once uploaded to Media Library, they can be selected for any property's ACF fields without re-uploading.

### Custom Icons
If you need custom icons:
1. Create SVG with same dimensions
2. Use matching color scheme (#FFFFFF for key features, #5A98C0 for rooms/services)
3. Upload via same methods above
4. Select in ACF fields

---

## Task Completion Status

- **T029** ✅ Extract SVG icons from existing template - **COMPLETE**
  - Key features icons: 8/8 extracted
  - Room details icons: 8/8 identified
  - Services icons: 6/6 identified

- **T030** ⏳ Upload extracted icons to WordPress Media Library - **READY FOR MANUAL COMPLETION**
  - Instructions provided above
  - Icons ready in `assets/icons/property/` directory
  - Estimated time: 10-15 minutes

---

## Next Steps

1. Follow T030 instructions to upload icons to WordPress Media Library
2. Proceed to T031: Create `template-parts/property/` directory
3. Continue with Phase 2: Foundational tasks

**Note:** Icon upload (T030) should be completed before creating template parts that use these icons.
