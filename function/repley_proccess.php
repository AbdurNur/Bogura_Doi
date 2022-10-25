<?php


if ((isset($_GET["process_type"]) && $_GET["process_type"] == "repley")) {


    include "database_management.php";

    $question_id = $_POST['question_id'];

    $table_name = 'ask_question';
    $wheres     = [
        "id"      => $question_id,
    ];
    $question_data          = get_data($table_name, $wheres,);
    get_question_data_view($question_data);
}

function get_question_data_view($data)
{ ?>
    <div id="show_message" class="message_style"></div>

    <!-- form start here -->
    <form id="repley_form">

        <div class="div">
            <input type="hidden" name="repley_email" id="repley_email" value="<?php echo  $data->email;; ?>">
        </div>

        <div class="mb-3">
            <label for="" class="col-form-label">Name:</label>
            <div class="form-control">
                <p><?php echo $data->name ?></p>

            </div>
        </div>

        <div class="mb-3">
            <label for="" class="col-form-label">E-mail:</label>
            <div class="form-control">
                <p><?php echo $data->email ?></p>

            </div>
        </div>

        <div class="mb-3">
            <label for="" class="col-form-label">Question:</label>
            <div class="form-control">
                <p><?php echo $data->discription ?></p>

            </div>

        </div>

        <div class="mb-3">
            <label for="" class="col-form-label">Answer:</label>
            <div class="form-floating">
                <textarea class="form-control" id="answer" name="answer" style="height: 100px"></textarea>
            </div>
            <span id="error_answer" class="error_style text-danger"></span>
        </div>
    </form>
    <!-- form end here -->

<?php }









if (isset($_GET["process_type"]) && $_GET["process_type"] == "repley_send") {
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
        $repley_email          = $_POST["repley_email"];

        $answer               = input_data_validation($_POST["answer"]);
        $replay_by         = $_SESSION['login_user_type'];
        $replay_status         = 'success';
        $replay_at         = date("Y-m-d H:i:s");


        $table = "ask_question";
        $dataParam  = [
            "repley_discription"            => $answer,
            "replay_by"         => $replay_by,
            "replay_status"     => $replay_status,
            "replay_at"         => $replay_at,

        ];
        $where = [

            'email' => $repley_email,
        ];

        $update = update_data($table, $dataParam, $where);
        if ($update) {
            // default:
            $status = 'success';
            $message = "<div class='alert alert-success'>Repley has been successfully completed</div>";
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


    if (empty($_POST['answer'])) {
        $is_error = true;
        $error_data['error_answer']        =    'Answer' . $is_requred;
    }


    $response = (object)[
        'has_error'         => $is_error,
        'error_data'        => $error_data,
    ];

    return $response;
}


?>