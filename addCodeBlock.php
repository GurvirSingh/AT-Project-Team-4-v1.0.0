<?php
$blockName = $_POST['blockName'];
$code = $_POST['code'];
$language = 'javascript';
$servername = "localhost";
$username = "id15161901_ambardudhane";
$password = "{{emyUE%QF9#J4Rg";
$dbname = "id15161901_vcatdb";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql="insert into tblcodeblocks(`blockname`, `code`, `language`) values('$blockName','$code','$language')";
if ($conn->query($sql) === TRUE) {
header('location:https://vcatextend.000webhostapp.com');
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
?>