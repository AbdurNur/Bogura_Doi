<?php


// Deliverey Section Start
if (isset($_GET["process_type"]) && $_GET["process_type"] == "order_deliverde") {
    session_start();

    include "database_management.php";

    $order_id               = $_POST["order_id"];


    $oder_status               = 'delivered';
    $color_code               = '#3390FF';
    $dalivery_by         = $_SESSION['login_id'];
    $dalivery_date         = date("Y-m-d H:i:s");


    $table = "product_order";
    $dataParam  = [
        "oder_status"      => $oder_status,
        "color_code"      => $color_code,
        "dalivery_by" => $dalivery_by,
        "dalivery_date" => $dalivery_date,

    ];
    $where = [

        'id' => $order_id,
    ];

    $update = update_data($table, $dataParam, $where);
    if ($update) {
        $status = 'success';
        $message = "<div class='alert alert-success'>Deliverey has been successfully completed</div>";
    } else {
        $status = 'error';
        $message = "<div class='alert alert-danger'>Please fix the error!</div>";
    }
    // response section

    $response  = [
        'status' => $status,
        'message' => $message,

    ];

    echo json_encode($response);
    exit;
}

// Deliverey Section Start

// Pending Order Section Start
if (isset($_GET["process_type"]) && $_GET["process_type"] == "pending_order") {
    session_start();

    include "database_management.php";

    $order_id               = $_POST["order_id"];


    $oder_status               = 'pending';
    $color_code               = '#ffc107';
    $dalivery_by         = $_SESSION['login_id'];



    $table = "product_order";
    $dataParam  = [
        "oder_status"      => $oder_status,
        "color_code"      => $color_code,
        "dalivery_by" => $dalivery_by,


    ];
    $where = [

        'id' => $order_id,
    ];

    $update = update_data($table, $dataParam, $where);
    if ($update) {
        $status = 'success';
        $message = "<div class='alert alert-success'>Item have been delivered</div>";
    } else {
        $status = 'error';
        $message = "<div class='alert alert-danger'>Please fix the error!</div>";
    }
    // response section

    $response  = [
        'status' => $status,
        'message' => $message,

    ];

    echo json_encode($response);
    exit;
}
// Pending Order Section End


// Cancel Order Section Start


if ((isset($_GET["process_type"]) && $_GET["process_type"] == "order_cacel")) {



    include "database_management.php";

    $cancel_order_id               = $_POST["cancel_order_id"];

    $table_name = 'product_order';
    $wheres     = [
        "id"      => $cancel_order_id,
    ];
    $edit_data          = get_data($table_name, $wheres,);
    get_profile_edit_view($edit_data);
}

function get_profile_edit_view($data)
{ ?>
    <div id="show_cancel_message" class="message_style"></div>

    <!-- form start here -->
    <form id="cancel_form">
        <div class="div">
            <input type="hidden" name="cancel_product_id" id="cancel_product_id" value="<?php echo  $data->id; ?>">
        </div>
       
        <div class="mb-3">
            <label for="" class="col-form-label">Product Name:</label>
            <div class="form-control">
                <p><?php echo $data->product_name ?></p>

            </div>
        </div>
        <div class="mb-3">
            <label for="" class="col-form-label">Quantity:</label>
            <div class="form-control">
                <p><?php echo $data->quantity ?></p>

            </div>
        </div>

        <div class="mb-3">
            <label for="" class="col-form-label">Cancel Causes:</label>
            <div class="form-floating">
                <textarea class="form-control" id="cancel_causes" name="cancel_causes" style="height: 100px"></textarea>
            </div>
            <span id="error_cancel_causes" class="error_style text-danger"></span>
        </div>
        


    </form>
    <!-- form end here -->


<?php }



if (isset($_GET["process_type"]) && $_GET["process_type"] == "product_cancel_submit_btn") {
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
        $cancel_product_id  = $_POST["cancel_product_id"];



        $oder_status            ='cancel';
        $color_code             ='#FF3333';
        $cancel_causes          = input_data_validation($_POST["cancel_causes"]);
        $dalivery_by            = $_SESSION['login_user_type'];        
        $dalivery_date          = date("Y-m-d H:i:s");


        $table = "product_order";
        $dataParam  = [
            "comment"           => $cancel_causes,
            "color_code"        => $color_code,
            "dalivery_by"       => $dalivery_by,
            "oder_status"       => $oder_status,
            "dalivery_date"     => $dalivery_date,

        ];
        $where = [

            'id' => $cancel_product_id,
        ];

        $update = update_data($table, $dataParam, $where);
        if ($update) {
            // default:
            $status = 'success';
            $message = "<div class='alert alert-success'>Order has been Cancel completed</div>";
            $data = "";
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


    if (empty($_POST['cancel_causes'])) {
        $is_error = true;
        $error_data['error_cancel_causes']        =    'Cancel Causes' . $is_requred;
    }


    $response = (object)[
        'has_error'         => $is_error,
        'error_data'        => $error_data,
    ];

    return $response;
}

// Cancel Order Section End
