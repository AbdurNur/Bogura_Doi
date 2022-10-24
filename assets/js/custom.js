// add to cart section
function add_to_cart(item_id) {

    // alert("Item Already Added")
    $.ajax({
        url: "function/add_to_cart_proccess.php?process_type=add_cart",
        type: "post",
        dataType: "json",
        data: $("#item_add_form_" + item_id).serialize(),

        success: function (response) {

            if (response.status == 'error') {
                window.location = response.redirect
                alert(response.message)
            }
            if (response.status == 'success') {
                window.location = response.redirect

                //alert(response.message)
                showMessage(response.item_array)
            }

        }
    });
}

function showMessage(showData) {


    for (let success in showData) {


        alert(showData[item_price])

    }
}


// item remove section
$("#item_remove").click(function () {
    $.ajax({
        url: "function/add_to_cart_proccess.php?process_type=item_remove",
        type: "post",
        dataType: "json",
        data: $("#item_remove_form").serialize(),

        success: function (response) {

            if (response.status == 'error') {
                window.location = response.redirect
            }

        }
    });
})

// order cancel section
$("#order_cancel").click(function () {
    $.ajax({
        url: "function/add_to_cart_proccess.php?process_type=cancel_order",
        type: "post",
        dataType: "json",
        data: '',
        success: function (response) {
            if (response.status == 'error') {
                window.location = response.redirect
            }
        }
    });
})