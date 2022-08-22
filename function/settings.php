<?php

$table_name='settings';

$settings_data=get_all_data($table_name);




foreach($settings_data as $value){

$_SESSION['tittle']     = $value->tittle;
$_SESSION['icon']       = $value->icon;
$_SESSION['logo']       = $value->logo;





}


?>
