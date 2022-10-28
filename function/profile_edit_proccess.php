<?php
// Edit Data Show From Database 
if ((isset($_GET["process_type"]) && $_GET["process_type"] == "edit_profile_data_show")) {



    include "database_management.php";

    $user_id = $_POST['login_user_id'];

    $table_name = ' users';
    $wheres     = [
        "id"      => $user_id,
    ];
    $edit_data          = get_data($table_name, $wheres,);
    $user_name         = $edit_data->name;
    get_profile_edit_view($edit_data);
}

function get_profile_edit_view($data)
{ ?>
    <div id="show_message" class="message_style"></div>

    <!-- form start here -->
    <form id="profile_edit_form">
        <div class="div">
            <input type="hidden" name="edit_user_id" id="edit_user_id" value="<?php echo  $data->id; ?>">
        </div>
        <div class="mb-3">
            <label for="" class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $data->name ?>">
            <span id="error_name" class="error_style text-danger"></span>
        </div>
        <div class="mb-3">
            <label for="" class="col-form-label">E-mail:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $data->email ?>">
            <span id="error_email" class="error_style text-danger"></span>
        </div>


        <div class="mb-3">
            <label for="" class="col-form-label">Contact:</label>
            <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $data->number ?>">
            <span id="error_contact" class="error_style text-danger"></span>
        </div>


        <div class="mb-3">
            <label for="" class="col-form-label">Present Address:</label>
            <div class="form-floating">
                <textarea class="form-control" id="present_address" name="present_address" style="height: 50px"> <?php echo $data->address ?></textarea>
            </div>
            <span id="error_present_address" class="error_style text-danger"></span>
        </div>

    </form>
    <!-- form end here -->


<?php }


if (isset($_GET["process_type"]) && $_GET["process_type"] == "edit_profile") {

    include "utilitis.php";
    include "database_management.php";


    // empty validation:

    $error_response = check_input_required();

    if ($error_response->has_error) {

        $status = 'error';
        $message = "<div class='alert alert-danger'>Please fix the error!</div>";
        $data = $error_response->error_data;
    } else {
        $edit_id = $_POST["edit_user_id"];

        $name               = input_data_validation($_POST["name"]);
        $email              = input_data_validation($_POST["email"]);
        $contact            = input_data_validation($_POST["contact"]);
        $present_address    = input_data_validation($_POST["present_address"]);
        $update_by         = $_POST["edit_user_id"];
        $update_at         = date("Y-m-d H:i:s");


        $table = "users";
        $dataParam  = [
            "name"      => $name,
            "email"     => $email,
            "number"   => $contact,
            "address"   => $present_address,
            "update_by" => $update_by,
            "update_at" => $update_at,

        ];
        $where = [

            'id' => $edit_id,
        ];

        $update = update_data($table, $dataParam, $where);
        if ($update) {

            // default:
            $status = 'success';
            $message = "<div class='alert alert-success'>Edit has been successfully completed</div>";
            $data = [
                "name"      => $name,
                "email"     => $email,
                "number"   => $contact,
                "address"   => $present_address,
            ];
        }
    } // end of else block


    // response section

    $response  = [
        'status' => $status,
        'message' => $message,
        'data'   => $data

    ];

    echo json_encode($response);
    exit;
}

function check_input_required()
{


    $is_error = false;
    $error_data  = [];
    $is_requred    = " is required";

    if (empty($_POST['name'])) {
        $is_error = true;
        $error_data['error_name']                   =    'Name' . $is_requred;
    }
    if (empty($_POST['email'])) {
        $is_error = true;
        $error_data['error_email']                  =    'Email' . $is_requred;
    }
    if (empty($_POST['contact'])) {
        $is_error = true;
        $error_data['error_contact']                =    'Contact' . $is_requred;
    }
    if (empty($_POST['present_address'])) {
        $is_error = true;
        $error_data['error_present_address']        =    'Present_address' . $is_requred;
    }


    $response = (object)[
        'has_error'         => $is_error,
        'error_data'        => $error_data,
    ];

    return $response;
}




?>