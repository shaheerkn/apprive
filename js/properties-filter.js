jQuery(document).ready(function($) {
    const $filterForm = $('#property-filters-form');
    const $grid = $('#property-grid');
    const $loader = $('#property-loader');
    const $count = $('#property-count');
    const $sort = $('#property-sort');
    const $clearBtn = $('#clear-filters');
    const $priceRange = $('#filter-price-range');
    const $priceDisplay = $('#price-display');

    // Bedrooms quantity selector
    const $bedroomsCount = $('#bedrooms-count');

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

                    // Re-init carousels on newly loaded cards
                    if (window.initPropertyCarousels) {
                        window.initPropertyCarousels($grid[0]);
                    }

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
        $filterForm.removeClass('is-open');
        $('body').css('overflow', '');
        $('.overlay').hide();
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

    // --- Bedrooms Quantity Selector ---
    const $bedroomsDisplay = $('#bedrooms-display');

    function updateBedroomsDisplay() {
        let val = parseInt($bedroomsCount.val()) || 0;
        $bedroomsDisplay.text(val === 0 ? 'All' : val);
    }

    $('#bedrooms-minus').on('click', function() {
        let val = parseInt($bedroomsCount.val()) || 0;
        if (val > 0) {
            $bedroomsCount.val(val - 1);
            updateBedroomsDisplay();
        }
    });

    $('#bedrooms-plus').on('click', function() {
        let val = parseInt($bedroomsCount.val()) || 0;
        if (val < 15) {
            $bedroomsCount.val(val + 1);
            updateBedroomsDisplay();
        }
    });

    // Clear Filters
    $clearBtn.on('click', function() {
        $filterForm[0].reset();

        $priceRange.val(25000).trigger('input');
        $bedroomsCount.val(0);
        updateBedroomsDisplay();

        $filterForm.find('input[type="checkbox"]').prop('checked', false);
        $filterForm.find('select').prop('selectedIndex', 0);

        currentPage = 1;
        fetchProperties(false);
    });

    // Mobile Filters Drawer
    var $sidebar = $filterForm;
    var $overlay = $('.overlay');

    $('#open-filters-btn').on('click', function() {
        $sidebar.addClass('is-open');
        $('body').css('overflow', 'hidden');
        $overlay.show();
    });

    $('#close-filters-btn, .overlay').on('click', function() {
        $sidebar.removeClass('is-open');
        $('body').css('overflow', '');
        $overlay.hide();
    });

});
