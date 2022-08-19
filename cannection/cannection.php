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
        
        $conn	=	new PDO($dsn, $user, $pass, $options);
        
        
    }catch(PDOException $e){
        
        $error = $e->getMessage();
    }




?>