jQuery(function($){
    let page = 2;

    $('#load-more-comments').on('click', function() {
        const postId = $(this).data('postid');

        $.ajax({
            url: commentData.ajax_url,
            type: 'POST',
            data: {
                action: 'load_more_comments',
                nonce: commentData.nonce,
                post_id: postId,
                paged: page
            },
            success: function(response) {
                if (response.success && response.data) {
                    $('#comment-list').append(response.data);
                    page++;
                } else {
                    $('#load-more-comments').hide();
                }
            }
        });
    });
});
