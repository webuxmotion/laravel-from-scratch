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
        error: function() {
            alert('Error! Try again later or try different products')
        }
    });
});

function showCart(cart) {
    console.log(cart);
}