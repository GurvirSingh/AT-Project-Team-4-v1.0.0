<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Programming using VCAT</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- Text editor code -->
    <div class="text-editor">
        <h2 style="display: block; position: absolute; margin-left: 20px;"> Your Code: </h2>
        <button type="button" class="btn btn-primary button-right" onclick="showOp()">Output</button>

        <div class="text-box">
            <textarea rows="100" cols="161" id="tb" autofocus></textarea>
        </div>
    </div>

    <!-- Code blocks code -->
    <div class="code-blocks">
        <div class="search">
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>

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
				echo '<div class="code-block-1">';
				echo "<h3>".$row["blockname"]."</h3><br/>";
				echo "<p id='".$row["codeid"]."'>".$row["code"]."</p>";
				echo "<button class='button1 btn btn-primary' id='button1' onclick='addCode(".$row["codeid"].")' value='if-else'>Add</button>";
				echo "</div>";
				//echo "codeid: " . $row["codeid"]. " - Block Name: " . $row["blockname"]. " Code: " . $row["code"]. "<br>";
			  }
			} else {
			  echo "0 results";
			}
			$conn->close();
		?>

        <!-- Static code block examples -->
        <!--div class="code-block-1">
            <h3>For Loop</h3><br/>

            <p>for(let i = 0; i < x; i++) {
                <p>//Code here</p>
            }</p>
            <button class="button1 btn btn-primary" id="button1" value="for">Add</button>
        </div>

        <div class="code-block-1">
            
            <h3>if-else</h3><br/>
            <p>if (x)
                <p>//Code here</p>
            } else {
            }</p>
            <button class="button1 btn btn-primary" id="button1" value="if-else">Add</button>
        </div>

        <div class="code-block-1">
            
            <h3>while Loop</h3><br/>
            <p>while (x) {
                <p>//Code here</p>
            }</p>
            <button class="button1 btn btn-primary" id="button1" value="while">Add</button>
        </div>

        <div class="code-block-1">
            <h3>Div tags</h3><br/>
            
            <p>&lt;div&gt; &lt;/div&gt; </p>
            <button class="button1 btn btn-primary" id="button1" value="div">Add</button>
        </div-->
        
    </div>
</body>

<script src="main.js"></script>

</html>
