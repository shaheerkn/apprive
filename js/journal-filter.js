jQuery(document).ready(function($) {
    var $grid = $('#journal-grid');
    var $categoryFilter = $('#journal-category-filter');
    var $searchInput = $('#journal-search-input');
    var $searchBtn = $('#journal-search-btn');

    function fetchArticles() {
        var category = $categoryFilter.val();
        var search = $searchInput.val();

        $grid.css('opacity', '0.5');

        $.ajax({
            url: ar_journal_vars.ajaxurl,
            type: 'POST',
            data: {
                action: 'filter_journal',
                nonce: ar_journal_vars.nonce,
                category: category,
                search: search
            },
            success: function(response) {
                if (response.success) {
                    $grid.html(response.data.html);
                }
                $grid.css('opacity', '1');
            },
            error: function() {
                $grid.css('opacity', '1');
            }
        });
    }

    $categoryFilter.on('change', fetchArticles);

    $searchBtn.on('click', fetchArticles);

    $searchInput.on('keypress', function(e) {
        if (e.which === 13) {
            e.preventDefault();
            fetchArticles();
        }
    });
});
