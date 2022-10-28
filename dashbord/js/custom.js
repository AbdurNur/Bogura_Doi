
// Repley Section Start
function question(question_id) {
    $.ajax({
        url: "../function/repley_proccess.php?process_type=repley",
        type: "post",
        dataType: "html",
        data: "question_id=" + question_id,
        success: function (response) {
            $("#reply_modal").modal('show');
            $("#repley_modal_body").html(response);
        }
    });
}



$("#repley_send_btn").click(function () {
    $.ajax({
        url: "../function/repley_proccess.php?process_type=repley_send",
        type: "post",
        dataType: "json",
        data: $("#repley_form").serialize(),

        success: function (response) {

            showCommonMessage(response.message)

            if (response.status == 'success') {
                showSuccessData(response.data)
                setTimeout(function () {
                    resetFormInput();
                    $("#reply_modal").modal('hide');
                }, 2000)
                 
                

            } else {
                showErrorMessage(response.data)
            }

        }
    });



    function showErrorMessage(errorData) {

        // all error message do empty
        $(".error_style").html("");

        for (let error in errorData) {

            $("#" + error).html(errorData[error])

        }
    }

    function showSuccessData(successdata) {

       
        for (let success in successdata) {

            $("#profile_show_name").html(successdata[success])

        }
    }

    function showCommonMessage(message) {

        $("#show_message").html("");
        $("#show_message").html(message);
    }


    function resetFormInput() {

        $("#show_message").html("");
        $(".error_style").html("");
        $("#answer").val("");
    }
})
// Repley Section End


// Profile_section Start

// Edit Data Show From Database  

$("#edit_profile").click(function () {
    $.ajax({
        url: "../function/profile_edit_proccess.php?process_type=edit_profile_data_show",
        type: "post",
        dataType: "html",
        data: "login_user_id=" + $("#login_user_id").val(),

        success: function (response) {


            $("#profile_edit_view_modal").modal('show');
            $("#profile_edit_body").html(response);



        }
    });
})

// Edit Profile section

$("#edit_submit_btn").click(function () {
    $.ajax({
        url: "../function/profile_edit_proccess.php?process_type=edit_profile",
        type: "post",
        dataType: "json",
        data: $("#profile_edit_form").serialize(),

        success: function (response) {

            showCommonMessage(response.message)

            if (response.status == 'success') {
                setTimeout(function () {
                    resetFormInput();
                    $("#profile_edit_view_modal").modal('hide');
                }, 2000)

            } else {
                showErrorMessage(response.data)
            }

        }
    });



    function showErrorMessage(errorData) {

        // all error message do empty
        $(".error_style").html("");

        for (let error in errorData) {

            $("#" + error).html(errorData[error])

        }
    }

    function showCommonMessage(message) {

        $("#show_message").html("");
        $("#show_message").html(message);
    }


    function resetFormInput() {

        $("#show_message").html("");
        $(".error_style").html("");
        $("#name").val("");
        $("#email").val("");
        $("#contact").val("");
        $("#present_address").val("");
    }
})

// Profile Section End

// Stock Product Edit Section Start

function product_edit(product_id) {
    $.ajax({
        url: "../function/stock_product_edit_dilite_proccess.php?process_type=product_edit",
        type: "post",
        dataType: "html",
        data: "product_id=" + product_id,
        success: function (response) {
            $("#product_edit_modal").modal('show');
            $("#product_edit_modal_body").html(response);
        }
    });
}


$("#product_edit_submit_btn").click(function () {
    $.ajax({
        url: "../function/stock_product_edit_dilite_proccess.php?process_type=product_edit_submit",
        type: "post",
        dataType: "json",
        data: $("#product_edit_form").serialize(),

        success: function (response) {

            showCommonMessage(response.message)

            if (response.status == 'success') {
                setTimeout(function () {
                    resetFormInput();
                    $("#product_edit_modal").modal('hide');
                }, 2000)

            } else {
                showErrorMessage(response.data)
            }

        }
    });



    function showErrorMessage(errorData) {

        // all error message do empty
        $(".error_style").html("");

        for (let error in errorData) {

            $("#" + error).html(errorData[error])

        }
    }

    function showCommonMessage(message) {

        $("#show_message").html("");
        $("#show_message").html(message);
    }


    function resetFormInput() {

        $("#show_message").html("");
        $(".error_style").html("");
        $("#product_sl").val("");
        $("#product_name").val("");
        $("#quantity").val("");
        $("#dp").val("");
        $("#product_price").val("");
       
    }
})




// Stock Product Edit Section End


// Setting Edit Section Start
function setting_edit(setting_edit_id) {
    $.ajax({
        url: "../function/setting_process.php?process_type=setting_edit",
        type: "post",
        dataType: "html",
        data: "setting_edit_id=" + setting_edit_id,
        success: function (response) {
            $("#setting_edit_modal").modal('show');
            $("#setting_edit_modal_body").html(response);
        }
    });
}


$("#setting_edit_submit_btn").click(function () {
    $.ajax({
        url: "../function/setting_process.php?process_type=setting_edit_submit_btn",
        type: "post",
        dataType: "json",
        data: $("#setting_edit_form").serialize(),

        success: function (response) {

            showCommonMessage(response.message)

            if (response.status == 'success') {
                setTimeout(function () {
                    resetFormInput();
                    $("#setting_edit_modal").modal('hide');
                }, 2000)

            } else {
                showErrorMessage(response.data)
            }

        }
    });



    function showErrorMessage(errorData) {

        // all error message do empty
        $(".error_style").html("");

        for (let error in errorData) {

            $("#" + error).html(errorData[error])

        }
    }

    function showCommonMessage(message) {

        $("#show_message").html("");
        $("#show_message").html(message);
    }


    function resetFormInput() {

        $("#show_message").html("");
        $(".error_style").html("");
        $("#tittle").val("");
       
        
       
    }
})




// Setting Edit Section End


// Order Deliverd Section Start
function order_deliverde(order_id) {
    $.ajax({
        url: "../function/order_manegmaent.php?process_type=order_deliverde",
        type: "post",
        dataType: "json",
        data: "order_id=" + order_id,
        success: function (response) {
            $("#show_message").html(response.message)
            
        }
    });
}



// Order Deliverd Section End

// Pending Deliverd Section Start
function order_pending(order_id) {
    $.ajax({
        url: "../function/order_manegmaent.php?process_type=pending_order",
        type: "post",
        dataType: "json",
        data: "order_id=" + order_id,
        success: function (response) {
            $("#show_message").html(response.message)
            
        }
    });
}



// Order Deliverd Section End


// Order Cancel Section Start
function order_cacel(cancel_order_id) {
    $.ajax({
        url: "../function/order_manegmaent.php?process_type=order_cacel",
        type: "post",
        dataType: "html",
        data: "cancel_order_id=" + cancel_order_id,
        success: function (response) {
            $("#cancel_order_modal").modal('show');
            $("#cancel_order_modal_body").html(response);
        }
    });
}

$("#product_cancel_submit_btn").click(function () {
    $.ajax({
        url: "../function/order_manegmaent.php?process_type=product_cancel_submit_btn",
        type: "post",
        dataType: "json",
        data: $("#cancel_form").serialize(),

        success: function (response) {

            showCommonMessage(response.message)

            if (response.status == 'success') {
                setTimeout(function () {
                    resetFormInput();
                    $("#cancel_order_modal").modal('hide');
                }, 2000)

            } else {
                showErrorMessage(response.data)
            }

        }
    });



    function showErrorMessage(errorData) {

        // all error message do empty
        $(".error_style").html("");

        for (let error in errorData) {

            $("#" + error).html(errorData[error])

        }
    }

    function showCommonMessage(message) {

        $("#show_cancel_message").html("");
        $("#show_cancel_message").html(message);
    }


    function resetFormInput() {

        $("#show_cancel_message").html("");
        $(".error_style").html("");
        $("#cancel_causes").val("");
       
        
       
    }
})
// Order Cancel Section End





