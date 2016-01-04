<?php
$response=array();
    $response["success"]=-1;
session_start();
if (!isset($_SESSION["session_name"])){
    header("Location:../index.php");
  exit();
}
else if(!isset($_SESSION["admin"])){
   header("Location:./switcher.php");
  exit();
}
//echo json_encode($response);
?>


<!DOCTYPE HTML>
<html>
<head>
    <style>
        .error {color: #FF0000;}
    </style>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/master-ui.css" rel="stylesheet">
</head>
<body align="center"]]>

    	
<?php
require('phpsqlsearch_dbinfo.php');

$old_submit = isset($_POST['submit']) ? $_POST['submit'] : '';
$current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

// define variables and set to empty values
$nameErr = $contactErr = $professionErr = $addressErr = $latLngErr = "";
$name = $contact = $profession = $address = $lat = $lng = "";

$bool_name = $bool_contact = $bool_profession = $bool_address = $bool_lat = $bool_lng = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
        }
        $bool_name = true;
    }

    if (empty($_POST["contact"])) {
        $contactErr = "Contact is required";
    } else {
        $contact = test_input($_POST["contact"]);
        $bool_contact = true;
    }

    if (empty($_POST["address"])) {
        $addressErr = "Address is required";
    } else {
        $address = test_input($_POST["address"]);
        $bool_address = true;
    }

    if (empty($_POST["profession"])) {
        $professionErr = "Profession is required";
    } else {
        $profession = test_input($_POST["profession"]);
        $bool_profession = true;
    }

    if (empty($_POST["lat"])) {
        $latLngErr = "Lat Lng are required";
    } else {
        $lat = test_input($_POST["lat"]);
        $bool_lat = true;
    }

    if (empty($_POST["lng"])) {
        $latLngErr = "Lat Lng are required";
    } else {
        $lng = test_input($_POST["lng"]);
        $bool_lng = true;
    }

    if($bool_name && $bool_contact && $bool_address && $bool_profession && $bool_lat && $bool_lng){
        $servername = "localhost";
        $username = "username";
        $password = "";
        $dbname = "ePloyment";

        // Create connection
        $connection = mysqli_connect ('localhost', 'root', 'seecs@123');
        // Check connection
        if (!$connection) {
            die("Not connected : " . mysqli_error());
        }

        // Set the active mySQL database
        $db_selected = mysqli_select_db($connection, $database);
        if (!$db_selected) {
            die ('Can\'t use db : ' . mysqli_error());
        }

        // Search the rows in the markers table
        $sql = "INSERT INTO `markers` (`name`, `contact`, `address`, `lat`, `lng`, `occupation`)
                VALUES ('$name', '$contact', '$address', '$lat', '$lng', '$profession');";
        $result = mysqli_query($connection, $sql);

        if (!$result) {
            die("Invalid query: " . mysqli_error());
        }else{
            echo "New record created successfully";
        }

        mysqli_close($connection);
        
        refresh($old_submit, $current_url);
    }

}

function refresh($old_submit, $current_url){
    if ($old_submit == true) {
        header("Location: $current_url");
        $old_submit = false;
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
    
    <div class="container">
		<div class="row">
			<div class="col-md-12">
	<nav class="navbar navbar-default">
				  <div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					  <a class="navbar-brand" href="#">ePloyment</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					  <ul class="nav navbar-nav">
						<li class="active"><a href="../">Home<span class="sr-only">(current)</span></a></li>
						<li><a href="#">About</a></li>
					
					  </ul>
					  <ul class="nav navbar-nav navbar-right">
						<li><a href="#">Link</a></li>
						<li class="dropdown">
						  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
						
						</li>
					  </ul>
					</div><!-- /.navbar-collapse -->
				  </div><!-- /.container-fluid -->
				</nav>
                
                
                
                
<h2>Admin Panel</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Name: <input type="text" name="name" value="<?php echo $name;?>">
    <span class="error">* <?php echo $nameErr;?></span>
    <br><br>
    Contact: <input type="tel" name="contact" value="<?php echo $contact;?>">
    <span class="error">* <?php echo $contactErr;?></span>
    <br><br>
    Profession:
    <select name="profession">
        <option value="">Select...</option>
        <option value="carpenter">Carpenter</option>
        <option value="plumber">Plumber</option>
        <option value="gardener">Gardener</option>
        <option value="electrician">Electrician</option>
        <option value="painter">Painter</option>
        <option value="glazier">Glazier</option>
        <option value="sweeper">Sweeper</option>
        <option value="bricklayer">Bricklayer</option>
    </select>
    <span class="error">* <?php echo $professionErr;?></span>

    <br><br>
    Address: <textarea name="address" rows="5" cols="40"><?php echo $address;?></textarea>
    <span class="error">* <?php echo $addressErr;?></span>
    <br><br>
    Lat: <input type="text" name="lat" value="<?php echo $lat;?>">
    Lng: <input type="text" name="lng" value="<?php echo $lng;?>">
    <span class="error">* <?php echo $latLngErr;?></span>
    <br><br>
    <input class="btn btn-primary"type="submit" name="submit" value="Submit">
</form>
            </div>
            </div>
    </div>
    
    
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>