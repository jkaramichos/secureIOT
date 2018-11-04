<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';

$query = "SELECT username FROM members ORDER BY member_id DESC LIMIT 1";
$result = $mysqli->query($query); 

$data = $result->fetch_assoc();
$username = $data["username"];

$sql = "CREATE TABLE $username(
        device_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
        device_name VARCHAR(30) NOT NULL
        )";
$mysqli->query($sql);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Registration Success</title>
        <link rel="stylesheet" href="styles/main.css" />
    </head>
    <body>
        <h1>Registration successful!</h1>
        <p>You can now go back to the <a href="index.php">login page</a> and log in</p>
    </body>
</html>
