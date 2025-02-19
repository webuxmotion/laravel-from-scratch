import './bootstrap';
import './ajaxSetup.js';
import './cart.js';
import './search.js';

$('.available select').on('change', function() {
    let modeId = $(this).val();
    let color = $(this).find('option').filter(':selected').data('title');
    let price = $(this).find('option').filter(':selected').data('price');
    const basePriceEl = $('.js-base-price');
    let basePrice = basePriceEl.data('base-price');

    if (price) {
        basePriceEl.text(price);
    } else {
        basePriceEl.text(basePrice);
    }
});