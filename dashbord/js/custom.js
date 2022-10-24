// add to cart section



// Repley
function repley(repley_id) {

    // alert("Item Already Added")
    $.ajax({
        url: "function/repley_proccess.php?process_type=repley",
        type: "post",
        dataType: "json",
        data: $("#repley_from" + repley_id).serialize(),

        success: function (response) {
            if (response.status == 'success') {
                $("#name").html("<b>Hello world!</b>");
            }

          

        }
    });
}
