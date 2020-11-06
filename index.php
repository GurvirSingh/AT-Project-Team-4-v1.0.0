<?php
error_reporting(0);
?>

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
        <button type="button" class="btn btn-success button-right" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add CodeBlock</button>

        <div class="text-box">
            <textarea rows="100" cols="161" id="tb" autofocus></textarea>
        </div>
    </div>

    <!-- Code blocks code -->
    <div class="code-blocks">
        <div class="search">
            <form class="form-inline" method="POST" action="index.php">
                <input type="text" class="form-control mr-sm-2" type="search" name="searchQuery" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0 searchBtn" type="submit">Search</button>
            </form>
        </div>

		<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "vcat";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
			  die("Connection failed: " . $conn->connect_error);
            }

            if($_POST['searchQuery']) {
                $searchQuery = $_POST['searchQuery'];
                $sql = "SELECT codeid, blockname, code FROM tblcodeblocks WHERE blockname LIKE '%$searchQuery%'";
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
            } else {
                $sql = "SELECT codeid, blockname, code FROM tblcodeblocks";
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

        <!-- Add code block Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Custom Code Blocks</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="addCodeBlock.php">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Block Name:</label>
                    <input type="text" class="form-control block-name" name="blockName" id="recipient-name" required>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Code:</label>
                    <input type="text" class="form-control code" name="code" id="recipient-name" required>
                </div>
                <!-- <div class="form-group">
                    <label for="message-text" class="col-form-label">Language:(default=JavaScript)</label>
                    <input type="text" class="form-control language" name="language" value="javascript" id="recipient-name" >
                </div> -->
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-success my-2 my-sm-0 searchBtn" type="submit">Submit</button>
            </form>
            </div>
            </div>
            </div>
        </div>
        </div>
</body>

<script src="main.js"></script>

</html>
