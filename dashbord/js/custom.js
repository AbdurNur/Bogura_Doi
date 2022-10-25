
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


