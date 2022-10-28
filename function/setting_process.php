<?php
// Edit Data Show From Database 
if ((isset($_GET["process_type"]) && $_GET["process_type"] == "setting_edit")) {



    include "database_management.php";

    $setting_edit_id = $_POST['setting_edit_id'];

    $table_name = 'settings';
    $wheres     = [
        "id"      => $setting_edit_id,
    ];
    $setting_edit_data          = get_data($table_name, $wheres,);
    get_setting_edit_view($setting_edit_data);
}

function get_setting_edit_view($data)
{ ?>
    <div id="show_message" class="message_style"></div>

    <!-- form start here -->
    <form id="setting_edit_form">
        <div class="div">
            <input type="hidden" name="edit_id" id="edit_id" value="<?php echo  $data->id; ?>">
        </div>
        <div class="mb-3">
            <label for="" class="col-form-label">Tittle:</label>
            <input type="text" class="form-control" id="tittle" name="tittle" value="<?php echo $data->tittle ?>">
            <span id="error_tittle" class="error_style text-danger"></span>
        </div>
        <div class="mb-3">
            <label for="" class="col-form-label">Icon:</label>
            <input type="email" class="form-control" id="icon" name="icon" value="<?php echo $data->icon ?>">
            <span id="error_icon" class="error_style text-danger"></span>
        </div>


        <div class="mb-3">
            <label for="" class="col-form-label">Logo:</label>
            <input type="text" class="form-control" id="logo" name="logo" value="<?php echo $data->logo ?>">
            <span id="error_logo" class="error_style text-danger"></span>
        </div>
              
    </form>
    <!-- form end here -->


<?php }


if (isset($_GET["process_type"]) && $_GET["process_type"] == "setting_edit_submit_btn") {
    session_start();

    include "utilitis.php";
    include "database_management.php";


    // empty validation:

    $error_response = check_input_required();

    if ($error_response->has_error) {

        $status = 'error';
        $message = "<div class='alert alert-danger'>Please fix the error!</div>";
        $data = $error_response->error_data;
    } else {
        $edit_id = $_POST["edit_id"];      
        $tittle               = input_data_validation($_POST["tittle"]);                      
        $update_by                  = $_SESSION['login_id'];
        $update_at                  = date("Y-m-d H:i:s");


        $table = "settings";
        $dataParam  = [
            "tittle"            => $tittle,                      
            "updated_by"             => $update_by,
            "updated_at"             => $update_at,

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

    if (empty($_POST['tittle'])) {
        $is_error = true;
        $error_data['error_tittle']                   =    'Tittle ' . $is_requred;
    }
    
   


    $response = (object)[
        'has_error'         => $is_error,
        'error_data'        => $error_data,
    ];

    return $response;
}




?>