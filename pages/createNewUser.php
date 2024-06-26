<?php 
    $user = $_POST['userName'];
    $pass = $_POST['password'];
    $option = $_POST['option'];

    //connect with db
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "serviceapartment";
    $conn = new mysqli($servername, $username, $password, $db);

    if($conn->connect_error)
        die('error');

    //on connection successfull

    //insert the new user values in to admin database
    if($option == "admin") {
        $sql = "INSERT INTO adminlist (userName, password) VALUES ('$user', '$pass');";
        $result = $conn->query($sql);
        header("Location: login.html");
    }

    //insert the new user values in to user database
    if($option == "user") {
        $sql = "INSERT INTO userlist (userName, password) VALUES ('$user', '$pass');";
        $result = $conn->query($sql);
        header("Location: login.html");
    }
?>