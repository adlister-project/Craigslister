<?php
  require '../bootstrap.php';

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="shortcut icon" href="img/icon.png">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/uikit.almost-flat.min.css" media="screen">
    <link rel="stylesheet" href="css/components/form-password.almost-flat.min.css" media="screen">
    <link rel="stylesheet" href="css/main.css" media="screen">
    <link rel="stylesheet" href="css/login.css" media="screen">
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/uikit.min.js"></script>
  </head>
  <body>
    <?php include "../views/partials/navbar.php" ?>
    <div class="uk-vertical-align uk-panel-box-primary">
      <form action='ads.index.php' method="POST" class="uk-form uk-container uk-vertical-align-middle">
        <div class="uk-form-row">
          <label for="username">Username</label>
          <input type="text" name="username" class="uk-form-width-medium">
        </div>
        <div class="uk-form-password uk-form-row">
          <label for="password">Password</label>
          <input type="password" name="password" class="uk-form-width-medium">
          <a href="" class="uk-form-password-toggle" data-uk-form-password="">Show</a>
        </div>
        <span><a href="#">Forgot your password?</a></span>
        <button type="submit" class="uk-button uk-button-primary"><i class="fa fa-user"></i> Login</button>
      </form>
    </div>
    <?php include "../views/partials/footer.php" ?>
    <?php include "js/js_include.php" ?>
    <script>
    </script>
  </body>
</html>
