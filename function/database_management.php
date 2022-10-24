<?php


$host = "localhost";
$user =	"root";
$pass =	"";
$db   = "bogura_doi_bd";
// set up DSN:
    
$dsn 	=	"mysql:host=$host; dbname=$db";
    
// set option:

$options	=	[
PDO::ATTR_PERSISTENT 			=> true,
PDO::ATTR_ERRMODE 	 			=> PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE 	=> PDO::FETCH_OBJ
];


// create new pdo:

try{
    global $conn;
    $conn	=	new PDO($dsn, $user, $pass, $options);
}catch(PDOException $e){

    $error = $e->getMessage();
}


function get_all_data($table, $wheres = [], $columns = [],  $order = null, $order_by = null) {
    global $conn;

    $table_columns 	=	(isset($columns) && !empty($columns) ? implode(",", $columns) : "*");
    $sql 			= "SELECT $table_columns FROM $table";

    if(isset($wheres) && !empty($wheres)){
        $conditionSets = array();
        foreach ($wheres as $key => $value) {
            $conditionSets[] = $key . " = '" . $value . "'";
        }

        $sql .= " WHERE " . join(" AND ", $conditionSets);
    }

    if(isset($order_by) && !empty($order_by)){
        $sql .= " ORDER BY $order_by $order";
    }

    $stmt 			= $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}



function get_data($table, $wheres = [], $columns = []) {
    global $conn;

    $table_columns 	=	(isset($columns) && !empty($columns) ? implode(",", $columns) : "*");
    
    $sql 			= "SELECT $table_columns FROM $table";

    if(isset($wheres) && !empty($wheres)){

        $conditionSets = array();

        foreach ($wheres as $key => $value) {
            $conditionSets[] = $key . " = '" . $value . "'";
        }

        $sql .= " WHERE " . join(" AND ", $conditionSets);
    }

    $stmt 			= $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetch();
}


function store_data($table, $data){

    global $conn;
    $fields = implode(',', array_keys($data));
    $values = "'" . implode("', '", array_values($data)) . "'";
    $sql = "INSERT INTO $table ($fields) VALUES ($values)";

    try{

            
                $conn->exec($sql);
                $status		= "success"; 	
                $message	= "Data have been successfully inserted"; 	
                $insert_id	= $conn->lastInsertId();
                $error 		= "";
          
                 
    }catch(PDOException $e){

        $status		= "error"; 	
        $message	= "Failed to insert data";
        $insert_id	= "";
        $error		= $sql . "<br>" . $e->getMessage();

    }

    $response 	=	(object)[
        'status'	=>	$status,
        'message'	=>	$message,
        'insert_id'	=>	$insert_id,
        'error'		=>	$error,
    ];

    return $response;

}



function update_data($table, $dataParam, $where) {
    global $conn;
    $valueSets = array();

    foreach ($dataParam as $key => $value) {
        $valueSets[] = $key . " = '" . $value . "'";
    }

    $conditionSets = array();

    foreach ($where as $key => $value) {
        $conditionSets[] = $key . " = '" . $value . "'";
    }

    $sql = "UPDATE $table SET " . join(",", $valueSets) . " WHERE " . join(" AND ", $conditionSets);

    try{


        $stmt	=	$conn->prepare($sql);
        $stmt->execute();			

        $status			= "success"; 	
        $message		= "Data have been successfully Updated"; 	
        $no_updated_row	= $stmt->rowCount();
        $error 		= "";

    }catch(PDOException $e){

        $status			= "error"; 	
        $message		= "Failed to insert data";
        $no_updated_row	= "";
        $error			= $sql . "<br>" . $e->getMessage();

    }

    $response 	=	(object)[
        'status'		=>	$status,
        'message'		=>	$message,
        'no_updated_row'=>	$no_updated_row,
        'error'			=>	$error,
    ];

    return $response;

}

 function delete_data($table, $where) {
    global $conn;

    $conditionSets = array();
    foreach ($where as $key => $value) {
        $conditionSets[] = $key . " = '" . $value . "'";
    }
    $sql = "DELETE FROM $table WHERE " . join(" AND ", $conditionSets);

    try {

        $conn->exec($sql);

        $status			= "success"; 	
        $message		= "Data have been successfully deleted";
        $error			= "";

    }catch(PDOException $e){

        $status			= "error"; 	
        $message		= "Failed to delete data";
        $error			= $sql . "<br>" . $e->getMessage();

    }

    $response 	=	(object)[
        'status'		=>	$status,
        'message'		=>	$message,
        'error'			=>	$error,
    ];

    return $response;
}


 function delete_all_data($table) {
    global $conn;

    $sql = "DELETE FROM $table";

    try {

        $conn->exec($sql);

        $status			= "success"; 	
        $message		= "Data have been successfully deleted";
        $error			= "";

    }catch(PDOException $e){

        $status			= "error"; 	
        $message		= "Failed to delete data";
        $error			= $sql . "<br>" . $e->getMessage();

    }

    $response 	=	(object)[
        'status'		=>	$status,
        'message'		=>	$message,
        'error'			=>	$error,
    ];

    return $response;
}

 function get_table_total_row_count($table, $wheres = []){
    global $conn;
    $sql = "SELECT COUNT(id) as total_row FROM $table";

    if(isset($wheres) && !empty($wheres)){

        $conditionSets = array();

        foreach ($wheres as $key => $value) {
            $conditionSets[] = $key . " = '" . $value . "'";
        }

        $sql .= " WHERE " . join(" AND ", $conditionSets);
    } 

    $stmt 			= 	$conn->prepare($sql);
    $stmt->execute();
    $number_of_rows = $stmt->fetchColumn(); 
    return $number_of_rows;
}


function get_data_by_row_query($sql){
    global $conn;
    $stmt 			= $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}
function get_single_data_by_row_query($sql){
    global $conn;

    $stmt 			= $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetch();
}


function row_query($sql){
    global $conn;
    $stmt 			= $conn->prepare($sql);
    $stmt->execute();
}




?>