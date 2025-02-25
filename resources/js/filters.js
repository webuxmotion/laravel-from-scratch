$("body").on("change", '.w_sidebar input[type="checkbox"]', function () {
    const checked = $('.w_sidebar input[type="checkbox"]:checked');
    let data = "";

    checked.each(function () {
        data += this.value + ",";
    });

    // remove last comma
    data = data.slice(0, -1);

    if (data) {
        $.ajax({
            url: window.location.pathname,
            data: {
                filter: data,
                page: 1,
            },
            method: "GET",
            beforeSend: function () {
                $(".loader").fadeIn();
            },
            success: function (result) {
                // Create a new URL object
                let url = new URL(location.href);

                // Get the current search parameters
                let params = new URLSearchParams(url.search);

                // Remove the existing filter and page parameters to avoid duplication
                params.delete("filter");
                params.delete("page");

                // Now set the new values
                params.set("filter", data); // Set the 'filter' parameter
                params.set("page", 1); // Set the 'page' parameter to 1

                // Update the URL with the new parameters
                url.search = params.toString();

                // Push the updated URL to the browser history
                window.history.pushState({}, "", url);

                $(".loader").fadeOut("slow", function () {
                    $(".prdt-left").html(result).fadeIn();
                });
            },
            error: function (error) {
                console.log(error);
            },
        });
    } else {
        // remove filter data from url
        let url = new URL(location.href);
        url.searchParams.delete("filter");
        window.history.pushState({}, "", url);

        location.reload(true);
    }
});
