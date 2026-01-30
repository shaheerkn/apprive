jQuery(document).ready(function($) {
    const $filterForm = $('#property-filters-form');
    const $grid = $('#property-grid');
    const $pagination = $('#property-pagination');
    const $count = $('#property-count');
    const $sort = $('#property-sort');
    const $clearBtn = $('#clear-filters');
    const $priceRange = $('#filter-price-range');
    const $priceDisplay = $('#price-display');
    
    // New selectors for sync logic
    const $bedroomsRadios = $('input[name="bedrooms"]');
    const $bedroomsSelect = $('#bedrooms'); // Select ID from new markup
    const $bedsRadios = $('input[name="beds"]');
    const $bedsSelect = $('#beds'); // Select ID from new markup

    function fetchProperties() {
        // Collect form data
        let formData = $filterForm.serializeArray();
        
        // Add nonce and action
        formData.push({ name: 'nonce', value: ar_filter_vars.nonce });
        
        // Add sort option
        formData.push({ name: 'sort', value: $sort.val() });

        $grid.css('opacity', '0.5');

        $.ajax({
            url: ar_filter_vars.ajaxurl,
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    $grid.html(response.data.html);
                    $pagination.html(response.data.pagination);
                    $count.text(response.data.found_posts);
                } else {
                    console.error('Filter error:', response);
                }
                $grid.css('opacity', '1');
            },
            error: function(error) {
                console.error('AJAX error:', error);
                $grid.css('opacity', '1');
            }
        });
    }

    // Event Listeners

    // Form Submit (Search Button)
    $filterForm.on('submit', function(e) {
        e.preventDefault();
        // Reset page to 1 on new search
        $('#filter-page').val(1);
        fetchProperties();
        // Close modal if open (optional UI enhancement)
        $('.filters__modal').removeClass('is-open');
        $('body').css('overflow', '');
    });

    // Sort Change
    $sort.on('change', function() {
        $('#filter-page').val(1);
        fetchProperties();
    });

    // Pagination Click
    $(document).on('click', '.listing-grid__actions .page-numbers', function(e) {
        e.preventDefault();
        let href = $(this).attr('href');
        
        if (href) {
            // Extract page number from URL
            let pageMatch = href.match(/paged=(\d+)/);
            // Fallback for pretty permalinks if setup
            if (!pageMatch) {
                pageMatch = href.match(/\/page\/(\d+)/);
            }

            if (pageMatch && pageMatch[1]) {
                $('#filter-page').val(pageMatch[1]);
                fetchProperties();
                // Scroll to top of grid
                $('html, body').animate({
                    scrollTop: $('.listing-grid').offset().top - 100
                }, 500);
            }
        }
    });

    // Price Range Display
    $priceRange.on('input', function() {
        $priceDisplay.text(Number($(this).val()).toLocaleString());
    });

    // --- Synchronization Logic for Bedrooms & Beds ---

    // Sync Bedrooms: Radio -> Select
    $bedroomsRadios.on('change', function() {
        $bedroomsSelect.val($(this).val());
    });

    // Sync Bedrooms: Select -> Radio
    $bedroomsSelect.on('change', function() {
        let val = $(this).val();
        // Uncheck all first
        $bedroomsRadios.prop('checked', false);
        // Check the matching radio
        $bedroomsRadios.filter(`[value="${val}"]`).prop('checked', true);
    });

    // Sync Beds: Radio -> Select
    $bedsRadios.on('change', function() {
        $bedsSelect.val($(this).val());
    });

    // Sync Beds: Select -> Radio
    $bedsSelect.on('change', function() {
        let val = $(this).val();
        $bedsRadios.prop('checked', false);
        $bedsRadios.filter(`[value="${val}"]`).prop('checked', true);
    });

    // Clear Filters
    $clearBtn.on('click', function() {
        $filterForm[0].reset();
        
        // Reset Price
        $priceRange.val(25000).trigger('input'); 
        
        // Reset Bedrooms & Beds to 'All' (empty value)
        // Reset selects
        $bedroomsSelect.val('');
        $bedsSelect.val('');
        
        // Reset radios (check the one with value="" or first one)
        $bedroomsRadios.prop('checked', false);
        $bedroomsRadios.filter('[value=""]').prop('checked', true);
        
        $bedsRadios.prop('checked', false);
        $bedsRadios.filter('[value=""]').prop('checked', true);

        // Reset other checkboxes
        $filterForm.find('input[type="checkbox"]').prop('checked', false);
        $filterForm.find('select').prop('selectedIndex', 0); // Resets top bar selects too

        $('#filter-page').val(1);
        fetchProperties();
    });

    // Auto-search on select change (Destination, Guests)
    $('#filter-destination, #filter-guests').on('change', function() {
         $('#filter-page').val(1);
         fetchProperties();
    });

    // Helper: Apply season filter logic
    function applySeasonFilter(season) {
        const $destinationSelect = $('#filter-destination');
        
        // Define mapping: Season -> Keyword to match in option text
        const seasonMapping = {
            'winter': ['Courchevel', 'Megeve', 'Val d\'Isere', 'Winter'],
            'summer': ['Mykonos', 'Ibiza', 'St Tropez', 'Summer']
        };

        const keywords = seasonMapping[season] || [];
        let foundMatch = false;

        // Try to find a matching option
        $destinationSelect.find('option').each(function() {
            const text = $(this).text();
            if (keywords.some(keyword => text.includes(keyword))) {
                $destinationSelect.val($(this).val());
                foundMatch = true;
                return false; // Break loop
            }
        });

        // If a match was found, trigger the filter
        if (foundMatch) {
            $('#filter-page').val(1);
            fetchProperties(); // Refresh grid with new destination
        }
    }

    // Handle Season Change (Winter/Summer Toggle)
    document.addEventListener('seasonChange', function(e) {
        applySeasonFilter(e.detail.season);
    });

    // Initial Load: Pre-select season destination if none selected
    // Only if the dropdown is empty (All Destinations) to avoid overriding specific term archives
    if ($('#filter-destination').val() === "") {
        const initialSeason = $('body').hasClass('color-scheme-summer') ? 'summer' : 'winter';
        applySeasonFilter(initialSeason);
    }

});
