jQuery(document).ready(function($) {

    // ─── Favorites Dropdown (desktop) ───────────────────────────────────
    var $wrapper   = $('.header__favorite-wrapper');
    var $dropdown  = $('.fav-dropdown');
    var $itemsGrid = $('.fav-dropdown__items');
    var dropdownLoaded = false;
    var hoverTimer = null;

    function openDropdown() {
        if ($(window).width() <= 1200) return;
        clearTimeout(hoverTimer);
        $dropdown.stop(true).fadeIn(200);
        if (!dropdownLoaded) {
            loadFavorites();
        }
    }

    function closeDropdown() {
        hoverTimer = setTimeout(function() {
            $dropdown.stop(true).fadeOut(150);
        }, 200);
    }

    // Hover behavior
    $wrapper.on('mouseenter', function() {
        openDropdown();
    });
    $wrapper.on('mouseleave', function() {
        closeDropdown();
    });

    // Prevent link navigation on desktop when hovering — allow click to open dropdown
    $wrapper.find('.header__favorite-btn').on('click', function(e) {
        if ($(window).width() > 1200) {
            e.preventDefault();
            if ($dropdown.is(':visible')) {
                $dropdown.fadeOut(150);
            } else {
                openDropdown();
            }
        }
    });

    // Close button
    $dropdown.on('click', '.fav-dropdown__close', function() {
        $dropdown.fadeOut(150);
    });

    // Close on click outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.header__favorite-wrapper').length) {
            $dropdown.fadeOut(150);
        }
    });

    function loadFavorites() {
        $itemsGrid.html('<div class="fav-dropdown__loading">Loading...</div>');

        $.ajax({
            url: ar_favorites_vars.ajaxurl,
            type: 'POST',
            data: {
                action: 'get_favorites',
                nonce: ar_favorites_vars.nonce
            },
            success: function(response) {
                dropdownLoaded = true;
                if (response.success && response.data.items.length > 0) {
                    renderFavorites(response.data.items);
                } else {
                    $itemsGrid.html('<div class="fav-dropdown__empty">No favorites yet</div>');
                }
            },
            error: function() {
                $itemsGrid.html('<div class="fav-dropdown__empty">Could not load favorites</div>');
            }
        });
    }

    function renderFavorites(items) {
        var html = '';
        $.each(items, function(i, item) {
            html += '<div class="fav-dropdown__card" data-id="' + item.id + '">';
            html += '  <div class="fav-dropdown__card-image">';
            if (item.image) {
                html += '    <a href="' + item.url + '"><img src="' + item.image + '" alt="' + escHtml(item.title) + '"></a>';
            }
            html += '    <button class="fav-dropdown__card-remove" data-id="' + item.id + '" aria-label="Remove from favorites">';
            html += '      <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4 1.5h8M1.5 4h13M13.5 4v9a1.5 1.5 0 01-1.5 1.5H4A1.5 1.5 0 012.5 13V4M5.5 4V2.5A1 1 0 016.5 1.5h3a1 1 0 011 1V4M6.5 7v4M9.5 7v4" stroke="#fff" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg>';
            html += '    </button>';
            html += '  </div>';
            html += '  <div class="fav-dropdown__card-info">';
            html += '    <p class="fav-dropdown__card-title">' + escHtml(item.title) + '</p>';
            html += '    <p class="fav-dropdown__card-location">' + escHtml(item.location) + '</p>';
            html += '  </div>';
            html += '</div>';
        });
        $itemsGrid.html(html);
    }

    function escHtml(str) {
        if (!str) return '';
        var div = document.createElement('div');
        div.appendChild(document.createTextNode(str));
        return div.innerHTML;
    }

    // Remove favorite from dropdown
    $dropdown.on('click', '.fav-dropdown__card-remove', function(e) {
        e.preventDefault();
        e.stopPropagation();
        var $btn  = $(this);
        var propId = $btn.data('id');
        var $card  = $btn.closest('.fav-dropdown__card');

        $.ajax({
            url: ar_favorites_vars.ajaxurl,
            type: 'POST',
            data: {
                action: 'toggle_favorite',
                nonce: ar_favorites_vars.nonce,
                property_id: propId
            },
            success: function(response) {
                if (response.success && !response.data.is_favorite) {
                    $card.fadeOut(200, function() {
                        $card.remove();
                        if ($itemsGrid.children('.fav-dropdown__card').length === 0) {
                            $itemsGrid.html('<div class="fav-dropdown__empty">No favorites yet</div>');
                        }
                    });

                    // Update header count
                    var $countEl = $('.header__favorite-count');
                    var $favBtn  = $('.header__favorite-btn');
                    if (response.data.count > 0) {
                        $countEl.text(response.data.count).removeClass('hidden');
                        $favBtn.addClass('header__favorite-btn--has-items');
                    } else {
                        $countEl.text(0).addClass('hidden');
                        $favBtn.removeClass('header__favorite-btn--has-items');
                    }

                    // Also update any listing grid buttons
                    $('.listing-grid-fav[data-id="' + propId + '"]').removeClass('active')
                        .html('<img src="' + getThemeUri() + '/assets/icons/fav.svg" alt="favorites">');
                }
            }
        });
    });


    // ─── Product detail header favorite button (single property page) ───
    $(document).on('click', '.product-detail__action-btn--favorite', function(e) {
        e.preventDefault();
        const $btn = $(this);
        const propertyId = $btn.data('id');
        if (!propertyId) return;

        if (!ar_favorites_vars.is_logged_in) {
            window.location.href = ar_favorites_vars.login_url;
            return;
        }

        $.ajax({
            url: ar_favorites_vars.ajaxurl,
            type: 'POST',
            data: {
                action: 'toggle_favorite',
                nonce: ar_favorites_vars.nonce,
                property_id: propertyId
            },
            success: function(response) {
                if (response.success) {
                    if (response.data.is_favorite) {
                        $btn.addClass('active').attr('aria-label', 'Remove from favorites');
                    } else {
                        $btn.removeClass('active').attr('aria-label', 'Add to favorites');
                    }
                    updateHeaderCount(response.data.count);
                    // Mark dropdown as stale so it reloads
                    dropdownLoaded = false;
                } else if (response.data && response.data.redirect) {
                    window.location.href = response.data.redirect;
                }
            },
            error: function(err) {
                console.error('Favorites AJAX Error:', err);
            }
        });
    });

    // ─── Listing grid favorite button ───────────────────────────────────
    $(document).on('click', '.listing-grid-fav', function(e) {
        e.preventDefault();

        const $btn = $(this);
        const propertyId = $btn.data('id');

        if (!ar_favorites_vars.is_logged_in) {
            window.location.href = ar_favorites_vars.login_url;
            return;
        }

        $.ajax({
            url: ar_favorites_vars.ajaxurl,
            type: 'POST',
            data: {
                action: 'toggle_favorite',
                nonce: ar_favorites_vars.nonce,
                property_id: propertyId
            },
            success: function(response) {
                if (response.success) {
                    if (response.data.is_favorite) {
                        $btn.addClass('active');
                        $btn.html('<svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>');
                    } else {
                        $btn.removeClass('active');
                        $btn.html('<img src="' + getThemeUri() + '/assets/icons/fav.svg" alt="favorites">');
                    }
                    updateHeaderCount(response.data.count);
                    // Mark dropdown as stale so it reloads
                    dropdownLoaded = false;
                } else {
                    if (response.data && response.data.redirect) {
                        window.location.href = response.data.redirect;
                    }
                }
            },
            error: function(error) {
                console.error('Favorites AJAX Error:', error);
            }
        });
    });

    // ─── Shared helpers ─────────────────────────────────────────────────
    function updateHeaderCount(count) {
        var $countEl = $('.header__favorite-count');
        var $favBtn  = $('.header__favorite-btn');
        if (count > 0) {
            $countEl.text(count).removeClass('hidden');
            $favBtn.addClass('header__favorite-btn--has-items');
        } else {
            $countEl.text(0).addClass('hidden');
            $favBtn.removeClass('header__favorite-btn--has-items');
        }
    }

    function getThemeUri() {
        var $existingImg = $('.listing-grid-fav:not(.active) img').first();
        if ($existingImg.length) {
            var src = $existingImg.attr('src');
            return src.substring(0, src.lastIndexOf('/assets'));
        }
        return '/wp-content/themes/arprive'; // Fallback
    }
});
