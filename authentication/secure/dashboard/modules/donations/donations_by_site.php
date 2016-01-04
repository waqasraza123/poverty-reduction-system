<?php
// Start the session
session_start();
if (!isset($_SESSION["user_type"])) {
	header("Location:../index.php");
}
?>
<!DOCTYPE html>

<html>
<head>
<meta charset="ISO-8859-1">
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

<title>Donate What You Want</title>
<?php 
include "donation_store_header_footer.php";
?>
<script src="jquery-1.11.js">		</script>
</head>


<body>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				
				<h1 style="text-align:center"> </h1>
				<hr>
			</div>
		</div>
		
		<div class="row">
			
			<div class="col-md-8 col-md-push-2">
				<div ng-app="reading_app" ng-controller="read_php">
					<table>
						<tr ng-repeat="comment_ in all_data">
							<td>
								<h5 ><b>name: &nbsp;&nbsp;&nbsp; </b>{{comment_.name}}</h5>
								<h5 ><b>email:&nbsp;&nbsp;&nbsp;&nbsp;  </b>{{comment_.email}} </h5> 
								<h5 ><b>subject:  </b>{{comment_.subject}}</h5>  
								<p > <b>message: </b>{{comment_.message}}</div>			
								<hr/>
							</td>
						</tr>
					</table>
				</div>
				
				<script>
					angular.module("reading_app",[]).controller("read_php",
						function($scope,$http, $interval)
						{
							refresh_commetns();
							function refresh_commetns(){
								$http.get("comment_data.php")
								.then(
									function(response){
										$scope.all_data = response.data.records;
									}
								)
							}
							$interval(refresh_commetns,5000);
						}
					)
				</script>
			</div>
		</div>
		<div style="height:100px; width:100px"> </div>
	</div>

	
	
		<script>
		$(document).ready(
			function()
			{
				document.getElementById("show_comments").className = "active";
			}
		)
	</script>

</body>
</html>