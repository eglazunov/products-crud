$(document).on('click', '.js-delete-product', function () {
    var productId = $(this).data('product-id');

    if (confirm('Are you sure?')) {
        $.post(`/products/${productId}`, {
            '_method': 'DELETE'
        }).then(function () {
            document.location.reload(true);
        });
    }
});