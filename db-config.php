<?php
$host = "localhost";
$db_name = "todo_list";
$username = "root";
$password = "root";
$port = 3306;

try{
    $conn = new PDO(
        "mysql:host=$host;dbname=$db_name;port=$port",
        $username,
        $password
    );
}
catch(PDOException $e){
    echo "SQL error";
}
?>