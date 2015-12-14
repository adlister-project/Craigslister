<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="shortcut icon" href="img/icon.png">
    <link rel="stylesheet" href="css/uikit.almost-flat.min.css" media="screen">
    <link rel="stylesheet" href="css/main.css" media="screen">
    <link rel="stylesheet" href="css/login.css" media="screen">
  </head>
  <body>
    <?php include "../views/partials/navbar.php" ?>
    <?php include "../views/partials/header.php" ?>
    <div class="uk-vertical-align">
      <form action="index.php" method="post" class="uk-form uk-container uk-vertical-align-middle">
        <label for="username">Username</label>
        <input type="text" name="username">
        <div class="uk-form-password">
          <label for="password">Password</label>
          <input type="password" name="password">
          <a class="uk-form-password-toggle" data-uk-form-password>Show</a>
        </div>
        <button type="button">Login</button>
      </form>
    </div>
    <?php include "../views/partials/footer.php" ?>
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/uikit.min.js"></script>
    <script type="text/javascript" src="js/form-password.min.js"></script>
  </body>
</html>
