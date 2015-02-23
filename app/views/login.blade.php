<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administration Issues Log</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  
    <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div class="container">

    <div class="row">
     <div class="col-md-12">
      <h1>Administration Issues Log</h1>
     </div>
    <div class="col-md-12">
        <form class="form-horizontal" method="post" action="http://rocketonemedia.com/task/public/login">

        @if(Session::has('message_fail'))
        <div class="alert alert-danger" role="alert">
             {{Session::get('message_fail')}}
        </div>
     
        @endif
      
            <fieldset>

            <!-- Form Name -->
          

            <!-- Text input-->
          
            <div class="form-group">
              <label class="col-md-4 control-label" for="user">User</label>  
              <div class="col-md-4">
              <input id="user" name="email" type="text" placeholder="email" class="form-control input-md" required="">
             
             
              </div>
            </div>

            <!-- Password input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="password">Password</label>
              <div class="col-md-4">
                <input id="password" name="password" type="password" placeholder="password" class="form-control input-md" required="">
                 <small class="help-block"><a href="#">Reset password</a> | <a href="#">Create Account</a>  </small>  
              </div>
            </div>

            <!-- Button -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="singlebutton"></label>
              <div class="col-md-4">
                <button id="singlebutton" name="singlebutton" class="btn btn-success">login</button>

              </div>
            </div>

            <div class="form-group">
              
            </div>

            </fieldset>
            </form>



    </div>
  </div>
    
  </div>

    
   
  
 

  


  </body>
</html>