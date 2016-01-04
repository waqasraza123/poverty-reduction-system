<!--
********************************************************************
* Responsive Transparent Navbar
********************************************************************
-->
<div class="navbar navbar-inverse navbar-fixed-top opaque-navbar">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navMain">
                <span class="glyphicon glyphicon-chevron-right" style="color:white;"></span>

            </button>
            <a class="navbar-brand" href='{{url("/")}}' style="color:white;">Volunteer</a>
        </div>
        <div class="collapse navbar-collapse" id="navMain">
            <ul class="nav navbar-nav pull-right">
                <li class="active"><a href='{{url("/")}}'>Home</a></li>
                <li><a href='{{url("/about")}}'>About Us</a></li>
            </ul>
        </div>
    </div>
</div>


