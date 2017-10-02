
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>BOI | Incident Extract</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <?php
      include_once("functions/db_functions.php");
    ?>
  </head>

  <body>

    <div class="container">

      <!--
      <div class="banner-logo">
        <img src="imgs/boi-logo.png"/>
      </div>
      -->
      <form class="form-signin" action="functions/db_functions.php" method="POST">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">EID</label>
        <input type="text"  class="form-control" placeholder="Enter your EID here..." required autofocus name="eid">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pw" required>
        <div class="checkbox">
        </div>
        <button class="btn btn-lg btn-primary btn-block" name="login-btn" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->


    
  </body>
</html>
