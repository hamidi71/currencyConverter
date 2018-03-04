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
    <title>Signin Template for Bootstrap</title>
    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
      <link href="../assets/css/bootstrap-theme.min.css" rel="stylesheet">
      <link href="../assets/css/style.css" rel="stylesheet">
  </head>

  <body>

    <div class="container convert">
        <h1 class="convert-text" align="center">Welokom To Currency Converter </h1>
        <h2 class="convert-text">Sign In</h2>
        <form role="form" action="../controllers/AuthenticationController.php?action=login" method="post">
            <div class="form-group">
                <label >Username:</label>
                <input type="text" class="form-control" id="login" placeholder="Enter Username" name="username">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter Password" name="password">
            </div>
            <button type="submit" class="btn btn-success" id="valider">Login</button>
        </form>

    </div> <!-- /container -->
  </body>
</html>
