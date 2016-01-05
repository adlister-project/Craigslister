<?php 
require '../bootstrap.php';
var_dump($_SESSION);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link rel="shortcut icon" href="img/icon.png">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" khref="css/uikit.almost-flat.min.css" media="screen">
    <link rel="stylesheet" href="css/main.css" media="screen">
    <link rel="stylesheet" href="css/show.css" media="screen">
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/uikit.min.js"></script>
  </head>
  <body>
    <?php include "../views/partials/navbar.php" ?>
    <?php include "../views/partials/header.php" ?>
    <div class="uk-container side">
      <img class="uk-border-circle" src="http://placehold.it/200x200" alt="Profile Picture" />
      <h2>First and Last Name</h2>
      <h4>Email:</h4>
      <h4>Phone:</h4>
    </div>
    <div class="uk-container main">
      <table class="uk-table uk-table-hover">
        <thead>
          <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Date Posted</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Titles</td>
            <td>Descriptions</td>
            <td>Dates</td>
            <td>Status</td>
          </tr>
          <tr>
            <td>Titles</td>
            <td>Descriptions</td>
            <td>Dates</td>
            <td>Status</td>
          </tr>
        </tbody>
      </table>
    </div>
    <?php include "../views/partials/footer.php" ?>
    <?php include "js/js_include.php" ?>
  </body>
</html>
