<!DOCTYPE html>
<html>
<body>

<?php
			$servername = "localhost";
			$username = "id15161901_ambardudhane";
			$password = "{{emyUE%QF9#J4Rg";
			$dbname = "id15161901_vcatdb";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
			  die("Connection failed: " . $conn->connect_error);
			}

			$sql = "SELECT codeid, blockname, code FROM tblcodeblocks";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			  // output data of each row
			  while($row = $result->fetch_assoc()) {
				echo "codeid: " . $row["codeid"]. " - Block Name: " . $row["blockname"]. " Code: " . $row["code"]. "<br>";
			  }
			} else {
			  echo "0 results";
			}
			$conn->close();
?>

</body>
</html>