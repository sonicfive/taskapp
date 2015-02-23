<!DOCTYPE html>
<html ng-app="TaskApp">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task Manager</title>



    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="/task/public/css/taskman.css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,300,700" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="/task/public/css/angular-multi-select.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular-route.min.js"></script>
<!--
<script src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/2.4.1/lodash.js"></script>
-->
<script type="text/javascript" src="/task/public/js/angularjs-dropdown-multiselect.js"></script>

<script type="text/javascript" src="/task/public/js/app.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body ng-controller="tasksController">
    
    <div class="navbar navbar-default" id="navbar">
    <div class="container" id="navbar-container">
  <div class="navbar-header">
    <a href="#" class="navbar-brand">
      <small>

        <i class="glyphicon glyphicon glyphicon-log-out"></i>
      Administration Issues Logs
      </small>
    </a><!-- /.brand -->
    
  </div><!-- /.navbar-header -->

  <div class="navbar-header pull-right" role="navigation">

        <a href="/task/public/logout" class="btn btn-sm btn-danger nav-button-margin">   <i class="glyphicon glyphicon-book"></i>&nbsp; Logout:  <?php print Auth::user()->email ?></a>
  </div>







  </div>
  </div>
  <div class="row">
      <div class="container">

        <div class="col-md-12" ng-view></div>
      
      </div>
    </div>
 

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


  </body>
</html>