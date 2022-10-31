<?php
// Edit Data Show From Database 
if ((isset($_GET["process_type"]) && $_GET["process_type"] == "product_edit")) {



    include "database_management.php";

    $product_id = $_POST['product_id'];

    $table_name = 'stock';
    $wheres     = [
        "id"      => $product_id,
    ];
    $edit_data          = get_data($table_name, $wheres,);
    get_profile_edit_view($edit_data);
}

function get_profile_edit_view($data)
{ ?>
    <div id="show_message" class="message_style"></div>

    <!-- form start here -->
    <form id="product_edit_form">
        <div class="div">
            <input type="hidden" name="edit_product_id" id="edit_product_id" value="<?php echo  $data->id; ?>">
        </div>
        <div class="mb-3">
            <label for="" class="col-form-label">Sl:</label>
            <input type="text" class="form-control" id="product_sl" name="product_sl" value="<?php echo $data->product_sl ?>">
            <span id="error_product_sl" class="error_style text-danger"></span>
        </div>
        <div class="mb-3">
            <label for="" class="col-form-label">Product Name:</label>
            <input type="email" class="form-control" id="product_name" name="product_name" value="<?php echo $data->product_name ?>">
            <span id="error_product_name" class="error_style text-danger"></span>
        </div>


        <div class="mb-3">
            <label for="" class="col-form-label">Quantity:</label>
            <input type="text" class="form-control" id="quantity" name="quantity" value="<?php echo $data->quantity ?>">
            <span id="error_quantity" class="error_style text-danger"></span>
        </div>
        <div class="mb-3">
            <label for="" class="col-form-label">DP:</label>
            <input type="text" class="form-control" id="dp" name="dp" value="<?php echo $data->dp ?>">
            <span id="error_dp" class="error_style text-danger"></span>
        </div>

        <div class="mb-3">
            <label for="" class="col-form-label">MRP:</label>
            <input type="text" class="form-control" id="product_price" name="product_price" value="<?php echo $data->product_price ?>">
            <span id="error_product_price" class="error_style text-danger"></span>
        </div>




    </form>
    <!-- form end here -->


<?php }


if (isset($_GET["process_type"]) && $_GET["process_type"] == "product_edit_submit") {
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
        $edit_product_id = $_POST["edit_product_id"];

        $product_sl                 = input_data_validation($_POST["product_sl"]);
        $product_name               = input_data_validation($_POST["product_name"]);
        $quantity                   = input_data_validation($_POST["quantity"]);
        $dp                         = input_data_validation($_POST["dp"]);
        $product_price              = input_data_validation($_POST["product_price"]);
        $update_by                  = $_SESSION['login_id'];
        $update_at                  = date("Y-m-d H:i:s");


        $table = "stock";
        $dataParam  = [
            "product_sl"            => $product_sl,
            "product_name"          => $product_name,
            "quantity"              => $quantity,
            "dp"                    => $dp,
            "product_price"         => $product_price,
            "updated_by"             => $update_by,
            "updated_at"             => $update_at,

        ];
        $where = [

            'id' => $edit_product_id,
        ];

        $update = update_data($table, $dataParam, $where);
        if ($update) {

            // default:
            $status = 'success';
            $message = "<div class='alert alert-success'>Edit has been successfully completed</div>";
            $data = [];
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

    if (empty($_POST['product_sl'])) {
        $is_error = true;
        $error_data['error_product_sl']                   =    'Product Sl' . $is_requred;
    }
    if (empty($_POST['product_name'])) {
        $is_error = true;
        $error_data['error_product_name']                  =    'Product Name' . $is_requred;
    }
    if (empty($_POST['quantity'])) {
        $is_error = true;
        $error_data['error_quantity']                =    'Quantity' . $is_requred;
    }

    if (empty($_POST['dp'])) {
        $is_error = true;
        $error_data['error_dp']                =    'DP' . $is_requred;
    }
    if (empty($_POST['product_price'])) {
        $is_error = true;
        $error_data['error_product_price']                =    'Product Price' . $is_requred;
    }


    $response = (object)[
        'has_error'         => $is_error,
        'error_data'        => $error_data,
    ];

    return $response;
}

// Stock Product Delete Section Start
if (isset($_GET["process_type"]) && $_GET["process_type"] == "delete_stock_product") {
    include "database_management.php";

    $stoct_product_id = $_POST['stoct_product_id'];

    $table_name = 'stock';
    $where = [
        'id' => $stoct_product_id,
    ];

    $delete = delete_data($table_name, $where);
    if ($delete) {

        // default:
        $status = 'success';
        $message = "<div class='alert alert-success'>Delete has been successfully completed</div>";
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
// Stock Product Delete Section End

?>