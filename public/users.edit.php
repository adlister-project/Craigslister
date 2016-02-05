<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Edit</title>
    <link rel="shortcut icon" href="img/icon.png">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/uikit.almost-flat.min.css" media="screen">
    <link rel="stylesheet" href="css/components/form-password.almost-flat.min.css" media="screen">
    <link rel="stylesheet" href="css/main.css" media="screen">
    <link rel="stylesheet" href="css/user_edit.css" media="screen">
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/uikit.min.js"></script>
  </head>
  <body>
   
    <div class="uk-container">
      <h1>Edit</h1>
      <div class="uk-accordion" data-uk-accordion>
        <p><a href="#" class="uk-accordion-title">Change email</a></p>
        <div class="uk-accordion-content uk-form">
          <div class="uk-form-row">
            <label for="email">Current email</label>
            <input type="text" name="email" class="uk-form-width-medium">
          </div>
          <div class="uk-form-row">
            <label for="new_email">New email</label>
            <input type="text" name="new_email" class="uk-form-width-medium">
          </div>
          <div class="uk-form-row">
            <label for="confirm_email">Confirm email</label>
            <input type="text" name="confirm_email" class="uk-form-width-medium">
          </div>
          <button type="button" name="button" class="uk-button uk-button-primary">Submit</button>
        </div>
        <p><a href="#" class="uk-accordion-title">Change password</a></p>
        <div class="uk-accordion-content uk-form">
          <div class="uk-form-row">
            <div class="uk-form-password">
              <label for="password">Current password</label>
              <input type="password" name="password">
              <a href="" class="uk-form-password-toggle" data-uk-form-password="">Show</a>
            </div>
          </div>
          <div class="uk-form-row">
            <div class="uk-form-password">
              <label for="new_password">New password</label>
              <input type="password" name="new_password">
              <a href="" class="uk-form-password-toggle" data-uk-form-password="">Show</a>
            </div>
          </div>
          <div class="uk-form-row">
            <div class="uk-form-password">
              <label for="confirm_password">Confirm password</label>
              <input type="password" name="confirm_password">
              <a href="" class="uk-form-password-toggle" data-uk-form-password="">Show</a>
            </div>
          </div>
          <button type="button" name="button" class="uk-button uk-button-primary">Submit</button>
        </div>
        <p><a href="#" class="uk-accordion-title">Change phone number</a></p>
        <div class="uk-accordion-content uk-form">
          <div class="uk-form-row">
            <label for="phone_number">Current phone number</label>
            <input type="text" name="phone_number">
          </div>
          <div class="uk-form-row">
            <label for="new_phone_number">New phone number</label>
            <input type="password" name="new_phone_number">
          </div>
          <div class="uk-form-row">
            <label for="confirm_password">Confirm phone number</label>
            <input type="password" name="confirm_phone_number">
          </div>
          <button type="button" name="button" class="uk-button uk-button-primary">Submit</button>
        </div>
        <p><a href="#" class="uk-accordion-title">Change phone carrier</a></p>
        <div class="uk-accordion-content uk-form">
          <div class="uk-form-row">
            <label for="phone_carrier">Current phone carrier</label>
            <input type="text" name="phone_carrier">
          </div>
          <div class="uk-form-row">
            <label for="new_phone_carrier">New phone carrier</label>
            <input type="password" name="new_phone_carrier">
          </div>
          <div class="uk-form-row">
            <label for="confirm_phone_carrier">Confirm phone carrier</label>
            <input type="password" name="confirm_phone_carrier">
          </div>
          <button type="button" name="button" class="uk-button uk-button-primary">Submit</button>
        </div>
        <p><a href="#" class="uk-accordion-title">Change first name</a></p>
        <div class="uk-accordion-content uk-form">
          <div class="uk-form-row">
            <label for="first_name">Current first name</label>
            <input type="text" name="first_name">
          </div>
          <div class="uk-form-row">
            <label for="new_first_name">New first name</label>
            <input type="password" name="new_first_name">
          </div>
          <div class="uk-form-row">
            <label for="confirm_first_name">Confirm first name</label>
            <input type="password" name="confirm_first_name">
          </div>
          <button type="button" name="button" class="uk-button uk-button-primary">Submit</button>
        </div>
        <p><a href="#" class="uk-accordion-title">Change last name</a></p>
        <div class="uk-accordion-content uk-form">
          <div class="uk-form-row">
            <label for="last_name">Current last name</label>
            <input type="text" name="last_name">
          </div>
          <div class="uk-form-row">
            <label for="new_last_name">New last name</label>
            <input type="password" name="new_last_name">
          </div>
          <div class="uk-form-row">
            <label for="confirm_last_name">Confirm last name</label>
            <input type="password" name="confirm_last_name">
          </div>
          <button type="button" name="button" class="uk-button uk-button-primary">Submit</button>
        </div>
      </div>
      <button type="button" name="button" class="uk-button uk-button-danger">Delete Account</button>
    </div>
    <?php include "js/js_include.php" ?>
  </body>
</html>
