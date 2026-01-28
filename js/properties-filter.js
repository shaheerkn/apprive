jQuery(document).ready(function($) {
    const $filterForm = $('#property-filters-form');
    const $grid = $('#property-grid');
    const $pagination = $('#property-pagination');
    const $count = $('#property-count');
    const $sort = $('#property-sort');
    const $clearBtn = $('#clear-filters');
    const $priceRange = $('#filter-price-range');
    const $priceDisplay = $('#price-display');
    const $bedroomInput = $('#filter-bedrooms');
    const $bedroomPills = $('.filters-panel__pill');

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
        $('.filters-panel__filter-modal').removeClass('is-open');
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

    // Bedroom Pills
    $bedroomPills.on('click', function() {
        $bedroomPills.removeClass('active');
        $(this).addClass('active');
        $bedroomInput.val($(this).data('value'));
    });

    // Clear Filters
    $clearBtn.on('click', function() {
        $filterForm[0].reset();
        $bedroomInput.val('');
        $bedroomPills.removeClass('active');
        $bedroomPills.first().addClass('active'); // Reset to 'All'
        $priceRange.val(25000).trigger('input'); // Reset price
        
        // Reset select dropdowns specifically
        $filterForm.find('select').prop('selectedIndex', 0);
        $filterForm.find('input[type="checkbox"]').prop('checked', false);

        $('#filter-page').val(1);
        fetchProperties();
    });

    // Auto-search on select change (Destination, Guests) if desired?
    // Spec implies "Search" button click, so we'll stick to form submit primarily.
    // However, changing Destination in main bar typically triggers reload or fetch.
    // Let's attach change listener to top bar selects for instant feedback.
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
