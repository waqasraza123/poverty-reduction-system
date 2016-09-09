<?php


$dbh2 = new mysqli("localhost", "root", "seecs@123", "test1");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

if ($resulta = $dbh2->query("SELECT sum(amount_required) as total from schools")) 
{


while ($row = mysqli_fetch_assoc($resulta))
{ 
   $count = $row['total'];
}

    /* determine number of rows result set */
  /*  $count = $resulta->num_rows; */

    /* close result set */
    $resulta->close();
}


if ($result1a = $dbh2->query("SELECT sum(amount_gathered) as total1 from schools")) 
{

while ($row = mysqli_fetch_assoc($result1a))
{ 
   $count1 = $row['total1'];
}



    /* close result set */
    $result1a->close();
}

/* close connection */
$dbh2->close();

					    $json2= json_encode(array('cols' => array(array('id' => '', 'Label' => 'Total amount required' , 'patttern' => '' , 'type' => 'string'), 
						array ('id' => '', 'Label' => 'Total amount gathered' , 'patttern' => '' , 'type' => 'number')),
						'rows' => array(array('c' => array(
						array('v' => 'Total Amount Required', 'f' => 'Total Amount Required'),
						array("v" => ($count), "f" => "null" ))), array('c' => array(array('v' => 'Total Amount Gathered', 'f' => 'Total Amount Gathered'), array("v" => ($count1), "f" => "null" ))))));
			
                // latitude, longitude, id etc.
           $jsonFile2 = "test5.json";
    $fh3 = fopen($jsonFile2, 'w');
    fwrite($fh3, $json2);

















$dbh2 = new mysqli("localhost", "root", "seecs@123", "test1");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

if ($resulta = $dbh2->query("SELECT * from sch_requests")) 
{

    /* determine number of rows result set */
    $count = $resulta->num_rows;

    /* close result set */
    $resulta->close();
}


if ($result1a = $dbh2->query("SELECT * from sch_donations")) 
{

    /* determine number of rows result set */
    $count1 = $result1a->num_rows;


    /* close result set */
    $result1a->close();
}

/* close connection */
$dbh2->close();

					    $json2= json_encode(array('cols' => array(array('id' => '', 'Label' => 'Req_Count' , 'patttern' => '' , 'type' => 'string'), 
						array ('id' => '', 'Label' => 'Don_Count' , 'patttern' => '' , 'type' => 'number')),
						'rows' => array(array('c' => array(
						array('v' => 'Req_Count', 'f' => 'Req_Count'),
						array("v" => ($count), "f" => "null" ))), array('c' => array(array('v' => 'Don_Count', 'f' => 'Don_Count'), array("v" => ($count1), "f" => "null" ))))));
			
                // latitude, longitude, id etc.
           $jsonFile1 = "test4.json";
    $fh2 = fopen($jsonFile1, 'w');
    fwrite($fh2, $json2);

/*

$string = file_get_contents('test.json');
$json = json_decode($string, true);
//echo '<pre>' . print_r($json, true) . '</pre>';
$req_count = $json['result'][0]['request_count'];
$don_count = $json['result'][1]['donation_count'];
//echo $temperatureMin;
    $json= json_encode(array('type' => 'bar',
	'title' => array(
	'text' => 'Bar Chart'),
    'scale-x' => array(
            'label' => array(
			"text" => "Scholarships"),
            'labels' => array("Req_count","Donation_Count")
            ), // geometry
            'series' => array(
			array( "values" => array($req_count,0)),
			array( "values" => array(0,$don_count))
			)
			
                // latitude, longitude, id etc.
            ));

 $jsonFile = "test1.json";
    $fh = fopen($jsonFile, 'w');
    fwrite($fh, $json);
	*/
$dbh2 = new mysqli("localhost", "root", "seecs@123", "test1");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

if ($result = $dbh2->query("SELECT * FROM comment")) 
{

    /* determine number of rows result set */
    $count = $result->num_rows;

    /* close result set */
    $result->close();
}


if ($result1 = $dbh2->query("SELECT * FROM content")) 
{

    /* determine number of rows result set */
    $count1 = $result1->num_rows;


    /* close result set */
    $result1->close();
}
if ($result2 = $dbh2->query("SELECT * FROM disease")) 
{

    /* determine number of rows result set */
    $count2 = $result2->num_rows;

  

    /* close result set */
    $result2->close();
}

/* close connection */
$dbh2->close();

					    $json1= json_encode(array('cols' => array(array('id' => '', 'Label' => 'Content' , 'patttern' => '' , 'type' => 'string'), 
						array ('id' => '', 'Label' => 'Comment' , 'patttern' => '' , 'type' => 'number')),
						'rows' => array(array('c' => array(
						array('v' => 'content', 'f' => 'content'),
						array("v" => ($count1), "f" => "null" ))), array('c' => array(array('v' => 'comment', 'f' => 'comment'), array("v" => ($count), "f" => "null" ))), array('c' => array(array('v' => 'diease', 'f' => 'diease'), array("v" => ($count2), "f" => "null" ))))));
			
                // latitude, longitude, id etc.
           $jsonFile1 = "test2.json";
    $fh1 = fopen($jsonFile1, 'w');
    fwrite($fh1, $json1);

	
	  $dbh2 = new mysqli("localhost", "root", "seecs@123", "test1");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

if ($result4 = $dbh2->query("SELECT * FROM blood_req")) 
{

    /* determine number of rows result set */
    $count = $result4->num_rows;


    /* close result set */
    $result4->close();
}


if ($result5 = $dbh2->query("SELECT * FROM donor_reg")) 
{

    /* determine number of rows result set */
    $count1 = $result5->num_rows;

    /* close result set */
    $result5->close();
}
if ($result6 = $dbh2->query("SELECT * FROM member_reg")) 
{

    /* determine number of rows result set */
    $count2 = $result6->num_rows;

  
    /* close result set */
    $result6->close();
}

/* close connection */
$dbh2->close();

					    $json= json_encode(array('cols' => array(array('id' => '', 'Label' => 'Donors Registred' , 'patttern' => '' , 'type' => 'string'), 
						array ('id' => '', 'Label' => 'Blood Required by Persons' , 'patttern' => '' , 'type' => 'number')),
						'rows' => array(array('c' => array(
						array('v' => 'donor_reg', 'f' => 'Donor Registred'),
						array("v" => ($count1), "f" => "null" ))), array('c' => array(array('v' => 'blood_req', 'f' => 'Blood Required by Persons'), array("v" => ($count), "f" => "null" ))), array('c' => array(array('v' => 'member_reg', 'f' => 'Total Number of Registred Members'), array("v" => ($count2), "f" => "null" ))))));
			
                // latitude, longitude, id etc.
           $jsonFile = "test3.json";
    $fh = fopen($jsonFile, 'w');
    fwrite($fh, $json);
					
					
?>




<html>
  <head>
    <!--Script Reference[1]-->
   
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/master-ui.css">
        <!--    <link rel="stylesheet" href="css/bootstrap-theme.min.css">-->
      <!--  <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/signin.css">
        <link rel="stylesheet" href="css/hover.css">
		
		-->
<!--        <script src="//unpkg.com/api-check@latest/dist/api-check.js"></script>-->
<!--        <script src="js/angular.min.js"></script>-->
<!--        <script src="js/file_upload.js"></script>-->
        
<!--            <script src="js/ui-bootstrap.min.js"></script>-->
<!--        <script src="js/ng-intl-tel-input.js"></script>-->
<!--        <script src="js/ng-flow-standalone.min.js"></script>-->
        <!-- This is the current state of master for formly core. -->
<!--        <script src="//unpkg.com/angular-formly@latest/dist/formly.js"></script>-->
        <!-- This is the current state of master for the bootstrap templates -->
<!--        <script src="//unpkg.com/angular-formly-templates-bootstrap@latest/dist/angular-formly-templates-bootstrap.js"></script>-->
		
		
		
		
		
		
		
		
		  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
<!--    <script src="css/master-ui1.css"></script>-->
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>


    <script type="text/javascript" src="script.js"></script>
      <script>
	

  
  	google.load('visualization', '1', {
    'packages': ['corechart']
});

// Set a callback to run when the Google Visualization API is loaded.
google.setOnLoadCallback(drawChart1);

google.setOnLoadCallback(drawChart2);
google.setOnLoadCallback(drawChart3);

function drawChart3() {
    var jsonData = $.ajax({
        url: "getData3.php",
        dataType: "json",
        async: false
    }).responseText;

    // Create our data table out of JSON data loaded from server.
    var data = new google.visualization.DataTable(jsonData);

    
    // Selsct Chart Type
    var chart_type = document.getElementsByName("chart^type")[0].value;
    
    if(chart_type == "ColumnChart"){
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('char--div'));
        chart.draw(data, {
            title: "Data Visualization",
            width: "100%",
            height: 400
        });
    }
    
    else if(chart_type == "BarChart"){
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.BarChart(document.getElementById('char--div'));
        chart.draw(data, {
            title: "Data Visualization",
            width: "100%",
            height: 400
        });
    }
    
    else if(chart_type == "LineChart"){
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.LineChart(document.getElementById('char--div'));
        chart.draw(data, {
            title: "Data Visualization",
            width: "100%",
            height: 400
        });
    }

}






function drawChart2() {
    var jsonData = $.ajax({
        url: "getData2.php",
        dataType: "json",
        async: false
    }).responseText;

    // Create our data table out of JSON data loaded from server.
    var data = new google.visualization.DataTable(jsonData);

    
    // Selsct Chart Type
    var chart_type = document.getElementsByName("chart-type")[0].value;
    
    if(chart_type == "ColumnChart"){
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('char-div'));
        chart.draw(data, {
            title: "Data Visualization",
            width: "100%",
            height: 400
        });
    }
    
    else if(chart_type == "BarChart"){
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.BarChart(document.getElementById('char-div'));
        chart.draw(data, {
            title: "Data Visualization",
            width: "100%",
            height: 400
        });
    }
    
    else if(chart_type == "LineChart"){
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.LineChart(document.getElementById('char-div'));
        chart.draw(data, {
            title: "Data Visualization",
            width: "100%",
            height: 400
        });
    }
	 else if(chart_type == "PieChart"){
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('char-div'));
        chart.draw(data, {
            title: "Data Visualization",
            width: "100%",
            height: 400
        });
    }
}







function drawChart1() {
    var jsonData = $.ajax({
        url: "getData1.php",
        dataType: "json",
        async: false
    }).responseText;

    // Create our data table out of JSON data loaded from server.
    var data = new google.visualization.DataTable(jsonData);

    
    // Selsct Chart Type
    var chart_type = document.getElementsByName("charttype")[0].value;
    
    if(chart_type == "ColumnChart"){
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chardiv'));
        chart.draw(data, {
            title: "Data Visualization",
            width: "100%",
            height: 400
        });
    }
    
    else if(chart_type == "BarChart"){
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.BarChart(document.getElementById('chardiv'));
        chart.draw(data, {
            title: "Data Visualization",
            width: "100%",
            height: 400
        });
    }
    
    else if(chart_type == "LineChart"){
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.LineChart(document.getElementById('chardiv'));
        chart.draw(data, {
            title: "Data Visualization",
            width: "100%",
            height: 400
        });
    }
	    else if(chart_type == "PieChart"){
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chardiv'));
        chart.draw(data, {
            title: "Data Visualization",
            width: "100%",
            height: 400
        });
    }
}
	
	
	</script>
  </head>
  <body style="

		background: #ffffff; /* Old browsers */
background: -moz-linear-gradient(top, #ffffff 0%, #f1f1f1 50%, #e1e1e1 51%, #f6f6f6 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(50%,#f1f1f1), color-stop(51%,#e1e1e1), color-stop(100%,#f6f6f6)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, #ffffff 0%,#f1f1f1 50%,#e1e1e1 51%,#f6f6f6 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, #ffffff 0%,#f1f1f1 50%,#e1e1e1 51%,#f6f6f6 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, #ffffff 0%,#f1f1f1 50%,#e1e1e1 51%,#f6f6f6 100%); /* IE10+ */
background: linear-gradient(to bottom, #ffffff 0%,#f1f1f1 50%,#e1e1e1 51%,#f6f6f6 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#f6f6f6',GradientType=0 ); /* IE6-9 */
">
    <!--Chart Placement[2]-->
  
<nav class="navbar navbar-inverse">
				  <div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					  <a class="navbar-brand" href="#">Web Project</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					  <ul class="nav navbar-nav">
						
						<li><a href="#">Visualization</a></li>
					
					  </ul>
					
				
					</div><!-- /.navbar-collapse -->
				  </div><!-- /.container-fluid -->
				</nav>
		
				<div class=' text-center page-header' >
<h2>School Renovation</h2>
		<p>SELECT CHART TYPE</p>
    <select name="chart^type" onchange="drawChart3();">
        <option value="ColumnChart">Column Chart</option>
        <option value="BarChart">Bar Chart</option>
        <option value="LineChart">Line Chart</option>
			
    </select>
	</div>
	<div id="char--div"></div>
    <!--Div that will hold the pie chart-->
    
		
		<div class=' margin-150t text-center page-header' >
<h2>Academic Scholarships</h2>
		<p>SELECT CHART TYPE</p>
    <select name="chart-type" onchange="drawChart2();">
        <option value="ColumnChart">Column Chart</option>
        <option value="BarChart">Bar Chart</option>
        <option value="LineChart">Line Chart</option>
			<option value="PieChart">Pie Chart</option>
    </select>
	</div>
	
	
    <!--Div that will hold the pie chart-->
   <div id="char-div"></div> 
		
		
		
		
		
		
		
		
		
		
		
		<div class=' margin-150t text-center page-header' >
<h2>Blood Donation </h2>
		<p>SELECT CHART TYPE</p>
    <select name="charttype" onchange="drawChart1();">
        <option value="ColumnChart">Column Chart</option>
        <option value="BarChart">Bar Chart</option>
        <option value="LineChart">Line Chart</option>
		<option value="PieChart">Pie Chart</option>
    </select>
	</div>
    <!--Div that will hold the pie chart-->
    <div id="chardiv"></div>
	
		
		
		
		
		
		
		
<div class=' margin-150t text-center page-header' >
<h2>Food Sustance </h2>
    SELECT CHART TYPE 
  
    <select name="chart_type" onchange="drawChart();">
        <option value="ColumnChart">Column Chart</option>
        <option value="BarChart">Bar Chart</option>
        <option value="LineChart">Line Chart</option>
			<option value="PieChart">Pie Chart</option>
    </select>
	</div>
    <!--Div that will hold the pie chart-->
    <div id="chartdiv"></div>
	

	
	  <?php
      include '_header.html';
     // session_start();
	  $dbh2 = new mysqli("localhost", "root", "seecs@123", "test1");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

//	$dbh1= mysql_connect("localhost","root","seecs@123") or die("No Connection");
//	mysql_select_db("test1", $dbh1) or die("No Database name"); 
  ?>
  <div class="col-md-10 col-md-offset-1">

  <div id="wrapper margin-20L">
    <div id="page-wrapper">
	 <div class= 'col-md-6 col-xs-6 text-center page-header'> <h1>School Management </h1></div>
   <div class="col-lg-12">
  
    <div class="col-lg-4 col-sm-6 col-xs-12 main-widget">
        <div class="main-box infographic-box">
            <i class="fa fa-users red-bg"></i>
            <span class="headline">Students</span>
            <span class="value">
                <?php
				
				
				if ($sql_sel = $dbh2->query("SELECT * FROM stu_tbl")) 
{

    /* determine number of rows result set */
    $count = $sql_sel->num_rows;
echo $count;
    /* close result set */
    $sql_sel->close();
}
                 
                ?>
            </span>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 col-xs-12 main-widget">
        <div class="main-box infographic-box">
            <i class="fa fa-users emerald-bg"></i>
            <span class="headline">Teachers</span>
            <span class="value">
                <?php
				
				
				
				if ($sql_sel = $dbh2->query("SELECT * FROM teacher_tbl")) 
{

    /* determine number of rows result set */
    $count = $sql_sel->num_rows;
echo $count;
    /* close result set */
    $sql_sel->close();
}
// $dbh2->close();
/*
                    $sql_sel=mysql_query("SELECT * FROM teacher_tbl");
                    $count = mysql_num_rows($sql_sel);
                    echo $count; */
                ?>
            </span>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 col-xs-12 main-widget">
        <div class="main-box infographic-box">
            <i class="fa fa-user green-bg"></i>
            <span class="headline">Users</span>
            <span class="value">
                <?php
				
											if ($sql_sel = $dbh2->query("SELECT * FROM users_tbl")) 
{

    /* determine number of rows result set */
    $count = $sql_sel->num_rows;
echo $count;
    /* close result set */
    $sql_sel->close();
}
                   
                ?>
            </span>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 col-xs-12 main-widget">
        <div class="main-box infographic-box">
            <i class="fa fa-fax orange-bg"></i>
            <span class="headline">Faculty</span>
            <span class="value">
                <?php
				
				
				
								if ($sql_sel = $dbh2->query("SELECT * FROM facuties_tbl")) 
{

    /* determine number of rows result set */
    $count = $sql_sel->num_rows;
echo $count;
    /* close result set */
    $sql_sel->close();
}
              
                ?>
            </span>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 col-xs-12 main-widget">
        <div class="main-box infographic-box">
            <i class="fa fa-star yellow-bg"></i>
            <span class="headline">Subject</span>
            <span class="value">
                <?php
				
					if ($sql_sel = $dbh2->query("SELECT * FROM sub_tbl")) 
{

    /* determine number of rows result set */
    $count = $sql_sel->num_rows;
echo $count;
    /* close result set */
    $sql_sel->close();
}
              $dbh2->close();
                ?>
            </span>
        </div>
    </div>
</div>
      </div> 
    </div>
    </div>


    <!--Div that will hold the pie chart-->
   
	

	

  </body>
</html>

