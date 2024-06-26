<?php
    // Getting username, password, and option from login
    $user = $_POST['userName'];
    $pass = $_POST['password'];
    $option = $_POST['option'];

    // Connecting to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "serviceapartment";
    $conn = new mysqli($servername, $username, $password, $db);

    // Check connection
    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // On connection successful

    $isAdmin = false;
    $isUser = false;
    
    // Check if the login credentials match with the adminlist
    if($option == "admin") {
        $sql = "SELECT username, password FROM adminlist";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if($user == $row['username']) {
                    $isAdmin = true;
                    break;
                }  
            }
            
        } 
    }  

    // Check if the login credentials match with the userlist
    else if($option == "user") {
        $sql = "SELECT username, password FROM userlist";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if($user == $row['username']) {
                    $isUser = true;
                    break;
                }  
            }
        } 
    }

    if($isAdmin == 1)
        header("Location: adminPanel.html");
    if($isUser == 1)
        header("Location: userPanel.html");
    else    
        echo "invalid login";
?>
