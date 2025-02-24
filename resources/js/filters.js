$('body').on('change', '.w_sidebar input[type="checkbox"]', function() {
    const checked = $('.w_sidebar input[type="checkbox"]:checked');
    let data = '';

    checked.each(function() {
        data += this.value + ',';
    });

    if (data) {
        $.ajax({
            url: location.href,
            data: {
                filter: data
            },
            method: 'GET',
            beforeSend: function() {
                $('.loader').fadeIn();
            },
            success: function(data) {
                // add filter data to url
                let url = new URL(location.href);
                url.searchParams.set('filter', data?.filter);
                window.history.pushState({}, '', url);

                $('.loader').fadeOut('slow', function() {
                    $('.prdt-left').html(JSON.stringify(data)).fadeIn();
                });
            },
            error: function() {
                alert('Error');
            }
        })
    } else {
        location.reload(true);
    }

});