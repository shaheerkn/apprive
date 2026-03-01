jQuery(document).ready(function($) {

    // ─── LocalStorage helpers ─────────────────────────────────────────
    var STORAGE_KEY = 'ar_favorites';

    function getLocalFavorites() {
        try {
            var data = JSON.parse(localStorage.getItem(STORAGE_KEY));
            return Array.isArray(data) ? data : [];
        } catch(e) {
            return [];
        }
    }

    function saveLocalFavorites(ids) {
        localStorage.setItem(STORAGE_KEY, JSON.stringify(ids));
    }

    function isLocalFavorite(id) {
        return getLocalFavorites().indexOf(id) !== -1;
    }

    function toggleLocalFavorite(id) {
        var favorites = getLocalFavorites();
        var index = favorites.indexOf(id);
        var isFav;
        if (index !== -1) {
            favorites.splice(index, 1);
            isFav = false;
        } else {
            favorites.push(id);
            isFav = true;
        }
        saveLocalFavorites(favorites);
        return { is_favorite: isFav, count: favorites.length };
    }

    // ─── UI sync on page load ─────────────────────────────────────────
    function syncFavoritesUI() {
        var favorites = getLocalFavorites();

        // Update header count
        updateHeaderCount(favorites.length);

        // Mark active cards in listing grid
        $('.listing-grid-fav').each(function() {
            var $btn = $(this);
            var id = parseInt($btn.data('id'), 10);
            if (favorites.indexOf(id) !== -1) {
                $btn.addClass('active');
                $btn.html('<svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>');
            }
        });

        // Mark active on single property page
        $('.product-detail__action-btn--favorite').each(function() {
            var $btn = $(this);
            var id = parseInt($btn.data('id'), 10);
            if (favorites.indexOf(id) !== -1) {
                $btn.addClass('active').attr('aria-label', 'Remove from favorites');
            }
        });
    }

    syncFavoritesUI();

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

    $wrapper.on('mouseenter', function() {
        openDropdown();
    });
    $wrapper.on('mouseleave', function() {
        closeDropdown();
    });

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

    $dropdown.on('click', '.fav-dropdown__close', function() {
        $dropdown.fadeOut(150);
    });

    $(document).on('click', function(e) {
        if (!$(e.target).closest('.header__favorite-wrapper').length) {
            $dropdown.fadeOut(150);
        }
    });

    function loadFavorites() {
        var favorites = getLocalFavorites();
        if (favorites.length === 0) {
            dropdownLoaded = true;
            $itemsGrid.html('<div class="fav-dropdown__empty">No favorites yet</div>');
            return;
        }

        $itemsGrid.html('<div class="fav-dropdown__loading">Loading...</div>');

        $.ajax({
            url: ar_favorites_vars.ajaxurl,
            type: 'POST',
            data: {
                action: 'get_favorites_by_ids',
                nonce: ar_favorites_vars.nonce,
                property_ids: favorites
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

    // ─── Remove favorite from dropdown ────────────────────────────────
    $dropdown.on('click', '.fav-dropdown__card-remove', function(e) {
        e.preventDefault();
        e.stopPropagation();
        var $btn  = $(this);
        var propId = parseInt($btn.data('id'), 10);
        var $card  = $btn.closest('.fav-dropdown__card');

        var result = toggleLocalFavorite(propId);

        $card.fadeOut(200, function() {
            $card.remove();
            if ($itemsGrid.children('.fav-dropdown__card').length === 0) {
                $itemsGrid.html('<div class="fav-dropdown__empty">No favorites yet</div>');
            }
        });

        updateHeaderCount(result.count);

        // Also update any listing grid buttons
        $('.listing-grid-fav[data-id="' + propId + '"]').removeClass('active')
            .html('<img src="' + getThemeUri() + '/assets/icons/fav-black.svg" alt="favorites">');
    });

    // ─── Product detail header favorite button (single property page) ───
    $(document).on('click', '.product-detail__action-btn--favorite', function(e) {
        e.preventDefault();
        var $btn = $(this);
        var propertyId = parseInt($btn.data('id'), 10);
        if (!propertyId) return;

        var result = toggleLocalFavorite(propertyId);

        if (result.is_favorite) {
            $btn.addClass('active').attr('aria-label', 'Remove from favorites');
        } else {
            $btn.removeClass('active').attr('aria-label', 'Add to favorites');
        }
        updateHeaderCount(result.count);
        dropdownLoaded = false;
    });

    // ─── Listing grid favorite button ───────────────────────────────────
    $(document).on('click', '.listing-grid-fav', function(e) {
        e.preventDefault();

        var $btn = $(this);
        var propertyId = parseInt($btn.data('id'), 10);

        var result = toggleLocalFavorite(propertyId);

        if (result.is_favorite) {
            $btn.addClass('active');
            $btn.html('<svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>');
        } else {
            $btn.removeClass('active');
            $btn.html('<img src="' + getThemeUri() + '/assets/icons/fav-black.svg" alt="favorites">');
        }
        updateHeaderCount(result.count);
        dropdownLoaded = false;
    });

    // ─── Favourites page: load cards via AJAX from localStorage ───────
    var $favPageGrid = $('.listing-grid__content--favourites');
    if ($favPageGrid.length) {
        var favorites = getLocalFavorites();
        if (favorites.length === 0) {
            $favPageGrid.html('<p>You haven\'t saved any properties yet.</p>');
        } else {
            $favPageGrid.html('<div class="fav-dropdown__loading">Loading your favorites...</div>');
            $.ajax({
                url: ar_favorites_vars.ajaxurl,
                type: 'POST',
                data: {
                    action: 'get_favorite_cards',
                    nonce: ar_favorites_vars.nonce,
                    property_ids: favorites
                },
                success: function(response) {
                    if (response.success && response.data.html) {
                        $favPageGrid.html(response.data.html);
                        syncFavoritesUI();
                    } else {
                        $favPageGrid.html('<p>You haven\'t saved any properties yet.</p>');
                    }
                },
                error: function() {
                    $favPageGrid.html('<p>Could not load favorites.</p>');
                }
            });
        }
    }

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
        return '/wp-content/themes/apprive'; // Fallback
    }
});
