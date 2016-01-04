<!Doctype html>
<html>
    <head>
        <title>Let's Renovate School</title>
        
        @yield('meta',"")
        {!!Html::style('css/bootstrap.css')!!}
        {!!Html::style('css/master-ui.css')!!}
        {!!Html::style('css/custom.css')!!}
        
        {!!Html::script('js/jquery.min.js')!!}
        {!!Html::script('js/bootstrap.min.js')!!}
    </head>
    <body>
        <div class="content">
            <div class="overlay"></div>
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
                  <a class="navbar-brand" href="#">School Renovation</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <form class="navbar-form navbar-left" action="{{url('/listings/search')}}" method="get" role="search">
                    <div class="form-group">
                      <input type="text" name="query" class="form-control" id="search" placeholder="Search">
                    </div>
                    <button type="submit" id="searchButton" class="btn btn-primary">Submit</button>
                  </form>
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{url('/dashboard')}}">Dashboard</a></li>
                    <li><a href="{{url('listings')}}">Home<span class="sr-only">(current)</span></a></li>
                    <li><a href="{{url('listings/my')}}">My Schools</a></li>
                    <li><a href="{{url('listings/add')}}">Add New School</a></li>
                    <li><a href="{{url('completed')}}">Completed</a></li>
                    <li><a href="{{url('contactus')}}">Contact Us</a></li>
                    <li><a href="{{url('logout')}}">Logout</a></li>
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </nav>
                @yield('inner_content')

        </div>
    </body>
</html>