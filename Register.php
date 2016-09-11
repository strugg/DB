<?php
    $mysql_host = "127.0.0.1";
    $mysql_database = "studo";
    $mysql_user = "root";
    $mysql_password = "";

    $connect = @mysql_connect($mysql_host, $mysql_user, $mysql_password)or die(mysql_error());
$db = @mysql_select_db($mysql_database,$connect)or die(mysql_error()); 

    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $name = $_POST["name"];
    $mail = $_POST["mail"];
    $username = $_POST["login"];
    $password = $_POST["pass"];

    $statement = mysqli_prepare($con, "INSERT INTO user (name, login, mail, pass) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($statement, "siss", $name, $username, $age, $password);
    mysqli_stmt_execute($statement);
    
    $response = array();
    $response["success"] = true;  
    
    echo json_encode($response);
?>
