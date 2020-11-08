<?php
error_reporting(0);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Programming using VCAT</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="scripts/behave.js"></script>
    <script type="text/javascript" src="scripts/script.js"></script>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <!-- Text editor code -->
    <div class="text-editor">
        <h2 style="display: block; position: absolute; margin-left: 20px;"> Your Code: </h2>
        <button type="button" class="btn btn-primary button-right" onclick="showOp()">Output</button>
        <button type="button" class="btn btn-success button-right" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add CodeBlock</button>

        <!-- Added -->
    <script>
			function download(filename, text) {
			  var element = document.createElement('a');
			  element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
			  element.setAttribute('download', filename);

			  element.style.display = 'none';
			  document.body.appendChild(element);

			  element.click();

			  document.body.removeChild(element);
			}
			
			function buttonClick(){
				download("hello.txt","This is the content of my file :)");
			}
			
			function createDoc(){
				var opened = window.open("");
				opened.document.write("<html><head><title>MyTitle</title></head><body>test</body></html>");
			}
			
			function createList(){
				var ul = document.createElement("UL");
				var node, textnode; 


				//document.getElementById("myList").appendChild(node);

				for(let i = 0; i < 5; i++) {
				//Code here
				node = document.createElement("LI");
				textnode = document.createTextNode("test"+(i+1));
				node.appendChild(textnode);
				ul.appendChild(node);
				}

				document.body.appendChild(ul);
			}
			
			function setSelectionRange(input, selectionStart, selectionEnd) {
			  if (input.setSelectionRange) {
				input.focus();
				input.setSelectionRange(selectionStart, selectionEnd);
			  }
			  else if (input.createTextRange) {
				var range = input.createTextRange();
				range.collapse(true);
				range.moveEnd('character', selectionEnd);
				range.moveStart('character', selectionStart);
				range.select();
			  }
			}

			function setCaretToPos (input, pos) {
			   setSelectionRange(input, pos, pos);
			}
			
			function setCaret(){
				var line_number = document.getElementById("ip").value;
				var element = document.getElementById("demo");
				var text = element.value;
				
				var lines = element.value.split('\n');
				for(var i = 0;i < lines.length;i++){
					//code here using lines[i] which will give you each line
					console.log("Line "+(i+1)+": "+lines[i]);
				}
				//console.log("text:"+element.value);
				var position = 0;
				for(var j=0; j< line_number-1; j++){
					position = position + lines[j].length + 1;
				}
				setCaretToPos(element, position);
			}

		</script>
		<div class="container">
			<div class="line-nums"><span>1</span></div>
			<textarea id="tb" rows="100" cols="161"></textarea>
        </div>
        <!-- End added -->
        <!-- <div class="text-box">
                <textarea rows="100" cols="161" id="tb" autofocus></textarea>
        </div> -->
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
			$username = "id15161901_ambardudhane";
			$password = "{{emyUE%QF9#J4Rg";
			$dbname = "id15161901_vcatdb";

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
                    echo "<button class='button1 btn btn-primary' id='button1' onclick='addCodeBlock(".$row["codeid"].");' value=".$row["blockname"].">Add</button>";
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
                    echo "<button class='button1 btn btn-primary' id='button1' onclick='addCodeBlock(".$row["codeid"].");' value=".$row["blockname"].">Add</button>";
                    echo "</div>";
                    //echo "codeid: " . $row["codeid"]. " - Block Name: " . $row["blockname"]. " Code: " . $row["code"]. "<br>";
                }
                } else {
                echo "0 results";
                }
            }
			$conn->close();
		?>
        <script>
			function download(filename, text) {
			  var element = document.createElement('a');
			  element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
			  element.setAttribute('download', filename);

			  element.style.display = 'none';
			  document.body.appendChild(element);

			  element.click();

			  document.body.removeChild(element);
			}
			
			function buttonClick(){
				download("hello.txt","This is the content of my file :)");
			}
			
			function createDoc(){
				var opened = window.open("");
				opened.document.write("<html><head><title>MyTitle</title></head><body>test</body></html>");
			}
			
			function createList(){
				var ul = document.createElement("UL");
				var node, textnode; 


				//document.getElementById("myList").appendChild(node);

				for(let i = 0; i < 5; i++) {
				//Code here
				node = document.createElement("LI");
				textnode = document.createTextNode("test"+(i+1));
				node.appendChild(textnode);
				ul.appendChild(node);
				}

				document.body.appendChild(ul);
			}
			
			function setSelectionRange(input, selectionStart, selectionEnd) {
			  if (input.setSelectionRange) {
				input.focus();
				input.setSelectionRange(selectionStart, selectionEnd);
			  }
			  else if (input.createTextRange) {
				var range = input.createTextRange();
				range.collapse(true);
				range.moveEnd('character', selectionEnd);
				range.moveStart('character', selectionStart);
				range.select();
			  }
			}

			function setCaretToPos (input, pos) {
			   setSelectionRange(input, pos, pos);
			}
			
			function setCaret(){
				var line_number = document.getElementById("ip").value;
				var element = document.getElementById("tb");
				var text = element.value;
				
				var lines = element.value.split('\n');
				for(var i = 0;i < lines.length;i++){
					//code here using lines[i] which will give you each line
					console.log("Line "+(i+1)+": "+lines[i]);
				}
				//console.log("text:"+element.value);
				var position = 0;
				for(var j=0; j< line_number-1; j++){
					position = position + lines[j].length + 1;
				}
				setCaretToPos(element, position);
			}

		</script>
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
                    <input type="text" class="form-control code" name="code" id="recipient-code" required>
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

<script src="scripts/main.js"></script>

</html>
