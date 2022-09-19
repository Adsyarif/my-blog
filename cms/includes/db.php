<?php

// default array format
//$db_1 = ["db_host"=>"localhost", "db_user" => "root", "db_password" => "", "db_name"=> "cms"];

// manageble array format
$db["db_host"] = "localhost";
$db["db_user"] = "root";
$db["db_password"] = "";
$db["db_name"] = "cms";

foreach($db as $key=>$value){

    // define(name, value, case-insensitive)
    // make a constant for secure from accidental the value changes
    // in terms that we don't accidentally somewhere in the code change one of the connection parameters value.
    
    define(strtoupper($key), $value);
    // echo $key . "<br>";
    // echo $value . "<br>" . "<br>";
}

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if(!$connection){
    die("Connection error");
}else{
//    echo "Connection successfully";
}

?>
