# Data Model: dynamic-properties

## Entities

### 1. Property (Custom Post Type)
**Post Type:** `property`

| Field | Type | Source | Description |
| :--- | :--- | :--- | :--- |
| `ID` | Integer | Core | Unique Post ID |
| `post_title` | String | Core | Property Name |
| `prop_location_text` | String | ACF | Display text for location (e.g., "Courchevel 1850") |
| `max_guests` | Integer | ACF | Maximum sleeping capacity |
| `bedroom_count` | Integer | ACF | Number of bedrooms |
| `bathroom_count` | Integer | ACF | Number of bathrooms |
| `starting_price` | Integer | ACF | Base weekly price |
| `currency` | String | ACF | Currency symbol (e.g., "€") |
| `prop_gallery` | Gallery | ACF | Array of Image IDs |
| `prop_key_features` | Repeater | ACF | List of key features (icon + text) |

### 2. Taxonomies
Relations linked to `property` post type.

| Taxonomy Slug | Purpose | Filter UI Label |
| :--- | :--- | :--- |
| `destination` | Main location grouping | Destination |
| `wellness-and-leisure` | specific facilities | Wellness & Leisure |
| `amenity` | General amenities | Amenities |
| `property-type` | Type (Chalet/Apt) | Property Type |
| `access-type` | Location specifics | Location (Popup) |

### 3. User Favorites (User Meta)
**Meta Key:** `favorite_properties`
**Owner:** `WP_User`

| Type | Description |
| :--- | :--- |
| `Array<Integer>` | List of Property Post IDs favorited by the user. Stored as serialized array. |

## Validation Rules

1.  **Favorites**:
    *   Only logged-in users can have this meta.
    *   IDs must correspond to published `property` posts.
    *   Duplicate IDs are prevented (Set logic).

2.  **Filters**:
    *   `guests`: Must be >= 1.
    *   `price`: Must be >= 0.
    *   `page`: Must be >= 1.
