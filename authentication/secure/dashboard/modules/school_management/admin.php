<?php
include '_header.html';
session_start();
require("conection/connect.php");
$tag="";
if (isset($_GET['tag']))
$tag=$_GET['tag'];
?>
<div id="admin" >
<nav class="navbar navbar-default" role="navigation">
<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="#">Charity School Managment System</a>
</div>
<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
<ul class="nav navbar-nav navbar-right">
<li><a href="?tag=home" class="active">Home</a></li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Students <b class="caret"></b></a>
<ul class="dropdown-menu">
<li>
<a href="admin.php?tag=student_entry">Student Entry</a>
</li>
<li>
<a href="admin.php?tag=view_students">View Students</a>
</li>

</ul>
</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Teachers <b class="caret"></b></a>
<ul class="dropdown-menu">
<li>
<a href="admin.php?tag=teachers_entry">Teachers Entry</a>
</li>
<li>
<a href="admin.php?tag=view_teachers">View Teachers</a>
</li>
</ul>
</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Staff <b class="caret"></b></a>
<ul class="dropdown-menu">
<li>
<a href="admin.php?tag=staff_entry">Staff Entry</a>
</li>
<li>
<a href="admin.php?tag=view_staff">View Staff</a>
</li>
</ul>
</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Faculty <b class="caret"></b></a>
<ul class="dropdown-menu">
<li>
<a href="admin.php?tag=faculties_entry">Faculty Entry</a>
</li>
<li>
<a href="admin.php?tag=view_faculties">View Faculty</a>
</li>
</ul>
</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Subject <b class="caret"></b></a>
<ul class="dropdown-menu">
<li>
<a href="admin.php?tag=subject_entry">Subject Entry</a>
</li>
<li>
<a href="admin.php?tag=view_subjects">View Subject</a>
</li>
</ul>
</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Score <b class="caret"></b></a>
<ul class="dropdown-menu">
<li>
<a href="admin.php?tag=view_scores">View Score</a>
</li>
</ul>
</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Users <b class="caret"></b></a>
<ul class="dropdown-menu">

<!--<li>
<a href="admin.php?tag=susers_entry">Users Entry</a>
</li>-->
<li>
<a href="admin.php?tag=view_users">View Users</a>
</li>
</ul>
</li>
    
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Expenses <b class="caret"></b></a>
<ul class="dropdown-menu">
<li>
<a href="admin.php?tag=expense_entry">Expense Entry</a>
</li>
<li>
<a href="admin.php?tag=view_expense">View Expense</a>
</li>
</ul>
</li>
    
<!-- <li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Contact <b class="caret"></b></a>
<ul class="dropdown-menu">
<li>
<a href="#">Contact Entry</a>
</li>
<li>
<a href="#">View Contact</a>
</li>
</ul>
--> </li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> admin <b class="caret"></b></a>
<ul class="dropdown-menu">
<li>
<a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
</li>
</ul>
</li>
</ul>
<!--<ul class="nav navbar-nav side-nav visible-lg visible-md visible-sm">
<li>
<a href="admin.php?tag=teachers_entry">Teacher Entry</a>
</li>
<li>
<a href="admin.php?tag=staff_entry">Staff Entry</a>
</li>
<li>
<a href="admin.php?tag=faculties_entry">Faculty Entry</a>
</li>
<li>
<a href="admin.php?tag=subject_entry">Subjects Entry</a>
</li>
<li>
<a href="admin.php?tag=score_entry">Scores Entry</a>
</li>
<!--<li>
<a href="admin.php?tag=susers_entry">Users Entry</a>
</li>
<li>
<a href="admin.php?tag=susers_entry">Users Entry</a>
</li>
<li>
<a href="admin.php?tag=expense_entry">Expense Entry</a>
</li>
</ul>-->
</div>
</nav>
<div id="wrapper">
<div id="page-wrapper">
<?php
if($tag=="home" or $tag=="")
include("home.php");
elseif($tag=="student_entry")
include("Students_Entry.php");
elseif($tag=="teachers_entry")
include("Teachers_Entry.php");
elseif($tag=="staff_entry")
include("Staff_Entry.php");
elseif($tag=="score_entry")
include("Score_Entry.php");
elseif($tag=="subject_entry")
include("Subject_Entry.php");
elseif($tag=="faculties_entry")
include("Faculties_Entry.php");
//elseif($tag=="susers_entry")
//include("Users_Entry.php");
elseif($tag=="susers_entry")
include("Users_Entry.php");
elseif($tag=="expense_entry")
include("Expense_Entry.php");
elseif($tag=="view_students")
include("View_Students.php");
elseif($tag=="view_teachers")
include("View_Teachers.php");
elseif($tag=="view_staff")
include("View_Staff.php");
elseif($tag=="view_subjects")
include("View_Subjects.php");
elseif($tag=="view_scores")
include("View_Scores.php");
elseif($tag=="view_users")
include("View_Users.php");
elseif($tag=="view_faculties")
include("View_Faculties.php");
elseif($tag=="location_entry")
include("Location_Entry.php");
// elseif($tag=="artical_entry")
// include("Artical_Entry.php");
elseif($tag=="test_score")
include("test_Scores .php");
elseif($tag=="view_location")
include("View_location.php");
//elseif($tag="view_artical")
// include("View_Articaly.php");
elseif($tag="View_Expenses")
include("View_Expenses.php");

/*$tag= $_REQUEST['tag'];
if(empty($tag)){
include ("Students_Entry.php");
}
else{
include $tag;
}*/
?>
</div>
</div>
</div>
<?php include '_footer.html'; ?>