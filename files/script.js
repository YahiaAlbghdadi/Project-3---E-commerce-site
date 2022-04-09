jQuery(document).ready(function() {
    // This button will increment the value
    $('[data-quantity="plus"]').click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('data-field');
        // Get its current value
        var currentVal = parseInt($('input[name=' + fieldName + ']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name=' + fieldName + ']').val(currentVal + 1);
        } else {
            // Otherwise put a 0 there
            $('input[name=' + fieldName + ']').val(0);
        }
    });
    // This button will decrement the value till 0
    $('[data-quantity="minus"]').click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('data-field');
        // Get its current value
        var currentVal = parseInt($('input[name=' + fieldName + ']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name=' + fieldName + ']').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[name=' + fieldName + ']').val(0);
        }
    });
});

function myAlert() {
    Swal.fire({
        position: 'top-end',
        icon: 'info',
        title: ' Item has been removed from your shopping cart',
        showConfirmButton: true,
        timer: 1500
    })
}

$("#checkoutBtn").click(function() {
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Your order has been placed successfuly',
        showConfirmButton: false,
        timer: 1500
    })
})