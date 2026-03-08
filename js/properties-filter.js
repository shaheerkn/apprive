jQuery(document).ready(function($) {
    const $filterForm = $('#property-filters-form');
    const $grid = $('#property-grid');
    const $loader = $('#property-loader');
    const $count = $('#property-count');
    const $sort = $('#property-sort');
    const $clearBtn = $('#clear-filters');
    const $priceRange = $('#filter-price-range');
    const $priceDisplay = $('#price-display');

    // New selectors for sync logic
    const $bedroomsRadios = $('input[name="bedrooms"]');
    const $bedroomsSelect = $('#bedrooms');
    const $bedsRadios = $('input[name="beds"]');
    const $bedsSelect = $('#beds');

    // Infinite scroll state
    let currentPage = 1;
    let maxPages = parseInt($grid.data('max-pages')) || 1;
    let isLoading = false;

    function fetchProperties(append) {
        if (isLoading) return;
        isLoading = true;

        if (!append) {
            currentPage = 1;
        }

        $('#filter-page').val(currentPage);

        // Collect form data
        let formData = $filterForm.serializeArray();
        formData.push({ name: 'nonce', value: ar_filter_vars.nonce });
        formData.push({ name: 'sort', value: $sort.val() });

        if (!append) {
            $grid.css('opacity', '0.5');
        }
        $loader.show();

        $.ajax({
            url: ar_filter_vars.ajaxurl,
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    if (append) {
                        $grid.append(response.data.html);
                    } else {
                        $grid.html(response.data.html);
                    }
                    $count.text(response.data.found_posts);
                    maxPages = response.data.max_pages || 1;
                    $grid.data('max-pages', maxPages);

                    // Hide loader if no more pages
                    if (currentPage >= maxPages) {
                        $loader.hide();
                    } else {
                        $loader.show();
                    }
                } else {
                    console.error('Filter error:', response);
                    $loader.hide();
                }
                $grid.css('opacity', '1');
                isLoading = false;
            },
            error: function(error) {
                console.error('AJAX error:', error);
                $grid.css('opacity', '1');
                $loader.hide();
                isLoading = false;
            }
        });
    }

    // --- Infinite Scroll with IntersectionObserver ---
    const loaderEl = document.getElementById('property-loader');
    if (loaderEl) {
        const observer = new IntersectionObserver(function(entries) {
            if (entries[0].isIntersecting && !isLoading && currentPage < maxPages) {
                currentPage++;
                fetchProperties(true);
            }
        }, {
            rootMargin: '200px'
        });
        observer.observe(loaderEl);
    }

    // Event Listeners

    // Form Submit (Search Button)
    $filterForm.on('submit', function(e) {
        e.preventDefault();
        currentPage = 1;
        fetchProperties(false);
        $('.filters__modal').removeClass('is-open');
        $('body').css('overflow', '');
    });

    // Sort Change
    $sort.on('change', function() {
        currentPage = 1;
        fetchProperties(false);
    });

    // Price Range Display
    $priceRange.on('input', function() {
        $priceDisplay.text(Number($(this).val()).toLocaleString());
    });

    // --- Synchronization Logic for Bedrooms & Beds ---

    $bedroomsRadios.on('change', function() {
        $bedroomsSelect.val($(this).val());
    });

    $bedroomsSelect.on('change', function() {
        let val = $(this).val();
        $bedroomsRadios.prop('checked', false);
        $bedroomsRadios.filter(`[value="${val}"]`).prop('checked', true);
    });

    $bedsRadios.on('change', function() {
        $bedsSelect.val($(this).val());
    });

    $bedsSelect.on('change', function() {
        let val = $(this).val();
        $bedsRadios.prop('checked', false);
        $bedsRadios.filter(`[value="${val}"]`).prop('checked', true);
    });

    // Clear Filters
    $clearBtn.on('click', function() {
        $filterForm[0].reset();

        $priceRange.val(25000).trigger('input');

        $bedroomsSelect.val('');
        $bedsSelect.val('');

        $bedroomsRadios.prop('checked', false);
        $bedroomsRadios.filter('[value=""]').prop('checked', true);

        $bedsRadios.prop('checked', false);
        $bedsRadios.filter('[value=""]').prop('checked', true);

        $filterForm.find('input[type="checkbox"]').prop('checked', false);
        $filterForm.find('select').prop('selectedIndex', 0);

        currentPage = 1;
        fetchProperties(false);
    });

    // Auto-search on select change (Destination, Guests)
    $('#filter-destination, #filter-guests').on('change', function() {
         currentPage = 1;
         fetchProperties(false);
    });

    // Helper: Apply season filter logic
    function applySeasonFilter(season) {
        const $destinationSelect = $('#filter-destination');

        const seasonMapping = {
            'winter': ['Courchevel', 'Megeve', 'Val d\'Isere', 'Winter'],
            'summer': ['Mykonos', 'Ibiza', 'St Tropez', 'Summer']
        };

        const keywords = seasonMapping[season] || [];
        let foundMatch = false;

        $destinationSelect.find('option').each(function() {
            const text = $(this).text();
            if (keywords.some(keyword => text.includes(keyword))) {
                $destinationSelect.val($(this).val());
                foundMatch = true;
                return false;
            }
        });

        if (foundMatch) {
            currentPage = 1;
            fetchProperties(false);
        }
    }

    // Handle Season Change (Winter/Summer Toggle)
    document.addEventListener('seasonChange', function(e) {
        applySeasonFilter(e.detail.season);
    });

    // Initial Load: Pre-select season destination if none selected
    if ($('#filter-destination').val() === "") {
        const initialSeason = $('body').hasClass('color-scheme-summer') ? 'summer' : 'winter';
        applySeasonFilter(initialSeason);
    }

});
