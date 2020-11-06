<?php

    $blockName = $_POST['blockName'];
    $code = $_POST['code'];
    $language = $_POST['language'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "vcat";

    // echo $searchQuery;

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql="insert into tblcodeblocks(`blockname`, `code`, `language`) values('$blockName','$code','$language')";

        if ($conn->query($sql) === TRUE) {
            header('location:index.php');
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
    $conn->close();

?>