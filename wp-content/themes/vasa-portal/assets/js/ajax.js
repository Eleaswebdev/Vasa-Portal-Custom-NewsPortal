jQuery(function ($) {
    // international
    $('#load-more-news').on('click', function (e) {
        e.preventDefault();

        var $button = $(this);
        var paged = parseInt($button.attr('data-paged'));
        var exclude = $button.attr('data-exclude');

        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'load_more_international',
                nonce: ajax_object.nonce,
                paged: paged,
                exclude: exclude
            },
            beforeSend: function () {
                $button.text('লোড হচ্ছে...');
            },
            success: function (res) {
                if (res.success) {
                    $('#international-full-news').append(res.data);
                    $button.attr('data-paged', paged + 1);
                    $button.text('আরও দেখুন');
                } else {
                    $button.text('আর নেই');
                    $button.prop('disabled', true);
                }
            }
        });
    });

    $('#load-more-jatio').on('click', function (e) {
        e.preventDefault();

        var button = $(this);
        var paged = parseInt(button.data('paged'));
        var exclude = button.data('exclude');

        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'load_more_jatio_posts',
                nonce: ajax_object.nonce,
                paged: paged,
                exclude: exclude
            },
            beforeSend: function () {
                button.text('লোড হচ্ছে...');
            },
            success: function (response) {
                if (response.success && response.data.posts.length > 0) {
                    // Append posts alternately
                    response.data.posts.forEach(function (postHtml, i) {
                        if (i % 2 === 0) {
                            $('#jatio-posts-left').append(postHtml);
                        } else {
                            $('#jatio-posts-right').append(postHtml);
                        }
                    });
                    button.data('paged', paged + 1);
                    button.text('আরও দেখুন');
                } else {
                    button.text('আর কোনও পোস্ট নেই');
                    button.prop('disabled', true);
                }
            },
            error: function () {
                button.text('লোড করতে সমস্যা হয়েছে');
            }
        });
    });

   // prokash sutro load more
    var paged = 2;
    var exclude_ids = [];

    $('.prokash-grid-news .grid-single').each(function() {
        var postId = $(this).data('id');
        if (postId) exclude_ids.push(postId);
    });

    $('#prokash-load-more').on('click', function(e) {
        e.preventDefault();

        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'loadmore_prokashsutro',
                nonce: ajax_object.nonce,
                paged: paged,
                exclude: exclude_ids
            },
            success: function(res) {
                if ($.trim(res) !== '') {
                    $('.prokash-grid-news .row.g-4').append(res);
                    paged++;
                } else {
                    $('.news-btn').hide();
                }
            }
        });
    });

    $('#load-more-sports').on('click', function () {
        let wrapper = $('#sports-grid-wrapper');
        let page = parseInt(wrapper.data('page')) + 1;
        let exclude = wrapper.data('exclude');

        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'load_more_sports_posts',
                nonce: ajax_object.nonce,
                page: page,
                exclude: exclude
            },
            beforeSend: function () {
                $('#load-more-sports').text('লোড হচ্ছে...');
            },
            success: function (res) {
                if (res.success) {
                    $('#sports-grid-posts').append(res.data.html);
                    wrapper.data('page', page);
                    wrapper.data('exclude', res.data.exclude);

                    if (!res.data.has_more) {
                        $('#load-more-sports').hide();
                    } else {
                        $('#load-more-sports').text('আরও দেখুন');
                    }
                } else {
                    $('#load-more-sports').hide();
                }
            }
        });
    });
});
