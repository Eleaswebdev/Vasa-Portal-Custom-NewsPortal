// Assumes jQuery is loaded
$(function () {
    // Clone the menu into the offcanvas nav
    var $desktopMenu = $('.mobile-menu-active > ul');
    var $offcanvasNav = $('.offcanvas-menu nav');

    function cloneMenu() {
        $offcanvasNav.empty().append($desktopMenu.clone());
    }
    cloneMenu();

    // Hamburger toggle
    $('.menu-hamburger').on('click', function () {
        $('.offcanvas-menu').addClass('active');
    });

    // Offcanvas close (button or click backdrop)
    $('.offcanvas-close, .offcanvas-backdrop').on('click', function () {
        $('.offcanvas-menu').removeClass('active');
    });

    // Optionally: Re-clone when window resized (if menu changes)
    // $(window).on('resize', function () { cloneMenu(); });

    // Dropdown logic for future submenu support (if you add submenus)
    // $('.offcanvas-menu').on('click', 'li.has-dropdown > a', function(e) {
    //     e.preventDefault();
    //     var $li = $(this).parent();
    //     $li.toggleClass('active').children('ul').slideToggle(300);
    // });
let excludeIds = ajax_object.exclude || [];

let page = 2;
$('.jatio-loadmore-btn').on('click', function (e) {
    e.preventDefault();

    console.log('Loading page:', page);
    console.log('Excluding posts:', excludeIds);

    $.ajax({
        url: ajax_object.ajax_url,
        type: 'POST',
        data: {
            action: 'load_more_jatio_posts',
            nonce: ajax_object.nonce,
            paged: page,
            exclude: excludeIds,
        },
        beforeSend: function () {
            $('.jatio-loadmore-btn').text('লোড হচ্ছে...');
        },
        success: function (response) {
            console.log('AJAX response:', response);

            if (response.success) {
                $('#jatio-post-container').append(response.data.html);
                page++;

                excludeIds = excludeIds.concat(response.data.loaded_ids);

                if (!response.data.has_more) {
                    $('.jatio-loadmore-btn').remove();
                } else {
                    $('.jatio-loadmore-btn').text('আরও দেখুন');
                }
            } else {
                console.warn('No more posts or error:', response.data);
                $('.jatio-loadmore-btn').remove();
            }
        },
        error: function (xhr, status, error) {
            console.error('AJAX error:', status, error);
            $('.jatio-loadmore-btn').text('ত্রুটি ঘটেছে');
        }
    });
});

});

// Archive load more
document.addEventListener("DOMContentLoaded", function () {
    const loadMoreBtn = document.getElementById("archive-load-more");

    if (loadMoreBtn) {
        loadMoreBtn.addEventListener("click", function (e) {
            e.preventDefault();

            let page = parseInt(this.getAttribute("data-page"));
            const archiveID = this.getAttribute("data-archive");
            const archiveType = this.getAttribute("data-archivetype");
            const ajaxUrl = this.getAttribute("data-url");

            const data = new FormData();
            data.append("action", "load_more_archive_posts");
            data.append("paged", page);
            data.append("archive_id", archiveID);
            data.append("archive_type", archiveType);

            this.innerText = "লোড হচ্ছে...";

            fetch(ajaxUrl, {
                method: "POST",
                body: data,
            })
                .then((res) => res.text())
                .then((html) => {
                    if (html.trim() !== "") {
                        document.getElementById("archive-grid-wrapper").insertAdjacentHTML("beforeend", html);
                        page++;
                        loadMoreBtn.setAttribute("data-page", page);
                        loadMoreBtn.innerText = "আরও দেখুন";
                    } else {
                        loadMoreBtn.remove();
                    }
                });
        });
    }
});
