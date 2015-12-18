<?php

require '../bootstrap.php';


function pageController($dbc)
{
    $test = new Ad();

    $ad = Ad::adWithAllFields(2);
    $adAttr = $ad->getAttributes();
    $adAttr['keywords'] = implode(', ', $adAttr['keywords']);

    var_dump($adAttr);

    return array (
        'adAttr' => $adAttr
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
            <h2><?= $adAttr['title'] ?></h2>
            <h6>Seller: <div class="uk-badge"><i class="uk-icon-user"></i>&nbsp; <?= $adAttr['username'] ?></div></h6>
            <?php if(!empty($adAttr['image_urls'])): ?>
                <?php foreach($adAttr['image_urls'] as $adImage): ?>
            <img class="uk-thumbnail-mini" src="<?= $adImage ?>" alt="Item Picture" />
                <?php endforeach ?>
            <?php endif ?>
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
                        <td><?= $adAttr['date_posted'] ?></td>
                        <td><?= $adAttr['keywords'] ?></td>
                        <td><?= '$' . $adAttr['price'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php include "../views/partials/footer.php" ?>
        <?php include "js/js_include.php" ?>
    </body>
</html>
