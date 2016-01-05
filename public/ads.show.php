<?php

require '../bootstrap.php';


function pageController($dbc)
{
    if(isset($_GET['ad-id'])) {
        $oneAd = Ad::adWithAllFields($_GET['ad-id']);
    } else {
        header("Location: ads.index.php");
        die();
    }

    $ad = $oneAd->getAttributes();
    
    $ad['keywords'] = implode(', ', $ad['keywords']);
    $ad['price'] = '$' . number_format($ad['price'], 2, '.', ',');
    $ad['date_posted'] = new DateTime($ad['date_posted']);
    $ad['date_posted'] = $ad['date_posted']->format('m-d-Y');

    var_dump($ad);

    return array (
        'ad' => $ad
    );
}

extract(pageController($dbc));

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?= $ad['title'] ?></title>
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
            <h2><?= $ad['title'] ?></h2>
            <h6>Seller: <a href="users.show.php"><div class="uk-badge"><i class="uk-icon-user"></i>&nbsp; <?= $ad['username'] ?></div></a></h6>
            <?php if(!empty($ad['image_urls'])): ?>
                <?php foreach($ad['image_urls'] as $adImage): ?>
            <img class="uk-thumbnail-mini" src="<?= $adImage ?>" alt="<?= $ad['title'] ?>" />
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
                        <td><?= $ad['description'] ?></td>
                        <td><?= $ad['date_posted'] ?></td>
                        <td><?= $ad['keywords'] ?></td>
                        <td><?= $ad['price'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php include "../views/partials/footer.php" ?>
        <?php include "js/js_include.php" ?>
    </body>
</html>
