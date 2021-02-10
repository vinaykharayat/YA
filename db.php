<?php

// Enter your host name, database username, password, and database name.
// If you have not set database password on localhost then set empty.
$con = new mysqli("localhost", "root", "", "loginsystem");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

insertValuesToDatabase($_POST['email'], $_POST['username'], $_POST['password']);

function insertValuesToDatabase($email, $username, $password) {
    $conn = &$GLOBALS['con'];
    $query = "insert into users(`email`,`username`, `password`) values ('$email', '$username', '$password')";
    $result = $conn->query($query);
//    die($result);
    if ($result > 0) {
        return 200;
    } else {
        return -1;
    }
}

?>
