<?php
// Edit Data Show From Database 
if ((isset($_GET["process_type"]) && $_GET["process_type"] == "edit_profile")) {



    include "database_management.php";

    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';
    // exit;

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

    <!-- form start here -->
    <form id="profile_edit_form">
        <div class="mb-3">
            <label for="" class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $data->name ?>">
            <span id="error_name" class="error_style"></span>
        </div>
        <div class="mb-3">
            <label for="" class="col-form-label">E-mail:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $data->email ?>">
            <span id="error_email" class="error_style"></span>
        </div>


        <div class="mb-3">
            <label for="" class="col-form-label">Contact:</label>
            <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $data->number ?>">
            <span id="error_contact" class="error_style"></span>
        </div>


        <div class="mb-3">
            <label for="" class="col-form-label">Present Address:</label>
            <div class="form-floating">
                <textarea class="form-control" id="present_address" name="present_address" style="height: 50px"> <?php echo $data->address ?></textarea>
            </div>
            <span id="error_answer" class="error_style"></span>
        </div>
        <div class="mb-3">
            <label for="" class="col-form-label">Permanent Address:</label>
            <div class="form-floating">
                <textarea class="form-control" id="permanent_address" name="permanent_address" style="height: 50px"><?php echo $data->parmanent_address ?></textarea>
            </div>
            <span id="error_answer" class="error_style"></span>
        </div>
    </form>
    <!-- form end here -->


<?php }


?>