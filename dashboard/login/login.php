<?php 
require '../../functions/autoload_class.php';
$message = isset($_GET['message']) && isset($_GET['type']) ? 
MessageFactory::createMessage($_GET['type']) :false;


$message_out = $message ? $message->getMessage($_GET['message']) : '';

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/signIn.css">
  <title>Login</title>
</head>
<body>
  <div class="container">

      <form class="form-signin" method="post" action="validar_login.php">
        <h2 class="form-signin-heading">Please sign in</h2>
        <?php echo $message_out;?>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address"  autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" >
        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>