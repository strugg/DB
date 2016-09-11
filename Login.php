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

    $username = $_POST["login"];
    $password = $_POST["pass"];
    
    $statement = mysqli_prepare($con, "SELECT * FROM user WHERE login = ? AND pass = ?");
    mysqli_stmt_bind_param($statement, "ss", $username, $password);
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $userID, $name, $age, $username, $password);
    
    $response = array();
    $response["success"] = false;  
    
    while(mysqli_stmt_fetch($statement)){
        $response["success"] = true;  
        $response["name"] = $name;
        $response["mail"] = $mail;
        $response["login"] = $username;
        $response["pass"] = $password;
    }
    
    echo json_encode($response);
?>
