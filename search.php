<?php

    $searchQuery = $_POST['searchQuery'];

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
    $sql = "SELECT codeid, blockname, code FROM tblcodeblocks WHERE blockname LIKE '$searchQuery'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
        echo '<div class="code-block-1">';
        echo "<h3>".$row["blockname"]."</h3><br/>";
        echo "<p id='".$row["codeid"]."'>".$row["code"]."</p>";
        echo "<button class='button1 btn btn-primary' id='button1' value=".$row["blockname"].">Add</button>";
        echo "</div>";
        //echo "codeid: " . $row["codeid"]. " - Block Name: " . $row["blockname"]. " Code: " . $row["code"]. "<br>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();

?>