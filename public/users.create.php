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
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/additional-methods.min.js"></script>
    <script type="text/javascript" src="js/uikit.min.js"></script>
  </head>
  <body>
    <?php include "../views/partials/navbar.php" ?>
    <?php include "../views/partials/header.php" ?>
    <div class="uk-container uk-container-center">
      <h2>Register</h2>
      <form action="index.html" method="post" class="uk-form" id="register">
        <div class="uk-form-row">
          <label for="username">Username *</label>
          <input type="text" name="username" minlength="2" class="uk-form-width-medium" id="username" required>
        </div>
        <div class="uk-form-row">
          <div class="uk-form-password">
            <label for="password">Password *</label>
            <input type="password" name="password" minlength="10" class="uk-form-width-medium" id="passwordInput" required>
            <a href="" class="uk-form-password-toggle" data-uk-form-password="">Show</a>
          </div>
        </div>
        <div class="uk-form-row">
          <div class="uk-form-password">
            <label for="password">Confirm Password *</label>
            <input type="password" name="confirm_password" minlength="10" class="uk-form-width-medium" id="confirm_password" required>
            <a href="" class="uk-form-password-toggle" data-uk-form-password="">Show</a>
          </div>
        </div>
        <div class="uk-form-row">
          <label for="email">Email *</label>
          <input type="text" name="email" class="uk-form-width-medium" id="text" required>
        </div>
        <div class="uk-form-row">
          <label for="first_name">First Name *</label>
          <input type="text" name="first_name" minlength="2" class="uk-form-width-medium" id="first_name" required>
        </div>
        <div class="uk-form-row">
          <label for="last_name">Last Name *</label>
          <input type="text" name="last_name" minlength="2" class="uk-form-width-medium" id="last_name" required>
        </div>
        <div class="uk-form-row">
          <label for="phone_number">Phone Number</label>
          <input type="text" name="phone_number" Minlength="10" class="uk-form-width-medium" id="phone_number">
        </div>
        <span>* indicates a required field</span>
        <button type="submit" class="uk-button uk-button-primary" id="submit-button"><i class="fa fa-user"></i> Register</button>
      </form>
    </div>
    <?php include "../views/partials/footer.php" ?>
    <?php include "js/js_include.php" ?>
    <script>
    $(document).ready(function() {
      var form_validate_rules = {
          rules: {
            username: {
              required: true,
              minlength: 2
            },
            passwordInput: {
              required: true,
              minlength: 10
            },
            confirm_password: {
              required: true,
              minlength: 10,
              equalto: "#passwordInput"
            },
            email: {
              required: true,
              email: true
            },
            first_name: {
              required: true,
              minlength: 2
            },
            last_name: {
              required: true,
              minlength: 2
            },
            phone_number: {
              minlength: 10
            }, 
          },
          messages: {
            username: {
              required: "Please enter a username",
              minlength: "Your username must consist of at least 2 characters"
            },
            password: {
              required: "Please provide a password",
              minlength: "Your password must consist of at least 10 characters and contain at least one upper case letter, at least two numbers and a special character"
            },
            confirm_password: {
              required: "Please provide a password",
              minlength: "Your password must consist of at least 10 characters and contain at least one upper case letter, at least two numbers and a special character",
              equalTo: "Please enter the same password as above" 
            },
            first_name: {
              required: "Please enter your first name",
              minlength: 2
            },
            last_name: {
              required: "Please enter your last name",
              minlength: 2
            },     
          }
        };

      $("#register").validate(form_validate_rules);

      $("#submit-button").on("click", function() {
        $("#register").validate(form_validate_rules);
        alert('YO!');
      });
    });
    </script>
  </body>
</html>
