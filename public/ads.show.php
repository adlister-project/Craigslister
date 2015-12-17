<?php

require '../bootstrap.php';


function pageController($dbc)
{
  $test = new Ad();
  $keyword = new Keyword();
  $ad = $test->find(2);
  $adAttr = $ad->getAttributes();
  'SELECT * FROM ads LEFT JOIN ad_keyword LEFT JOIN keywords WHERE id = ' . ':ad'
  $keywordAttr = $keyword->getAttributes();
  // foreach($ad as $a){
    var_dump($keywordAttr);
  // }

  return array (
    'adAttr' => $adAttr,
    'keywordAttr' => $keywordAttr
  );
}

extract(pageController($dbc));

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Show</title>
    <link rel="shortcut icon" href="img/icon.png">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/uikit.almost-flat.min.css" media="screen">
    <link rel="stylesheet" href="css/slideshow.almost-flat.min.css" media="screen">
    <link rel="stylesheet" href="css/slidenav.almost-flat.min.css" media="screen">
    <link rel="stylesheet" href="css/main.css" media="screen">
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/uikit.min.js"></script>
  </head>
  <body>
    <?php include "../views/partials/navbar.php" ?>
    <?php include "../views/partials/header.php" ?>
    <div class="uk-container uk-container-center">
      <h2>Item or Service</h2>
      <img class="uk-thumbnail-mini" src="http://placehold.it/400x400" alt="Item Picture" />
      <img class="uk-thumbnail-mini" src="http://placehold.it/400x400" alt="Item Picture" />
      <img class="uk-thumbnail-mini" src="http://placehold.it/400x400" alt="Item Picture" />
      <table class="uk-table">
        <thead>
          <tr>
            <th>Description</th>
            <th>Date Posted</th>
            <th>Keywords</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody>
          
          <tr>
            <td><?= $adAttr['description'] ?></td>
            <td>Some Date</td>
            <td>Some Keyword</td>
            <td><?= $adAttr['price'] ?></td>
          </tr>

        </tbody>
      </table>
    </div>
    <?php include "../views/partials/footer.php" ?>
    <?php include "js/js_include.php" ?>
  </body>
</html>
