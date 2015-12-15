<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="shortcut icon" href="img/icon.png">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/uikit.almost-flat.min.css" media="screen">
    <link rel="stylesheet" href="css/components/form-password.almost-flat.min.css" media="screen">
    <link rel="stylesheet" href="css/main.css" media="screen">
    <link rel="stylesheet" href="css/create.css" media="screen">
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/uikit.min.js"></script>
  </head>
  <body>
    <?php include "../views/partials/navbar.php" ?>
    <?php include "../views/partials/header.php" ?>
    <form action="index.html" method="post" class="uk-form">
      <div class="uk-form-row">
        <label for="username">Username *</label>
        <input type="text" name="username" class="uk-form-width-medium">
      </div>
      <div class="uk-form-password uk-form-row">
        <label for="password">Password *</label>
        <input type="password" name="password" class="uk-form-width-medium">
        <a href="" class="uk-form-password-toggle" data-uk-form-password="">Show</a>
      </div>
      <div class="uk-form-password uk-form-row">
        <label for="password">Confirm Password *</label>
        <input type="password" name="password" class="uk-form-width-medium">
        <a href="" class="uk-form-password-toggle" data-uk-form-password="">Show</a>
      </div>
      <div class="uk-form-row">
        <label for="email">Email *</label>
        <input type="text" name="email" class="uk-form-width-medium">
      </div>
      <div class="uk-form-row">
        <label for="first_name">First Name *</label>
        <input type="text" name="first_name" class="uk-form-width-medium">
      </div>
      <div class="uk-form-row">
        <label for="last_name">Last Name *</label>
        <input type="text" name="last_name" class="uk-form-width-medium">
      </div>
      <div class="uk-form-row">
        <label for="phone_number">Phone Number</label>
        <input type="text" name="phone_number" class="uk-form-width-medium">
      </div>
      <span>* indicates a required field</span>
      <button type="button" class="uk-button uk-button-primary"><i class="fa fa-user"></i> Register</button>
    </form>
    <?php include "../views/partials/footer.php" ?>
    <?php include "js/js_include.php" ?>
  </body>
</html>
