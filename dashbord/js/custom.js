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


// Edit Data Show From Database  

$("#edit_profile").click(function () {
    $.ajax({
        url: "../function/profile_edit_proccess.php?process_type=edit_profile",
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
        url: "function/profile_edit_proccess.php?process_type=edit_profile",
        type: "post",
        dataType: "json",
        data: $("#profile_edit_form").serialize(),

        success: function (response) {

            

        }
    });
})
