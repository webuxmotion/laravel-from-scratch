/* Cart */

$('body').on('click', '.js-add-to-cart-link', function(event) {
    event.preventDefault();

    const id = $(this).data('id');
    const quantity = $(this).parent().find('.quantity input').val() || 1;
    const mod = $(this).parent().find('.available select').val();

    $.ajax({
        url: '/cart/add',
        method: 'post',
        data: {
            id, quantity, mod
        },
        success: function(res) {
            showCart(res);
        },
        error: function(res) {
            console.log(res);
        }
    });
});

$('.js-cart-button').click(function(event) {
    event.preventDefault();

    $.ajax({
        url: '/cart/show',
        method: 'get',
        success: function(res) {
            showCart(res);
        },
        error: function(res) {
            console.log(res);
        }
    });
});

$('.js-close-modal').click(function() {
    $('.modal').removeClass('show').addClass('fade');
});

function showCart(cart) {
    // delete class fade
    $('.modal').find('.modal-body').html(cart);
    $('.modal').addClass('show').removeClass('fade');


    const cartModalSum = $('.js-cart-modal-sum').text();

    if (cartModalSum) {
        $('.js-cart-header-sum').html(cartModalSum);
    }
    
    
}