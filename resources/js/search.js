const products = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: {
        wildcard: '%QUERY',
        url: '/input-search?query=%QUERY'
    }
});

products.initialize();

$('.typeahead').typeahead({
    hint: true,
    highlight: true,
    minLength: 1
}, {
    name: 'products',
    display: 'title',
    limit: 9,
    source: products
});

$('.typeahead').bind('typeahead:select', function(ev, suggestion) {
    window.location.href = '/search/?s=' + encodeURIComponent(suggestion.title);
});