<!DOCTYPE html>
<html lang="en" ng-app="searchApp">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>
                @yield('title', "Sean's Stuff")
        </title>

        <!-- Link to Bootstrap core CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

        <link href="/css/homepage.css" rel="stylesheet">

        <link rel="icon" href="/images/favicon.ico" sizes="16x16" type="image/x-icon">

    </head>
    <body ng-controller="searchController">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <form method='POST' id='logout' action='/logout'>
                        {{ csrf_field() }}
                        <ul class="nav navbar-nav">
                            <li><a href="/">Home<span class="sr-only">(current)</span></a></li>
                            <li><a href="/about">About <span class="sr-only">(current)</span></a></li>
                        @if(Auth::check())
                            <li><a href="/books/create">Create New Book<span class="sr-only">(current)</span></a></li>
                            <li>
                                
                                        <a href='#' onClick='document.getElementById("logout").submit();'>Logout</a>
                            </li>
                        @else
                            <li><a href="/login">Login<span class="sr-only">(current)</span></a></li>
                            <li><a href="/register">Register<span class="sr-only">(current)</span></a></li>
                        @endif
                        </ul>
                    </form>
                    <form id = "searchForm" class="navbar-form navbar-right">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search Book/Chapter" ng-model="searchInput.title">
                            <input type="hidden" ng-model="searchInput.name" ng-bind="searchChapter.name = searchInput.title"/>
                        </div>
                    </form>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

            <footer>
                <p>&copy; Sean Lim</p>
            </footer>
        </div> <!-- /container -->
    </body>
</html>
